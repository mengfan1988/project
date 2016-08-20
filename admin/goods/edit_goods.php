<?php
header("content-type:text/html;charset=utf-8");
include("./core.php");
$ctgs = db_query("goods_ctg");
$ctgs=infinite_ctg($ctgs,array("0","fid","cid"));
if(isset($_GET['uid'])==false){
	exit("访问非法");
}
include('../../loginadminhead.php');
$pid=$_GET['uid'];
$query="select * from ts_goods where pid='{$pid}'";
$res=mysql_query($query);
//var_dump($res);
$data1=mysql_fetch_assoc($res);
?>
			<div class="bannertop1">
				<span>首页 / 订单管理 / 商品修改</span>	
			</div>
					<div class="main2">	
						<div class="new">
							<h1>商品修改</h1>
						</div>
						<div class="logingoods">
							<form action="./do_edit_goods.php" method="post" enctype="multipart/form-data">
								<ul>
									<li  >
										<input  type="hidden" name="pid" value="<?php echo $pid;?>">
										
									</li>
									<li class="b" >
										<span class='aaa'>品名：</span>
										<input class="aa" type="text" name="pname" value="<?php echo $data1['pname'];?>" >
										
									</li>
									<li class="b" >
										<span class='aaa'>价格：</span>
										<input  class="aa" type="text" name="price" value="<?php echo $data1['price'];?>">
										
									</li>
									<li class="b" >
										<span class='aaa'>优惠价：</span>
										<input class="aa" type="text" name="prime" value="<?php echo $data1['prime'];?>">
										
									</li >
									<li class="b" >
										<span class='aaa'>库存：</span>
										<input class="aa" type="text" name="snum" value="<?php echo $data1['snum'];?>">
										
									</li>
									<li class="colorcircle">
										<span>颜色：</span>
										<div class="div"><input type="checkbox" name="color[]" value="red" checked id='circle1'><span class='circle'>●</span></div>
										<div class="div"><input type="checkbox" name="color[]" value="purple" id='circle1'><span class='circle1'>●</span></div>
										<div class="div"><input type="checkbox" name="color[]" value="pink" id='circle1'><span class='circle2'>●</span></div>
									</li>
									<li class="square">
										<span>尺寸：</span>
										<div class="div"><input type="checkbox" checked name="size[]" value="XL"><span id='circle'>XL</span></div>
										<div class="div"><input type="checkbox" name="size[]" value="M"><span id='circle'>M</span></div>
										<div class="div"><input type="checkbox" name="size[]" value="L"><span id='circle'>L</span></div>
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
										<img src="./img/<?php echo $data1['thumb']; ?>" width="100">
									</li>
									<li>
										<span>展示图：</span><br>
										<input id="imgs" type="file" name="imgs[]">
										<input id="imgs" type="file" name="imgs[]">
										<input id="imgs" type="file" name="imgs[]">
										<input id="imgs" type="file" name="imgs[]">
										<div>
											<?php $imgs=explode(",",$data1['imgs']); foreach($imgs as $v){ ?>
											<img src="./img/<?php echo $v; ?>" width="50">
											<?php } ?>
										</div>
									</li>
									<li>
										<span>商品信息：</span>
										<textarea id="aa" name="descr"></textarea>
									</li>
									
									<li id="sub">
										<input type="submit" class="submit" value="修改" name="sub">
									</li>
								</ul>
							</form>
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