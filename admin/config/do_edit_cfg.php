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
		if(isset($_POST)==false){
			exit('<span>抱歉没有找到相关网页</span>');
		}
		foreach($_POST as $k=>$v){
			$query="update cfg set cfgvalue='{$v}'  where cfgname_en='{$k}'";
			mysql_query($query);
		}
		header("location:./edit_cfg.php");

		 ?>
	 </div>
	</body>
</html>