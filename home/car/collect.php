<?php
header('content-type:text/html;charset=utf-8');
include('../../link.php');
if(isset($_GET['pid'])==""){
	exit('访问非法');
	
}

$pid=$_GET['pid'];
$uid=$_GET['uid'];
$ctime=time();
$query="insert into collect (pid,uid,ctime)values('{$pid}','{$uid}','{$ctime}')";
if(mysql_num_rows(mysql_query("select * from collect where uid={$uid}&&pid={$pid}"))!=0){
	$query="update collect set ctime={$ctime} where pid={$pid}&&uid={$uid}";
}else{
	$query="insert into collect (pid,uid,ctime)values('{$pid}','{$uid}','{$ctime}')";
}
mysql_query($query);
header("location:../../detail.php?id={$_GET['pid']}");
?>