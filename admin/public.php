<?php
	session_start();
	if(!isset($_SESSION["admin_user"])){
		$msg = "你还没有登录";
		$jumpUrl = "login.php";
		include "../php/tips.php";
		exit;
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>后台管理系统</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/site.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" src="umeditor/third-party/template.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="umeditor/lang/zh-cn/zh-cn.js"></script>
</head>

<body>

	<div class="container">
        <div class="projects-header page-header">
            <h2>后台信息系统 <small>欢迎您：<?php echo $_SESSION["admin_user"]; ?>  <a href="outlogin.php">注销</a></small></h2>
        </div>
        <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
              <li class="list-group-item list-group-item-success"><a href="column.php">文章栏目</a></li>
              <li class="list-group-item"><a href="column.php">Web前端开发</a></li>
              <li class="list-group-item"><a href="column.php">UI设计</a></li>
              <li class="list-group-item"><a href="column.php">PHP开发</a></li>
              <li class="list-group-item"><a href="column.php">JAVA开发</a></li>
              <li class="list-group-item"><a href="column.php">网络营销</a></li>
              <li class="list-group-item list-group-item-success"><a href="publish.php">发布文章</a></li>
            </ul>
        </div>