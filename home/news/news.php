<?php
include('../../head.php');
include('../../link.php');
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('asia/shanghai');
	if(isset($_GET['ctgname'])==true&&$_GET['ctgname']!=''){
	$ctgname=$_GET['ctgname'];
	$where="where ctgname='{$ctgname}'";
	}else{
		$ctgname='';
		$where='where 1';
	}
	if(isset($_GET['sname'])==true&&$_GET['sname']!=''){
	$sname=$_GET['sname'];
	$where.= "&& title like'%{$sname}%'";
	}else{
		$sname='';
		$where.='';
	}
$query="select * from news {$where}";
$res=mysql_query($query);		
?>

			<div class="logo" id="bannerlogo">
				<img src="<?php echo HOST.'/home/'; ?>img/logo.png">
				<form action='./news.php' method='get'>
					<input type="hidden"   name="ctgname" value="<?php echo $ctgname;?>">
					<input type="text"  class="text1" name="sname">
					<input type="submit" value="news" class="search">
				</form>
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
			<div class="banner2">
				<ul class="b1">
					<?php 
					/*
					$query1="select ctgname from news";
					$res1=mysql_query($query1);	
					$ctg='';
					while($data1=mysql_fetch_assoc($res1)){ //循环标题  二维数组
					$ctg[]=$data1;
					}
					//var_dump($ctg);
					foreach($ctg as $v){               //一维数组
						$ctg2[] = $v['ctgname'];
					}
					$ctg2=array_unique($ctg2);   //去重
					foreach($ctg2 as $v1 ){*/
					$query1="select distinct ctgname from news";//distinct去重
					$res1=mysql_query($query1);	
					while($data1=mysql_fetch_assoc($res1)){           
					
					?>
					<li class="naver">
						<a href="./news.php?ctgname=<?php echo $data1['ctgname']; ?>">
						<?php 
						echo $data1['ctgname']; 
						?>
						
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>
			<div class="plist1">
				<ul>
					<?php while($data=mysql_fetch_assoc($res)){?>
					<li>
						<a href="./shownews.php?id=<?php echo $data['nid'];?>"><?php echo $data['title'];?></a>	
					</li>
					<?php } ?>
				</ul>
			</div>
			
			<div id="clear1"></div>
<?php 
include('../../foot.php');
?>