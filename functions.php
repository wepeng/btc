<?php

/*
* 输入hash或高度，获取block（已解析的对象）
*
*
* $flag: 0(hash),1(高度)
*/
function get_block($n, $flag = 0)
{
	Global $db;
	if($flag == 0)
	{
		//临时换表名
		$query = "SELECT *  FROM `block_1` where `hash` like '$n'";
	} else {
		$query = "SELECT *  FROM `block_1` where `height` = '$n'";
	}
	//print_r($query);
	$result = $db->query($query);
	if($result === false)
	{
		echo("ERROR: " . mysqli_error($db)); 
		echo "\r\nERROR:$query\r\n\r\n";
		exit;
	}
	$res = mysqli_fetch_assoc($result);
	//print_r($res);
	//没有数据
	if(empty($res))
	{
		return FALSE;
	} 
	//$content = stripslashes($res['json_content']);
	return json_decode($res['json_content']);
}