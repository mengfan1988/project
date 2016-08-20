<?php 
include('../../loginhead.php');
if(isset($_COOKIE['uname'])==true){
			$uname=$_COOKIE['uname'];
		}else{
			$uname="";
		}
?>
			<div class="main" >
				<div class="main1">	
					<div class="new">
						<h1>会员登入</h1>
						<a href="../../home.php">返回首页>></a>
					</div>
					<div class="login">
						<form action="do_login.php" method="post" enctype="multipart/form-data">
							<ul>
								<li>
									<span>用户名：</span>
									<input type="text" name="uname" value="<?php echo $uname;?>">
								</li>
								<li>
									<span>登入密码：</span>
									<input type="password" name="pwd">
								</li>
								<li id="sub">
									<a href="###"><input type="submit" class="submit" value="登入" name="sub1" ></a>
									<a href="../reg/regist.php"><input type="button" value="注册账号" class="reg1" ></a>
								</li>
							</ul>
						</form>
					</div>
               </div>
			</div>	



<?php 
include('../../foot.php');
 ?>