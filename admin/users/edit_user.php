<?php
header("content-type:text/html;charset=utf-8");
if(isset($_GET['uid'])==false){
	exit("访问非法");
}
include('../../loginadminhead.php');

$sid=$_GET['uid'];
$query="select * from tp_user where sid='{$sid}'";
$res=mysql_query($query);
$data=mysql_fetch_assoc($res);
?>

			<div class="bannertop1">
				<span>首页 / 商品管理 / 前台用户修改</span>	
			</div>
					<div class="main2">	
						<div class="new">
							<h1>前台用户修改</h1>
						</div>
						<div class="login">
							<form action="./do_edituser.php" method="post">
								<ul>
									<input type="hidden" name="sid" value="<?php echo $sid;?>" >
									<li>
										<span>用户名：</span>
										<input type="text" name="uname" value="<?php echo $data['uname'];?>" readonly>
										
									</li>
									<li>
										<span>登入密码：</span>
										<input type="password" name="pwd">
										
									</li>
									<li>
										<span>确认密码：</span>
										<input type="password" name="pwd1">
										
									</li>
									<li>
										<span>昵称：</span>
										<input type="text" name="nkname">
										
									</li>
	
									<li id="sub">
										<input type="submit" class="submit" value="修改" name="sub">
									</li>
								</ul>
							</form>
						</div>
				   </div>
				