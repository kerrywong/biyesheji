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
<div id="SubPopup">

	<div class="form_boxC">
		<table cellpadding="0" cellspacing="0" align="center">
			<form action="#" method="post">
			<tr>
				<th width="100">新闻号</th>
				<td><div class="txtbox floatL" style="width:200px;"><input id="id_new1" name="id_new" type="text" size="18" ></div></td>
			</tr>	
			<tr>
				<th width="100">时间</th>
				<td><div class="txtbox floatL" style="width:200px;"><input id="time_new" name="time_new" type="text" size="18" ></div></td>
			</tr>
			<tr>
				<th width="100">发布者</th>
				<td><div class="txtbox floatL" style="width:200px;"><input id="announcer_new" name="" type="text" size="18" ></div></td>
			</tr>
			<tr>
				<th>标题</th>
				<td><div class="txtbox floatL" style="width:200px;"><input id="title_new" type="text" size="18" ></div></td>
			</tr>
			<tr>
			
				<th>内容</th>
				<td><div class="txtbox"><textarea id="content_new" name="" cols="25" rows="5"> </textarea></div></td>
			</tr>
			<tr>
			
				<th>类型</th>
				<td><div class="txtbox floatL"><input id="type_new"  type="text" size="18"> </input></div></td>
			</tr>
			<tr>
				<th></th>
				<td>
					<div class="bbD">
						<div class="btn_box" style="display: inline-block">
							<input type="submit" value="查询" class="btn_ok btn_yes">
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
		            var id_new=document.getElementById('id_new1').value;
		            var r=confirm("你真的要添加吗？");
		            if(r==true) {
		            	if(""==id_new){
			            	alert("请输入ID");
			            }else{
			            	var html = $.ajax({
			               	type: "POST",
			               	url: "delete.php",
			               	data: "newid="+id_new,
			               	async: false
			
				            }).responseText;
				            	alert(html);
			            }
		            }else{
		            	document.getElementById('id_new').value="";
		            	document.getElementById('time_new').value="";
		            	document.getElementById('announcer_new').value="";
		            	document.getElementById('title_new').value="";
		            	document.getElementById('content_new').value="";
		            	document.getElementById('type_new').value="";
		            }
		            
		              //Ajax调用处理
		         });
		    });

		</script>
	</div>
	
</div>
<!-- SubPopup -->



<?php
	require "/php/query_db.php";
	if(isset($_POST['id_new'])){
		$id_name_php=$_POST['id_new'];
		$arr=queryMysql('biyesheji','tb_new',"ID_new='$id_name_php'");
		if(count($arr)==0){
			echo "<script class='type/javascript'> alert('没有符合条件的人员');</script>";
		}else{
			$type=$arr[0]['type_new'];
			if($type==0){
				$typestring="通知";
			}else if($type==1){
				$typestring="学生委员会";
			}else if($type==2){
				$typestring="双创中心";
			}else if($type==3){
				$typestring="活动";
			}else if($type==4){
				$typestring="就业";
			}else if($type==5){
				$typestring="竞赛";
			}else if($type==6){
				$typestring="考试";
			}else if($type==7){
				$typestring="作业";
			}else{
				$typestring="";
			}
			echo "<script class='type/javascript'>";
			echo "document.getElementById('id_new1').value='".$arr[0]['ID_new']."';";
			echo "document.getElementById('time_new').value='".$arr[0]['date_new']."';";
			echo "document.getElementById('announcer_new').value='".$arr[0]['createrName_new']."';";
			echo "document.getElementById('title_new').value='".$arr[0]['title_new']."';";
			echo "document.getElementById('content_new').value='".$arr[0]['content_new']."';";
			echo "document.getElementById('type_new').value='".$typestring."';";
			echo "</script>";
		}	
	}
	
?>
<!-- /Popup -->
</body>
</html>