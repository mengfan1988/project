<?php
header("content-type:text/html;charset=utf-8");
include('../../loginadminhead.php');
include("../../link.php");
include("./core.php");
	$sql = "select * from ts_goods_ctg";
	$res = mysql_query($sql);
	$ctgs = array();
	while($row=mysql_fetch_assoc($res)){
		$ctgs[]=$row;
	}
	$ctgs=infinite_ctg($ctgs,array("0","fid","cid"));//遍历表中所有值，二维数组
if($_SESSION['admin']==false){
	header("location:../../admin/login/login.php");
}
?>
			<div class="bannertop1">
				<span>首页 / 商品管理 / 商品分类</span>	
			</div>
			<div class='classify'>
				<div class="classifytitle">
					<h1>添加分类</h1>
				</div>
				<div>
					<form action="./do_add.php" method="post">
						<div class='classify2'>上级分类:
						<?php			
							echo infinite_select($ctgs,"ctg","cid","cname");
						?>
						</div>
						<div class='classify2'>分类名称：<input type="text" name="cname"  ></div>
						<div class='classify2'><input type="submit" value="添加分类" class="subm" name="sub"></div>
					
					</form>
				</div>
			</div>
	</div>
	<body>
</html>