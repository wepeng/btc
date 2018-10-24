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
//require_once('./../easybitcoin.php');
//$bitcoin = new Bitcoin('RPCuser','RPCpasswd','127.0.0.1');


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
for($i=0; $i<100000; $i++)
{

	//获取当前的block值
	$sql = "SELECT * FROM  `block` WHERE  `height` = '$now'";
	$result = $db->query($sql);
	$res = mysqli_fetch_assoc($result);
	
	if(empty($res['json_content']))
	{
		echo "END!";
		exit;
	}
	
	//将block插入文件夹
	$flag = file_put_contents("D:/w/".$now.".txt", $res['json_content']);
	if($flag === false)
	{
	    echo("ERROR in file_put_contents :"."D:/w/".$now.".txt"); 
		exit;
	}
	$now++;
	
	//设置为-1
	//$sql = "UPDATE `btc`.`block` SET `json_content` = '-1'";
	//$result = $db->query($query);
	
	//显示当前进度
	echo $now."\r\n";
	echo "\r\n";
	
	//更新进度
	file_put_contents("now.txt", $now);
	
}


//关闭数据库连接
$db->close();  