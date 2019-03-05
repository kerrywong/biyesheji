<?php
	session_start();
	if(!isset($_SESSION['name'])){
		echo "<script class='type/javascipt'> alert('未登录自动跳转登录界面');parent.location.href='./login.html'</script>";
	}
	require "/php/query_db.php";
	//用户更改名字
	if(isset($_POST['userid'])){
		$userid=$_POST['userid'];
		if(queryMysql('biyesheji','tb_user', "ID_user='$userid'")==0){
			echo "此人不存在，不用添加";
		}else{
			$userpwd=$_POST['userpwd'];
			$userrole=intval($_POST['userrole']);
			$userclass=$_POST['userclass'];
			$usergender=intval($_POST['usergender']);
			$userimage=$_POST['userimage'];
			$username=$_POST['username'];
			$usertel=$_POST['usertel'];
			$useremail=$_POST['useremail'];
			$userwork=$_POST['userwork'];
			$userwechat=$_POST['userwechat'];
			$userQQ=$_POST['userQQ'];
			$fool=queryupdate("tb_user","`password_user`='$userpwd',`role_user`=$userrole,`class_user`='$userclass',`gender_user`=$usergender,`image_user`='$userimage',`name_user`='$username',`tel_user`='$usertel',`email_user`='$useremail',`work_user`='$userwork',`wechat_user`='$userwechat',`QQ_user`='$userQQ'" ,"ID_user='$userid'");
			if($fool){
				echo "更改成功";
			}else{
				echo "更改失败";
			}
		}
	}
	//更改惩罚或者奖励
	if(isset($_POST['info_id'])){
		$info_id=$_POST['info_id'];
		$info_userid=$_POST['info_userid'];
		$info_date=$_POST['info_date'];
		$info_type=$_POST['info_type'];
		$info_proveins=$_POST['info_proveins'];
		$info_prover=$_POST['info_prover'];
		$info_content=$_POST['info_content'];
		$fool=queryupdate("tb_info", 
		"`userID_info`='$info_userid',`date_info`='$info_date',`type_info`='$info_type',`institution_info`='$info_proveins',`prover_info`='$info_prover',`content_info`='$info_content'",
		"ID_info=$info_id");
		if($fool){
			echo "更改成功";
		}else{
			echo "更改失败";
		}

	}
	//更改class
	if(isset($_POST['classid'])){
		$class_id=$_POST['classid'];
		$class_name=$_POST['classname'];
		$class_teacher=$_POST['classteacher'];
		$class_info=$_POST['classinfo'];
		$class_type=intval($_POST['classtype']);
		$fool=queryupdate("tb_class", 
		"`name_class`='$class_name',`teacher_class`='$class_teacher',`type_class`='$class_type',`info_class`='$class_info'",
		"ID_class='$class_id'");
		if($fool){
			echo "更改成功";
		}else{
			echo "更改失败";
		}

	}
	
	//超级管理员更改密码
	if(isset($_POST['old_superadmin_pwd'])&&isset($_POST['new_superadmin_pwd'])){
		$olduserpwd=$_POST['old_superadmin_pwd'];
		$newuserpwd=$_POST['new_superadmin_pwd'];
		if(!queryMysql('biyesheji','tb_user', "ID_user='1001' and password_user='$olduserpwd' ")){
			echo "旧密码发生错误";
		}else{
			$fool=queryupdate("tb_user","`password_user`='$newuserpwd'" ,"ID_user='1001'");
			if($fool){
				echo "更改成功";
			}else{
				echo "更改失败";
			}
		}
	}
?>