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
		if(isset($_GET['nid'])==false){
			exit('非法访问');
		}
		$nid=$_GET['nid'];
		$query="delete from news where nid='{$nid}'";
		$res=mysql_query($query);
		if($res==false){
			echo "删除失败<a href='./show_news.php'>返回</a>";
		}else{
			echo "删除成功<a href='./show_news.php'>返回</a>";
		}

		?>
	</div>
	</body>
</html>	