<?php
	/*
	 * 连接数据库
	 * 成功返回连接，失败返回false
	 */
	
	function connectMysql($database){
		$conn=new mysqli('localhost','root','wk19941218',$database);
		if($conn->connect_error){
			return false;
		}else{
			mysqli_set_charset($conn, 'utf8');
			return $conn;
		}
		
	}
	
	/*
	 * 关闭数据库
	 * 无返回类型
	 */
	function closeMysql($database){
		if(connectMysql($database)){
			mysqli_close(connectMysql($database));
		}
	}
	
	/*
	 * 查询各个数据表数据
	 * 返回 关联数组
	 */
	function queryMysql($database,$tbname,$term){
		$conndb=connectMysql($database);
		$sql="select * from $tbname where $term";
		$result=$conndb->query($sql);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$rows[]=$row;
			}
			closeMysql('biyesheji');
			return $rows;
		}else{
			closeMysql('biyesheji');
			return NULL;
		}
	}
//	$q=queryMysql('biyesheji','tb_info',"ID_info=1 and type_info=1");
//	print_r ($q);
	function queryMysql2($database,$type,$tbname,$term){
		$conndb=connectMysql($database);
		$sql="select $type from $tbname where $term";
		$result=$conndb->query($sql);
		if($result->num_rows>0){
			$row=mysqli_fetch_array($result);
			closeMysql('biyesheji');
			return $row;

		}else{
			closeMysql('biyesheji');
			return NULL;
		}
	}
//	$Q=queryMysql2('biyesheji',"max(ID_info)",'tb_info',"1");
//	echo($Q[0]);
	/*
	 * 增添语句
	 */
	function queryinsert($tbname,$artribution,$insertstring){
//		$arraydatabase=array('tb_class','tb_course','tb_info','tb_new','tb_otherinfo','tb_task','tb_test','tb_user');
		$sqlstring="insert into $tbname $artribution values ( $insertstring )";
		$conndb=connectMysql('biyesheji');
		$retval=mysqli_query($conndb,$sqlstring);
		if($conndb->affected_rows==0){
			//die('无法添加数据：'.mysqli_error($conndb));
			closeMysql('biyesheji');
			return false;
		}else{
			//echo "添加成功";
			closeMysql('biyesheji');
			return true ;
		}
		
	}
//	queryinsert('tb_user',"(`ID_user`,`password_user`)", "'16408100101','16408100101'");
	/*
	 * 删改语句
	 */
	function querydelete($tbname,$insertstring){
		//$arraydatabase=array('tb_class','tb_course','tb_info','tb_new','tb_otherinfo','tb_task','tb_test','tb_user');
		$sqlstring="delete from $tbname where  $insertstring ";
		$conndb=connectMysql('biyesheji');
		$retval=mysqli_query($conndb,$sqlstring);
		if($conndb->affected_rows==0){
			//die('无法删除数据：'.mysqli_error($conndb));
			closeMysql('biyesheji');
			return false;
		}else{
			//echo "删除成功";
			closeMysql('biyesheji');
			return true ;
		}
	}
//	querydelete("tb_user", "ID_user='16408100101'");
	/*
	 * 更改语句
	 */
	function queryupdate($tbname,$insertstring1,$insertstring2){
//		$arraydatabase=array('tb_class','tb_course','tb_info','tb_new','tb_otherinfo','tb_task','tb_test','tb_user');
		$sqlstring="update $tbname set $insertstring1 where $insertstring2";
		$conndb=connectMysql('biyesheji');
		$result=mysqli_query($conndb,$sqlstring);
		$retval=mysqli_affected_rows($conndb);
		if($retval){
			closeMysql('biyesheji');
			return true;
		}else{
			closeMysql('biyesheji');
			return false;
		}
		
	}
	

?>