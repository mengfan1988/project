<?php
session_start(); 
header("content-type:text/html;charset=utf-8");
define('PATH','D:/121/project');
define('HOST','http://127.0.0.1/project');
include(PATH.'/link.php');
if(empty($_SESSION['car'])==true){
	$_SESSION['car']=array();//初始化购物车
}
if(isset($_SESSION['uid'])==true){//解决未登入界面报错问题
	$uid=$_SESSION['uid'];
	}else{
		$uid='';
	}
$query="select * from orders where uid='{$uid}'";//查询用户订单信息
$num=mysql_num_rows(mysql_query($query));//计算客户订单数
$res="select * from cfg";//查询配置表
$row=mysql_query($res);
$ctg=array();//赋值数组
while($data=mysql_fetch_assoc($row)){
	$ctg[$data['cfgname_en']]=$data['cfgvalue'];
}
$numcollect=mysql_num_rows(mysql_query("select * from collect where uid='{$uid}'"));//算出各登入用户收藏数量
?>
<!doctype html>
<html>
	<head>
	    <meta charset="utf-8" />
		<title><?php echo $ctg['title']; ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo HOST; ?>/home/css/base.css">
		<link rel="stylesheet" type="text/css" href="<?php echo HOST; ?>/home/css/public.css">
		
	</head>
    <body>
		
		<div class="wrap">
			<div class="toolbar">
				<ul class="toolbarleft">
					<li><a href="<?php echo HOST.'/home.php'?>">首页</a><li>
					<li><a href="<?php echo HOST ?>/home/car/car.php">购物车（<?php echo count($_SESSION['car'])?>）</a><li>
					<li><a href="<?php echo HOST ?>/home/car/showcollect.php">我的收藏（<?php echo $numcollect;?>）</a><li>
					<li><a href="<?php echo HOST ?>/home/order/order.php">我的订单（<?php echo $num;?>）</a><li>
				</ul>
				<ul class="toolbarright">
				<?php if(isset($_SESSION["uname"])==true){?>
					<li><a>欢迎光临！<?php echo $_SESSION['uname'];?></a><li>
					<?php ?>
					<li><a href="<?php echo HOST ?>/home/login/loginout.php">退出</a><li>
				<?php } else { ?>
					<li><a href="<?php echo HOST ?>/home/login/login.php">登入</a><li>
					<li><a href="<?php echo HOST ?>/home/reg/regist.php">免费注册</a><li>
				<?php } ?>	
				</ul>
			</div>
			