<?php
require(dirname(dirname(dirname(__FILE__))).'/config/config.php');
require(dirname(dirname(__FILE__)).'/Model/mysql.php');
require(dirname(dirname(__FILE__)).'/Model/paging.php');

class controller{
	private $user_name;

	public function __construct($user_name){
		$this->user_name = $user_name;
	}

	//写日志
	private function towrite(){
		$user_name = $this->user_name;
		$diary_label = $_POST['diary_label'];
		$diary_title = $_POST['diary_title'];
		$diary_brief = $_POST['diary_brief'];
		$diary_con = $_POST['diary_con'];
		date_default_timezone_set("Asia/chongqing");	//设置时区
		$time = date("Y.m.d.h:i:sa");
		$value="'$user_name','$diary_label','$diary_title','$diary_brief','$diary_con','$time'";
		$line_name='user_name,diary_label,diary_title,diary_brief,diary_con,diary_time';
		$table_name='diary';
		$diary = new operation($user_name,$value,$line_name,$table_name,null);
		$diary->show(1);
	}

	//删除日志
	private function todelete(){
		$table_name="diary";
		$user_name = $this->user_name;
		$value = $_GET['ID'];
		$diary = new operation($user_name,$value,null,$table_name,null);
		$diary->show(2);
	}

	//改日志
	private function toinsert(){
		$user_name = $this->user_name;
		$diary_label = $_POST['diary_label'];
		$diary_title = $_POST['diary_title'];
		$diary_brief = $_POST['diary_brief'];
		$diary_con = $_POST['diary_con'];
		date_default_timezone_set("Asia/chongqing");	//设置时区
		$time = date("Y.m.d.h:i:sa");
		$value="'$user_name','$diary_label','$diary_title','$diary_brief','$diary_con','$time'";
		$diary = new operation($user_name,$value,$time);
		$diary->show(1);
	}
	
	//查看日志
	private function toselect(){
		$page=isset($_GET['page'])?intval($_GET['page']):1; 
		$user_name = $this->user_name;
		$table_name = 'diary';
		$list = 'diary_title';
		$url = 'backstage.php';
		$output = new Paging($user_name,$table_name,$list,$page,$url);
		$output->show();
	}
	private function show(){
		header("refresh:1;url=../View/backstage/backstage.php");
		echo "success!";
	}

	public function operation($num){
		switch($num){
			case 1: $this->towrite();$this->show();break;
			case 2: $this->todelete();$this->show();break;
			case 3: $this->toinsert();$this->show();break;
			case 4:$this->toselect();break;
		}
	}
}
ini_set("display_errors","Off");
$user_name="caicaibi";
$test= new controller($user_name);
if($_GET['num']==""){
	$test->operation(4);
}else{
$test->operation($_GET['num']);
}
?>