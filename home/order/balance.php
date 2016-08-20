<?php 
include('../../head.php');
include('../../link.php');
if(isset($_SESSION['car'])==false){
	header("location:../../home.php");
}
$car=$_SESSION['car'];
$sql="select * from ts_goods";
$res=mysql_query($sql);
$ctg=array();
while($data=mysql_fetch_assoc($res)){
			$ctg[]=$data;
			}
if(isset($_POST['sub'])==false){
	header("location:../car/car.php");
}
$sprice=$_POST['sprice'];
$num=$_POST['num'];			
		
?>

		<div class="logo" id="bannerlogo">
					<img src="<?php echo HOST.'/home/'; ?>img/logo.png">
					<span class="buyc">结算页</span>
		</div>
		<?php if(empty($_SESSION['car'])==false ) { ?>
		
			<div class="main3" >
				<table class="tab" >
				<span>商品信息：</span>
					<tr>
						<th>商品</th>
						<th>商品名称</th>
						<th>单价</th>
						<th>数量</th>
						<th>小计</th>
                   </tr>
<?php
	foreach($car as $v){
			foreach($ctg as $vo){
			if($vo['pid']==$v['id']){
				break;
			}	
	 }
	 
?>
				   <tr>
						<td><img src="../../admin/goods/img/<?php echo $vo['thumb'];?>"width=160></td>
						<td><?php echo html_entity_decode($vo['descr']);?></td>
						<td><?php echo $vo['prime'];?></td>
						<td><?php echo $num;?></td>
						<td><?php echo $sprice;?></td>
                   </tr>
				   
<?php } ?>			
				
				</table>
				<div id='information'>收货人信息:</div>
				<div style="clear:both;"></div>
				<form action='./pay.php' method='post' id='pay'>
						   <input type="hidden" name="num" value="<?php echo $num;?>">
						   <input type="hidden" name="sprice" value="<?php echo $sprice;?>">
					电话：<input type='text' name='tphone'><br>
					地址：<input type='text' name='addr'><br>
					<input type="submit" value="提交订单" id="buttonord" name="sub">
				</form>
<?php } ?>	
<div style="height:200px;"></div>
<?php
include('../../foot.php');
?>
