<?php
/**
*  
*
*/
set_time_limit(0);
ini_set('memory_limit', '1024M');



//连接数据库
$db = new mysqli('localhost', 'root', 'root', 'btc');



//记录总数
$sum = 0;

//获取当前所有需要查询的地址
$addresses = file_get_contents("a.txt");
//转化为数组
$addresses = explode("\r\n", $addresses);



$flag = 0; //每100个地址查询一次
$query_str = '';
$temp_array = array();
foreach($addresses as $value)
{
	//echo "query_str:".$query_str."\n";
	$sum++;
	//echo "\n";
	$temp_array[] = $value = explode(',',$value);
	//print_r($value);exit;
	//$temp_array[$value[1]] = $value[0];
	//print_r($temp_array);exit;
	//echo $flag;exit;
	if($flag==0)
	{
		$flag++;
		$query_str = "'".$value[1]."'";
		//echo $query_str."\n";//exit;
	} else if($flag<1000) {
		$flag++;//exit;
		//echo "\n";
		$query_str .= ",'".$value[1]."'";
		//echo $query_str."\n";exit;
		//echo "$flag:$query_str\n";exit;
	} else {
		$query_str = $query_str.",'".$value[1]."'";
		//运行开始时间
		$starttime = explode(' ',microtime());
		
		$query = "SELECT * FROM  `address` WHERE  `address` IN ($query_str)";
		$result = $db->query($query);
		if($result === false)
		{
			echo "\r\nERROR:$query\r\n\r\n";
			exit;
		}
		//程序运行时间
		 $endtime = explode(' ',microtime());
		 $thistime = $endtime[0]+$endtime[1]-($starttime[0]+$starttime[1]);
		 $thistime = round($thistime,3);
		 echo "All time:".$thistime."s";
 
 
		//如果找到则输出
		while($res = mysqli_fetch_assoc($result))
		{
			foreach($temp_array as $value_temp_array)
			{
				if($value_temp_array[1]==$res['address'])
				{
					echo $value_temp_array[0].",".$value_temp_array[1]."\n";
				}
			}
		}
		$flag = 0; 
		$temp_array = array();
		$query_str = '';
		//计算的总数
		echo "Sum now:$sum\n";
	}
}
//不满足100个数字的情况
if($flag != 0)
{
	$query = "SELECT * FROM  `address` WHERE  `address` IN ($query_str)";
	$result = $db->query($query);
	if($result === false)
	{
		echo "\r\nERROR:$query\r\n\r\n";
		exit;
	}
	//如果找到则输出
	while($res = mysqli_fetch_assoc($result))
	{
		foreach($temp_array as $value_temp_array)
		{
			if($value_temp_array[1]==$res['address'])
			{
				echo $value_temp_array[0].",".$value_temp_array[1]."\n";
			}
		}
	}
}

//计算的总数
echo "Sum:$sum\n";

//关闭数据库连接
$db->close();  


