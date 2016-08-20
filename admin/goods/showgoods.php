<?php
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('asia/shanghai');
include("./core.php");
include('../../loginadminhead.php');

if($_SESSION['admin']==''){
	header("location:../login/login.php");
}
$size=2;
$count=mysql_num_rows(mysql_query("select * from ts_goods"));
$total_page=ceil($count/$size);
if(isset($_GET['id'])==true && preg_match("/^[1-9]\d*$/",$_GET['id'])!=0 && $_GET['id']<=$total_page){
	$pagenum=$_GET['id'];
}else{
	$pagenum=1;
}
$start=($pagenum-1)*$size;
$query="select * from ts_goods limit $start,$size";
$res1=mysql_query($query);

?>
			<div class="bannertop">
				<span>首页 / 订单管理 / 查看商品</span>	
			</div>
			<table border=1 rules=all class="table2">
				<tr>
					<th>品名</th>
					<th>价格</th>
					<th>优惠价</th>
					<th>库存</th>
					<th>颜色</th>
					<th>尺寸</th>
					<th>分类</th>
					<th>缩略图</th>
					<th>展示图</th>
					<th>商品描述</th>
					<th>创建时间</th>
					<th>修改时间</th>
					<th>操作者</th>
					<th>操作</th>
				</tr>
<?php while($rows=mysql_fetch_assoc($res1)){ ?>
				<tr>
					<td><?php echo $rows['pname']; ?></td>
					<td><?php echo $rows['price']; ?></td>
					<td><?php echo $rows['prime']; ?></td>
					<td><?php echo $rows['snum']; ?></td>
					<td><?php 
						$color=explode(",",$rows['color']);
						foreach($color as $v){
							echo "<span style='font-size:32px;color:$v;'>●</span>" ;
						}
					?>
					</td>
					<td><?php 
						$size=explode(",",$rows['size']);
						foreach($size as $v1){
							echo "<span >$v1</span>".'<br>' ;
						}
					?>
					
					</td>
					<td>
					<?php 
					$sql="select * from ts_goods_ctg where fid='{$rows['ctg']}'|| cid='{$rows['ctg']}'";
					$res=mysql_query($sql);
					$date=mysql_fetch_assoc($res);
					echo $date['cname'];
					?>
					</td>
					<td><img  class='img2' src="./img/<?php echo $rows['thumb']; ?>"></td>
					<td>
					<?php 
						$imgs=explode(",",$rows['imgs']);
						foreach($imgs as $v2){
							echo "<img class='img1' src='./img/$v2'>";
						}
					?>
						
					</td>
					<td ><?php echo html_entity_decode($rows['descr']); ?></td><!--将实体字符转成html字符-->
					<td><?php echo date('y-m-d H:i',$rows['ctime']); ?></td>
					<td><?php echo date('y-m-d H:i',$rows['mtime']); ?></td>
					<td><?php echo $rows['controlname']; ?></td>
					<td class="control1">
					<?php if($_SESSION['admin']!='孟凡'){ ?>
						<a href="./edit_goods.php?uid=<?php echo $rows['pid']; ?>">编辑</a>
						<?php }else{ ?>
						<a href="./del_goods.php?uid=<?php echo $rows['pid']; ?>" onclick="return change()">删除 |</a>
						<a href="./edit_goods.php?uid=<?php echo $rows['pid']; ?>">编辑</a>
						<?php } ?>
					</td>
				</tr>
			
<?php } ?>			
			
			
			</table>
			<div class="page">
			<?php if($total_page>1){ ?>
				<ul>
					<li>
						<a href="?id=<?php echo $pagenum-1; ?>">上一页</a>
					</li>
					<li>
						<a href="?id=1">&lt;&lt;</a>
					</li>
					<?php for($i=1;$i<=$total_page;$i++){?>
					<li>
						<a href="?id=<?php echo $i; ?>"><?php echo $i; ?></a>
					</li>
					<?php } ?>
					<li>
						<a href="?id=<?php echo $total_page; ?>">&gt;&gt;</a>
					</li>
					<li>
						<a href="?id=<?php echo $pagenum+1; ?>">下一页</a>
					</li>
				</ul>
			<?php } ?>
			</div>
			
<script>
	var change=function(){
		if(confirm("确定删除")){
			return true;
		}else{
			return false;
		}
	}

</script>