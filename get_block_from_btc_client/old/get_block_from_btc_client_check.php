<?php
/**
*  从比特币客户端取出所有的block数据并存入数据库
*
*/
set_time_limit(0);
//比特币客户端的启动方式
//bitcoin-qt.exe -server -datadir="f:/data" -rest -rpcbind=127.0.0.1  -rpcuser=RPCuser -rpcpassword=RPCpasswd
//bitcoin-qt.exe -datadir="f:/data" 

#清除并关闭缓冲，输出到浏览器之前使用这个函数。
//ob_end_clean();
#控制隐式缓冲泻出，默认off，打开时，对每个 print/echo 或者输出命令的结果都发送到浏览器。
//ob_implicit_flush(1);


//连接比特币钱包
require_once('./../easybitcoin.php');
$bitcoin = new Bitcoin('RPCuser','RPCpasswd','127.0.0.1');


//插入数据库
$db = new mysqli('localhost', 'root', 'root', 'btc');

//将XML转为array
function xmlToArray($xml)
{    
    //禁止引用外部xml实体
    libxml_disable_entity_loader(true);
    $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);        
    return $values;
}

//获取当前进度
$now = file_get_contents("now.txt");

//每隔100个block更新一次进度
//$current_i = 0;
for($i=0; $i<1; $i++)
{
	//获取当前高度的blockhash
	$getnowblockhash = $now;
	/*
	$getnowblockhash = $bitcoin->getblockhash((int)$now);
	if($getnowblockhash == NULL && strlen($getnowblockhash)!=64)
	{
		echo "getnowblockhash:$now:$getnowblockhash\r\n";
		exit;
	}
	//$getnowblockhash = $bitcoin->getblockhash(22);
	//print_r($getnowblockhash);
	//echo "\r\n";
	*/
	
	//获取当前的block值
	$start = microtime(true);
	$getnowblock = $bitcoin->getblock($getnowblockhash, 2);
	$elapsed = microtime(true) - $start;
	echo "That get Block $elapsed seconds.\r\n";
	if($getnowblock == NULL)
	{
		echo "getnowblock:$now:$getnowblock\r\n";
		exit;
	}
	//print_r($getnowblock);
	$getnowblock_json = json_encode($getnowblock);
	
	//将block插入数据库
	$query = "INSERT INTO `block` (`height`, `hash`,`json_content`) VALUES ('".$getnowblock['height']."', '$getnowblockhash', '$getnowblock_json')";
	//echo $query;
	$start = microtime(true);
	$result = $db->query($query);
	$elapsed = microtime(true) - $start;
	echo "That insert Block $elapsed seconds.\r\n";
	if($result === false)
	{
	    echo("ERROR: " . mysqli_error($db)); 
		echo "\r\nERROR:$query\r\n\r\n";
		exit;
	}
	
	//将TX插入数据库
	foreach($getnowblock['tx'] as $value)
	{
		$txid = $value['txid'];
		$nowtx_json = json_encode($value);
		$start = microtime(true);
		$query = "INSERT INTO `tx` (`txid`, `blockhash`, `json_content`) VALUES ('$txid', '$getnowblockhash', '$nowtx_json')";
		$elapsed = microtime(true) - $start;
		echo "That insert TX $elapsed seconds.\r\n";
		//echo $query;
		$result = $db->query($query);
		if($result === false)
		{
			print_r($getnowblock['tx']);
			echo("ERROR 83: " . mysqli_error($db));
			echo "\r\nERROR:$query\r\n\r\n";
			exit;
		} else {
			file_put_contents("log.txt", $txid.':'.$now."\r\n", FILE_APPEND);
		}
	}
	
	
	//显示当前进度
	echo $getnowblock['height'].":$getnowblockhash\r\n";
	echo "\r\n";
	
	//更新进度
	$now = $getnowblock['nextblockhash'];
	file_put_contents("now.txt", $now);
	/*
	//每隔100个block更新一次进度
	if($current_i>=100)
	{
		$current_i = 0;
		//更新当前高度
		file_put_contents("now.txt", $now);
	} else {
		$current_i++;
	}
	
	//下一个节点
	$now++;
	*/
}

//更新当前高度
//file_put_contents("now.txt", $now);

//关闭数据库连接
$db->close();  