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
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
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
<!-- Popup -->
<!--<div id="Popup">-->

<!-- SubPopup -->
<div id="page">
	<div class="bacen">
	<div class="form_boxC">
		<table cellpadding="0" cellspacing="0" align="center">
			<form action="#" method="post">
				<tr>
					<th width="100">工号</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="id_admin" name="id_user" type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th width="100">密码</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="pwd_admin" name="" type="password" size="18" ></div></td>
				</tr>
				
				<tr>
					<th>性别</th>
					<td>
						<select id="gender_admin">
							<option value="2">未知</option>
							<option value="1">男</option>
							<option value="0">女</option>
						</select>	
					</td>

				<tr>
				<tr>
					<th>身份</th>
					<td>
						<select id="role_admin">
							<option value="2">教师</option>
							<option value="1">管理员</option>
							<option value="0">超级管理员</option>
							
						</select>	
					</td>

				<tr>
					<th></th>
					<td>
					<div class="bbD">
						<div class="btn_boxB mag_l20" style="display: inline-block">
							<input type="button" value="添加" id="addbtn" class="btn_ok btn_yes">
						</div>
					</div>
					</td>
				</tr>
			</form>
			
		</table>
		<script class="type/javascript" src="js/jquery-1.10.1.min.js"></script>
		<script type="text/javascript">
		    $(function(){
		        //按钮单击时执行
		        $("#addbtn").click(function(){
		            var id_stuname=document.getElementById('id_admin').value;
		            var pwd_stuname=document.getElementById('pwd_admin').value;
		            var obj1=document.getElementById('gender_admin');
					var index1=obj1.selectedIndex;
					var val_gender=obj1.options[index1].value;
					var obj2=document.getElementById('role_admin');
					var index2=obj2.selectedIndex;
					var val_role=obj2.options[index2].value;
		            var r=confirm("你真的要添加吗？");
					if(r==true){
						if(""==id_stuname||""){
		            	alert("请输入ID");
			            }else{
			            	
			            	var html = $.ajax({
			               	type: "POST",
			               	url: "add.php",
			               	data: "userid="+id_stuname+"&userpwd="+pwd_stuname+"&usergender="+val_gender+"&userrole="+val_role,
			               	async: false
			
				            }).responseText;
				            	alert(html);
				            
			            }
			            document.getElementById('id_stu').value="";
			            document.getElementById('pwd_stu').value="";
					}else{
						document.getElementById('id_stu').value="";
			            document.getElementById('pwd_stu').value="";
					}
		            
		              //Ajax调用处理
		         });
		    });
	
		

		</script>
	</div>
	</div>
</div>
<!-- /Popup -->
</body>
</html>>