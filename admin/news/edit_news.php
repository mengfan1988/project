<?php
header("content-type:text/html;charset=utf-8");
include('../../loginadminhead.php');
if($_SESSION['admin']==false){
	header("location:../../admin/login/login.php");
}
if(isset($_GET['nid'])==true){
	$nid=$_GET['nid'];
}else{
	
	$nid='';
}
$query="select * from news where nid='{$nid}'";
$res=mysql_query($query);
$data=mysql_fetch_assoc($res);
?>
			<div class="bannertop1">
				<span>首页 / 网站管理 / 修改新闻</span>	
			</div>
			<div class="main2">	
				<div class="new">
					<h1>修改新闻</h1>
				</div>
				<div class="login">
					<form action="./do_editnews.php" method="post" id="frm">
						<ul>
							<input type="hidden" name="nid" value="<?php echo $nid;?>" >
							<li>
								<span>新闻标题：</span>
								<input type="text" name="title" onblur='valid()'>
								<div id='s'></div>
							</li>
							<li>
								<span>新闻内容：</span>
								<input type="text" name="content" onblur='valid1()'>
								<div id='s1'></div>
							</li>
							<li>
								<span>新闻分类：</span>
								<input type="text" name="ctgname" onblur='valid2()'>
								<div id='s2'></div>
							</li>
							<li>
								<span>作者：</span>
								<input type="text" name="auname" onblur='valid3()' value="<?php echo $data['author']; ?>" >
								<div id='s3'></div>
							</li>
							
							<li id="sub">
								<input type="submit" class="submit" value="修改" name="sub">
							</li>
						</ul>
					</form>
				</div>
		   </div>
	   </div>
	<script>
	var	 valid =function(){
		var titlename=frm.title.value;
		var reg= /[^\u0000-\u00FF]/;
		var titlenametip=document.getElementById('s');
		if(reg.test(titlename)==false){
			titlenametip.style="color:red;";
			titlenametip.innerHTML='✘    匹配中文';
			return;
		}else{
			titlenametip.style="color:green;";
			titlenametip.innerHTML='✔';
		}
		
	}
	var valid1=function(){
		 contenttip=document.getElementById('s1');
		 content=frm.content.value
		if(content==''){
			contenttip.style="color:red;";
			contenttip.innerHTML='✘ 内容不能为空';
			return;
		}else{
			contenttip.style="color:green;";
			contenttip.innerHTML='✔';
		}
	}
	var valid2=function(){
		var ctgtip=document.getElementById('s2');
		var ctgname=frm.ctgname.value;
		var reg= /[^\u0000-\u00FF]/;
		if(reg.test(ctgname)==false){
			ctgtip.style="color:red;";
			ctgtip.innerHTML='✘ 中文分类';
			return;
		}else{
			ctgtip.style="color:green;";
			ctgtip.innerHTML='✔';
		}
	}
	var valid3=function(){
		var autip=document.getElementById('s3');
		var auname=frm.auname.value;
		var reg= /[^\u0000-\u00FF]/;
		if(reg.test(auname)==false){
			autip.style="color:red;";
			autip.innerHTML='✘ 中文姓名';
			return;
		}else{
			autip.style="color:green;";
			autip.innerHTML='✔';
		}
	}
	
	</script>
	</body>
</html>	
	