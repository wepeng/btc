<?php
set_time_limit(0);
//比特币客户端的启动方式
//bitcoin-qt.exe -server -datadir="f:/data" -rest -rpcbind=127.0.0.1  -rpcuser=RPCuser -rpcpassword=RPCpasswd
//bitcoin-qt.exe -datadir="f:/data" 


//现在的进度
$now = file_get_contents("now.txt");
if(strlen($now) != 64)
{
	echo "Now error!";
	exit;
}

//连接比特币钱包
require_once('easybitcoin.php');
$bitcoin = new Bitcoin('RPCuser','RPCpasswd');

//连接数据库
$db = new mysqli('localhost', 'root', 'root', 'btc');

function getInAddress($now, $number)
{
	$file = file_get_contents("http://127.0.0.1:8332/rest/tx/".$now.".json");
	if($file !== FALSE)
	{
		$file = json_decode($file);
		//print_r($file);exit;
		if(count($file->vout[$number]->scriptPubKey->addresses)>1)
		{
			echo "value_vout->scriptPubKey->addresses error";
			exit;
		}
		//return $file->vout[$number]->scriptPubKey->addresses[0]."(".$file->vout[$number]->value.")";
		return $file->vout[$number]->scriptPubKey->addresses[0];
	}  //End if
	return 0;
}


for($i=0; $i<=2; $i++)
{
	$file = file_get_contents("http://127.0.0.1:8332/rest/block/".$now.".json");
	if($file !== FALSE)
	{
		$file = json_decode($file);
		$nextblockhash = $file->nextblockhash;
		echo $now."\n";
		//print_r($file);
		//$j = 0;
		foreach($file->tx as $value)
		{
			foreach($value->vin as $value_vin)
			{
				//echo $value_vin[];
				//设置每个地址的比特币为0
				if(isset($value_vin->txid))
				{
					//echo "txid:".$value_vin->txid."\n";
					echo "Set:".getInAddress($value_vin->txid, $value_vin->vout)."=0\n";
					//print_r($value_vin);
					//exit;
				}
			}
			foreach($value->vout as $value_vout)
			{ 
			    //给每个地址加上对应的值
				if(count($value_vout->scriptPubKey->addresses)>1)
				{
					echo "value_vout->scriptPubKey->addresses error";
					exit;
				}
				echo $value_vout->scriptPubKey->addresses[0];
				echo ":+:";
				echo $value_vout->value;
				$addresses  = $value_vout->scriptPubKey->addresses[0];
				$amount = $value_vout->value;
				$query = "REPLACE INTO addresses (`addresses`, `amount`) VALUES($addresses, $amount)";
				//echo " : ";
				//print_r($value_vout->value);
				echo "\n";
			}
			echo "\n\n";
			//$j++;
			//if($j >10)
			//	exit;
		}
		echo "=====================================================\n\n";
		echo "\n\n";
	}
	//下一个block
	$now = $nextblockhash;
	exit;
}
exit;

$file = file_get_contents("http://127.0.0.1:8332/rest/block/00000000000000c75df8711c8ea3f433eff61c100f05dee989f6bcb1aeee4104.json");
print_r(json_decode($file));

	
	$getbestblockhash = $bitcoin->getblockhash(0);
	print_r($getbestblockhash);
	echo '<hr/>';
	exit;
for($i=0; $i<1; $i++)
{
	echo "getbestblockhash:";
	$getbestblockhash = $bitcoin->getblockhash(0);
	print_r($getbestblockhash);
	echo '<hr/>';
	
	echo "getblock:";
	$getblock = $bitcoin->getblock($getbestblockhash);
	print_r($getblock);
	echo '<hr/>';
	
	//xmlToArray($getblock);
	echo "GetTxOut:";
	$gettxout = $bitcoin->gettxout($getblock['tx'][0], 0);
	print_r($gettxout );
	echo '<hr/>';
	
	echo "GetTxOut:";
	$gettxout = $bitcoin->gettxout("858e2a48beff21e23c5daa2013198f8a59238f68b7e7b7badf926e586368e26b", 0);
	print_r($gettxout);
	echo '<hr/>';
	
	echo "858e2a48beff21e23c5daa2013198f8a59238f68b7e7b7badf926e586368e26b";
	echo ":gettransaction:";
	$gettransaction = $bitcoin->gettransaction("858e2a48beff21e23c5daa2013198f8a59238f68b7e7b7badf926e586368e26b");
	print_r($gettransaction);
	echo '<hr/>';
	
	//echo '<br/>';
	//$key_wif = $bitcoin->dumpprivkey($btc);
	//print_r($key_wif);
	echo '<hr/>';

	//$query = "INSERT INTO `btc` (`key_hex`, `key_wif`,`btc`) VALUES ('$key_hex', '$key_wif', '$btc')";
	//$result = $db->query($query);
}
$db->close();  //关闭一个数据库连接，这不是必要的，因为脚本执行完毕时会自动关闭连接