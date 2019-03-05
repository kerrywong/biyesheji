<?php
	include "query_db.php";
//	移动端传值--登录界面  传出的的值为  isTrue：  TURE、FALSE
	if(isset($_POST['username'])&&isset($_POST['userpwd'])){
		$ID_user=$_POST['username'];
		$password_user=$_POST['userpwd'];
		$arr=array();
		if(count(queryMysql('biyesheji','tb_user', "ID_user='$ID_user' and password_user = '$password_user'"))>0){
			$arr = array_merge(array('isTrue'=>TRUE),$arr);
			echo json_encode($arr);
		}else{
			$arr = array_merge(array('isTrue'=>FALSE),$arr);
			echo json_encode($arr);
		}
	}
	
	
?>