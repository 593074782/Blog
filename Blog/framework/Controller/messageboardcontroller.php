<?php
require_once(dirname(dirname(dirname(__FILE__))).'/config/config.php');
require_once(dirname(dirname(__FILE__)).'/Model/mysql.php');
require_once(dirname(dirname(__FILE__)).'/Model/paging.php');
class messageboardcontroller{
	private $user_name;
	public function __construct($user_name){
		$this->user_name = $user_name;
	}	
	//查留言
	private function toselect(){
		$page=isset($_GET['page'])?intval($_GET['page']):1; 
		$user_name = $this->user_name;
		$table_name = 'messageboard';
		$list = 'message';
		$url = 'messageboard.php';
		$output = new Paging($user_name,$table_name,$list,$page,$url);
		$output->forshow();		
	}

	//留言
	private function toinsert(){

	}

	//楼中楼
	private function tocallback(){

	}
	//删除留言及楼中楼
	private function todelete(){

	}

	private function show(){
		//header("refresh:1;url=../View/messageboard/messageboard.php");
		echo "success!";
	}
	public function operation($num){
		switch ($num){
			case 1:$this->toselect();$this->show();break;
		}
	}
}
//ini_set("display_errors","Off");
$user_name="caicaibi";
$test= new messageboardcontroller($user_name);
if($_GET['num']==""){
	$test->operation(1);
}else{
$test->operation($_GET['num']);
}?>