<?php
include('../../head.php');
include('../../link.php');
date_default_timezone_set('asia/shanghai');
header("content-type:text/html;charset=utf-8");
$id=$_GET['id'];
$query="select * from news where nid='{$id}'";
$res=mysql_query($query);		
?>

			<div class="logo" id="bannerlogo">
				<img src="<?php echo HOST.'/home/'; ?>img/logo.png">
			</div>
			<div class="logo3"></div>
			<div class="banner">
				<ul>
					<li><a href="../../home.php">首页</a></li>
					<li>|</li>
					<li><a href="../../home.php">商城</a></li>
					<li>|</li>
					<li><a href="./news.php">新闻</a></li>
					
				</ul>
			
			</div>
			<div class="plist1">
					<?php while($data=mysql_fetch_assoc($res)){?>
					<p id="news1">
						<?php echo $data['title']; ?>	
					</p>
					<p id="news3">
						<?php echo date('Y-m-d H:i',$data['ctime']); ?>	　　　　　
						作者：<?php echo $data['author']; ?>
					</p>
					<p id="news2">
						<?php echo $data['content'];?>
					</p>
					<?php } ?>
			</div>
			
			<div id="clear1" ></div>
<?php 
include('../../foot.php');
?>