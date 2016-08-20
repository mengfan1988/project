<?php
session_start(); 
header("content-type:text/html;charset=utf-8");
define('PATH','D:/121/project');
define('HOST','http://127.0.0.1/project');
include(PATH.'/link.php');
$res="select * from cfg";//查询配置表
$row=mysql_query($res);
$ctg=array();//赋值数组
while($data=mysql_fetch_assoc($row)){
	$ctg[$data['cfgname_en']]=$data['cfgvalue'];
}
?>
<!doctype html>
<html>
	<head>
	    <meta charset="utf-8" />
		<title><?php echo $ctg['title']; ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo HOST; ?>/admin/css/base.css">
		<link rel="stylesheet" type="text/css" href="<?php echo HOST; ?>/home/css/public.css">
	</head>
    <body>
		
		<img id="imglogo" src="<?php echo HOST; ?>/home/img/logo.png">
	
	<div class="wrap">
			<div class="toolbar">
				
				<ul class="toolbarright">
				<?php if(isset($_SESSION["admin"])==true){?>
					<?php if($_SESSION["admin"]=='孟凡'){ ?>
							<li><a>超级管理员：<?php echo $_SESSION['admin'];?>,您好　</a><li>
							<li><a href="<?php echo HOST;?>/admin/login/loginout.php">退出</a><li>
							<?php }else{ ?>
							<li><a>管理员：<?php echo $_SESSION['admin'];?>,您好　</a><li>
							<li><a href="<?php echo HOST;?>/admin/login/loginout.php">退出</a><li>
							<?php } ?>
				<?php } else { ?>
					<li><a href="./admin/login/login.php">登入</a><li>
				<?php } ?>	
				</ul>
			</div>
			<ul class="bannerleft">
				<li class="bannerfirst">系统设置</li>	
				<a href="<?php echo HOST;?>/admin.php"><li class="bannerfirst1">后台用户</li></a>
				<a href="<?php echo HOST;?>/admin/admin/addadmin.php"><li class="bannerfirst1">添加后台用户</li></a>
				<li class="bannerfirst">商品管理</li>
				<a href="<?php echo HOST;?>/admin/users/user.php"><li class="bannerfirst1">前台用户</li></a>
				<a href="<?php echo HOST;?>/admin/users/adduser.php"><li class="bannerfirst1">添加用户</li></a>
				<a href="<?php echo HOST;?>/admin/goods/goods.php"><li class="bannerfirst1">商品分类</li></a>
				<li class="bannerfirst">订单管理</li>
				<a href="<?php echo HOST;?>/admin/goods/add_goods.php"><li class="bannerfirst1">添加商品</li></a>
				<a href="<?php echo HOST;?>/admin/goods/showgoods.php"><li class="bannerfirst1">查看商品</li></a>
				<a href="<?php echo HOST;?>/admin/order/order_admin.php"><li class="bannerfirst1">订单操作</li></a>
				<a href="<?php echo HOST;?>/admin/comment/admin_comment.php"><li class="bannerfirst1">留言管理</li></a>
				<li class="bannerfirst">网站管理</li>
				<a href="<?php echo HOST;?>/admin/config/admin_config_add.php"><li class="bannerfirst1">配置管理</li></a>
				<a href="<?php echo HOST;?>/admin/config/edit_cfg.php"><li class="bannerfirst1">更改配置</li></a>
				<a href="<?php echo HOST;?>/admin/news/add_news.php"><li class="bannerfirst1">添加新闻</li></a>
				<a href="<?php echo HOST;?>/admin/news/show_news.php"><li class="bannerfirst1">查看新闻</li></a>
			</ul>		