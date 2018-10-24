1、放置bitcoin.conf（C:\Users\helen\AppData\Roaming\Bitcoin）
2、启动客户端：bitcoin-qt.exe -server -rest -rpcbind=127.0.0.1  -rpcuser=RPCuser -rpcpassword=RPCpasswd
3、导入数据库：btc.sql
4、运行b.php


导入数据：
1、命令行下连接数据库
`mysql -u root -p`
2、转到对应的数据库
`use btc`
3、导入数据
load data infile "e:/test.txt" into table `btc` fields terminated by ',';


============

load data infile "e:/test.txt" into table `btc` fields terminated by ',';


txindex=1


http://127.0.0.1:8332/rest/block/00000000000004192b57d060bd940b2446bef39bb4fb6b0df8a0a2f4ab27f038.hex

http://127.0.0.1:8332/rest/tx/858e2a48beff21e23c5daa2013198f8a59238f68b7e7b7badf926e586368e26b.json

1PLfL5dPHYdNGQVKAu1Dvfetsy8mrjZkuE

==========================================
由于数据可能会很大，导致查询太长，需要设置[mysqld]中的变量:
[mysqld]
max_allowed_packet = 64M