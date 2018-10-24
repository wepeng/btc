<?php
/**
*  从比特币客户端取出所有的block数据并存入数据库
*
*/
set_time_limit(0);
//比特币客户端的启动方式
//bitcoin-qt.exe -server -datadir="f:/data" -rest -rpcbind=127.0.0.1  -rpcuser=RPCuser -rpcpassword=RPCpasswd
//bitcoin-qt.exe -datadir="f:/data" 



//连接比特币钱包
require_once('./../easybitcoin.php');
$bitcoin = new Bitcoin('RPCuser','RPCpasswd','127.0.0.1');


//插入数据库
$db = new mysqli('localhost', 'root', 'root', 'btc');

//获取地址
function getInAddress($txid, $n)
{
	//获取Tx JSON
	$query = "SELECT *  FROM `tx` WHERE `txid` LIKE '$txid'";
	//echo $query;
	$result = $db->query($query);
	if($result === false)
	{
		echo "\r\nERROR:$query\r\n\r\n";
		exit;
	}
	$result = mysqli_fetch_assoc($result);
	$tx_json = $result['json_content'];
	$tx = json_decode($tx_json);
	
	//判断特殊的未理解的情况
	if(!isset($tx->vout[$n]->scriptPubKey->addresses) || count($tx->vout[$n]->scriptPubKey->addresses)>1)
	{
		echo "value_vout->scriptPubKey->addresses error";
		print_r($tx);
		exit;
	} else {
		//返回地址
		return $tx->vout[$n]->scriptPubKey->addresses[0];
	}
}


//获取当前进度
$now = file_get_contents("now.txt");

for($i=0; $i<10; $i++)
{
	//显示当前进度
	echo "\r\n$now\r\n";
	
	//获取当前高度的block JSON
	$query = "SELECT *  FROM `block` WHERE `height` = '$now'";
	//echo $query;
	$result = $db->query($query);
	if($result === false)
	{
		echo "\r\nERROR:$query\r\n\r\n";
		exit;
	}
	//print_r($result);//exit;
	$result = mysqli_fetch_assoc($result);
	if(empty($result))
	{
		echo $query;
		echo "is Empty!\r\n\r\n";
		exit;
	}
	$block_json = $result['json_content'];
	$block = json_decode($block_json);
	//print_r($block);
	
	
	//分析计算TX
	foreach($block->tx as $value)
	{
		//教研参数
		$vin = 0.0;
		$out = 0.0;
		$coinbase = false;
		//print_r($value);
		//处理比特币的输入
		foreach($value->vin as $value_vin)
		{
			//如果是挖矿所得，跳过
			if(isset($value_vin->coinbase))
			{
				$coinbase = true;
				echo "vin:Coinbase\r\n";
				break;
			}
			// 不是挖矿所得，将输入地址的比特币设置为0
			if(isset($value_vin->txid))
			{
				//查询原来的值
				$query = "SELECT *  FROM `addresses` WHERE `address` LIKE '$address'";
				//echo $query;
				$result = $db->query($query);
				if($result === false)
				{
					echo "\r\nERROR:$query\r\n\r\n";
					exit;
				}
				$result = mysqli_fetch_assoc($result);
				$vin = $vin + $result['amount'];
				
				
				//echo "txid:".$value_vin->txid."\n";
				//将输入地址的比特币设置为0
				echo "Set:".getInAddress($value_vin->txid, $value_vin->vout)."=0\n";
				$query = "UPDATE  `addresses` SET  `amount` =  0 WHERE  `address` =  '$address'";
				$result = $db->query($query);
				if($result === false)
				{
					echo "\r\nERROR:$query\r\n\r\n";
					exit;
				}
				//print_r($value_vin);
				//exit;
			} else {
				echo "Error:";
				print_r($value_vin);
				exit;
			}
		}
		
		//处理比特币的输出
		foreach($value->vout as $value_vout)
		{ 
			//给每个地址加上对应的值
			if(!isset($value_vout->scriptPubKey->addresses) || count($value_vout->scriptPubKey->addresses)>1)
			{
				echo "value_vout->scriptPubKey->addresses error";
				print_r($value_vout);
				exit;
			}
			echo $value_vout->scriptPubKey->addresses[0];
			echo ":+:";
			echo $value_vout->value;
			
			//用于校验
			$out = $out + $value_vout->value;
			
			//设置地址和金额
			$address = $value_vout->scriptPubKey->addresses[0];
			$amount = $value_vout->value;
			
			//查询是否有地址的记录
			$query = "SELECT *  FROM `addresses` WHERE `address` LIKE '$address'";
			//echo $query;
			$result = $db->query($query);
			if($result === false)
			{
				echo "\r\nERROR:$query\r\n\r\n";
				exit;
			}
			$result = mysqli_fetch_assoc($result);
			if(empty($result))
			{
				//没有记录则插入
				$query = "INSERT INTO `addresses` (`address`, `amount`) VALUES ('$address', '$amount')";
			} else {
				//有记录则相加后插入
				$amount = $amount + $result['amount'];
				$query = "UPDATE  `addresses` SET  `amount` =  '$amount' WHERE  `address` =  '$address'";
			}
			$result = $db->query($query);
			if($result === false)
			{
				echo "\r\nERROR:$query\r\n\r\n";
				exit;
			}
			
			//echo " : ";
			//print_r($value_vout->value);
			echo "\r\n";
		}
		
		//检查输入输出是否相等
		//echo 'check:';
		//print_r(($out-$vin==50));
		//$vin =1;
		if($vin!=$out && $out-$vin!=50 && $out-$vin!=25 && $out-$vin!=12.5)
		{
			echo "\r\n\r\nVin!=Out:\r\n$vin!=$out\r\n\r\n";
			exit;
		}
	
	}
	//echo "\r\n";
	
	//下一个节点
	$now++;
}

//更新当前高度
file_put_contents("now.txt", $now);

//关闭数据库连接
$db->close();  