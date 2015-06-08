<?php
require_once(dirname(dirname(dirname(__FILE__))).'/config/config.php');
require_once(dirname(dirname(__FILE__)).'/Model/mysql.php');

class linkscontroller{
	private $user_name;
	private $table_name="links";

	public function __construct($user_name){
		$this->user_name = $user_name;
	}

	//添加链接
	private function towrite(){
		$user_name = $this->user_name;
		$link_name = $_POST['link_name'];
		$link_con = $_POST['link_con'];
		$table_name = $this->table_name;
		$value="'$user_name','$link_name','$link_con'";
		$line_name='user_name,link_name,link_con';
		$diary = new operation($user_name,$value,$line_name,$table_name,null);
		$diary->forshow(1);
	}

	//删除链接
	private function todelete(){
		$user_name = $this->user_name;
		$value = $_GET['ID'];
		$table_name = $this->table_name;
		$diary = new operation($user_name,$value,null,$table_name,null);
		$diary->forshow(2);
	}

	
	//查看链接
	private function toselect(){
		$user_name = $this->user_name;
		$table_name = $this->table_name;
		$diary = new operation($user_name,null,null,$table_name,null);
		$diary->forshow(4);
		foreach($diary->forshow(4) as $key => $value){
			echo "<a href='".$value['link_con']."'>".$value['link_name']."</a>"." "."<a href='../../Controller/".$table_name."controller.php?num=2&ID=".$value['ID']."'>删除</a>"."</br>";
		}
	}

	private function show(){
		header("refresh:0;url=../View/backstage/backstage.php");
	}

	public function operation($num){
		switch($num){
			case 1: $this->towrite();$this->show();break;
			case 2: $this->todelete();$this->show();break;
			case 3:$this->toselect();$this->show();break;
		}
	}
}
//ini_set("display_errors","Off");
$user_name="caicaibi";
$test= new linkscontroller($user_name);
if($_GET['num']==""){
	$test->operation(3);
}else{
	$test->operation($_GET['num']);
}
?>