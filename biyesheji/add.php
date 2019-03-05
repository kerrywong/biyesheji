<?php
	session_start();
	if(!isset($_SESSION['name'])){
		echo "<script class='type/javascipt'> alert('未登录自动跳转登录界面');parent.location.href='./login.html'</script>";
	}

	require "/php/query_db.php";
	if(isset($_POST['userid'])){
		$userid=$_POST['userid'];
		if(count(queryMysql('biyesheji','tb_user', "ID_user='$userid'"))>0){
			echo "此人已经存在，不用添加";
		}else{
			$userpwd=$_POST['userpwd'];
			$userrole=intval($_POST['userrole']);
			$usergender=intval($_POST['usergender']);
			$fool=queryinsert("tb_user","(`ID_user`,`password_user`,`role_user`,`gender_user`)" ,"'$userid','$userpwd',$userrole,$usergender");
			if($fool){
				echo "添加成功";
			}else{
				echo "添加失败";
			}
		}
	}
	//添加奖励/惩罚传过来的值
	if(isset($_POST['info_userid'])){
		$info_userid=$_POST['info_userid'];
		$info_date=strval(date('Y-m-d',time()));
		$info_proveins=$_POST['info_proveins'];
		$info_prover=$_POST['info_prover'];
		$info_content=$_POST['info_content'];
		$info_type=intval($_POST['info_type']);
		$infoid=time().$_POST['info_type'];
		$fool=queryinsert("tb_info","(`ID_info`,`userID_info`,`date_info`,`type_info`,`institution_info`,`prover_info`,`content_info`)" ,"'$infoid','$info_userid','$info_date',$info_type,'$info_proveins','$info_prover','$info_content'");
		if($fool){
			echo "添加成功";
		}else{
			echo "添加失败";
		}
	}
	//添加课程
	if(isset($_POST['class_id'])&&isset($_POST['class_teacher_ID'])){
		$classid=$_POST['class_id'];
		$teacherid=$_POST['class_teacher_ID'];
		$classdate=$_POST['class_date'];
		if(count(queryMysql('biyesheji','tb_class', "ID_class='$classid' and date_class='$classdate'"))>0){
			echo "此课/班级已经存在，不用添加";
		}else if(count(queryMysql('biyesheji','tb_user', "ID_user='$teacherid'"))==0){
			echo "此老师不存在存在";
		}else{
			$teacher_arr=queryMysql('biyesheji','tb_user', "ID_user='$teacherid'");
			
			$createclass=date("Y-m-d");
			$classteacher=$_POST['class_teacher_ID'];
			$classtype=intval($_POST['class_type']);
			$class_teachername=$teacher_arr[0]['name_user'];
			$classname=$_POST['class_name'];
			$classinfo=$_POST['class_info'];
			$classdate=$_POST['class_date'];
			$classadress=$_POST['class_address'];
			$fool=queryinsert("tb_class",
			"(`ID_class`,`name_class`,`ID_teacher_class`,`name_teacher_class`,`createdate_class`,`type_class`,`info_class`,`address_class`,`date_class`)" ,
			"'$classid','$classname','$teacherid','$class_teachername','$createclass',$classtype,'$classinfo','$classadress','$classdate'");
			if($fool){
				echo "添加成功";
			}else{
				echo "添加失败";
			}
		}
	}

	//添加new
	if(isset($_POST['newannouncerid'])){
		$createrid=$_POST['newannouncerid'];
		$arr=queryMysql('biyesheji','tb_user', "ID_user='$createrid'");
		if(count($arr)==0){
			echo "此发布者不存在";
		}else{
			$new_createrName=$arr[0]['name_user'];
			$new_title=$_POST['newtitle'];
			$new_content=$_POST['newcontent'];
			$new_type=intval($_POST['newtype']);
			$new_date=strval(date("Y-m-d"));
			$new_ID=strval(time());
			$fool=queryinsert("tb_new","(`ID_new`,`createrID_new`,`createrName_new`,`title_new`,`content_new`,`type_new`,`date_new`)" ,"'$new_ID','$createrid','$new_createrName','$new_title','$new_content','$new_type','$new_date'");
			if($fool){
				echo "添加成功";
			}else{
				echo "添加失败";
			}
		}
	}
?>