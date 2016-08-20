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
			exit('<span>非法访问</span>');
		}
		include("../../link.php");
		include("./core.php");
		$pname=$_POST['pname'];
		if(preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$pname)==0){
				exit("<span>请输入商品名<a href='./add_goods.php'>返回</a></span>");
			}
		$price=$_POST['price'];
		if((preg_match('/^\d{1,}$/',$price)==0)|| $price==0){
				exit("<span>请输入正确价格<a href='./add_goods.php'>返回</a></span>");
			}
		$prime = $_POST["prime"];
		if(preg_match('/^\d+$/',$prime)==0){
				exit("<span>请输入正确价格<a href='./add_goods.php'>返回</a></span>");
			}
		$snum=$_POST['snum'];
		$ctg = $_POST["ctg"];
		if(isset($_POST["color"])){
				$color = implode(",",$_POST["color"]);	
			}else{	
				exit("<span>请选择颜色<a href='./add_goods.php'>返回</a></span>");
			}
		if(isset($_POST["size"])){
				$size = implode(",",$_POST["size"]);
			}else{
				exit("<span>请选择尺寸<a href='./add_goods.php'>返回</a></span>");
			}
		 $descr = $_POST["descr"];

		if($descr==""){
				exit("<span>请输入商品信息<a href='./add_goods.php'>返回</a></span>");
			}
		$descr=htmlspecialchars($descr);//将html字符转为实体字符
		$thumb = implode(",",upload("thumb",array("png","jpg"),'./img/'));//将数组以字符串写入数据库
		$imgs = implode(",",upload("imgs",array("png","jpg"),'./img/'));
		$ctime = time();
		$mtime = time();
		$controlname=$_SESSION['admin'];
		$query="insert into ts_goods(pname,price,prime,snum,ctg,color,size,descr,thumb,imgs,ctime,mtime,controlname) values('{$pname}','{$price}','{$prime}','{$snum}','{$ctg}','{$color}','{$size}','{$descr}','{$thumb}','{$imgs}','{$ctime}','{$mtime}','{$controlname}')";
		$res=mysql_query($query);
		//var_dump($res);
		if($res==false){
			exit("<span>添加失败<a href='./add_goods.php'>返回</a></span>");
		}else{
			exit("<span>添加成功<a href='./showgoods.php'>返回</a></span>");
		}
		?>
	</div>
	</body>
</html>