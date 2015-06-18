<?php
require(dirname(dirname(dirname(__FILE__))).'/config/config.php');
require(dirname(dirname(__FILE__)).'/Model/mysql.php');

class controller{
	private $user_name;

	public function __construct($user_name){
		$this->user_name = $user_name;
	}

	//添加链接
	private function towrite(){
		$user_name = $this->user_name;
		$link_name = $_POST['link_name'];
		$link_con = $_POST['link_con'];
		$table_name = "links";
		$value="'$user_name','$link_name','$link_con'";
		$line_name='user_name,link_name,link_con';
		$diary = new operation($user_name,$value,$line_name,$table_name,null);
		$diary->show(1);
	}

	//删除链接
	private function todelete(){
		$user_name = $this->user_name;
		$value = $_GET['ID'];
		$diary = new operation($user_name,$value,null);
		$diary->show(2);
	}

	
	//查看链接
	private function toselect(){
		$user_name = $this->user_name;
		$diary = new operation($user_name,null,null,null,null);
		$diary->show(4);
		echo "dsa";
		foreach($all as $key => $value){
			echo "<a href='".$value['link_con']."'>".$value['link_name']."</a>"
		}
	}

	private function show(){
		header("refresh:1;url=../View/backstage/backstage.php");
		echo "success!";
	}

	public function operation($num){
		switch($num){
			case 1: $this->towrite();$this->show();break;
			case 2: $this->todelete();$this->show();break;
			case 3:$this->toselect();$this->show();break;
		}
	}
}
ini_set("display_errors","Off");
$user_name="caicaibi";
$test= new controller($user_name);
if($_GET['num']==""){
	$test->operation(3);
}else{
$test->operation($_GET['num']);
}
?>