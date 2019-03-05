<?php
	session_start();
	if(!isset($_SESSION['name'])){
		echo "<script class='type/javascipt'> alert('未登录自动跳转登录界面');parent.location.href='./login.html'</script>";
	}
	?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改密码</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		
		<div class="page ">
			<!-- 修改密码页面样式 -->
			<div class="bacen">
				<div class="bbD">
					&nbsp;&nbsp;&nbsp;&nbsp;输入旧密码：<input type="password" 
						 id="pwd1" /> <img class="imga"
						src="img/ok.png" /><img class="imgb" src="img/no.png" />
				</div>
				<div class="bbD">
					&nbsp;&nbsp;&nbsp;&nbsp;输入新密码：<input type="password"
						 id="pwd2" /> <img class="imga"
						src="img/ok.png" /><img class="imgb" src="img/no.png" />
				</div>
				<div class="bbD">
					再次确认密码：<input type="password" 
						id="pwd3" /> <img class="imga" src="img/ok.png" /><img
						class="imgb" src="img/no.png" />
				</div>
				<div class="bbD">
					<p class="bbDP">
						<button class="btn_ok btn_yes" id="changepwd">提交</button>
						<a class="btn_ok btn_no" href="#">取消</a>
					</p>
				</div>
			</div>

			<!-- 修改密码页面样式end -->
		</div>
	</div>
</body>
<script type="text/javascript">
	$(function(){
		$("#changepwd").click(function(){
			var js_pwd1 	  = document.getElementById('pwd1').value;
			var js_pwd2 	  = document.getElementById('pwd2').value;
			var js_pwd3 	  = document.getElementById('pwd3').value;
			var r=confirm("你真的要更改吗？");
			if(r==true){
				if(""==js_pwd1||""==js_pwd2||""==js_pwd3||(!(js_pwd2==js_pwd3))){
					alert("所有内容是必填项目且新密码输入两次要正确");
				}else{
					var html = $.ajax({
			               	type: "POST",
			               	url: "update.php",
			               	data: "old_superadmin_pwd="+js_pwd1+"&new_superadmin_pwd="+js_pwd2,
			               		  
			               	async: false
			
				            }).responseText;
				            	alert(html+"自动跳转登录界面");
				            	parent.location.href='./login.html'
				        
				}
			}else{
			document.getElementById('pwd1').value="";
			document.getElementById('pwd2').value="";
			document.getElementById('pwd3').value="";
			
			}
		});
	});
</script>
</html>