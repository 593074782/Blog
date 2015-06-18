<?php
require(dirname(dirname(dirname(__FILE__))).'/config/config.php');
require(dirname(dirname(__FILE__)).'/Model/mysql.php');
class controller extends config{
	private $user_name;//用户名
	private $table_name;//表名
	private $list_name;//列名
	private $photo_name;//照片名
	private $arrType=array('image/jpg','image/gif','image/png');//照片格式
  	private $max_size='400000'; // 最大文件限制（单位：byte）
	private $address="../View/Album/thumbnails/";//存放位置
	public function __construct($user_name){
		$this->user_name =$user_name;
	}

	//检查照片是否满足条件 三步骤：1.查上传方式 2.查格式，大小文件的目录是否存在 3.查是否出现同名文件
	private function forcheck1($file){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$this->forcheck2($file);
		}else{
			echo "上传方式必须为POST";
			$this->show();
		}
	}

	private function forcheck2($file){
		if(!is_uploaded_file($file['tmp_name'])){ //判断上传文件是否存在
    		echo "<font color='#FF0000'>文件不存在！</font>";
    		$this->show();
    	}
   		if($file['size']>$this->max_size){  //判断文件大小是否大于500000字节
    		echo "<font color='#FF0000'>上传文件太大！</font>";
    		$this->show();
   		} 
    	if(!in_array($file['type'],$this->arrType)){  //判断图片文件的格式
    		echo "<font color='#FF0000'>上传文件格式不对！</font>";
    		$this->show();
    	}
    	if(!file_exists($this->address)){  // 判断存放文件目录是否存在
    		mkdir($this->address,0777,true);
    		$this->forcheck3($file);   
    	} 	
	}

	private function forcheck3($file){
		$photo_name=$file['name'];
		$picname=$this->address.$photo_name;
		if(file_exists($picName)){
      		echo "<font color='#FF0000'>同文件名已存在！</font>";
      		$this->show();
    	}
      	if(!move_uploaded_file($file['tmp_name'],$picName)){  
    		echo "<font color='#FF0000'>移动文件出错！</font>";
    		$this->show();
    	}else{
    		$this->towrite($photo_name);
    	}

	}
	//存放照片
	private function towrite($photo_name){
		$user_name = $this->user_name;
		$table_name = "album";
		$value="'$user_name','$photo_name'";
		$line_name='user_name,photo_name';
		$diary = new operation($user_name,$value,$line_name,$table_name,null);
		$diary->show(1);
	}

	//删除照片
	private function todelete(){

	}
	//查看照片
	private function toselect(){

	}
	/*header需要做修改*/
	private function show(){
		echo"error!";
		header("refresh:2;url=../View/backstage/backstage.php");
	}
	private function show2(){
		echo"success!";
		header("refresh:4;url=../View/backstage/backstage.php");		
	}

	//输出
	public function operation($num,$file){
		switch ($num){
			case 1: $this->forcheck1($file);$this->show();break;
			case 2: $this->todelete();$this->show2();break;
			case 4:$this->toselect();break;
		}
	}
}
$num=$_GET['num'];
$user_name="caicaibi";
$file = $_FILES['upfile'];
$test=new controller($user_name);
$test->operation($num,$file);
?>