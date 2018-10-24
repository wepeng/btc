<?php
/**
*  生成web文件
*
*/
set_time_limit(0);
include './../functions.php';


//连接数据库
$db = new mysqli('localhost', 'root', 'root', 'btc');

//获取当前进度
$now = file_get_contents("now.txt");

//获取block值并写入文件
for($i=0; $i<100; $i++)
{
	//获取当前的block值
	$block = get_block($now, 1);
	//print_r($block);exit;
	
	//拼接内容
	$content = file_get_contents("block.html");
	//$content = str_replace('{height}', $now, $content);
	foreach($block as $key=>$value)
	{
		if(!is_array($value))
		{
			$content = str_replace('{'.$key.'}', $value, $content);
		}
	}
	//echo $content;exit;
	
	$txs = '';
	//遍历TX值
	$tx = file_get_contents("tx.html");
	foreach($block->tx as $value)
	{
		$txid = $value->txid;
		$txs .= "<tr><td>$txid</td><td><a href='./../tx/$txid.html'>$txid</a></td></tr>";
		//把TX信息写入文件
		$tx_content = $tx;
		foreach($value as $key=>$tx_value)
		{
			if(!is_array($tx_value))
			{
				$tx_content = str_replace('{'.$key.'}', $tx_value, $tx_content);
			}
		}
		//把TX信息写入文件
		file_put_contents("./root/tx/$txid.html", $tx_content);
	}
	$content = str_replace('{txs}', $txs, $content);
	
	//把block信息写入文件
	file_put_contents("./root/block/$now.html", $content);
	
	//echo $content;
	echo $now."\r\n";
	$now++;
	file_put_contents("now.txt", $now);
}

//更新目录文件


//关闭数据库连接
$db->close();  