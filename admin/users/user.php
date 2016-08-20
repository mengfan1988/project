<?php
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('asia/shanghai');
include('../../loginadminhead.php');
if(isset($_POST['uname'])==true){
	$name=$_POST['uname'];
}else{
	$name='';
}
$sql="select * from tp_user where uname like '%{$name}%'";
$res=mysql_query($sql);
$ctg=array();
while($data=mysql_fetch_assoc($res)){
	$data['uname']=str_replace($name,"<font color='red'>".$name."</font>",$data['uname']);//查询字显红
	$ctg[]=$data;
}
if($_SESSION['admin']==''){
	header("location:../login/login.php");
}
?>

			<div class="bannertop">
				<span>首页 / 商品管理 / 前台用户</span>
				<form id="searchertable" action="user.php" method="post"><input type="text" name="uname"><input class="submita" type='submit' value="搜索"></form>
			</div>
			<table border=1 rules=all class="table">
				<tr>
					<th>编号</th>
					<th>姓名</th>
					<th>昵称</th>
					<th>创建时间</th>
					<th>最后登入时间</th>
					<th>操作者</th>
					<th>操作</th>
				</tr>
				<?php foreach($ctg as $v){ ?>
				<tr>
					<td><?php echo $v['sid']; ?></td>
					<td><?php echo $v['uname']; ?></td>
					<td><?php echo $v['nkname']; ?></td>
					<td><?php echo date('y-m-d H:i',$v['ctime']); ?></td>
					<td><?php echo date('y-m-d H:i',$v['ltime']); ?></td>
					<td><?php echo $v['controlname']; ?></td>
					<td>
					<?php if($_SESSION['admin']!='孟凡'){ ?>
						<a href="./edit_user.php?uid=<?php echo $v['sid']; ?>">编辑</a>
						<?php }else{ ?>
						<a href="./del_use.php?uid=<?php echo $v['sid']; ?>" onclick="return change()">删除 |</a>
						<a href="./edit_user.php?uid=<?php echo $v['sid']; ?>">编辑</a>
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
	</body>
</html>