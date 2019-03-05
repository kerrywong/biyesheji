<?php
//我的页面传值
	require "query_db.php";
	if(isset($_POST['id_user'])){
		$arr_User=array();
		$id_name_php=$_POST['id_user'];
		$arr=queryMysql('biyesheji','tb_user',"ID_user='$id_name_php'");
		if(count($arr)==0){
			$arr_User = array_merge(array('isTrue'=>FALSE),$arr_User );
		}else{
			if($arr[0]['gender_user']==1){
				$genderstring="男";
			}else if($arr[0]['gender_user']==0){
				$genderstring="女生";
			}else{
				$genderstring="保密";
			}
			$arr_User = array_merge(array('isTrue'=>TRUE),$arr_User);
			$arr_User = array_merge(array('id_user'=>$arr[0]['ID_user']),$arr_User);
			$arr_User = array_merge(array('name_user'=>$arr[0]['name_user']),$arr_User);
			$arr_User = array_merge(array('gender_user'=>$genderstring),$arr_User);
			$arr_User = array_merge(array('tel_user'=>$arr[0]['tel_user']),$arr_User);
			$arr_User = array_merge(array('email_user'=>$arr[0]['email_user']),$arr_User);
			$arr_User = array_merge(array('work_user'=>$arr[0]['work_user']),$arr_User);
			$arr_User = array_merge(array('wechat_user'=>$arr[0]['wechat_user']),$arr_User);
			$arr_User = array_merge(array('QQ_user'=>$arr[0]['QQ_user']),$arr_User);
		}
		echo json_encode($arr_User,JSON_UNESCAPED_UNICODE);	//json 解决中文乱码
	}
?>