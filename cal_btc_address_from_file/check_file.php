<?php

set_time_limit(0);
ini_set('memory_limit', '1024M');
//�������ݿ�
//$db = new mysqli('localhost', 'root', 'root', 'btc');

//��ȡ��ǰ����
$now = 450000;

for($i=0; $i<50000; $i++)
{
	if(file_exists("H:/0������/���ر�/��������/450000-497255/$now.txt") === FALSE)
	{
		//��ʾ��ǰ����
		echo "$now\r\n";
	}
	//��һ���ڵ�
	$now++;
}



//�ر����ݿ�����
//$db->close();  