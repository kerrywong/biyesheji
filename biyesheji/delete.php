<?php
	session_start();
	if(!isset($_SESSION['name'])){
		echo "<script class='type/javascipt'> alert('未登录自动跳转登录界面');parent.location.href='./login.html'</script>";
	}
	//删除学生 以及老师 管理员
	require "/php/query_db.php";
	if(isset($_POST['userid'])){
		$userid=$_POST['userid'];
		$fool=querydelete("tb_user", "(role_user=3 or role_user=2 or role_user=1) and ID_user='$userid'");
		if($fool){
			echo "删除成功";
		}else{
			echo "删除失败";
		}
	}
	//删除奖励以及惩罚
	if(isset($_POST['info_id'])){
		$infoid=$_POST['info_id'];
		$fool=querydelete("tb_info", " ID_info='$infoid'");
		if($fool){
			echo "删除成功";
		}else{
			echo "删除失败";
		}
	}
	//删除class
	if(isset($_POST['classid'])){
		$classid=$_POST['classid'];
		$fool=querydelete("tb_class", " ID_class='$classid'");
		if($fool){
			echo "删除成功";
		}else{
			echo "删除失败";
		}
	}
	//删除new
	if(isset($_POST['newid'])){
		$new_id=$_POST['newid'];
		$fool=querydelete("tb_new", " ID_new='$new_id'");
		if($fool){
			echo "删除成功";
		}else{
			echo "删除失败";
		}
	}
	
	
	
	
?>