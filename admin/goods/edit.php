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
			header("content-type:text/html;charset=utf-8");
			if(isset($_POST["sub"])==false){
				exit('非法访问');
			}
			include("../../link.php");
			$cname = $_POST["cname"];
			$cid = $_POST["cid"];
			$fid = $_POST["ctg"];
			if($cname==''){
				exit("请输入修改后分类名<a href='./goods.php'>返回</a>");
			}
			 $sql="update ts_goods_ctg set 
			cname='{$cname}',fid='{$fid}' where cid='{$cid}'";
			$res=mysql_query($sql);
			if($res!=false){
				exit("修改成功<a href='./goods.php'>返回</a>");
			}else{
				exit("修改失败<a href='./goods.php'>返回</a>");
			}

			?>
		</div>
	</body>
</html>