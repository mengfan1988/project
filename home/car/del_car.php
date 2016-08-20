<?php
include('../../head.php');
include('../../link.php');
if(isset($_GET['id'])==false){
	exit('访问非法');
}
$id=$_GET['id'];
$sql="select * from ts_goods where pid='{$id}'";
$res=mysql_query($sql);
$data=mysql_fetch_assoc($res);

unset($_SESSION['car'][$id]);



?>

			<div class="logo" id="bannerlogo">
				<img src="<?php echo HOST.'/home/'; ?>img/logo.png">
				<form>
					<input type="text"  class="text1">
					<input type="button" value="搜索" class="search">
				</form>
			</div>
			<div id='seecar'>
				<img src='../../admin/goods/img/<?php echo $data['thumb']; ?>' width=150>
				<span id="deta"> <?php echo "　　删除成功<a href='./car.php?id=$id'>【查看购物车】</a>";  ?>　　价格：<?php echo $data['prime']; ?></span>
			</div>
			<div style="height:200px;"></div>
<?php
include('../../foot.php');

?>
