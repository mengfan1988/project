<?php 
include('../../head.php');
include('../../link.php');
date_default_timezone_set('asia/shanghai');
header('content-type:text/html;charset=utf-8');
if(isset($_SESSION['uid'])==false){
	header("location:../../home.php");
}
$size=4;//每页数量
$uid=$_SESSION['uid'];//登入时的session值
$count=mysql_num_rows(mysql_query("select * from orders where uid={$uid}"));//个人的订单数量
$total_page=ceil($count/$size);//总页数
if(isset($_GET['id'])==true && preg_match("/^[1-9]\d*$/",$_GET['id'])!=0 && $_GET['id']<=$total_page){
	$pagenum=$_GET['id'];
}else{
	$pagenum=1;//页码
}
$start=($pagenum-1)*$size;//起始项
$sql="select * from orders where uid={$uid} limit $start,$size";//sql语句
$res=mysql_query($sql);//结果集
$ctg=array();
while($data=mysql_fetch_assoc($res)){
			$ctg[]=$data;
			}
			
?>

		<div class="logo" id="bannerlogo">
					<img src="<?php echo HOST.'/home/'; ?>img/logo.png">
					<span class="buyc">订单查看</span>
		</div>
        		<?php 
				foreach ($ctg as $v){
				$status=array(1=>'待发货',2=>'已发货',3=>'订单完成');
				$status=$status[$v['status']];
				$goods=json_decode($v['goods'],true);
				?>
			
					<div id='orderdiv'>
					<span>订单号：<?php echo $v['onum'];?></span>
					<span>订单生成时间：<?php echo date('Y-m-d H:i',$v['ctime']); ?></span>
					<span>订单状态：<?php echo $status; ?></span>
					<span>顾客姓名：<?php  
						$row=mysql_query("select * from tp_user where sid='{$uid}'");
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
					<td>评价</td>
				</tr>
				<?php 
				foreach($goods as $v1){
				$pid = $v1["id"];
				$pcur = mysql_fetch_assoc(mysql_query("select * from ts_goods where pid='{$pid}'"));
				
				?>
				
				<tr>
					<td><img src="../../admin/goods/img/<?php echo $pcur['thumb']; ?>" width="60" alt="<?php echo $pcur['pname'];?>" title="<?php echo $pcur['pname'];?>"></td>
					<td ><?php echo $pcur['pname']; ?></td>
					<td>
					<?php
					$onum=$v['onum'];
					$pid=$pcur['pid'];
					$row=mysql_num_rows(mysql_query("select * from comtent where onum={$onum} && pid={$pid}"));
					if($v['status']==3){
						if($row!=0){ echo "已评价";//如果里面有数据就证明已评价
						}else{
						echo "<a href='./comment.php?onum={$onum}&pid={$pid}&id={$pagenum}'>评价</a>";
						}
					}else{
						echo "不可评价";
					}
					?>
					</td>
					<td>操作：<?php if($v['status']==2){echo "<a href='./confrim.php?oid={$v['oid']}&id={$pagenum}'>确认收货</a>";} elseif($v['status']==1){echo '待收货';}else{ echo '订单完成';} ?></td>
			    </tr>
			<?php } ?>
		</table>
		<?php } ?>
		
		<div class="page2">
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

<div id="clear" style="height:200px;"></div>
<?php
include('../../foot.php');
?>
