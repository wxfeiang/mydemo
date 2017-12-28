<?php
	session_start();
	session_destroy();
	$msg = "注销成功";
	$jumpUrl = "login.php";
	include "../php/tips.php";
	exit;
?>