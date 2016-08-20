<?php
define('HOST','http://127.0.0.1/project');
?>
<html>
	<head>
	    <meta charset="utf-8" />
		<meta http-equiv="refresh" content="1; url=<?php echo HOST; ?>/admin.php" >
		<title>淘器时代</title>
		<link rel="stylesheet" type="text/css" href="<?php echo HOST; ?>/admin/css/public.css">
	</head>
	<body>
	<div id='warning'>
	<?php
	header('content-type:text/html;charset=utf-8');
	//var_dump($_POST);
	include("../../link.php");
	session_start();
	if(isset($_POST['sub1'])==false){
		exit('访问非法404');
	}
	$uname=$_POST['uname'];
	$pwd=$_POST['pwd'];
	$pwd=md5($pwd);
	$query="select * from tp_admin where uname='{$uname}'  && pwd='{$pwd}'";
	$row=mysql_fetch_assoc(mysql_query($query));
	if($row!=false){
		$_SESSION['admin']=$uname;
		setcookie('uname',$uname,time()+3600);//设计cookie
		$ltime=time();
		mysql_query("update tp_admin set ltime='{$ltime}' where uname='{$uname}'");
		echo "<span id='span'>登陆成功,1秒后自动登入</span>";
	}else{
		echo "<span id='error'>用户名或密码不存在</span>";
	}
	?>
	</div>
	</body>
</html>