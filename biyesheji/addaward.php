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
					<th width="100">学号</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="id_stu" name="id_user" type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th width="100">证明机构</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="proveins_punish" name="" type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th>证明人</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="prover_punish" type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th>内容</th>
					<td><div class="txtbox"><textarea id="content_punish" name="" cols="25" rows="5"> </textarea></div></td>`
				</tr>
				<tr>
					<th></th>
					<td>
					<div class="bbD">
						<div class="btn_box" style="display: inline-block">
							<input type="submit" value="添加" class="btn_ok btn_yes" id="addbtn">
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
		            var id_stuname    = document.getElementById('id_stu').value;
			        var proveins_award= document.getElementById('proveins_punish').value;
			        var prover_award  = document.getElementById('prover_punish').value;
			        var content_award = document.getElementById('content_punish').value;
		            var r=confirm("你真的要添加吗？");
					if(r==true){
						if(""==id_stuname||""==prover_award||""==content_punish||""==proveins_award){
		            	alert("所有内容是必填项目");
			            }else{
			            	var html = $.ajax({
			               	type: "POST",
			               	url: "add.php",
			               	data: "info_userid="+id_stuname+"&info_type=1"+"&info_proveins="+proveins_award+"&info_prover="+prover_award+"&info_content="+content_award,
			               		  
			               	async: false
			
				            }).responseText;
				            	alert(html);
			            }
			            document.getElementById('id_stu').value="";
				        document.getElementById('proveins_punish').value="";
				        document.getElementById('prover_punish').value="";
				        document.getElementById('content_punish').value="";
					}else{
						document.getElementById('id_stu').value="";
				        document.getElementById('proveins_punish').value="";
				        document.getElementById('prover_punish').value="";
				        document.getElementById('content_punish').value="";
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
</html>