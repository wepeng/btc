<?php
set_time_limit(0);
//比特币客户端的启动方式
//bitcoin-qt.exe -server -datadir="f:/data" -rest -rpcbind=127.0.0.1  -rpcuser=RPCuser -rpcpassword=RPCpasswd
//bitcoin-qt.exe -datadir="f:/data" 



//连接比特币钱包
require_once('easybitcoin.php');
$bitcoin = new Bitcoin('RPCuser','RPCpasswd');

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