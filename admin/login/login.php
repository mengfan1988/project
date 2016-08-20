<?php 
include('../../loginheadadmin.php');
if(isset($_COOKIE['uname'])==true){
			$uname=$_COOKIE['uname'];
		}else{
			$uname="";
		}
?>
			<div class="main" >
				<div class="main1">	
					<div class="new1">
						<h1>后台管理员登入</h1>
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
									<a href="../../home.php"><input type="button" value="离开" class="reg1" ></a>
								</li>
								<span class="marq">数据库后台管理|版权所有&copy;孟凡</span>
							</ul>
						</form>
					</div>
               </div>
			</div>	



<?php 
include('../../foot.php');
 ?>