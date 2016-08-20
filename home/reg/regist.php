<?php
include('../../loginhead.php');
 ?>
			<div class="main" >
				<div class="main1">	
					<div class="new">
						<h1>新用户注册</h1>
						<a href="../../home.php">返回首页>></a>
					</div>
					<div class="login">
						<form action="./do_regist.php" method="post" id='frm'>
							<ul>
								<li>
									<span>用户名：</span>
									<input type="text" name="uname" onblur='valid()' >
									<div id='a' ></div>
									
								</li>
								<li>
									<span>昵称：</span>
									<input type="text" name="nkname" onblur='valid1()' >
									<div id='a1'></div>
								</li>
								<li>
									<span>登入密码：</span>
									<input type="password" name="pwd" onblur='valid2()' >
									<div id='a2' ></div>
									
								</li>
								<li>
									<span>确认密码：</span>
									<input type="password" name="pwd1" onblur='valid3()' >
									<div id='a3' ></div>
									
								</li>
								<li>
									<span>验证码：</span>
									<input type="text" class="yan" name="yanzheng">
									<div id="image"><a href="regist.php"><img src="./yanz.php"></a></div>
								</li>
								<li id="sub">
									<input type="submit" class="submit" value="确定注册" name="sub">
								<a href="../login/login.php">	<input type="button" value="已有账号" class="reg1" ></a>
								</li>
							</ul>
						</form>
					</div>
               </div>
			</div>
<?php 
include('../../foot.php');
?>
<script>
	var	 valid =function(){
		var uname=frm.uname.value;
		var reg= /[^\u0000-\u00FF]/;
		var unametip=document.getElementById('a');
		if(reg.test(uname)==false){
			unametip.style.color="red";
			unametip.innerHTML='✘    匹配中文';
			//return;
		}else{
			unametip.style="color:green;";
			unametip.innerHTML='✔';
		}
		
	}
	var valid1=function(){
		var nkname=document.getElementById('a1');
		var nkname1=frm.nkname.value;
		var reg1=/^[a-zA-Z]\w{5,17}$/;
		if(reg1.test(nkname1)==false){
			nkname.style="color:red;";
			nkname.innerHTML='✘ 匹配字母数字下划线';
			//return;
		}else{
			nkname.style="color:green;";
			nkname.innerHTML='✔';
		}
	}
	var valid2=function(){
		 pwdtip=document.getElementById('a2');
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
	var valid3=function(){
		var pwd1tip=document.getElementById('a3');
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
</script>