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
					<th width="100">课程号</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="id_class" name="id_class" type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th>类型</th>
					<td>
						<select id="type_class" style="width:205px;height: 40px;" >
							<option value="2">校公选</option>
							<option value="1">必修课</option>
							<option value="0">班级</option>
						</select>
						
					</td>

				</tr>
				<tr>
					<th width="100">课程名称</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="name_class" name="id_class" type="text" size="18" ></div></td>
				</tr>
				<tr id="teacher_class_tr">
					<th width="100">授课老师</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="teacher_class" name="teacher_class" type="text" size="18" ></div>填写账号</td>
				</tr>
				<tr>
					<th width="100">上课时间</th>
					<!--<td><div class="txtbox floatL" style="width:200px;"><input id="date_class" name="teacher_class" type="text" size="18" >例：星期一12节</div></td>-->
					<td>
						<select id="date_day_class" style="width:205px;height: 40px;" >
							<option value="星期一">星期一</option>
							<option value="星期二">星期二</option>
							<option value="星期三">星期三</option>
							<option value="星期四">星期四</option>
							<option value="星期五">星期五</option>
						</select>
						<select id="date_num_class" style="width:205px;height: 40px;" >
							<option value="1-2">1-2节</option>
							<option value="3-4">3-4节</option>
							<option value="5-6">5-6节</option>
							<option value="7-8">7-8节</option>
						</select>
					</td>
				</tr>
				<tr>
				
					<th>简介</th>
					<td><div class="txtbox"><textarea id="info_class" name="" cols="20" rows="5"> </textarea></div></td>`
				</tr>
				
					
				
				<tr>
					<th width="100">上课地点</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="address_class" name="id_class" type="text" size="18" ></div></td>
				</tr>
				</tr>
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
		            var id_class=document.getElementById('id_class').value;
		            var name_class=document.getElementById('name_class').value;
		            var info_class=document.getElementById('info_class').value;
		            var teacher_class=document.getElementById('teacher_class').value;
		            //选择课程类型
		            var obj1=document.getElementById('type_class');
					var index1=obj1.selectedIndex;
					var val1=obj1.options[index1].value;
					var obj2=document.getElementById('date_day_class');
					var index2=obj2.selectedIndex;
					var val2=obj2.options[index2].value;
					var obj3=document.getElementById('date_num_class');
					var index3=obj3.selectedIndex;
					var val3=obj3.options[index3].value;
					var date_class=val2+"."+val3;
					//选择上课日期
					//选择课程地点
		            var address_class=document.getElementById('address_class').value;
		            var r=confirm("你真的要添加吗？");
					if(r==true){
						if(""==id_class||""==name_class||""==address_class){
		            	alert("请输入班级号、班级名称、上课地址");
			            }else{
			            	console.log("askjdf");
			            	var html = $.ajax({
			               	type: "POST",
			               	url: "add.php",
			               	data: "class_id="+id_class
			               	+"&class_type="+val1
			               	+"&class_info="+info_class
			               	+"&class_name="+name_class
			               	+"&class_teacher_ID="+teacher_class
			               	+"&class_date="+date_class
			               	+"&class_address="+address_class,
			               	async: false
			
				            }).responseText;
				            	alert(html);
				            
			            }
			            document.getElementById('id_class').value="";
			            document.getElementById('name_class').value="";
			            document.getElementById('info_class').value="";
			            document.getElementById('teacher_class').value="";
		            	document.getElementById('address_class').value="";
			            
			            
					}else{
						document.getElementById('id_class').value="";
			            document.getElementById('name_class').value="";
			            document.getElementById('info_class').value="";
			            document.getElementById('teacher_class').value="";
		            	document.getElementById('address_class').value="";
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