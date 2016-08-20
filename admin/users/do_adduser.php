<?php
define('HOST','http://127.0.0.1/project');
?>
<html>
	<head>
	    <meta charset="utf-8" />
		<title>淘器时代</title>
		<link rel="stylesheet" type="text/css" href="<?php echo HOST; ?>/admin/css/public.css">
	</head>
	<body>
	<div id='warning'>				
		<?php 
		session_start();
		include("../../link.php");
		if(isset($_POST['sub'])==false){
			exit('访问非法404');
		}
		$uname=$_POST['uname'];
		if(preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$uname)==0){
			exit("请输入合法用户名<a href='adduser.php'>返回</a>");
		}
		$nkname=$_POST['nkname'];
		if(preg_match("/^[a-zA-Z]\w{5,17}$/",$nkname)==0){
			exit("请输入合法昵称<a href='adduser.php'>返回</a>");
		}
		$pwd=$_POST['pwd'];
		$pwd1=$_POST['pwd1'];
		if($pwd=="" || $pwd!=$pwd1){
			exit("密码不能为空或两次密码不符<a href='adduser.php'>返回</a>");
		}
		$pwd=md5($pwd);
		$ltime=time();
		$ctime=time();
		if(mysql_num_rows(mysql_query("select * from tp_user where uname='{$uname}'"))!=0){
			exit("此用户名已经被使用！<a href='./adduser.php'>返回</a>");
		}
		$controlname=$_SESSION['admin'];
		$sql="insert into tp_user(uname,pwd,ltime,ctime,nkname,controlname)values('{$uname}','{$pwd}','{$ltime}','{$ctime}','{$nkname}','{$controlname}')";
		$res=mysql_query($sql);
		if($res==false){
			exit("添加失败<a href='./adduser.php'>返回</a>");
		}else{
			exit("添加OK<a href='./user.php'>返回</a>");
		}
		?>
	</div>
	</body>
</html>