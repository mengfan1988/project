<?php
header("content-type:text/html;charset=utf-8");
include('../../loginadminhead.php');
if($_SESSION['admin']==false){
	header("location:../../admin/login/login.php");
}
?>
			<div class="bannertop1">
				<span>首页 / 商品管理 / 前台用户添加</span>	
			</div>
			<div class="main2">	
				<div class="new">
					<h1>前台用户添加</h1>
				</div>
				<div class="login">
					<form action="./do_adduser.php" method="post" id="frm">
						<ul>
							<li>
								<span>用户名：</span>
								<input type="text" name="uname" onblur='valid()'>
								<div id='s'></div>
							</li>
							<li>
								<span>登入密码：</span>
								<input type="password" name="pwd" onblur='valid1()'>
								<div id='s1'></div>
							</li>
							<li>
								<span>确认密码：</span>
								<input type="password" name="pwd1" onblur='valid2()'>
								<div id='s2'></div>
							</li>
							<li>
								<span>昵称：</span>
								<input type="text" name="nkname" onblur='valid3()'>
								<div id='s3'></div>
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
		var uname=frm.uname.value;
		var reg= /[^\u0000-\u00FF]/;
		var unametip=document.getElementById('s');
		if(reg.test(uname)==false){
			unametip.style="color:red;";
			unametip.innerHTML='✘    匹配中文';
			return;
		}else{
			unametip.style="color:green;";
			unametip.innerHTML='✔';
		}
		
	}
	var valid1=function(){
		 pwdtip=document.getElementById('s1');
		 pwd=frm.pwd.value
		if(pwd==''){
			pwdtip.style="color:red;";
			pwdtip.innerHTML='✘ 密码不能为空';
			return;
		}else{
			pwdtip.style="color:green;";
			pwdtip.innerHTML='✔';
		}
	}
	var valid2=function(){
		var pwd1tip=document.getElementById('s2');
		var pwd1=frm.pwd1.value
		if(pwd1!=pwd){
			pwd1tip.style="color:red;";
			pwd1tip.innerHTML='✘ 密码不一致';
			return;
		}else{
			pwd1tip.style="color:green;";
			pwd1tip.innerHTML='✔';
		}
	}
	var valid3=function(){
		var nktip=document.getElementById('s3');
		var nkname=frm.nkname.value;
		var reg=/^[a-zA-Z]\w{5,17}$/;
		if(reg.test(nkname)==false){
			nktip.style="color:red;";
			nktip.innerHTML='✘ 昵称6-18个字符';
			return;
		}else{
			nktip.style="color:green;";
			nktip.innerHTML='✔';
		}
	}
	
	</script>
	</body>
</html>	
	