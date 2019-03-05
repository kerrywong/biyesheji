<?php
// 判断今天是否有课以及待交作业
	require "query_db.php";
//	if(isset($_POST['id_new'])){
	date_default_timezone_set('PRC'); 
		$arr_class=array('isTrue'=>FALSE);
		//查询今天的课程
		$weekarray=array("日","一","二","三","四","五","六"); //先定义一个数组
        $Day="星期".$weekarray[date("w")];
        //利用模糊查询今天是否有课
        $arr=queryMysql('biyesheji','tb_class',"date_class like '$Day"."%'");
        if(count($arr)==0){
        	$arr_class['isTrue']=TRUE;
        }else{
        	$today=date("Y-m-d");
        	for($i=0;$i<count($arr);$i++){
	        	$Now=time(); 	
				$arr_a=array();
				$arr_a=explode(".",$arr[$i]['date_class']);
				$num_class_r=$arr_a[1];
				if($num_class_r=="1-2"){
					$today_class_start=$today." 8:00:00";
        			$today_class_end  =$today." 9:40:00";
				}
				if($num_class_r=="3-4"){
					$today_class_start=$today." 10:00:00";
        			$today_class_end  =$today." 11:40:00";
				}
				if($num_class_r=="5-6"){
					$today_class_start=$today." 14:00:00";
        			$today_class_end  =$today." 15:40:00";
				}
				if($num_class_r=="7-8"){
					$today_class_start=$today." 16:00:00";
        			$today_class_end  =$today." 17:40:00";
				}
				if($Now>=strtotime($today_class_start)&&$Now<=strtotime($today_class_end)){
					$arr_class['isTrue']=TRUE;
					$arr_class=$arr_class+array('name_class'=>$arr[$i]['name_class']);
					break;
				}
	        	
	        }
        
       }
		
	echo json_encode($arr_class,JSON_UNESCAPED_UNICODE);	//json 解决中文乱码
//	}
?>