<?php
include('../../link.php');
session_start();
if($_SESSION['admin']==''){
	header("location:../login/login.php");
}
$comid=$_GET['comid'];
$query="update comtent set status=2 where comid={$comid}";
$res=mysql_query($query);
if($res!=false){
	header("location:./admin_comment.php?id={$_GET['id']}");//使每次固定页面
	
}
?>