<?php
include('../../head.php');
include('../../link.php');
if(@$_SESSION['uname']==false){
	header("location:../login/login.php");
	die;//下面不执行，否则即使不登入也会加入购物车
}
?>
			<div class="logo" id="bannerlogo">
				<img src="<?php echo HOST.'/home/'; ?>img/logo.png">
			</div>

		<?php

		if(isset($_GET['id'])==false){
			exit("非法访问");
		}
		$id=$_GET['id'];
		$sql="select * from ts_goods where pid='{$id}'";
		$res=mysql_query($sql);
		$data=mysql_fetch_assoc($res);
		if(isset($_SESSION['car'])==false){
			$_SESSION['car']=array();
			
		}
		$_SESSION['car'][$id]=array('id'=>$id,'num'=>1);

		?>
			<div id='seecar'>
				<img src='../../admin/goods/img/<?php echo $data['thumb']; ?>' width=150>
				<span id="deta"> <?php echo "　　添加成功<a href='./car.php?id=$id'>【查看购物车】</a>";  ?>　　价格：<?php echo $data['prime']; ?></span>
			</div>
			<div style="height:200px;"></div>
		<?php
		include('../../foot.php');

		?>

