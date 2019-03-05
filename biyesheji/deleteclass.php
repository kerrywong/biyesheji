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
<div id="Popup">

<!-- SubPopup -->
<div id="page">
	<div class="bacen">
	<div class="form_boxC">
		<table cellpadding="0" cellspacing="0" align="center">
			<form action="#" method="post">
			<tr>
				<th width="100">班级号码</th>
				<td><div class="txtbox floatL" style="width:200px;"><input id="id_class_html" name="id_class" type="text" size="18" ></div></td>
			</tr>
			<tr>
				<th width="100">班级名称</th>
				<td><div class="txtbox floatL" style="width:200px;"><input id="name_class_html" name="" type="text" size="18" ></div></td>
			</tr>
			<tr>
				<th width="100">类型</th>
				<td>
					<div class="txtbox floatL" style="width:200px;">
					<select id="type_class_html1" style="width:205px;height: 40px;" hidden>
							<option value="2">校公选</option>
							<option value="1">必修课</option>
							<option value="0">班级</option>
					</select>
					<input id="type_class_html2" name="" type="text" size="18" >
						
					</div>
				</td>
			</tr>
			<tr>
				<th>授课老师</th>
				<td><div class="txtbox floatL" style="width:200px;"><input id="teacher_class_html" type="text" size="18" ></div></td>
			</tr>
			<tr id="create_date_id">
				<th>创建时间</th>
				<td><div class="txtbox floatL" style="width:200px;"><input id="createdate_class_html" type="text" size="18" ></div></td>
			</tr>
			<tr>
			
				<th>备注</th>
				<td><div class="txtbox"><textarea id="info_class_html" name="" cols="25" rows="5"> </textarea></div></td>
			</tr>
			<tr>
				<th></th>
				<td>
					<div class="bbD">
						<div class="btn_box" style="display: inline-block">
							<input type="submit" value="查询" class="btn_ok btn_yes">
						</div>
						<div class="btn_box" style="display: inline-block">
							<input type="button" value="更改" id="updatebtn1" class="btn_ok btn_yes" >
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
	</div>
			
			</form>
			
		</table>
		<script type="text/javascript">
			$(function(){
				 $("#updatebtn1").click(function(){
				 	$("#create_date_id").hide();
				 	$("#type_class_html2").hide();
		        	$("#type_class_html1").show();
				 });
			});
		</script>
		<script class="type/javascript" src="js/jquery-1.10.1.min.js"></script>
		<script type="text/javascript">
		    $(function(){
		        //按钮单击时执行
		        console.log("hah");
		        $("#updatebtn").click(function(){
		        
		            var id_class=document.getElementById('id_class_html').value;
		            var name_class=document.getElementById('name_class_html').value;
		            var teacher_class=document.getElementById('teacher_class_html').value;
		            var info_class=document.getElementById('info_class_html').value;
		            var typeclass=document.getElementById('type_class_html1');
			        var index_typeclass=typeclass.selectedIndex;
			        var var_typeclass=typeclass.options[index_typeclass].value;
			        var r=confirm("你真的要更改吗？");
			        if(r==true){
			        	if(""==id_class||""==name_class||""==teacher_class||""==info_class){
			        		alert("所有选项都要填写完整");
			        	}else{
			        		var html = $.ajax({
			               	type: "POST",
			               	url: "update.php",
			               	data: "classid="+id_class+
			               	"&classname="+name_class+
			               	"&classteacher="+teacher_class+
			               	"&classinfo="+info_class+
			               	"&classtype="+var_typeclass,
			               	async: false
			
				            }).responseText;
				        	alert(html);
			        	}
			        	document.getElementById('id_class_html').value="";
			            document.getElementById('name_class_html').value="";
			            document.getElementById('info_class_html').value="";
			            document.getElementById('teacher_class_html').value="";
			        }else{
			        	document.getElementById('id_class_html').value="";
				        document.getElementById('name_class_html').value="";
				        document.getElementById('info_class_html').value="";
				        document.getElementById('teacher_class_html').value="";
			        }
		         });
		    });

		</script>
		<script class="type/javascript" src="js/jquery-1.10.1.min.js"></script>
		<script type="text/javascript">
		    $(function(){
		        //按钮单击时执行
		        $("#deletebtn").click(function(){
		            var id_class=document.getElementById('id_class_html').value;
//		            console.log('start');
		            if(""==id_class){
//		            	console.log('hello');
		            	alert("请输入ID");
		            }else{
		            	r=confirm("你真的要删除吗？");
		            	if(r==true){
		            		var html = $.ajax({
			               	type: "POST",
			               	url: "delete.php",
			               	data: "classid="+id_class,
			               	async: false
			
				            }).responseText;
				        alert(html);
				        document.getElementById('id_class_html').value="";
			            document.getElementById('name_class_html').value="";
			            document.getElementById('info_class_html').value="";
			            document.getElementById('teacher_class_html').value="";
			            document.getElementById('createdate_class_html').value="";
		            	}else{
		            		document.getElementById('id_class_html').value="";
				            document.getElementById('name_class_html').value="";
				            document.getElementById('info_class_html').value="";
				            document.getElementById('teacher_class_html').value="";
				            document.getElementById('createdate_class_html').value="";
		            	}
		            	
		            }
		              //Ajax调用处理
		         });
		    });

		</script>
	</div>
	</div>
</div>
<!-- SubPopup -->



<?php
	require "/php/query_db.php";
	if(isset($_POST['id_class'])){
		$id_name_php=$_POST['id_class'];
		$arr=queryMysql('biyesheji','tb_class',"ID_class='$id_name_php'");
		if(count($arr)==0){
			echo "<script class='type/javascript'> alert('没有符合条件的人员');</script>";
		}else{
			if($arr[0]['type_class']==2){
				$rolestring="校公选";
			}else if($arr[0]['type_class']==1){
				$rolestring="必修";
			}else{
				$rolestring="行政班级";
			}
			
			echo "<script class='type/javascript'>";
			echo "document.getElementById('id_class_html').value='".$id_name_php."';";
			echo "document.getElementById('type_class_html2').value='".$rolestring."';";
			echo "document.getElementById('name_class_html').value='".$arr[0]['name_class']."';";
			echo "document.getElementById('teacher_class_html').value='".$arr[0]['teacher_class']."';";
			echo "document.getElementById('createdate_class_html').value='".$arr[0]['createdate_class']."';";
			echo "document.getElementById('info_class_html').value='".$arr[0]['info_class']."';";
			echo "</script>";
		}	
	}
	
?>
<!-- /Popup -->
</body>
</html>