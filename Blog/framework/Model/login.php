<?php
		/* 登陆 */
require"connect.php";

class Login extends config{
	private $user_name;
	private $user_password;
	private $table_name = 'user'; //用户表名
	private $list_user = 'user_name';	//用户表里面的列
	private $list_pass = 'user_password';	//用户表里面的列	

	/*传参*/
	public function __construct($user_name,$user_password){
		$this->user_name = $user_name;
		$this->user_password = $user_password;
	}

	private function check(){
		$user_name = $this->user_name;
 		$user_password = MD5(MD5(MD5($this->user_password)."caicaibi")."caicaibi");
 		$table_name = $this->table_name;
		$list_user = $this->list_user;
		$list_pass = $this->list_pass;
		$sql = "SELECT * FROM $table_name where $list_user ='$user_name' and $list_pass = '$user_password' ";
 		$res = $this->LINK()->prepare($sql);
		$res->execute();
		$message = $res->fetchAll(PDO::FETCH_ASSOC);
		if($message){
			setcookie("user_name",$user_name,time()+3600,'/Blog/'); //设置COOKIE
			header("refresh:2;url=http://www.baidu.com"); //跳转到登陆后页面
			return "登陆成功";
		}else{
			header("refresh:2;url=http://www.baidu.com");//跳转到登陆页面
			return "账号或密码错误";
		}
	}

		/*输出*/
	public function show(){
		echo $this->check();
		}
}

$user_name = "caicaibi";
$user_password = "123456";

//实例化
$test = new Login($user_name,$user_password);
$test->show();
?>