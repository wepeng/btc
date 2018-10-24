<?php
/**
*  显示当前各地址的比特币数量
*
*/
set_time_limit(0);


//连接数据库
$db = new mysqli('localhost', 'root', 'root', 'btc');

/**
*  对比当前地址是否在地址库中
*
*  $address：传入的地址
*
*  返回值：
*      不存在:0
*	   存在：返回私钥
*/
function contrast($address)
{
	global $db;
	//查询地址
	$query = "SELECT *  FROM `btc` WHERE `btc` LIKE '$address'";
	//echo $query;
	$result = $db->query($query);
	if($result === false)
	{
		echo "\r\nERROR:$query\r\n\r\n";
		exit;
	}
	$res = mysqli_fetch_assoc($result);
	//print_r($res);
	if(empty($res))
	{
		//记录不存在
		return false;
	} else {
		//记录存在，返回key
		return $res['key_hex'];
	}
}
//记录总数
$sum = 0;

//获取当前进度
$now = file_get_contents("now.txt");

	//获取当前指针往后的N条记录
	$query = "SELECT *  FROM `addresses` order by `amount` limit $now,50";
	//echo $query;
	$result = $db->query($query);
	if($result === false)
	{
		echo "\r\nERROR:$query\r\n\r\n";
		exit;
	}
	$i = 0;
	echo '<table border="1"><tr><th></th><th>Address</th><th>amount</th><th>key</th></tr>';
	while($res = mysqli_fetch_assoc($result))
	{
		//print_r($res);
		//对比
		$key = contrast($res['address']);
		//print_r($key);
		if($key !== false )
		{
			echo ' <tr><th>'.$i.'</th><td>'.$res['address'].'</td><td>'.$res['amount']."</td><th>$key</th></tr>";
			$i++;
		}
		$sum++;
	}
	echo '</table>';


//关闭数据库连接
$db->close();  
//更新当前高度
echo "\r\nContrast start:$now\r\n<br/>";
$now = $now + $sum;
file_put_contents("now.txt", $now);
echo "\r\nContrast end:$now\r\n<br/>";


echo "\r\nTotal contrast:$sum\r\n";