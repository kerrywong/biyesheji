<?php
		require "query_db.php";
		$arr_class=array();
		//查询今天的课程
		$weekarray=array("日","一","二","三","四","五","六"); //先定义一个数组
        $Day="星期".$weekarray[date("w")];
        //利用模糊查询今天是否有课
        $arr=queryMysql('biyesheji','tb_class',"date_class like '$Day"."%'");
        if(count($arr)==0){
        	$arr_class=array('Notice'=>"今天没课");
        }else{
        	for($i=0;$i<count($arr);$i++){
	        	$class_state="";
	        	$Hour= date("H");	
				$Minute = date("m");
				if($Hour==8||($Hour==9&&$Minute<=40)){
					$num_class="1-2";
				}else if($Hour==10||($Hour==11&&$Minute<=40)){
					$num_class="3-4";
				}else if($Hour==14||($Hour==15&&$Minute<=40)){
					$num_class="5-6";
				}else if($Hour==16||($Hour==17&&$Minute<=40)){
					$num_class="7-8";
				}else if($Hour==19||($Hour==20&&$Minute<=40)){
					$num_class="9-10";
				}else{
					$num_class="";
				}
				
				list($day_class,$num_class_r)=split('.',$arr[$i]['daste_class']);
				if($num_class_r>$num_class){
					$class_state="已经结束";
				}else if($num_class_r<$num_class){
					$class_state="未开始";
				}else{
					$class_state="正在进行";
				}
	        	$arr_class = $arr_class+array($arr[$i]['ID_class']=>$arr[$i]['name_class']." ".$arr[$i]['address_class']." ".$class_state);
	        }
        
       }
		
		
		
			
		echo json_encode($arr_class,JSON_UNESCAPED_UNICODE);	//json 解决中文乱码
?>