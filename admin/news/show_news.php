<?php
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('asia/shanghai');
include('../../loginadminhead.php');
if(isset($_GET['uname'])==true&&$_GET['uname']!=''){
	$name=$_GET['uname'];
	$where="where content like '%{$name}%'";
}else{
	$name='';
	$where='where 1';
}
$size=2;//每页显示数目
$count=mysql_num_rows(mysql_query("select * from news {$where}"));//总共数据
$total_page=ceil($count/$size);//一共多少页
if(isset($_GET['id'])==true && preg_match("/^[1-9]\d*$/",$_GET['id'])!=0 && $_GET['id']<=$total_page){
	$pagenum=$_GET['id'];
}else{
	$pagenum=1;
}
$start=($pagenum-1)*$size;//起始数据
$sql="select * from news {$where} limit $start,$size";
$res=mysql_query($sql);
if($_SESSION['admin']==''){
	header("location:../login/login.php");
}
?>
			<div class="bannertop">
				<span>首页 / 网站管理 / 查看新闻</span>
				<form id="searchertable" action="show_news.php" method="get">
				<input type="hidden" name="id" value="<?php echo $pagenum; ?>">
				<input type="text" name="uname" value="<?php echo $name; ?>"><input class="submita" type='submit' value="搜索">
				</form>
			</div>
			<table border=1 rules=all class="table">
				<tr>
					<th>编号</th>
					<th>标题</th>
					<th>内容</th>
					<th>创建时间</th>
					<th>作者</th>
					<th>管理员</th>
					<th>新闻分类</th>
					<th>操作</th>
				</tr>
				<?php 
				$ctg=array();
				while($date=mysql_fetch_assoc($res)){
						$date['content']=str_replace($name,"<font color='red'>".$name."</font>",$date['content']);
						$ctg[]=$date;
					}	
					foreach($ctg as $v){
				?>
				<tr>
					<td><?php echo $v['nid']; ?></td>
					<td><?php echo $v['title']; ?></td>
					<td><?php echo $v['content']; ?></td>
					<td><?php echo date('y-m-d H:i',$v['ctime']); ?></td>
					<td><?php echo $v['author']; ?></td>
					<td><?php echo $v['controlname']; ?></td>
					<td><?php echo $v['ctgname']; ?></td>
					<td>
					<?php if($_SESSION['admin']!='孟凡'){ ?>
						<a href="./edit_news.php?nid=<?php echo $v['nid']; ?>">编辑</a>
						<?php }else{ ?>
						<a href="./del_news.php?nid=<?php echo $v['nid']; ?>" onclick="return change()">删除 |</a>
						<a href="./edit_news.php?nid=<?php echo $v['nid']; ?>">编辑</a>
						<?php } ?>
					</td>
				</tr>
			
<?php } ?>			
			
			
			</table>
			<div class="page">
			<?php if($total_page>1){ ?>
				<ul>
					<li>
						<a href="?id=<?php echo $pagenum-1; ?>&uname=<?php echo $name; ?>">上一页</a>
					</li>
					<li>
						<a href="?id=1&uname=<?php echo $name; ?>">&lt;&lt;</a>
					</li>
					<?php for($i=1;$i<=$total_page;$i++){?>
					<li>
						<a href="?id=<?php echo $i; ?>&uname=<?php echo $name; ?>"><?php echo $i; ?></a>
					</li>
					<?php } ?>
					<li>
						<a href="?id=<?php echo $total_page; ?>&uname=<?php echo $name; ?>">&gt;&gt;</a>
					</li>
					<li>
						<a href="?id=<?php echo $pagenum+1; ?>&uname=<?php echo $name; ?>">下一页</a>
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
	</body>
</html>