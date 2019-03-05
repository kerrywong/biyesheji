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
					<td><div class="txtbox floatL" style="width:200px;"><input id="id_stu" name="id_user" type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th width="100">密码</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="pwd_stu" name="" type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th>身份</th>
					<td>
						<div class="txtbox floatL" style="width:200px;">
							<select id="role_stu2" hidden style="width: 200px;height:30px;">
							<option value="2">教师</option>
							<option value="1">管理员</option>
							<option value="0">超级管理员</option>
							<input id="role_stu1" name="" type="text" size="18" >
						</div>
					</td>
					

				<tr>
				<tr>
					<th>所在院系</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="class_stu" type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th>头像</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="image_stu" type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th>用户名</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="name_stu" type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th>性别</th>
					<td>
						<div class="txtbox floatL" style="width:200px;">
							<select id="gender_stu2" hidden style="width: 200px;height:30px;" hidden>
							<option value="2">未知</option>
							<option value="1">男性</option>
							<option value="0">女性</option>
							<input id="gender_stu1" name="" type="text" size="18" >
						</div>
					</td>
				</tr>
				<tr>
					<th>手机号</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="tel_stu" type="text" size="18" ></div></td>
				</tr>
					<th>邮箱</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="email_stu" name="" type="text" size="18" ></div></td>
				</tr>
				</tr>
					<th>工作单位</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="work_stu" name="" type="text" size="18" ></div></td>
				</tr>
				</tr>
					<th>微信</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="wechat_stu" name="" type="text" size="18" ></div></td>
				</tr>
				</tr>
					<th>QQ</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="QQ_stu" name="" type="text" size="18" ></div></td>
				</tr>
				<tr>
				
					<th>备注</th>
					<td><div class="txtbox"><textarea id="other_stu" name="" cols="25" rows="5"> </textarea></div></td>`
				</tr>
				<tr>
					<th></th>
					<td>
					<div class="bbD">
						<div class="btn_box" style="display: inline-block">
							<input type="submit" value="查询" class="btn_ok btn_yes">
						</div>
						<div class="btn_box" style="display: inline-block">
							<input type="button" value="更改" id="updatebtn1" class="btn_ok btn_yes">
						</div>
						<div class="btn_box" style="display: inline-block">
							<input type="button" value="提交" id="updatebtn" class="btn_ok btn_yes">
						</div>
						<div class="btn_box" style="display: inline-block">
							<input type="button" value="删除" id="deletebtn" class="btn_ok btn_yes">
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
		        $("#deletebtn").click(function(){
		            var id_stuname=document.getElementById('id_stu').value;
		            var r=confirm("你真的要删除吗？");
//		            console.log('start');
					if(r==true){
						if(""==id_stuname){
//		            	console.log('hello');
		            	alert("请输入ID");
			            }else{
			            	var html = $.ajax({
			               	type: "POST",
			               	url: "delete.php",
			               	data: "userid="+id_stuname,
			               	async: false
			
				            }).responseText;
				            	alert(html);
			            }
			            document.getElementById('id_stu').value="";
			            document.getElementById('pwd_stu').value="";
			            document.getElementById('role_stu1').value="";
			            document.getElementById('class_stu').value="";
			            document.getElementById('gender_stu').value="";
			            document.getElementById('image_stu').value="";
			            document.getElementById('name_stu').value="";
			            document.getElementById('tel_stu').value="";
			            document.getElementById('email_stu').value="";
			            document.getElementById('wechat_stu').value="";
			            document.getElementById('QQ_stu').value="";
					}else{
						document.getElementById('id_stu').value="";
			            document.getElementById('pwd_stu').value="";
			            document.getElementById('role_stu').value="";
			            document.getElementById('class_stu').value="";
			            document.getElementById('gender_stu').value="";
			            document.getElementById('image_stu').value="";
			            document.getElementById('name_stu').value="";
			            document.getElementById('tel_stu').value="";
			            document.getElementById('email_stu').value="";
			            document.getElementById('wechat_stu').value="";
			            document.getElementById('QQ_stu').value="";
					}
		            
		              //Ajax调用处理
		         });
		    });
			
		</script>
		<script class="type/javascript" src="js/jquery-1.10.1.min.js"></script>
		<script type="text/javascript"> 
			$(function(){
				 $("#updatebtn1").click(function(){
				 	$("#role_stu1").hide();
		        	$("#role_stu2").show();
		        	$("#gender_stu1").hide();
		        	$("#gender_stu2").show();
				 });
			});
		</script>
		<script type="text/javascript">
			$(function(){
		        //按钮单击时执行
		        $("#updatebtn").click(function(){
		            var id_stuname=document.getElementById('id_stu').value;
			        var pwd_stuname=document.getElementById('pwd_stu').value;
			        
			       
			        var class_stuname=document.getElementById('class_stu').value;
			        var image_stuname=document.getElementById('image_stu').value;
			        var name_stuname=document.getElementById('name_stu').value;
			        var tel_stuname=document.getElementById('tel_stu').value;
			        var email_stuname=document.getElementById('email_stu').value;
			        var work_stuname=document.getElementById('work_stu').value;
			        var wechat_stuname=document.getElementById('wechat_stu').value;
			        var QQ_stuname=document.getElementById('QQ_stu').value;
			        var role_stuname=document.getElementById('role_stu2');
			        var index_role=role_stuname.selectedIndex;
			        var var_role=role_stuname.options[index_role].value;
			        var gender_stuname=document.getElementById('gender_stu2');
			        var index_gender=gender_stuname.selectedIndex;
			        var gender_stuname=gender_stuname.options[index_gender].value;
		            var r=confirm("你真的要更改吗？");
					if(r==true){
						if(""==id_stuname||""==pwd_stuname){
		            	alert("学号 密码 是必填项目");
			            }else{
			            	var html = $.ajax({
			               	type: "POST",
			               	url: "update.php",
			               data: "userid="+id_stuname+"&userpwd="+pwd_stuname+"&userrole="+var_role+"&userclass="+class_stuname+"&usergender="+gender_stuname+"&userimage="+image_stuname+"&username="
			               	+name_stuname+"&usertel="+tel_stuname+"&useremail="+email_stuname+"&userwork="+work_stuname+"&userwechat="+wechat_stuname+"&userQQ="+QQ_stuname,
			               		  
			               	async: false
			
				            }).responseText;
				            	alert(html);
			            }
			            document.getElementById('id_stu').value="";
			            document.getElementById('pwd_stu').value="";
			            document.getElementById('role_stu').value="";
			            document.getElementById('class_stu').value="";
			            document.getElementById('gender_stu').value="";
			            document.getElementById('image_stu').value="";
			            document.getElementById('name_stu').value="";
			            document.getElementById('tel_stu').value="";
			            document.getElementById('email_stu').value="";
			            document.getElementById('wechat_stu').value="";
			            document.getElementById('QQ_stu').value="";
					}else{
						document.getElementById('id_stu').value="";
			            document.getElementById('pwd_stu').value="";
			            document.getElementById('role_stu').value="";
			            document.getElementById('class_stu').value="";
			            document.getElementById('gender_stu').value="";
			            document.getElementById('image_stu').value="";
			            document.getElementById('name_stu').value="";
			            document.getElementById('tel_stu').value="";
			            document.getElementById('email_stu').value="";
			            document.getElementById('wechat_stu').value="";
			            document.getElementById('QQ_stu').value="";
					}
		            
		              //Ajax调用处理
		         });
		    });
		</script>
	</div>
	</div>
</div>

<?php
	require "/php/query_db.php";
	if(isset($_POST['id_user'])){
		$id_name_php=$_POST['id_user'];
		$arr=queryMysql('biyesheji','tb_user',"ID_user='$id_name_php'");
		if(count($arr)==0){
			echo "<script class='type/javascript'> alert('没有符合条件的人员');</script>";
		}else{
			if($arr[0]['role_user']==3){
				$rolestring="学生";
			}else if($arr[0]['role_user']==2){
				$rolestring="老师";
			}else if($arr[0]['role_user']==1){
				$rolestring="管理员";
			}else{
				$rolestring="超级管理员";
			}
			if($arr[0]['gender_user']==1){
				$genderstring="男";
			}else if($arr[0]['gender_user']==0){
				$genderstring="女生";
			}else{
				$genderstring="保密";
			}
			echo "<script class='type/javascript'>";
			echo "document.getElementById('id_stu').value='".$arr[0]['ID_user']."';";
			echo "document.getElementById('pwd_stu').value='".$arr[0]['password_user']."';";
			echo "document.getElementById('role_stu1').value='".$rolestring."';";
			echo "document.getElementById('class_stu').value='".$arr[0]['class_user']."';";
			echo "document.getElementById('image_stu').value='".$arr[0]['image_user']."';";
			echo "document.getElementById('name_stu').value='".$arr[0]['name_user']."';";
			echo "document.getElementById('gender_stu1').value='".$genderstring."';";
			echo "document.getElementById('tel_stu').value='".$arr[0]['tel_user']."';";
			echo "document.getElementById('email_stu').value='".$arr[0]['email_user']."';";
			echo "document.getElementById('work_stu').value='".$arr[0]['work_user']."';";
			echo "document.getElementById('wechat_stu').value='".$arr[0]['wechat_user']."';";
			echo "document.getElementById('QQ_stu').value='".$arr[0]['QQ_user']."';";
			echo "</script>";
		}	
	}
	
?>
<!-- /Popup -->
</body>
</html>