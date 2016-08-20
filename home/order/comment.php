<?php 
include('../../head.php');
date_default_timezone_set('asia/shanghai');
header('content-type:text/html;charset=utf-8');
if(isset($_GET)==FALSE){
	exit('访问非法');
}
$onum=$_GET['onum'];
$pid=$_GET['pid'];
$id=$_GET['id'];
?>
		<div class="logo" id="bannerlogo">
					<img src="<?php echo HOST.'/home/'; ?>img/logo.png">
					<span class="buyc">商品评价</span>
		</div>
		<div id="comment">
			<form action="./do_comment.php" method='post'>
			<span>用户评论：</span>
			<input type='hidden' value='<?php echo $onum;?>' name='onum'>
			<input type='hidden' value='<?php echo $pid;?>' name='pid'>
			<input type='hidden' value='<?php echo $id;?>' name='id'>
			<textarea id="aa" name="content"></textarea>
			<input type='submit' value='提交' name='sub'>
			</form>
		</div>
		
	</html>	
		
		
		
		
		
		
		
		
		
		
		
		
		
<script src="../../admin/goods/edit/ueditor.config.js"></script>
<script src="../../admin/goods/edit/ueditor.all.min.js"></script>				   
<script>
	var conf={"toolbars":[['fullscreen','bold','italic','underline','fontborder','undo','redo','fontsize','fontfamily','cleardoc']]}
	var ue = UE.getEditor('aa',conf);

</script>		