<?php

set_time_limit(0);
ini_set('memory_limit', '1024M');
//插入数据库
//$db = new mysqli('localhost', 'root', 'root', 'btc');

//获取当前进度
$now = 450000;

for($i=0; $i<50000; $i++)
{
	if(file_exists("H:/0区块链/比特币/链上数据/450000-497255/$now.txt") === FALSE)
	{
		//显示当前进度
		echo "$now\r\n";
	}
	//下一个节点
	$now++;
}



//关闭数据库连接
//$db->close();  