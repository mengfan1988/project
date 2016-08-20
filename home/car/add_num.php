<?php 
session_start();
include('../../link.php');
if(isset($_GET['id'])==""){
	header("location:../../home.php");
	exit;
	}
$id=$_GET['id'];
$sql="select * from ts_goods where pid='{$id}'";
$rew=mysql_query($sql);
$data=mysql_fetch_assoc($rew);

if($_SESSION['car'][$id]['num']<$data['snum']){
	$_SESSION['car'][$id]['num']++;
}
header("location:./car.php");

?>