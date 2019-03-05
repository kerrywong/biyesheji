<?php
	require "query_db.php";
	if(isset($_POST['id_info2'])){
		$arr_info = array();
		$arr=queryMysql('biyesheji','tb_info',"userID_info=$id_info2");
		if(count($arr)==0){
			echo json_encode($arr_info);
		}else{
		for($i=0;$i<count($arr);$i++){
			if($arr[$i]['type_info']==1){
				$type_string="奖励：";
			}else{
				$type_string="惩罚：";
			}
			$arr_info = array_merge(array($arr[$i]['ID_info']=>$type_string.$arr[$i]['date_info']." ".$arr[$i]['content_info']),$arr_info);
			}
		}
		echo json_encode($arr_info,JSON_UNESCAPED_UNICODE);	//json 解决中文乱码
	}
?>