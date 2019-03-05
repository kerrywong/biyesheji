<?php session_start();
	include "query_db.php";
	//寻找数组下角标函数
	function indexof($element,$array){
		return array_search($element,$array);
	}
	
	//数组变sql字符串
	function Tostring($array){
		$sqlstr="";
		for($i=0;$i<count($array);$i++){
			if($i==(count($array)-1)){
				$sqlstr =$sqlstr."'$array[$i]'";
			}else{
				$sqlstr =$sqlstr."'$array[$i]',";
			}
		
		}
		return $sqlstr;
	}
	/*
	 * login.html传过来的值
	 * 只允许管理员登陆
	 */
	
	$name_string=$_POST['name'];
	$pwd_string =$_POST['pwd'];
	$arr=queryMysql('biyesheji','tb_user',"ID_user='$name_string'");
	if($name_string==$arr[0]['ID_user']&&$pwd_string==$arr[0]['password_user']&&($arr[0]['role_user']==0||$arr[0]['role_user']==1)){
		$info=array('sucess'=>1);
		$_SESSION['name']=$name_string;
		echo "<script class='type/javascipt'> location.href='../index.php';</script>";
	}else{
		echo "<script class='type/javascipt'> alert('登录失败');location.href='../login.html'</script>";
	}
	
?>