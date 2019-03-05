<?php session_start(); 
	if(isset($_SESSION['name'])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部</title>
<link rel="stylesheet" type="text/css" href="css/public.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/public.js"></script>
</head>

<body>
	<!-- 头部 -->
	<div class="head">
		<div class="headL">
			<img class="headLogo" src="img/logLOGO.png"/>
		</div>
		<div class="headR">
			<span id="getname" style="color:#FFF">
				<?php 
					echo $_SESSION['name'];	
				?>
			</span> 
			<a rel="external" onclick="toLogin();">【退出】</a>
		</div>
		<script type="text/javascript">{
			function toLogin(){
				parent.location.href="login.html";
			}
		}</script>
	</div>
</body>
</html>
<?php 
	}
	?>
<?php
	if(!isset($_SESSION['name'])){
		echo "<script class='type/javascipt'> alert('未登录自动跳转登录界面');parent.location.href='./login.html'</script>";
	}
	?>

