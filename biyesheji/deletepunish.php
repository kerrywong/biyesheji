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
<div id="page">
	<div class="bacen">
	<div class="form_boxC">
		<table cellpadding="0" cellspacing="0" align="center">
			<form action="#" method="post">
				<tr>
					<th width="100">信息号</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="id_info"  name="id_info" type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th width="100">学号</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="id_user"  type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th width="100">时间</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="date_punish" type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th width="100">经办机构</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="proveins_punish" type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th>经办人</th>
					<td><div class="txtbox floatL" style="width:200px;"><input id="prover_punish" type="text" size="18" ></div></td>
				</tr>
				<tr>
					<th>内容</th>
					<td><div class="txtbox floatL" style="width:300px;"><input id="content_punish" type="text" size="30" ></div></td>
				</tr>
				<tr>
					<th></th>
					<td>
					<div class="bbD">
						<div class="btn_box" style="display: inline-block">
							<input type="submit" value="查询" class="btn_ok btn_yes">
						</div>
						<div class="btn_box" style="display: inline-block">
							<input type="button" value="更改" id="updatebtn" class="btn_ok btn_yes">
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
		        $("#updatebtn").click(function(){
		        	var id_info 	  = document.getElementById('id_info').value;
		            var id_user_punish = document.getElementById('id_user').value;
			        var date_punish    = document.getElementById('date_punish').value;
			        var proveins_punish= document.getElementById('proveins_punish').value;
			        var prover_punish  = document.getElementById('prover_punish').value;
			        var content_punish = document.getElementById('content_punish').value;
		            var r=confirm("你真的要更改吗？");
					if(r==true){
						if((""==id_info)||(""==id_user_punish )||(""==prover_punish)||(""==content_punish)||(""==date_punish)||(""==proveins_punish)){
		            	alert("所有内容是必填项目");
			           }else{
			            	var html = $.ajax({
			               	type: "POST",
			               	url: "update.php",
			               	data: "info_id="+id_info+"&info_userid="+id_user_punish+"&info_date="+date_punish+"&info_type=0"+"&info_proveins="+proveins_punish+"&info_prover="+prover_punish+"&info_content="+content_punish,
			               		  
			               	async: false
			
				            }).responseText;
				            	alert(html);
			            }
			            document.getElementById('id_info').value="";
			            document.getElementById('id_user').value="";
				        document.getElementById('date_punish').value="";
				        document.getElementById('proveins_punish').value="";
				        document.getElementById('prover_punish').value="";
				        document.getElementById('content_punish').value="";
					}else{
						document.getElementById('id_info').value="";
			            document.getElementById('id_user').value="";
				        document.getElementById('date_punish').value="";
				        document.getElementById('proveins_punish').value="";
				        document.getElementById('prover_punish').value="";
				        document.getElementById('content_punish').value="";
					}
		            
		              //Ajax调用处理
		         });
		    });
		</script>
		<script type="text/javascript">
			$(function(){
		        //按钮单击时执行
		        $("#deletebtn").click(function(){
		        	var id_info 	  = document.getElementById('id_info').value;
		            var r=confirm("你真的要删除吗？");
					if(r==true){
						if(""==id_info){
		            	alert("信息号是必填项目");
			           }else{
			            	var html = $.ajax({
			               	type: "POST",
			               	url: "delete.php",
			               	data: "info_id="+id_info,
			               		  
			               	async: false
			
				            }).responseText;
				            	alert(html);
			            }
			            document.getElementById('id_info').value="";
			            document.getElementById('id_user').value="";
				        document.getElementById('date_punish').value="";
				        document.getElementById('proveins_punish').value="";
				        document.getElementById('prover_punish').value="";
				        document.getElementById('content_punish').value="";
					}else{
						document.getElementById('id_info').value="";
			            document.getElementById('id_user').value="";
				        document.getElementById('date_punish').value="";
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
<!-- SubPopup -->



<?php
	require "/php/query_db.php";
//	if(($_POST['id_info'])!=""){
	if(isset($_POST['id_info'])){
		$id_info2=$_POST['id_info'];
		$arr=queryMysql('biyesheji','tb_info',"ID_info=$id_info2 and type_info=0");
//		print_r( $arr);
		if(count($arr)==0){
			echo "<script class='type/javascript'> alert('没有符合条件的人员');</script>";
		}else{
			echo "<script class='type/javascript'>";
			echo "document.getElementById('id_info').value='".$arr[0]['ID_info']."';";	
			echo "document.getElementById('content_punish').value='".$arr[0]['content_info']."';";
			echo "document.getElementById('proveins_punish').value='".$arr[0]['institution_info']."';";
			echo "document.getElementById('date_punish').value='".$arr[0]['date_info']."';";
			echo "document.getElementById('prover_punish').value='".$arr[0]['prover_info']."';";
			echo "document.getElementById('id_user').value='".$arr[0]['userID_info']."';";	
			echo "</script>";
		}
	}
?>
<!-- /Popup -->
</body>
</html>