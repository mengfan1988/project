<?php 
include('../../link.php');//链接数据库
header('content-type:text/html;charset=utf-8');//字符编码
if(isset($_POST['sub'])==FALSE){
	exit('访问非法');
}
//获取数据
$cfgname_zh=$_POST['cfgname_zh'];
$cfgname_en=$_POST['cfgname_en'];
$cfgtype=$_POST['cfgtype'];
$cfgvalue=$_POST['cfgvalue'];
$query="insert into cfg (cfgname_zh,cfgname_en,cfgtype,cfgvalue)values('{$cfgname_zh}','{$cfgname_en}','{$cfgtype}','{$cfgvalue}')";
mysql_query($query);
header("location:./admin_config_add.php");
?>