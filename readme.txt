1������bitcoin.conf��C:\Users\helen\AppData\Roaming\Bitcoin��
2�������ͻ��ˣ�bitcoin-qt.exe -server -rest -rpcbind=127.0.0.1  -rpcuser=RPCuser -rpcpassword=RPCpasswd
3���������ݿ⣺btc.sql
4������b.php


�������ݣ�
1�����������������ݿ�
`mysql -u root -p`
2��ת����Ӧ�����ݿ�
`use btc`
3����������
load data infile "e:/test.txt" into table `btc` fields terminated by ',';


============

load data infile "e:/test.txt" into table `btc` fields terminated by ',';


txindex=1


http://127.0.0.1:8332/rest/block/00000000000004192b57d060bd940b2446bef39bb4fb6b0df8a0a2f4ab27f038.hex

http://127.0.0.1:8332/rest/tx/858e2a48beff21e23c5daa2013198f8a59238f68b7e7b7badf926e586368e26b.json

1PLfL5dPHYdNGQVKAu1Dvfetsy8mrjZkuE

==========================================
�������ݿ��ܻ�ܴ󣬵��²�ѯ̫������Ҫ����[mysqld]�еı���:
[mysqld]
max_allowed_packet = 64M