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
		include("../../link.php");
		if(isset($_POST['sub'])==false){   //是否有post传值
			exit('<span>访问非法404</span>');
		}
		$id=$_POST['sid'];
		$uname=$_POST['uname'];
		if(preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$uname)==0){
			exit("<span>请输入合法用户名<a href='../../admin.php'>返回</a></span>");
		}
		$tphone=$_POST['tphone'];
		if(preg_match("/^[1][3|8][0-9]{9}$/",$tphone)==0){
			exit("<span>请输入合法电话<a href='../../admin.php'>返回</a></span>");
		}
		$pwd=$_POST['pwd'];
		$pwd1=$_POST['pwd1'];
		if($pwd=="" || $pwd!=$pwd1){
			exit("<span>密码不能为空或两次密码不符<a href='../../admin.php'>返回</a></span>");
		}
		$pwd=md5($pwd);
		$email=$_POST['email'];
		if(preg_match("/^\w+[@]\w+\.(com)$/",$email)==0){
			exit("<span>请输入合法邮箱<a href='../../admin.php'>返回</a></span>");
		}
		/*if(mysql_num_rows(mysql_query("select * from tp_admin where uname='{$uname}'"))!=0){
			exit("此用户名已经被使用！<a href='./addadmin.php'>返回</a>");
		}*/
		$ltime=time();
		$ctime=time();
		$sql=" update tp_admin set uname='{$uname}',tphone='{$tphone}',pwd='{$pwd}',ltime='{$ltime}',ctime='{$ctime}',email='{$email}' where uid=$id";
		$res=mysql_query($sql);
		if($res==false){
			exit("<span>修改失败<a href='../../admin.php'>返回</a></span>");
		}else{
			exit("<span>修改OK<a href='../../admin.php'>返回</a></span>");
		}
		?>
	</div>
	</body>
</html>