<?php
include('../../link.php');
if(isset($_GET['id'])==false){
	exit('访问非法');
}
$id=$_GET['id'];
$sql="delete from collect where pid='{$id}'";
$res=mysql_query($sql);
if($res==true){
	header("location:./showcollect.php");
}




?>
