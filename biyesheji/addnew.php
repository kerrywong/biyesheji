<?php
	session_start();
	if(!isset($_SESSION['name'])){
		echo "<script class='type/javascipt'> alert('未登录自动跳转登录界面');parent.location.href='./login.html'</script>";
	}
	header("Content-Type: text/html;charset=utf-8"); 
	?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
<link href="css/haiersoft.css" rel="stylesheet" type="text/css" media="screen, print" />
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
	
	
<script class="type/javascript" src="js/jquery-1.10.1.min.js"></script>
		<script type="text/javascript">
			$(function(){
		        //按钮单击时执行
		        $("#addbtn").click(function(){
		            var announcer = document.getElementById('announcer_new').value;
			        var title= document.getElementById('title_new').value;
			        var content= document.getElementById('content_new').value;
			        var obj2=document.getElementById('type_new');
					var index2=obj2.selectedIndex;
					var val_new=obj2.options[index2].value;
		            var r=confirm("你真的要添加吗？");
					if(r==true){
						if(""==announcer||""==title||""==content){
		            	alert("所有内容是必填项目");
			            }
			            else{
			            	var html = $.ajax({
			               		type: "POST",
			               		url: "add.php",
			               		data: "newannouncerid="+announcer+"&newtitle="+title+"&newcontent="+content+"&newtype="+val_new,
			               		  
			               		async: false
			
				            }).responseText;
				            	alert(html);
			            }
				        document.getElementById('announcer_new').value="";
				        document.getElementById('title_new').value="";
				        document.getElementById('content_new').value="";
					}else{
				        document.getElementById('announcer_new').value="";
				        document.getElementById('title_new').value="";
				        document.getElementById('content_new').value="";
					}
		            
		              //Ajax调用处理
		         });
		    });
			</script>
<!-- SubPopup -->
<div id="page">
	<div class="bacen">
	<div class="form_boxC">
		<table cellpadding="0" cellspacing="0" align="center">
			<form action="#" method="post">
				<tr>
					<th width="100">发布者</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="announcer_new" name="id_user" type="text" size="18" ></div></td>
				</tr>
				
				<tr>
					<th>标题</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="title_new" type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th>内容</th>
					<td><div class="txtbox"><textarea id="content_new" name="" cols="25" rows="5"> </textarea></div></td>`
				</tr>
				<tr>
					<th width="100">针对人群</th>
					<td>
						<div class="txtbox floatL" style="width:200px;">
							<select id="type_new" style="width: 200px;height: 30px;">
								<option value="7">作业</option>
								<option value="6">考试</option>
								<option value="5">竞赛</option>
								<option value="4">就业</option>								
								<option value="3">活动</option>
								<option value="2">双创中心</option>
								<option value="1">学生委员会</option>
								<option value="0">全体</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
					<div class="bbD">
						<div class="btn_box" style="display: inline-block">
							<input type="button" value="添加"  class="btn_ok btn_yes" id="addbtn">
						</div>
					</div>
					</td>
				</tr>
			</form>
			
		</table>
		
	</div>
	</div>
</div>
<!-- /Popup -->
</body>


</html>