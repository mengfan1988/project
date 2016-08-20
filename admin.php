<?php
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('asia/shanghai');
include('./loginadminhead.php');
$sql="select * from tp_admin";
$res=mysql_query($sql);
if($_SESSION['admin']==''){
	header("location:./admin/login/login.php");
}
?>
			<div class="bannertop">
				<span>首页 / 系统设置 / 后台用户</span>	
			</div>
			<table border=1 rules=all class="table">
				<tr>
					<th>编号</th>
					<th>姓名</th>
					<th>电话</th>
					<th>邮箱</th>
					<th>创建时间</th>
					<th>最后登入时间</th>
					<th>操作</th>
				</tr>
<?php while($date=mysql_fetch_assoc($res)){ ?>
				<tr>
					<td><?php echo $date['uid']; ?></td>
					<td><?php echo $date['uname']; ?></td>
					<td><?php echo $date['tphone']; ?></td>
					<td><?php echo $date['email']; ?></td>
					<td><?php echo date('y-m-d H:i',$date['ctime']); ?></td>
					<td><?php echo date('y-m-d H:i',$date['ltime']); ?></td>
					<td>
					<?php if($_SESSION['admin']!='孟凡'){ ?>
						<a href="./admin/admin/edit_admin.php?uid=<?php echo $date['uid']; ?>">编辑</a>
						<?php }else{ ?>
						<a href="./admin/admin/del_admin.php?uid=<?php echo $date['uid']; ?>" onclick="return change()">删除 |</a>
						<a href="./admin/admin/edit_admin.php?uid=<?php echo $date['uid']; ?>">编辑</a>
						<?php } ?>
					</td>
				</tr>
			
<?php } ?>			
			
			
			</table>
			
<script>
	var change=function(){
		if(confirm("确定删除")){
			return true;
		}else{
			return false;
		}
	}

</script>