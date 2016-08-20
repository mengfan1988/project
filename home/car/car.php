<?php 
include('../../head.php');
include('../../link.php');
$total=0;
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
			//var_dump($ctg);
			//die;
?>

		<div class="logo" id="bannerlogo">
					<img src="<?php echo HOST.'/home/'; ?>img/logo.png">
					<span class="buyc">购物车</span>
		</div>
		<?php if(empty($_SESSION['car'])==false ) { ?>
		
			<div class="main3" >
				<table class="tab" >
					<tr>
						<th>商品</th>
						<th>商品名称</th>
						<th>单价</th>
						<th>数量</th>
						<th>小计</th>
						<th>操作</th>
                   </tr>
<?php
	foreach($car as $v){
			foreach($ctg as $vo){
			if($vo['pid']==$v['id']){
				break;
			}	
	 }
	 $sprice=$vo['prime']*$v['num'];
	 $total+=$sprice;
	 
	 
?>
				   <tr>
						<td><img src="../../admin/goods/img/<?php echo $vo['thumb'];?>"width=180></td>
						<td><?php echo html_entity_decode($vo['descr']);?></td>
						<td><?php echo $vo['prime'];?></td>
						<td><a href="./div.php?id=<?php echo $v['id'];?>">－</a><input id="num" value='<?php echo $v['num'];?>' ><a href="./add_num.php?id=<?php echo $v['id'];?>">＋</a></td>
						<td><?php echo $sprice;?></td>
						<td><a href="./del_car.php?id=<?php echo $vo['pid'];?>"onclick="return change()">删除</a></td>	
                   </tr>
				   
<?php } ?>			
				
				</table>
				<div id="float">
					
					<div>
						<form action="../order/balance.php" method="post">
							<input type="hidden" name="num" value="<?php echo $v['num'];?>">
							<input type="hidden" name="sprice" value="<?php echo $sprice;?>">
							<input type="submit" value="去结算" name="sub">
						</form>
					</div>
					<div>　　  商品金额总计：<?php echo $total; ?>  </div>
					<div id="clearbuy"><a href="./del_all.php"><input type="button" value="清空购物车"></a> </div>
				</div>


<?php } ?>	









<div style="height:200px;"></div>


<?php
include('../../foot.php');
?>
<script>
	var change=function(){
		if(confirm("确定删除吗")){
		return true;
		}else{
		return false;
		}
	}
</script>