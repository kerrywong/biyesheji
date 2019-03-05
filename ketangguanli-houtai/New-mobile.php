<?php
	require "query_db.php";
	if(isset($_POST['type_new'])){
		$type=$_POST['type_new'];
		$arr_new = array();
		$arr=queryMysql('biyesheji','tb_new',"type_new='$type'");
		if(count($arr)==0){
			echo json_encode($arr_new);
		}else{
		for($i=0;$i<count($arr);$i++){
			if($arr[$i]['type_new']==0){
				$type_string="通知：";
			}else if($arr[$i]['type_new']==1){
				$type_string="学生会：";
			}else if($arr[$i]['type_new']==2){
				$type_string="双创中心：";
			}else if($arr[$i]['type_new']==3){
				$type_string="活动：";
			}else if($arr[$i]['type_new']==4){
				$type_string="就业：";
			}else if($arr[$i]['type_new']==5){
				$type_string="竞赛：";
			}else if($arr[$i]['type_new']==6){
				$type_string="考试：";
			}else if($arr[$i]['type_new']==7){
				$type_string="作业：";
			}else{
				$type_string="";
			}
			$arr_new = $arr_new+array($arr[$i]['ID_new'] => $arr[$i]['createrName_new'].":".$arr[$i]['title_new']." ".$arr[$i]['content_new']);

			}
		}
		echo json_encode($arr_new,JSON_UNESCAPED_UNICODE);	//json 解决中文乱码
	}
?>