<?php
define('HOST','http://127.0.0.1/project');
?>
<html>
	<head>
	    <meta charset="utf-8" />
		<title>淘器时代</title>
		<link rel="stylesheet" type="text/css" href="<?php echo HOST; ?>/home/css/public.css">
	</head>
	<body>
		<div id='warning'>
			<?php
			include('../../link.php');
			header('content-type:text/html;charset=utf-8');
			date_default_timezone_set('asia/shanghai');
			session_start();
			if(isset($_POST['sub'])==false){
				exit('<span id="error1">访问非法</span>');
			}
			$tphone=$_POST['tphone'];
			if(preg_match('/^[1][3|8]\d{9}$/',$tphone)==0){
				exit("请输入合法手机号<a href='balance.php'>返回</a>");
			}
			$addr=$_POST['addr'];
			if(preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$addr)==0){
				exit ("请输入合法地址<a href='balance.php'>返回</a>");
			}
			$goods=json_encode($_SESSION['car']);
			$ctime=time();
			$onum=date('YmdHis').rand(1000,9999);
			$uid= $_SESSION['uid'];
			$num=$_POST['num'];
			$sprice=$_POST['sprice'];
			$query="insert into orders (tphone,addr,goods,ctime,onum,uid,status,num,sprice)values('{$tphone}','{$addr}','{$goods}','{$ctime}','{$onum}','{$uid}','1','{$num}','{$sprice}')";
			$res=mysql_query($query);
			if($res==true){
			$_SESSION['car']=array();
				echo "<span id='span'>购物已完成！ <a href='./order.php'>查看订单</a></span>";
			}else{
				echo "提交失败，请重新购物<a href='../../home.php'>返回购物</a>";
			}
			?>
		</div>
	</body>
</html>