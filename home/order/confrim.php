<?php
include('../../link.php');
date_default_timezone_set('asia/shanghai');
header('content-type:text/html;charset=utf-8');
if(isset($_GET)==FALSE){
	exit('访问非法');
}
$oid=$_GET['oid'];
$query="update orders set status=3 where oid='{$oid}'";
echo $query;
$rew=mysql_query($query);
if($rew==true){
	header("location:./order.php?id={$_GET['id']}");
}
?>