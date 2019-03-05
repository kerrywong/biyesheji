<?php session_start(); 
	if(isset($_SESSION['name'])){
?>
<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>首页</title>
	</head>
	<frameset rows="100,*" cols="*" scrolling="No" framespacing="0" frameborder="no" border="0"> 
		<frame src="head.php"name="headmenu" id="mainFrame" title="mainFrame"><!-- 引用头部 -->
	<!-- 引用左边和主体部分 --> 
	<frameset rows="100*" cols="220,*" scrolling="No" framespacing="0" frameborder="no" border="0"> 
		<frame src="left.html" name="leftmenu" id="mainFrame" title="mainFrame">
		<frame src="main.php" name="main" scrolling="yes" noresize="noresize" id="rightFrame" title="rightFrame"></frameset>
	</frameset>

</html>
<?php 
	}
	?>
<?php
	if(!isset($_SESSION['name'])){
		echo "<script class='type/javascipt'> alert('未登录自动跳转登录界面');parent.location.href='./login.html'</script>";
	}
	?>