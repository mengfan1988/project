<?php
include('../../link.php');//链接数据库
header('content-type:text/html;charset=utf-8');
if(isset($_GET)==FALSE){
	header('location:../login/login.php');
}
$oid=$_GET['oid'];
$pid=$_GET['pid'];
$snum=$_GET['snum'];
$query="update orders set status=2 where oid='{$oid}'";
$query2="select * from orders where oid='{$oid}'";
$rew=mysql_query($query);
$rew2=mysql_query($query2);
$row=mysql_fetch_assoc($rew2);
$num=$row['num'];
$query1="update ts_goods set snum={$snum}-{$num} where pid='{$pid}'";//更改商品库存，通过get传pid,snum
$rews=mysql_query($query1);
if($rew==true){
	header("location:./order_admin.php?id={$_GET['id']}");
}
?>