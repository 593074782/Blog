<?php
require(dirname(dirname(dirname(__FILE__))).'/config/config.php');
require(dirname(dirname(__FILE__)).'/Model/mysql.php');
require(dirname(dirname(__FILE__)).'/Model/paging.php');

class controller{
	private $user_name;

	public function __construct($user_name){
		$this->user_name = $user_name;
	}

	//传照片
	private function towrite(){
		$user_name = $this->user_name;
		$photo_name = $_POST['photo_name'];

		$value="'$user_name','$photo_name'";
		$line_name='user_name,photo_name';
		$table_name='album';
		$album = new operation($user_name,$value,$line_name,$table_name,null);
		$album->show(1);
	}

	//删除照片
	private function todelete(){
		$table_name="album";
		$user_name = $this->user_name;
		$value = $_GET['ID'];
		$album = new operation($user_name,$value,null,$table_name,null);
		$album->show(2);
	}
	//查看照片
	private function toselect(){
		$user_name = $this->user_name;
		$diary = new operation($user_name,null,null,null,null);
		$diary->show(4);
		echo "dsa";
		foreach($all as $key => $value){
			echo file_get_contents(dirname(dirname(__FILE__)).'/View/Album/thumbnails'.$value['photo_name']);
			echo $value['photo_name'];
		}
	}

	

	public function operation($num){
		switch($num){
			case 1: $this->towrite();$this->show();break;
			case 2: $this->todelete();$this->show();break;
			case 4:$this->toselect();break;
		}
	}
}
//ini_set("display_errors","Off");
$user_name="caicaibi";
$test= new controller($user_name);
if($_GET['num']==""){
	$test->operation(4);
}else{
$test->operation($_GET['num']);
}
?>