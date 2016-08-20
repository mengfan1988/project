<?php
header("content-type:text/html;charset=utf-8");
include('../../loginadminhead.php');
if($_SESSION['admin']==false){
	header("location:../../admin/login/login.php");
}
?>
				<div class="bannertop1">
					<span>首页 / 网站管理 / 配置管理</span>	
				</div>
						<div class="main2">	
							<div class="new">
								<h1>配置添加</h1>
							</div>
							<div class="login">
								<form action="./do_admin_config.php" method="post" >
									<ul>
										<li>
											<span>配置中文：</span>
											<input type="text" name="cfgname_zh" >								
										</li>
										<li>
											<span>配置英文：</span>
											<input type="text" name="cfgname_en">											
										</li>
										<li>
											<span>表单类型：</span>
											<select  name="cfgtype">
												<option value="text">文本框</option>
												<option value="textarea">文本域</option>
											</select>
										</li>
										<li>
											<span>修改值：</span>
											<input type="text" name="cfgvalue">
										</li>
										<li id="sub">
											<input type="submit" class="submit" value="添加" name="sub">
										</li>
									</ul>
								</form>
							</div>
					   </div>
		 </div>
   </body>
</html>