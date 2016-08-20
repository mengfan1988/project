<?php
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('asia/shanghai');
include('../../loginadminhead.php');
include('../../link.php');
if($_SESSION['admin']==''){
	header("location:../login/login.php");
}
$size=5;
$count=mysql_num_rows(mysql_query("select * from comtent"));
$total_page=ceil($count/$size);
if(isset($_GET['id'])==true && preg_match("/^[1-9]\d*$/",$_GET['id'])!=0 && $_GET['id']<=$total_page){
	$pagenum=$_GET['id'];
}else{
	$pagenum=1;
}
$start=($pagenum-1)*$size;
$sql="select * from comtent limit $start,$size";
$res=mysql_query($sql);
$ctg=array();
while($data=mysql_fetch_assoc($res)){
			$ctg[]=$data;
			}
?>
			<div class="bannertop1">
				<span>首页 / 订单管理 / 留言管理</span>
			</div>
		<table border=1 rules=all class="table">
			<tr>
				<th>商品品名</th>
				<th>订单号</th>
				<th>评论</th>
				<th>评论时间</th>
				<th>用户</th>
				<th>状态</th>
				<th>操作</th>
			</tr>
				<?php 
				foreach ($ctg as $v){
				$status=array(1=>'未审核',2=>'通过');
				$status=$status[$v['status']];
				$content=html_entity_decode($v['content']);
				?>
			<tr>
				<td>
				<?php
				$pid=$v['pid'];
				$date=mysql_fetch_assoc(mysql_query("select * from ts_goods where pid='{$pid}'"));
				echo $date['pname'];
			   ?>
			   </td>
			   <td><?php echo $v['onum'];?></td>
			   <td><?php echo $content;?></td>
			   <td><?php echo date('Y-m-d H:i:s',$v['ctime']);?></td>
			    <td>
				<?php 
				$uid=$v['uid'];
				$date1=mysql_fetch_assoc(mysql_query("select * from tp_user where sid='{$uid}'"));
				echo $date1['uname']; 
				?>
				</td>
				 <td>
				 <?php 
				 echo $status;
				 if($v['status']==1){
					 echo "<a href='./do_admin_comment.php?comid={$v['comid']}&id={$pagenum}'>通过<a>";
				 }
				 ?>
				 </td>
				 <td>
					<a href='./del_comment.php?comid=<?php echo $v['comid']; ?>' onclick="return change()">删除<a>
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
			 function change(){
				if(confirm('是否删除')){
					return true;
				
				}else{
					return false;
				}
				
			}
		
		</script>
		</body>	
</html>	
		