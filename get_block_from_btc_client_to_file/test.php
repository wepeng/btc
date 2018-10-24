<?php



    $block_json = file_get_contents("d:/300000-328890/328890.txt");
	if($block_json == FALSE)
	{
		echo "Error read file d:/$now.txt";
		exit;
	}
	//print_r($block_json);
	$block = json_decode($block_json);
	if($block == NULL)
	{
		echo 'Too deeper!';
	}
	print_r($block);