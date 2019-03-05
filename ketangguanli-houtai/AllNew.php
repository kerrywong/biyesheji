<?php
	require "query_db.php";
		$arr_new = array();
		$arr=queryMysql('biyesheji','tb_new',"1");
		if(count($arr)==0){
			echo json_encode($arr_new);
		}else{
		for($i=0;$i<count($arr);$i++){
			$arr_new = $arr_new+array($arr[$i]['ID_new'] =>array('type'=>$arr[$i]['type_new'],'creatername'=>$arr[$i]['createrName_new'],'title'=>$arr[$i]['title_new'],'content'=>$arr[$i]['content_new']));
			}
		}
		echo json_encode($arr_new,JSON_UNESCAPED_UNICODE);	//json 解决中文乱码
?>