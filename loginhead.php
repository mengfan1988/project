<?php
session_start(); 
header("content-type:text/html;charset=utf-8");
define('PATH','D:/121/project');
define('HOST','http://127.0.0.1/project');
include(PATH.'/link.php');
?>
<!doctype html>
<html>
	<head>
	    <meta charset="utf-8" />
		<title>淘器时代</title>
		<link rel="stylesheet" type="text/css" href="<?php echo HOST; ?>/home/css/base.css">
		<link rel="stylesheet" type="text/css" href="<?php echo HOST; ?>/home/css/public.css">
	</head>
    <body>
		
		<img src="<?php echo HOST; ?>/home/img/logo.png">
			