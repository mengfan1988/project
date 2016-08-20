<?php
header("content-type:text/html;charset=utf-8");
include('../../loginadminhead.php');
include('../../link.php');
if($_SESSION['admin']==''){
	header("location:../login/login.php");
}
date_default_timezone_set('asia/shanghai');
if(isset($_GET['status'])==true&&$_GET['status']!=''){
	$stat=$_GET['status'];
	if($stat==3){
	$where="where status={$stat}";	
	}else{
	$where="where status=1 || status=2";	
	}
	}else{
		$stat="";
		$where="where 1";
	}

$size=3;
$count=mysql_num_rows(mysql_query("select * from orders {$where}"));
$total_page=ceil($count/$size);
if(isset($_GET['id'])==true && preg_match("/^[1-9]\d*$/",$_GET['id'])!=0 && $_GET['id']<=$total_page){
	$pagenum=$_GET['id'];
}else{
	$pagenum=1;
}
$start=($pagenum-1)*$size;
$sql="select * from orders {$where} limit $start,$size";
//echo $where;
$res=mysql_query($sql);
$ctg=array();
while($data=mysql_fetch_assoc($res)){
			$ctg[]=$data;
			}
$statusnum=mysql_num_rows(mysql_query("select * from orders where status=3"));
$statusnum1=mysql_num_rows(mysql_query("select * from orders where status<>3"));
?>

			<div class="bannertop1">
				<span>首页 / 订单管理 / 订单操作</span>
				<span class="orderlist">订单已完成（<?php echo "<a href='./order_admin.php?status=3&id={$pagenum}'>$statusnum</a>"; ?>）</span>
				<span class="orderlist">订单未完成（<?php  echo "<a href='./order_admin.php?status=1&status=2&id={$pagenum}'>$statusnum1</a>"; ?>）</span>
		<?php 
				foreach ($ctg as $v){
				$status=array(1=>'待发货',2=>'已发货',3=>'已收货');
				$status=$status[$v['status']];
				$goods=json_decode($v['goods'],true);
				?>
			
					<div id='orderdiv'>
					<span>订单号：<?php echo $v['onum'];?></span>
					<span>订单生产时间：<?php echo date('Y-m-d H:i',$v['ctime']); ?></span>
					<span>订单状态：<?php echo $status; ?></span>
					<span>顾客姓名：<?php  
						$row=mysql_query("select * from tp_user where sid='{$v['uid']}'");
						while($data=mysql_fetch_assoc($row)){
							echo $data['uname'];
						}
						?></span>
					</div>
			<table border=1 rules=all id='ordertable'>
				<tr>
					<td>图片信息</td>
					<td>品名</td>
					<td>订单操作</td>
				</tr>
				<?php 
				foreach($goods as $v1){
				$pid = $v1["id"];
				$pcur = mysql_fetch_assoc(mysql_query("select * from ts_goods where pid='{$pid}'"));
				$snum=$pcur['snum'];
				?>
				
				<tr>
					<td><img src="../../admin/goods/img/<?php echo $pcur['thumb']; ?>" width="60" alt="<?php echo $pcur['pname'];?>" title="<?php echo $pcur['pname'];?>"></td>
					<td ><?php echo $pcur['pname']; ?></td>
					<td>操作：<?php if($v['status']==1){echo "<a href='./confrim_admin.php?oid={$v['oid']}&pid={$pid}&snum={$snum}&id={$pagenum}'>确认发货</a>";} elseif($v['status']==2){echo '已发货';}else{ echo '订单完成';} ?></td>
			</tr>
			<?php } ?>
		</table>
		<?php } ?>
		<div class="page">
			<?php if($total_page>1){ ?>
				<ul>
					<li>
						<a href="?id=<?php echo $pagenum-1; ?>&status=<?php echo $stat; ?>">上一页</a>
					</li>
					<li>
						<a href="?id=1&status=<?php echo $stat; ?>">&lt;&lt;</a>
					</li>
					<?php for($i=1;$i<=$total_page;$i++){?>
					<li>
						<a href="?id=<?php echo $i; ?>&status=<?php echo $stat; ?>"><?php echo $i; ?></a>
					</li>
					<?php } ?>
					<li>
						<a href="?id=<?php echo $total_page; ?>&status=<?php echo $stat; ?>">&gt;&gt;</a>
					</li>
					<li>
						<a href="?id=<?php echo $pagenum+1; ?>&status=<?php echo $stat; ?>">下一页</a>
					</li>
				
				</ul>
				<?php } ?>
		</div>		
	</div>
	</body>
</html>