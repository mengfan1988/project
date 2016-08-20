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
			if(isset($_GET["cid"])==false){
				exit('非法访问');
			}
			include("../../link.php");
			$cid = $_GET["cid"];
			if(mysql_num_rows(mysql_query("select * from  ts_goods_ctg where fid='{$cid}'"))!=0){
				exit("请先删除子分类<a href='./goods.php'>返回</a>");
			}
			$sql = "delete from ts_goods_ctg where cid='{$cid}'";
			mysql_query($sql);
			echo "删除成功<a href='./goods.php'>返回</a>";
			?>
		</div>
	</body>
</html>