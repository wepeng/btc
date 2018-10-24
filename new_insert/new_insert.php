<?php
/**
*  导入新生成的地址
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
	//对比获取命中的地址
	$query = "SELECT `btc` FROM (SELECT `btc` as `btc` FROM `temp_btc` union all SELECT `address` as `btc`  FROM `addresses` ) as alltable group by `btc` having count(*) > 1";
	//echo $query;
	$result = $db->query($query);
	if($result === false)
	{
		echo "\r\nERROR:$query\r\n\r\n";
		exit;
	}
	//形成数组
	$temp = array();
	while($res = mysqli_fetch_assoc($result))
	{
		$temp[] = $res;
	}
	//print_r($temp);
	file_put_contents("temp.txt", serialize($temp));
	
	//显示地址和私钥
	$i = 0;
	echo '<table border="1"><tr><th></th><th>Address</th><th>key_hex</th></tr>';
	foreach($temp as $value)
	{
		//print_r($value);
		echo ' <tr><th>'.$i.'</th><td>'.$value['btc'].'</td><td>'.contrast($value['btc']).'</td></tr>';
		$i++;
	}
	echo '</table>';
	
	//将临时表合并至正式表
	$query = "INSERT INTO `btc` SELECT * FROM `temp_btc`";
	//echo $query;
	$result = $db->query($query);
	if($result === false)
	{
		echo(mysqli_error($db)); 
		echo "\r\nERROR:$query\r\n\r\n";
		exit; 
	}
	
	//清空临时表
	$query = "TRUNCATE TABLE `temp_btc`";
	//echo $query;
	$result = $db->query($query);
	if($result === false)
	{
		echo(mysqli_error($db)); 
		echo "\r\nERROR:$query\r\n\r\n";
		exit; 
	}
	
	echo "\r\nMerge OK!\r\n";

//关闭数据库连接
$db->close();  