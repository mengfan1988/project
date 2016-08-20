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
			header("content-type:text/html;charset=utf-8");
			if(isset($_POST["sub"])==false){
				exit('非法访问');
			}
			include("../../link.php");
			include("./core.php");
			$id=$_POST['pid'];

			$pname=$_POST['pname'];
			if(preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$pname)==0){
					exit("请输入商品名<a href='./add_goods.php'>返回</a>");
				}
			$price=$_POST['price'];
			if(preg_match('/^\d{1,}\.\d{2}$/',$price)==0){
					exit("请输入正确价格<a href='./add_goods.php'>返回</a>");
				}
			$prime = $_POST["prime"];
			if(preg_match('/^\d+\.\d{2}$/',$prime)==0){
					exit("请输入正确价格<a href='./add_goods.php'>返回</a>");
				}
			$snum=$_POST['snum'];
			$ctg = $_POST["ctg"];
			if(isset($_POST["color"])){
					$color = implode(",",$_POST["color"]);	
				}else{	
					exit("请选择颜色<a href='./add_goods.php'>返回</a>");
				}
			if(isset($_POST["size"])){
					$size = implode(",",$_POST["size"]);
				}else{
					exit("请选择尺寸<a href='./add_goods.php'>返回</a>");
				}
			$descr = $_POST["descr"];
			if($descr==""){
					exit("请输入商品信息<a href='./add_goods.php'>返回</a>");
				}
			$descr=htmlspecialchars($descr);
			$thumb = implode(",",upload("thumb",array("png","jpg"),'./img/'));
			$imgs = implode(",",upload("imgs",array("png","jpg"),'./img/'));
			$ctime = time();
			$mtime = time();
			$controlname=$_SESSION['admin'];
			$query="update ts_goods set price='$price',prime='$prime',snum='$snum',ctg='$ctg',color='$color',size='$size',descr='$descr',thumb='$thumb',imgs='$imgs',mtime='$mtime',controlname='$controlname' where pid='$id'";
			$res=mysql_query($query);
			//var_dump($res);
			if($res==false){
				exit("修改失败<a href='./edit_goods.php'>返回</a>");
			}else{
				exit("修改成功<a href='./showgoods.php'>返回</a>");
			}
			?>
		</div>
	</body>
</html>