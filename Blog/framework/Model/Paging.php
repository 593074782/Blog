<?php
	/* 分页 */


//require "connect.php";

	/*此class应放在 connect.php 文件中*/
class connect{
	private $mysql='mysql:host=localhost;dbname=Exam';
	private $user = 'root';
	private $password = '';
	
	public function LINK(){
		$LINK= new PDO($this->mysql,$this->user,$this->password);
		$LINK-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$LINK-> exec("set names utf8");
		return $LINK;
	}
}




	/*分页的内容*/
class Paging extends connect{
	private $page; 			//分页数量
	private $num=5;			//每页5条数据
	private $table_name;	//表名
	private $list;			//列名
	private $url;
	
	public function __construct($table_name,$list,$page,$url){
		$this->table_name = $table_name;
		$this->list = $list;
		$this->page = $page;
		$this->url = $url;
	}

	/*查询数据的总数*/
	private function pagenum(){
		$page = $this->page;
		$sql="SELECT ID from ".$this->table_name;			//查询数据的总数total
		$res = $this->LINK()->prepare($sql);
		$res->execute();
		$total = $res->fetchAll(PDO::FETCH_ASSOC);
		$pagenum=ceil(count($total)/$this->num);			//获得总页数 pagenum
		//假如传入的页数参数apge 大于总页数 pagenum，则显示错误信息
		if($page>$pagenum || $page == 0){
	       echo "Error : Can not found the page!";
	       exit;
		}
		return $pagenum;
	}

	/*每页的内容*/
	private function pageshow(){
		$table_name = $this->table_name;
		$num = $this->num;
		$page = $this->page;
		$offset=($page-1)*$num;     //获取每页的第一个page
		$info = "SELECT * from $table_name limit $offset,$num ";   //获取相应页数所需要显示的数据
		$res = $this->LINK()->prepare($info);
		$res->execute();
		return($res->fetchAll(PDO::FETCH_ASSOC));
	}

	public function show(){
		$page = $this->page;
		$pagenum = $this->pagenum();
		$list = $this->list;
		$url = $this->url;
		foreach($this->pageshow() as $key => $value){
       		echo $value[$list]."<br />";
		}
		for($i=1;$i<=$pagenum;$i++){
			$show1=($i!=$page)?"<a href='".$url."?page=".$i."'>$i</a>":"<b>$i</b>";
			echo $show1." ";
		}
	}
}
/*
*这些话应放在Controller
*这句话是获取Page数，如果不存在，那么页数就是1。
*/
$page=isset($_GET['page'])?intval($_GET['page']):1; 
$table_name = 'blog';
$list = 'blog_header';
$url = 'ceshi.php';

//实例化 show()里面的东西可以直接放到view里面
$output = new Paging($table_name,$list,$page,$url);
$output->show();

?>