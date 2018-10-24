<?php
/**
*  显示当前各地址的比特币数量
*
*/
set_time_limit(0);


//连接数据库
$db = new mysqli('localhost', 'root', 'root', 'btc');

	//获取当前高度的block JSON
	$query = "SELECT *  FROM `addresses` order by `amount` limit 0,50";
	//echo $query;
	$result = $db->query($query);
	if($result === false)
	{
		echo "\r\nERROR:$query\r\n\r\n";
		exit;
	}
	$i = 0;
	echo '<table border="1"><tr><th></th><th>Address</th><th>amount</th></tr>';
	while($res = mysqli_fetch_assoc($result))
	{
		//print_r($res);
		echo ' <tr><th>'.$i.'</th><td>'.$res['address'].'</td><td>'.$res['amount'].'</td></tr>';
		$i++;
	}
	echo '</table>';


//关闭数据库连接
$db->close();  