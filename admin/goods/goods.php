<?php
header("content-type:text/html;charset=utf-8");
include('../../loginadminhead.php');
include("./core.php");
$ctgs = db_query("goods_ctg");
$ctgs=infinite_ctg($ctgs,array("0","fid","cid"));//查询表
if($_SESSION['admin']==false){
	header("location:../../admin/login/login.php");
}
?>

			<div class="bannertop1">
				<span>首页 / 商品管理 / 商品分类</span>	
			</div>
			<table rules=all class="table1">
				<tr>
					<th>编号</th>
					<th>分类名</th>
					<th>上级分类</th>
					<th>操作</th>
				</tr>
				<?php foreach($ctgs as $v){?>
				<form action="./edit.php" method="post" >
					<input name="cid" type="hidden" value="<?php echo $v["cid"]?>">
				<tr>
					<td><?php echo $v["cid"];?></td>
					<td class="formtd"><?php echo str_repeat("--",$v["level"])?>
					<input  name="cname" type="text" value="<?php echo $v["cname"]?>" class="cnameinput">		
					</td>
					<td>
					
					<?php 
					echo infinite_select($ctgs,"ctg","cid","cname",$v["fid"]);
					?>		
					</td>
					
					<td>
					<?php if($_SESSION['admin']!='孟凡'){ ?>
						<input type="submit" value="修改" name="sub">
						<?php }else{ ?>
						<input type="submit" value="修改" name="sub" >
						<a href="./del.php?cid=<?php echo $v["cid"];?>" onclick="return change()" id="make" >× 删除</a>
						<?php } ?>
					</td>
				</tr>
				</form>
				<?php }?>
				<tr class='add1' >
					<td colspan="4"><a href="./add.php" class="add">添加分类</a></td>
					
				</tr>
			</table>

	<script>
		var change=function(){
			if(confirm('是否删除')){
				return turn;
			}else{
				return false;
			}
		
		}


	</script>
	</body>
</html>