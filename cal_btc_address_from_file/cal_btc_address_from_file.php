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
*  �ӱ��رҿͻ���ȡ�����е�block���ݲ��������ݿ�
*
*/
set_time_limit(0);
ini_set('memory_limit', '1024M');
//�������ݿ�
//$db = new mysqli('localhost', 'root', 'root', 'btc');

//��ȡ��ǰ����
$now = file_get_contents("now.txt");

for($i=0; $i<50000; $i++)
{
	//��ʾ��ǰ����
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
		//ֹͣ������
		//print_r($block_json);
		//echo "Error read file d:/$now.txt";
		//exit;
		//����
		file_put_contents("json_decode_error.txt", $now."\n", FILE_APPEND);
		$now++;
		continue;
	}
	//print_r($block);
	
	//��������TX
	foreach($block->tx as $value)
	{
		//������رҵ����
		foreach($value->vout as $value_vout)
		{ 
			//nulldata��nonstandard����
			if(($value_vout->scriptPubKey->type=="nonstandard") || ($value_vout->scriptPubKey->type=="nulldata"))
			{
				continue;
			}
			//��ÿ����ַ���϶�Ӧ��ֵ
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
						//����
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
		
			//���õ�ַ
			$address = $value_vout->scriptPubKey->addresses[0];
			
			//����
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
	//��һ���ڵ�
	$now++;
	//���µ�ǰ�߶�
	file_put_contents("now.txt", $now);
}



//�ر����ݿ�����
//$db->close();  