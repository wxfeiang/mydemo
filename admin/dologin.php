<?php
	session_start();
	$jumpUrl = "login.php";
	// 获取用户名和密码，并且去数据库匹配
	if(!empty($_POST["username"])){
		$user = test_input($_POST["username"]);
	}else{
		$msg = "请输入用户名";
		include "../php/tips.php";
		exit;	
	}
	if(!empty($_POST["password"])){
		$pass = test_input($_POST["password"]);
	}else{
		$msg = "请输入密码";
		include "../php/tips.php";
		exit;	
	}

	$conn = new mysqli("localhost","root","root","myitem");
	if($conn->connect_error){
		$msg = "链接数据库失败";
		
		include "../php/tips.php";
		exit;
	}
	
	$sql = "SELECT * FROM admin WHERE username='$user'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		$row = $result->fetch_assoc();
		if($row["password"]==$pass){
			$_SESSION["admin_user"] = $user;
			$msg = "登录成功";
			$jumpUrl = "publish.php";
			include "../php/tips.php";
			exit;
		}else{
			$msg = "你输入的密码有误";
			include "../php/tips.php";
			exit;	
		}
	}else{
		$msg = "用户名不存在";
		include "../php/tips.php";
		exit;	
	}
	
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	
?>