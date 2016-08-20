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
	if(isset($_GET['comid'])==false){
			exit('您访问的页面丢失到太平洋了');
		}
	$comid=$_GET['comid'];
	$query="delete from comtent where comid='{$comid}'";
	mysql_query($query);
	header('location:./admin_comment.php');
	
	
	
	?>