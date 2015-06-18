<?php
		/* 注册 */ 
require"connect.php";

class Register extends config{
	private $user_name;
	private $user_password;
	private $table_name = 'user'; //用户表名
	private $list = 'user_name,user_password,firsttime';	//用户表里面的列
	private $list_user='user_name';//用户表里面的用户名列
	private $time;	//注册时间

	/*传参*/
	public function __construct($user_name,$user_password,$time){
		$this->user_name = $user_name;
		$this->user_password = $user_password;
		$this->time = $time;
	}

	/*检查+注册*/
	private function check(){
		$user_name = $this->user_name;
 		$user_password = MD5(MD5(MD5($this->user_password)."caicaibi")."caicaibi");
 		$table_name = $this->table_name;
		$list = $this->list;
		$list_user = $this->list_user;
		$time = $this->time;
		$sql = "SELECT * FROM $table_name where $list_user='$user_name' ";
 		$res = $this->LINK()->prepare($sql);
		$res->execute();
		$message = $res->fetchAll(PDO::FETCH_ASSOC);
		if($message){
			return "该用户名已被注册";
		}else{
			$sql ="INSERT INTO $table_name($list) values ('$user_name','$user_password','$time')";
			$res = $this->LINK()->exec($sql);
			return "恭喜你成功注册";
		}
	}

	/*输出*/
	public function show(){
		echo $this->check();
		}
}

/*
*这些话应放在Controller
*接收来自注册页面的数据
*/
$user_name = "caicaibi";
$user_password = "123456";

date_default_timezone_set("Asia/chongqing");	//设置时区
$time = date("Y.m.d.h:i:sa");
//实例化
$test = new Register($user_name,$user_password,$time);
$test->show();
?>