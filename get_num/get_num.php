<?php



$now = file_get_contents("now.txt");
$log = file_get_contents("log.txt");

$now = explode("\r\n", $now);
$log = explode("\r\n", $log);

//print_r($now);

function add()
{
	global $now;
	$max = 64560;
	$now[14]++;
	for($i=14; $i>=0; $i--)
	{
		if($now[$i]>$max)
		{
			$now[$i] = 0;
			$now[$i-1]++;
		}
	}
}

function toFile($now)
{
	//global $now;
	global $log;
	
	$str = "";
	foreach($now as $value)
	{
		$str = $str.$log[$value];
	}
	foreach($log as $value)
	{
		file_put_contents($str, $str.$value."\r\n", FILE_APPEND);
	}
}

for($i=0; $i<2; $i++)
{
	toFile($now);
	add();
	//print_r($now);
	echo $i."\r\n";
}
//print_r($now);

for($i=0; $i<=14; $i++)
{
	if($i==0)
	{
		file_put_contents("now.txt", $now[$i]."\r\n");
	} else if($i==14)
	{
		file_put_contents("now.txt", $now[$i], FILE_APPEND);
	} else {
		file_put_contents("now.txt", $now[$i]."\r\n", FILE_APPEND);
	}
}
echo "\r\n====\r\n";

$now = file_get_contents("now.txt");
print_r($now);


?>