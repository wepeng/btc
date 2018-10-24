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
$db = new mysqli('localhost', 'root', 'root', 'btc');

$error = file_get_contents("json_decode_error.txt");
$error = explode("\n", $error);
foreach($error as $value)
{
	echo "$value\n";
	$sql = "SELECT *  FROM `block` WHERE `height` = '$value'";
	$result = $db->query($sql);
	if($result === false)
	{
	    echo("ERROR: " . mysqli_error($db)); 
		echo "\r\nERROR:$query\r\n\r\n";
		exit;
	}
	$result = mysqli_fetch_assoc($result);
	$now = $result['hash'];

	//获取当前高度的blockhash
	$getnowblockhash = $now;
	
	//获取当前的block值
	$getnowblock = $bitcoin->getblock($getnowblockhash, 2);
	if($getnowblock == NULL)
	{
		echo "getnowblock:$now:$getnowblock\r\n";
		exit;
	}
	//print_r($getnowblock);
	$getnowblock_json = json_encode($getnowblock);
	
	//将block插入文件夹
	$flag = file_put_contents("./data/".$getnowblock['height'].".txt", $getnowblock_json);
	
}
