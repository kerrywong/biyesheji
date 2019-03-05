<?php
	session_start();
	if(!isset($_SESSION['name'])){
		echo "<script class='type/javascipt'> alert('未登录自动跳转登录界面');parent.location.href='./login.html'</script>";
	}
	?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="generator" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/haiersoft.css" rel="stylesheet" type="text/css" media="screen,print" />
<link href="css/print.css" rel="stylesheet" type="text/css"  media="print" />
<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/side.js" type="text/javascript"></script>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body>
<!-- wrap_left -->

<!-- /wrap_left -->

<!-- picBox -->
<div class="picBox" onClick="switchSysBar()" id="switchPoint"></div>
<!-- /picBox -->



<!-- wrap_right -->
<div class="wrap_right">
<header>
<!-- Header -->

<!-- /Header -->
</header>


<!-- Contents -->
<div id="Contents">

<!-- MainForm -->
<div id="MainForm">
<div class="form_boxB">
<table cellpadding="0" cellspacing="0">
<tr>
	<td colspan="10" class="info_boxA">
		<form action="main.php" method="get">
			<input type="text" name="id_user" />
			<input type="submit" value="查询" />*表示查询所有
			
		</form>
	</td>
	<td>
		
	</td>
</tr>
<tr>
<th>序号</th>
<th>学号</th>
<th>密码</th>
<th>身份</th>
<th>头像</th>
<th>性别</th>
<th>手机号</th>
<th>邮箱</th>
<th>班级</th>
<th>微信</th>
<th>QQ</th>
</tr>
<?php
	require "/php/query_db.php";
	if(isset($_GET['id_user'])){
		$id_name_php=$_GET['id_user'];
		if($id_name_php=="*"){
			$arr=queryMysql('biyesheji','tb_user',"1 order by ID_user ASC");
		}else{
			$arr=queryMysql('biyesheji','tb_user',"ID_user='$id_name_php'");
		}
		if(count($arr)==0){
			echo "<script class='type/javascript'> alert('没有符合条件的人员');</script>";
		}else{
			for($i=0;$i<=count($arr)-1;$i++){
				echo "<tr>";
				echo "<td>".($i+1)."</td>";
				echo "<td>".$arr[$i]['ID_user']."</td>";
				echo "<td>".$arr[$i]['password_user']."</td>";
				if($arr[$i]['role_user']==3){
					$rolestring="学生";
				}else if($arr[$i]['role_user']==2){
					$rolestring="老师";
				}else if($arr[$i]['role_user']==1){
					$rolestring="管理员";
				}else{
					$rolestring="超级管理员";
				}
				echo "<td>".$rolestring."</td>";
				echo "<td>".$arr[$i]['name_user']."</td>";
				if($arr[$i]['gender_user']==1){
					$genderstring="男";
				}else if($arr[$i]['gender_user']==0){
					$genderstring="女生";
				}else{
					$genderstring="保密";
				}
				echo "<td>".$genderstring."</td>";
				echo "<td>".$arr[$i]['tel_user']."</td>";
				echo "<td>".$arr[$i]['email_user']."</td>";
				echo "<td>".$arr[$i]['work_user']."</td>";
				echo "<td>".$arr[$i]['wechat_user']."</td>";
				echo "<td>".$arr[$i]['QQ_user']."</td>";
				echo "</tr>";
			}
		}	
	}
	
	

	
	
?>
</table>
</div>
</div>
<!-- /MainForm -->


<!-- BtmMain -->
<!-- /txtbox -->

<!-- btn_box -->

<!-- /wrap_right -->
</body>
</html>
