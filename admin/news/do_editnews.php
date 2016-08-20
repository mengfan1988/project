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
		session_start();
		include("../../link.php");
		if(isset($_POST['sub'])==false){
			exit('访问非法404');
		}
		$nid=$_POST['nid'];
		$titlename=$_POST['title'];
		$titlename=trim($titlename);//删除两端空格
		$titlename=str_replace(' ','',$titlename);//替换空格
		if(preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$titlename)==0){
			exit("请输入合法标题<a href='edit_news.php'>返回</a>");
		}
		$content=$_POST['content'];
		$find=array('病','傻','妈的');
		$content=str_replace($find,"*",$content);
		if($content==''){
			exit("内容不能为空<a href='edit_news.php'>返回</a>");
		}
		$ctgname=$_POST['ctgname'];
		if(preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$ctgname)==0){
			exit("请输入中文姓名<a href='edit_news.php'>返回</a>");
		}
		$auname=$_POST['auname'];
		if(preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$auname)==0){
			exit("请输入中文姓名<a href='edit_news.php'>返回</a>");
		}
		$ctime=time();
		$controlname=$_SESSION['admin'];
		$sql=" update news set title='{$titlename}',content='{$content}',author='{$auname}',ctime='{$ctime}',controlname='{$controlname}' ,ctgname='{$ctgname}' where nid='{$nid}'";
		$res=mysql_query($sql);
		if($res==false){
			exit("修改失败<a href='./edit_news.php'>返回</a>");
		}else{
			exit("修改OK<a href='./edit_news.php'>返回</a>");
		}
		?>
	</div>
	</body>
</html>