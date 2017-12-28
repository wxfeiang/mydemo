<?php
	session_start();
	$msg = "";
	$jumpUrl = "publish.php";
	if($_SERVER['REQUEST_METHOD']=="POST"){
		if(!empty($_POST["title"])){
			$title = test_input($_POST["title"]);
		}else{
			$msg = "请输入标题";
			include "../php/tips.php";
			exit;	
		}
		if(!empty($_POST["column"])){
			$column = test_input($_POST["column"]);
		}else{
			$msg = "请选择栏目";
			include "../php/tips.php";
			exit;	
		}
		if(!empty($_POST["describe"])){
			$describe = test_input($_POST["describe"]);
		}else{
			$msg = "请输入文章描述";
			include "../php/tips.php";
			exit;	
		}
		if(!empty($_POST["keyworld"])){
			$keyworld = test_input($_POST["keyworld"]);
		}else{
			$msg = "请输入文章关键词";
			include "../php/tips.php";
			exit;	
		}
		$contents = $_POST["editorValue"];
		if(isset($_SESSION["admin_user"])){
			$user = $_SESSION["admin_user"];
		}
		if($_FILES["upfile"]["error"]>0){
			$msg = "缩略图上传失败";
			include "../php/tips.php";
			exit;
		}else{
			$filesize = $_FILES["upfile"]["size"];
			$img_max_size = 1*1024*1024;
			if($filesize>$img_max_size){
				$msg = "你上传的缩略图过大";
				include "../php/tips.php";
				exit;
			}
			$filetype = $_FILES["upfile"]["type"];
			$imgtype = array(
				"image/jpeg",
				"image/jpg",
				"image/png",
				"image/gif"
			);	
			if(!in_array($filetype,$imgtype)){
				$msg = "你上传的缩略图格式不对";
				include "../php/tips.php";
				exit;
			}
			$filename = $_FILES["upfile"]["name"];
			$imgArr = explode(".",$filename);
			$type = array_pop($imgArr);
			$imgname = time().rand(10,99).".".$type;
			move_uploaded_file($_FILES["upfile"]["tmp_name"],"../uploads/".$imgname);
			$thumUrl = "uploads/".$imgname;
			$conn = new mysqli("localhost","root","root","myitem");
			if($conn->connect_error){
				$msg = "链接数据库失败";
				
				include "../php/tips.php";
				exit;
			}
			$date = time();
			
			$sql = "INSERT INTO article(ar_title,ar_column,ar_describe,ar_keyword,ar_contents,ar_thum,ar_author,ar_date)VALUES('$title','$column','$describe','$keyworld','$contents','$thumUrl','$user','$date')";
			
			if($conn->query($sql)){
				$msg = "发布文章成功";
				include "../php/tips.php";
				exit;
			}else{
				$msg = "发布文章失败";
				include "../php/tips.php";
				exit;	
			}
			
		}
		
	}else{
		$msg = "提交方式不对";
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