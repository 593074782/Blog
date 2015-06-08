<?php
require_once(dirname(dirname(dirname(__FILE__))).'/config/config.php');
require_once(dirname(dirname(__FILE__)).'/Model/mysql.php');
require_once(dirname(dirname(__FILE__)).'/Model/paging.php');

class albumcontroller{
	private $user_name;
	private $table_name='album';

	public function __construct($user_name){
		$this->user_name = $user_name;
	}
/*function inputPost($name) {
		return strip_tags($_POST[$name]);防注入
}*/
	//传照片
	private function towrite(){
		$user_name = $this->user_name;
		$photo_name = $_POST['photo_name'];

		$value="'$user_name','$photo_name'";
		$line_name='user_name,photo_name';
		$table_name=$this->table_name;
		$album = new operation($user_name,$value,$line_name,$table_name,null);
		$album->forshow(1);
	}

	//删除照片
	private function todelete(){
		$table_name=$this->table_name;
		$user_name = $this->user_name;
		$value = $_GET['ID'];
		$album = new operation($user_name,$value,null,$table_name,null);
		$album->forshow(2);
	}
	//查看照片
	private function toselect(){
		$user_name = $this->user_name;
		$table_name=$this->table_name;
		$diary = new operation($user_name,null,null,$table_name,null);
		//$diary->forshow(4);
		foreach($diary->forshow(4) as $key => $value){
			echo "<img height='80' width='70' src=' ../../View/Album/thumbnails/".$value['photo_name']."'>";
			echo $value['photo_name']."<a href=
			"."</br>";
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
$user_name="caicaibi";
$test= new albumcontroller($user_name);
if($_GET['num']==""){
	$test->operation(4);
}else{
	$test->operation($_GET['num']);
}
?>