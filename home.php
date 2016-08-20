<?php
include('./head.php');
include('./link.php');
if(empty($_SESSION['car'])==true){//定义购物车值，主要用于    购物车count($_SESSION['car'])
	$_SESSION['car']=array();
}
if(isset($_GET["ctg3"])==true&&$_GET["ctg3"]!=''){ //判断get传值
				$ctg3 = $_GET["ctg3"];
				$where = "where ctg='{$ctg3}'";
			}else{
				$ctg3="";
				$where = "where 1";
			}
if(isset($_GET["sname"])==true&&$_GET["sname"]!=''){
		$name=$_GET["sname"];
		$where .= "&& descr like'%{$name}%'";			
		}else{
		$name='';
		$where.="";		
		}			
$size=10;//每页显示数目
$count=mysql_num_rows(mysql_query("select * from ts_goods {$where}"));//总共数据
$total_page=ceil($count/$size);//一共多少页
if(isset($_GET['id'])==true && preg_match("/^[1-9]\d*$/",$_GET['id'])!=0 && $_GET['id']<=$total_page){
	$pagenum=$_GET['id'];
}else{
	$pagenum=1;
}
$start=($pagenum-1)*$size;//起始数据

$sql="select * from ts_goods {$where} limit $start,$size";
$res=mysql_query($sql);
$sql1="select * from ts_goods_ctg where fid=0";//用于商品分类 0第一层分类
$res1=mysql_query($sql1);
$ctg="";
while($data=mysql_fetch_assoc($res1)){
	$ctg[]=$data;
}			
?>

			<div class="logo" id="bannerlogo">
				<img src="<?php echo HOST.'/home/'; ?>img/logo.png">
				<form action='./home.php' method='get'>
					<input type="hidden"  class="text1" name="id" value="<?php echo $pagenum;?>">
					<input type="hidden"  class="text1" name="ctg3" value="<?php echo $ctg3;?>">
					<input type="text"  class="text1" name="sname">
					<input type="submit" value="搜索" class="search">
				</form>
			</div>
			<div class="logo2"></div>
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
				<ul class="b1">
					<li>
						<p>分类：</p>
					</li>
					<?php 
					foreach($ctg as $v){ 
					$sql2="select * from ts_goods_ctg where fid='{$v['cid']}'";//第二层分类
					$res2=mysql_query($sql2);
					$ctg1="";
					while($data1=mysql_fetch_assoc($res2)){
						$ctg1[]=$data1;
					}
					?>
					<li class="naver">
						<a><?php echo $v['cname']; ?></a>
                        <ul class="nav1"><!--二级下拉菜单-->
						<?php foreach($ctg1 as $v1){?>
							<li>
								<a href="./home.php?ctg3=<?php echo $v1['cid'];  ?>"><?php echo $v1['cname']; ?></a>
							</li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>
				</ul>
			</div>
			<div class="plist">
				<ul>
					<?php while($date=mysql_fetch_assoc($res)){?>
					<li>
						<a href="./detail.php?id=<?php echo $date['pid']; ?>"><img src="./admin/goods/img/<?php echo $date['thumb']; ?>" width=220></a>
						<span id="descr"><?php echo html_entity_decode($date['descr']); ?></span><br>
						<p class="through">原价：&yen;<?php echo $date['price']; ?></p>
						<p>优惠价：&yen;<?php echo $date['prime']; ?></p>
						<a href="./detail.php?id=<?php echo $date['pid']; ?>"><input class="buy" type="submit" value="立即购买"></a>
						
					</li>
					<?php } ?>
				</ul>
			</div>
			<div class="page">
			<?php if($total_page>1){ ?>
				<ul>
				 <?php if($pagenum>1){ ?>
					<li>
						<a  href="?id=<?php echo $pagenum-1; ?>&ctg3=<?php echo $ctg3; ?>&sname=<?php echo $name; ?>">上一页</a>
					</li>
					<li>
						<a href="?id=1&ctg3=<?php echo $ctg3; ?>&sname=<?php echo $name; ?>">&lt;&lt;</a>
					</li>
				 <?php } ?>
					<?php for($i=1;$i<=$total_page;$i++){?>
					<li>
						<a href="?id=<?php echo $i; ?>&ctg3=<?php echo $ctg3; ?>&sname=<?php echo $name; ?>"><?php echo $i; ?></a>
					</li>
					<?php } ?>
					<?php if($pagenum<$total_page){ ?>
					<li>
						<a href="?id=<?php echo $total_page; ?>&ctg3=<?php echo $ctg3; ?>&sname=<?php echo $name; ?>">&gt;&gt;</a>
					</li>
					<li>
						<a href="?id=<?php echo $pagenum+1; ?>&ctg3=<?php echo $ctg3; ?>&sname=<?php echo $name; ?>">下一页</a>
					</li>
				<?php } ?>
				</ul>
				<?php } ?>
			</div>
			<div id="clear"></div>
<?php 
include('./foot.php');
?>