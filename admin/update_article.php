<?php
	$id = $_GET["id"];
	$msg = "";
	$jumpUrl = "update.php?id=".$id;
	$conn = new mysqli("localhost","root","root","myitem");
	if($conn->connect_error){
		die("链接失败");
	}
	
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
	//$date = time();
	if(empty($_FILES["upfile"]["name"])){
		$sql = "UPDATE article SET ar_title='$title',ar_column='$column',ar_describe='$describe',ar_keyword='$keyworld',ar_contents='$contents' WHERE ar_id=$id";
	}else{
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
			$sql = "UPDATE article SET ar_title='$title',ar_column='$column',ar_describe='$describe',ar_keyword='$keyworld',ar_contents='$contents',ar_thum='$thumUrl' WHERE ar_id=$id";
		}
	}
	if($conn->query($sql)){
		$msg = "修改成功";
		$jumpUrl = "column.php";
		include "../php/tips.php";
		exit;
	}else{
		$msg = "修改失败";
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