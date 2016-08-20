<?php 
/*
1.链接数据库
2.选择数据库
3.sql语句
4.关闭数据库

mysql_fetch_assoc()关联
mysql_fetch_row()索引
mysql_fetch_array()关联索引
mysql_num_rows()返回结果结记录条数
mysql_affected_rows()取得前一次 MySQL 操作所影响的记录行数
mysql_insert_id 取得上一步 INSERT 操作产生的 ID 
*/
$link=@mysql_connect('localhost','root','') or exit("打开失败");
mysql_select_db('shop',$link) or exit('数据库不存在');
mysql_query("set names utf8");

//$sql="select * from students";
//$res=mysql_query($sql);
//while($data=mysql_fetch_assoc($res)){
//	var_dump($data);
//}
//echo mysql_num_rows($res);
?>

