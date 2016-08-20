<?php
$key=$_GET['key'];
include('./link.php');
$res="select * from cfg where cfgname_en='{$key}'";//查询配置表
$row=mysql_query($res);
$ctg=array();//赋值数组
while($data=mysql_fetch_assoc($row)){
	$ctg[$data['cfgname_en']]=$data['cfgvalue'];
}
echo $ctg[$key];
?>
