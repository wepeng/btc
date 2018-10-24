<?php
/*


    $block_json = file_get_contents("d:/1-328890/71036.txt");
	if($block_json == FALSE)
	{
		echo "Error read file d:/$now.txt";
		exit;
	}
	//print_r($block_json);
	$block = json_decode($block_json);
	if($block == NULL)
	{
		echo 'Too deeper!';
	}
	print_r($block);
	
	exit;*/
/**
*  从比特币客户端取出所有的block数据并存入数据库
*
*/
set_time_limit(0);
ini_set('memory_limit', '1024M');
//插入数据库
//$db = new mysqli('localhost', 'root', 'root', 'btc');

//获取当前进度
$now = file_get_contents("now.txt");

for($i=0; $i<50000; $i++)
{
	//显示当前进度
	echo "$now\r\n";

	$block_json = file_get_contents("D:/1/$now.txt");
	if($block_json === FALSE)
	{
		print_r($block_json);
		echo "Error read file d:/$now.txt";
		exit;
	}
	$block = json_decode($block_json);
	if($block == NULL || $block == FALSE)
	{
		//停止，补充
		//print_r($block_json);
		//echo "Error read file d:/$now.txt";
		//exit;
		//继续
		file_put_contents("json_decode_error.txt", $now."\n", FILE_APPEND);
		$now++;
		continue;
	}
	//print_r($block);
	
	//分析计算TX
	foreach($block->tx as $value)
	{
		//处理比特币的输出
		foreach($value->vout as $value_vout)
		{ 
			//nulldata、nonstandard跳过
			if(($value_vout->scriptPubKey->type=="nonstandard") || ($value_vout->scriptPubKey->type=="nulldata"))
			{
				continue;
			}
			//给每个地址加上对应的值
			if(!isset($value_vout->scriptPubKey->addresses) || count($value_vout->scriptPubKey->addresses)>1)
			{
				if(($value_vout->scriptPubKey->type=="pubkey"))
				{
					continue;
				}
				if(($value_vout->scriptPubKey->type=="multisig") && !isset($value_vout->scriptPubKey->addresses))
				{
					continue;
				}
				if(($value_vout->scriptPubKey->type=="multisig") && count($value_vout->scriptPubKey->addresses)>1)
				{
					foreach($value_vout->scriptPubKey->addresses as $key)
					{
						//插入
						file_put_contents("btc.txt", $address."\n", FILE_APPEND);
						//$query = "INSERT INTO `address` (`address`) VALUES ('$key')";
						//$result = $db->query($query);
					}
					continue;
				}
				echo $now."\n";
				echo "value_vout->scriptPubKey->addresses error";
				print_r($value_vout);
				exit;
			}
		
			//设置地址
			$address = $value_vout->scriptPubKey->addresses[0];
			
			//插入
			file_put_contents("btc.txt", $address."\n", FILE_APPEND);
			//$query = "INSERT INTO `address` (`address`) VALUES ('$address')";
			//$result = $db->query($query);
			/*
			if($result===false)
			{
				print_r($result);
				echo "\r\nERROR:$query\r\n\r\n";
				exit;
			}*/
		}
	
	}
	//下一个节点
	$now++;
	//更新当前高度
	file_put_contents("now.txt", $now);
}



//关闭数据库连接
//$db->close();  