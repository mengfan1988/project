<?php
header("content-type:text/html;charset=utf-8");
include('../../loginadminhead.php');
include("./core.php");
$ctgs = db_query("goods_ctg");
$ctgs=infinite_ctg($ctgs,array("0","fid","cid"));
if($_SESSION['admin']==false){
	header("location:../../admin/login/login.php");
}
?>
			<div class="bannertop1">
				<span>首页 / 订单管理 / 商品添加</span>	
			</div>
					<div class="main2">	
						<div class="new">
							<h1>商品添加</h1>
						</div>
						<div class="logingoods">
							<form action="./do_add_goods.php" method="post" enctype="multipart/form-data">
								<ul>
									<li class="b" >
										<span class='aaa'>品名：</span>
										<input class="aa" type="text" name="pname">
										
									</li>
									<li class="b" >
										<span class='aaa'>价格：</span>
										<input  class="aa" type="text" name="price">
										
									</li>
									<li class="b" >
										<span class='aaa'>优惠价：</span>
										<input class="aa" type="text" name="prime">
										
									</li >
									<li class="b" >
										<span class='aaa'>库存：</span>
										<input class="aa" type="text" name="snum">
										
									</li>
									<li class="colorcircle">
										<span>颜色：</span>
										<div class="div"><input type="checkbox" name="color[]" value="red" checked id='circle1'><span class='circle'>●</span></div>
										<div class="div"><input type="checkbox" name="color[]" value="purple" id='circle1'><span class='circle1'>●</span></div>
										<div class="div"><input type="checkbox" name="color[]" value="pink" id='circle1'><span class='circle2'>●</span></div>
									</li>
									<li class="square">
										<span>尺寸：</span>
										<div class="div"><input type="checkbox" checked name="size[]" value="15-35cm"><span id='circle'>15-35cm</span></div>
										<div class="div"><input type="checkbox" name="size[]" value="35-55cm"><span id='circle'>35-55cm</span></div>
										<div class="div"><input type="checkbox" name="size[]" value="55cm以上"><span id='circle'>55cm以上</span></div>
									</li>
									<li >
										<span class='aaa'>分类：</span>
										<div class="div1"><?php 
										echo infinite_select($ctgs,"ctg","cid","cname");
										?></div>		
									</li>
									<li >
										<span class='aaa'>缩略图：</span>
										<input type="file" name="thumb[]">
									</li>
									<li>
										<span>展示图：</span><br>
										<input id="imgs" type="file" name="imgs[]">
										<input id="imgs" type="file" name="imgs[]">
										<input id="imgs" type="file" name="imgs[]">
										<input id="imgs" type="file" name="imgs[]">
									</li>
									<li>
										<span>商品信息：</span>
										<textarea id="aa" name="descr"></textarea>
									</li>
									
									<li id="sub">
										<input type="submit" class="submit" value="添加" name="sub">
									</li>
								</ul>
							</form>
						</div>
				   </div>
	</div>
			   
				   
				   
				   
				   
	<script src="./edit/ueditor.config.js"></script>
	<script src="./edit/ueditor.all.min.js"></script>				   
	<script>
		var conf={"toolbars":[['fullscreen','bold','italic','underline','fontborder','undo','redo','fontsize','fontfamily','cleardoc']]}
		var ue = UE.getEditor('aa',conf);

	</script>		
	</body>
</html>
		