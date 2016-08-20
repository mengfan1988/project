<?php
include('./head.php');
header('content-type:text/html;charset=utf-8');
include('./link.php');
if(isset($_GET['id'])==""){
	exit("<span id='error'></sapn>");
	
}
if(isset($_SESSION['uid'])==true){
	$uid=$_SESSION['uid'];
	}else{
		$uid='';
	}
$id=$_GET['id'];
$sql="select * from ts_goods where pid='{$id}'";
$rew=mysql_query($sql);
$data=mysql_fetch_assoc($rew);
$num=file_get_contents('count.txt');
$num++;
file_put_contents('count.txt',$num);
$query="select * from comtent where pid='{$id}'&& status=2";
$res=mysql_query($query);
$count=mysql_num_rows($res);//获取评论数


			
?>

			<div class="logo" id="bannerlogo">
				<img src="<?php echo HOST.'/home/'; ?>img/logo.png">
			</div>
			<div class="banner">
				<ul>
					<li><a href="./home.php">首页</a></li>
					<li>|</li>
					<li><a href="./home.php">商城</a></li>
					<li>|</li>
					<li><a href="./home/news/news.php">新闻</a></li>
					<li>|</li>
				</ul>
			
			</div>
			<div class="banner1">
				<ul>
					<li><p>当前所在：</p><li>
					<li><a>商城></a></li>
					<li><a><?php echo $data['pname'];?></a></li>
				</ul>
			</div>
			<div class="plist">
				<div class="imgleft">
						<img class="img1" src="./admin/goods/img/<?php echo $data['thumb'];?>" width=340 id="bigimg">
				        <?php 
						$imgs=explode(",",$data['imgs']);
						foreach ($imgs as $v){
						echo "<img  src='./admin/goods/img/{$v}' class='imgd' onmousemove='change(this)'>";
						} 
						?>
							
					    
				</div>
				<div class="plistr">
					<dl>
						<dt><?php echo $data['pname'];?></dt>
						<dd>商品货名:<?php echo $data['pname'];?></dd>
						<dd>商品库存：<?php echo $data['snum'];?></dd>
						<dd>商品尺寸：
						<?php
						$size=explode(',',$data['size']);
						foreach ($size as $v1){
						echo "<input type='checkbox' name='chekbox'>$v1";
						}
						?>
						</dd>
						<dd>商品颜色：
						<?php
						$color=explode(',',$data['color']);
						foreach ($color as $v2){
						echo "<input type='checkbox' name='chekboxcol'>";
						echo "<span style='font-size:26px;color:$v2;'>●</span>";
						}
						?>
						</dd>
						<dd>商品价格：&yen;<?php echo $data['prime'];?></dd>
						<dd>商品点击数：<?php echo $num;?></dd>
						<dd>商品评论数：<?php echo $count;?></dd>
						<dd>
							<a href="./home/car/collect.php?pid=<?php echo $data['pid']; ?>&uid=<?php echo $uid; ?>"><img src="./home/img/shoucang2.gif"></a>
							<?php if($data['snum']>1){?>
							<a href="./home/car/add_car.php?id=<?php echo $data['pid']; ?>"><img src="./home/img/goumai2.gif"></a>
							<?php }else{ ?>
								<span id='stock'>库存不足</span>
							<?php } ?>
						</dd>		
					</dl>
				</div>
			<div class="content">
				<div id="content">用户评论：</div>
				<?php 
				while($data1=mysql_fetch_assoc($res)){ 
				?>
				<div id="floorc">
				<span><?php 
							$uname=mysql_fetch_assoc(mysql_query("select * from tp_user where sid={$data1['uid']}"));
							echo "<span class='time'>评论时间：".date('Y-m-d',$data1['ctime'])."</span>";
							echo "<span>评论人:".substr_replace($uname['uname'],'*',-3,4)."</span>";//使最后一个替换成*
				?>
				</span>
				<span ><?php echo html_entity_decode($data1['content']);//将实体字符转换成HTML字符?></span>
				</div>
				<?php } ?>
			</div>
<script>
	var change=function(th){
		var src=th.src;
		bigimg.src=src;
		
	}

</script>
<?php 
include('./foot.php');
?>

