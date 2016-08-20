<?php
header("content-type:text/html;charset=utf-8");
include('../../loginadminhead.php');
include("../../link.php");
if($_SESSION['admin']==false){
	header("location:../../admin/login/login.php");
}
$sql = "select * from cfg";
$res = mysql_query($sql);

?>
				<div class="bannertop1">
					<span>首页 / 网站管理 / 更改配置</span>	
				</div>
						<div class="main2">	
							<div class="new">
								<h1>配置更改</h1>
							</div>
							<div class="login">
								<form action="./do_edit_cfg.php" method="post" >
								
								<?php 
									while($row=mysql_fetch_assoc($res)){
										extract($row);
										if($cfgtype=='text'){
											echo "{$cfgname_zh}:<input name='{$cfgname_en}' type='text' value='{$cfgvalue}'><br>";
										}
										if($cfgtype=="textarea"){
											echo "{$cfgname_zh}:<textarea name='{$cfgname_en}'>{$cfgvalue}</textarea><br>";
										}
									}
								
								?>
										<li id="sub2">
											<input type="submit" class="submit2" value="修改" name="sub">
										</li>
									</ul>
								</form>
							</div>
					   </div>
		 </div>
   </body>
</html>