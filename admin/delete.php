<?php
	$id = $_GET["id"];
	$conn = new mysqli("localhost","root","root","myitem");
	if($conn->connect_error){
		die("链接失败");
	}
	$sql = "DELETE FROM article WHERE ar_id=$id";
	if($conn->query($sql)){
		$msg = "删除成功";
		$jumpUrl = "column.php";
		include "../php/tips.php";
		exit;
	}
?>