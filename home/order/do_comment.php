<?php
include('../../link.php');
session_start();
date_default_timezone_set('asia/shanghai');
header('content-type:text/html;charset=utf-8');
if(isset($_POST['sub'])==false){
	exit('访问非法');
	}
$onum=$_POST['onum'];
$pid=$_POST['pid'];
$uid=$_SESSION['uid'];
$content=htmlspecialchars($_POST['content']);
$find=array('傻','病','有病','妈','b','B');
$content=str_replace($find,"*",$content);//屏蔽脏话
if($content==''){
	exit("不能为空");
}
$ctime=time();
if(mysql_num_rows(mysql_query("select * from comtent where onum={$onum} && pid={$pid}"))!=0){
	exit("亲，不能重复评论哦！");
}
$query="insert into comtent (content,pid,ctime,uid,onum)values('{$content}','{$pid}','{$ctime}','{$uid}','{$onum}')";
$res=mysql_query($query);
if($res!=false){
	header("location:./order.php?id={$_GET['id']}");
}

?>