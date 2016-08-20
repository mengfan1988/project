<?php
define('HOST','http://127.0.0.1/project');
?>
<html>
	<head>
	    <meta charset="utf-8" />
		<meta http-equiv="refresh" content="2; url=<?php echo HOST; ?>/home.php" >
		<title>淘器时代</title>
		<link rel="stylesheet" type="text/css" href="<?php echo HOST; ?>/home/css/public.css">
	</head>
	<body>
		<div id='warning'>
		<?php 
		header('content-type:text/html;charset=utf-8');
		include("../../link.php");
		session_start();
		if(isset($_POST['sub1'])==false){
			header('./login.php');
		}
		if(isset($_POST['uname'])==true&&isset($_POST['pwd'])==true){
			$uname=$_POST['uname'];
			$pwd=$_POST['pwd'];
		}else{
			$uname='';
			$pwd='';
		}
		
		$pwd=md5($pwd);
		$query="select * from tp_user where uname='{$uname}'  && pwd='{$pwd}'";
		$res=mysql_query($query);
		$row=mysql_fetch_assoc($res);
		if($row!=false){
			$_SESSION['uname']=$uname;
			$_SESSION['uid']=$row['sid'];
			setcookie('uname',$uname,time()+3600);
			$ltime=time();
			mysql_query("update tp_user set ltime='{$ltime}' where uname='{$uname}'");
			echo "<span id='span'>登陆成功,2秒后自动登入</span>";
		}else{
			echo "<span id='error'>用户名或密码不存在</span>";
		}
		?>
		</div>
	</body>
</html>