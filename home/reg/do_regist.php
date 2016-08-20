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
			<div id='warning1'>
				<?php
				session_start();
				include("../../link.php");
				if(isset($_POST['sub'])==false){
					exit('<span id="error1"></span>');
				}	
				$uname=$_POST['uname'];
				if(preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$uname)==0){
					exit ("<span id='error'>请输入合法用户名<a href='regist.php'>返回</a></span>");
				}
				$nkname=$_POST['nkname'];
				if(preg_match('/^[a-zA-Z]\w{5,17}$/',$nkname)==0){
					exit ("请输入合法昵称<a href='regist.php'>返回</a>");
				}
				$pwd=$_POST['pwd'];
				$pwd1=$_POST['pwd1'];
				if($pwd=='' || $pwd1=='' || $pwd!=$pwd1){
					exit ("密码为空，或两次密码不正确<a href='regist.php'>返回</a>");
				}
				$pwd=md5($pwd);
				$yanzheng=$_POST['yanzheng'];
				if(isset($_POST['yanzheng'])==false || $_POST['yanzheng']=='' || $yanzheng!=$_SESSION['code']){
					exit("验证码不符<a href='regist.php'>返回</a>");
				}

				$ltime=time();
				$ctime=time();
				if(mysql_num_rows(mysql_query("select * from tp_user where uname='{$uname}'"))!=0){
					exit("此用户名已经被使用！<a href='./regist.php'>返回</a>");
				}
				$controlname="客户";
				$query="insert into tp_user(uname,pwd,ltime,ctime,nkname,controlname) values ('{$uname}','{$pwd}','{$ltime}','{$ctime}','{$nkname}','{$controlname}')";
				$res=mysql_query($query);
				if($res!=false){
					echo "注册成功！<a href='../../home.php'>返回</a>";
				}else{
					echo "注册失败！<a href='./regist.php'>返回</a>";
				}
				?>
			</div>
	</body>
</html>