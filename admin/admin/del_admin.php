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
		include('../../link.php');
		if(isset($_GET['uid'])==false){
			exit('<span>非法访问</span>');
		}
		$id=$_GET['uid'];
		$query="delete from tp_admin where uid='{$id}'";
		$res=mysql_query($query);
		if($res==false){
			echo "<span>删除失败<a href='../../admin.php'>返回</a></span>";
		}else{
			echo "<span>删除成功<a href='../../admin.php'>返回</a></span>";
		}

		?>
	</div>
	</body>
</html>