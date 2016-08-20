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
			
			$fid=$_POST["ctg"];
			$cname=$_POST["cname"];
			if($cname=='' || preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$cname)==0){
				exit("请输入中文分类名<a href='./add.php'>返回</a>");
			}
			$sql = "insert into ts_goods_ctg(cname,fid) values('{$cname}','{$fid}')";
			
		 mysql_query($sql);
		 echo "添加成功<a href='./goods.php'>返回</a>";
		?>
	</div>
	</body>
</html>