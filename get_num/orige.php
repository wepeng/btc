<?php
/* 生成序列 */
$sum = 0;

function get_num($str, $a, $dep)
{
	$dep++;
	if($dep>=5)
	{
/*
		global $sum;
		$sum++;
		
		if($sum>500)
		{
			echo "$str\n";
			echo $sum-1;
			exit;
		}
		//echo $str."\n";
		*/
		file_put_contents("log.txt", $str."\r\n", FILE_APPEND);
		return;
	} else if($a[0]>=2){
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	} else if($a[1]>=2){
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	} else if($a[2]>=2){
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	} else if($a[3]>=2){
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	} else if($a[4]>=2){
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	} else if($a[5]>=2){
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	} else if($a[6]>=2){
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	} else if($a[7]>=2){
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	} else if($a[8]>=2){
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	} else if($a[9]>=2){
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	} else if($a[10]>=2){
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	} else if($a[11]>=2){
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	} else if($a[12]>=2){
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	} else if($a[13]>=2){
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	} else if($a[14]>=2){
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	} else if($a[15]>=2){
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
	} else {
		$a[0]++;
		get_num($str."0", $a, $dep);
		$a[0]--;
		
		$a[1]++;
		get_num($str."1", $a, $dep);
		$a[1]--;
		
		$a[2]++;
		get_num($str."2", $a, $dep);
		$a[2]--;
		
		$a[3]++;
		get_num($str."3", $a, $dep);
		$a[3]--;
		
		$a[4]++;
		get_num($str."4", $a, $dep);
		$a[4]--;
		
		$a[5]++;
		get_num($str."5", $a, $dep);
		$a[5]--;
		
		$a[6]++;
		get_num($str."6", $a, $dep);
		$a[6]--;
		
		$a[7]++;
		get_num($str."7", $a, $dep);
		$a[7]--;
		
		$a[8]++;
		get_num($str."8", $a, $dep);
		$a[8]--;
		
		$a[9]++;
		get_num($str."9", $a, $dep);
		$a[9]--;
		
		$a[10]++;
		get_num($str."A", $a, $dep);
		$a[10]--;
		
		$a[11]++;
		get_num($str."B", $a, $dep);
		$a[11]--;
		
		$a[12]++;
		get_num($str."C", $a, $dep);
		$a[12]--;
		
		$a[13]++;
		get_num($str."D", $a, $dep);
		$a[13]--;
		
		$a[14]++;
		get_num($str."E", $a, $dep);
		$a[14]--;
		
		$a[15]++;
		get_num($str."F", $a, $dep);
		$a[15]--;
	}
}

$a = Array();
for($i=0; $i<=15; $i++)
{
	$a[$i] = 0;
}

get_num("", $a, 0);




?>