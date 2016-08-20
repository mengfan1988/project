<?php 
session_start();
if($_SESSION['car'][$_GET['id']]['num']>1){
	$_SESSION['car'][$_GET['id']]['num']--;
	
}
header("location:./car.php");
?>