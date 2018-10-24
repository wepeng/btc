<?php
/**
*  生成web文件
*
*/
set_time_limit(0);
include './../functions.php';


//获取当前高度
$now = file_get_contents("now.txt")-1;

//拼接内容
$index_template = file_get_contents("menu.html");

$content = '';
$flag = 0;
//生成导航页面
//$sum = "Sum:".$now."<br/>";
$nav = "";
for($i=(int)($now/100); $i>0; $i--)
{
	$nav = "<a href='./$i.html'>$i</a>&nbsp&nbsp&nbsp&nbsp".$nav;
}
$nav = "Sum:".($now+1)."<hr/>"."<a href='./index.html'>0</a>&nbsp&nbsp&nbsp&nbsp".$nav."<hr/>";
//echo $nav;exit;

//先生成首页
$i = $now;
for(; $i>=0; $i--)
{
	if($flag == 100)
	{
		break;
	}
	$content .= "<tr><td><a href='./block/$i.html'>$i</a></td></tr>";
	$flag++;
}
$index_content = str_replace('{content}', $content, $index_template);
$index_template = str_replace('<nav></nav>', $nav, $index_template);

$content = '';
$flag = 0;
//echo $i;
//是否已结束
//$nav = '';
$j = 1;
if($i>=0)
{
	//生成其它页面
	for(; $i>=0; $i--)
	{
		$content .= "<tr><td><a href='./block/$i.html'>$i</a></td></tr>";
		if($flag == 100)
		{
			$index = str_replace('{content}', $content, $index_template);
			//$index = str_replace('<nav></nav>', $nav, $index);
			file_put_contents("./root/$j.html", $index);
			$content = '';
			$flag = 0;
			$j++;
			//$nav .= "<a href='./$i.html'>$i</a>";
		}
		$flag++;
	}
	//echo $content;exit;
	if($flag%100 != 0)
	{
		$index = str_replace('{content}', $content, $index_template);
		file_put_contents("./root/$j.html", $index);
		$j++;
		//$nav .= "<a href='./$i.html'>$i</a>";
	}
}
$index_content = str_replace('<nav></nav>', $nav, $index_content);
file_put_contents("./root/index.html", $index_content);

//echo '11';


//$index = str_replace('{content}', $content, $index);
//把主业信息写入文件
//file_put_contents("./root/index.html", $index);