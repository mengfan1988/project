<?php
header("content-type:text/html;charset=utf-8");
include('../../loginadminhead.php');
if($_SESSION['admin']==false){
	header("location:../../admin/login/login.php");
}
?>
			<div class="bannertop1">
				<span>首页 / 网站管理 / 添加新闻</span>	
			</div>
			<div class="main2">	
				<div class="new">
					<h1>添加新闻</h1>
				</div>
				<div class="login">
					<form action="./do_addnews.php" method="post" id="frm">
						<ul>
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
								<span>作者：</span>
								<input type="text" name="auname" onblur='valid3()'>
								<div id='s3'></div>
							</li>
							<li>
								<span>新闻分类：</span>
								<input type="text" name="ctgname" onblur='valid4()'>
								<div id='s4'></div>
							</li>
							
							<li id="sub">
								<input type="submit" class="submit" value="添加" name="sub">
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
	var valid4=function(){
		var ctgtip=document.getElementById('s4');
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
	
	</script>
	</body>
</html>	
	