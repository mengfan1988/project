<?php 
include('../../head.php');
include('../../link.php');
if(isset($_SESSION['uid'])==false){ //未登入界面时返回首页
	header("location:../../home.php");
}
$uid=$_SESSION['uid'];//通过session赋值
$res1=mysql_query("select * from collect where uid={$uid}");//查询符合uid编号的集
$num=mysql_num_rows($res1);//计算符合条件个数
?>

		<div class="logo" id="bannerlogo">
					<img src="<?php echo HOST.'/home/'; ?>img/logo.png">
					<span class="buyc">收藏夹</span>
		</div>
		
		<?php if($num!=0){  //不等于0显示表格 ?>
			<div class="main3" >
				<table class="tab" >
					<tr>
						<th>商品</th>
						<th>商品名称</th>
						<th>单价</th>
						<th>操作</th>
						
                   </tr>
<?php

while($date1=mysql_fetch_assoc($res1)){
		$pid=$date1['pid'];
		$cur = mysql_fetch_assoc(mysql_query("select * from ts_goods where pid='{$pid}'"));
?>
				   <tr>
						<td><img src="../../admin/goods/img/<?php echo $cur['thumb'];?>"width=60></td>
						<td><?php echo html_entity_decode($cur['descr']);?></td>
						<td><?php echo $cur['prime'];?></td>
						<td><a href="./del_collect.php?id=<?php echo $cur['pid'];?>"onclick="return change()">删除</a></td>
                   </tr>
				   
<?php } ?>			
				
				</table>
		<?php }?>

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