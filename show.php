<?php
set_time_limit(0);
//start 
//bitcoin-qt.exe -server -rest -rpcbind=127.0.0.1  -rpcuser=RPCuser -rpcpassword=RPCpasswd


//插入数据库
$db = new mysqli('localhost', 'root', 'root', 'btc');
$str = "0123456789ABCDEFG";
$q = isset($_GET['q']) ? $_GET['q'] : '';
echo $q."<br>";
$sum = 0;
for($i=0; $i<16; $i++)
{
	echo $q.$str[$i].':';
	$query = "SELECT count(*) FROM `btc` WHERE `key_hex` between \"".$q.$str[$i]."\" and \"".$q.$str[$i+1]."\"";
	//exit;
	$result = $db->query($query);
	$res = mysqli_fetch_assoc($result);
	//print_r($res);exit;
	echo $res['count(*)'];
	$sum = $sum + $res['count(*)'];
	echo '<a href=show.php?q='.$q.$str[$i].'>IN</a><br/>';
}
echo "sum:".$sum;
$db->close();  //关闭一个数据库连接，这不是必要的，因为脚本执行完毕时会自动关闭连接