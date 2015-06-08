<?php
	/* 分页 */ //自带删除功能
//require "connect.php";
class connect{
	private $mysql='mysql:host=localhost;dbname=blog';
	private $user = 'root';
	private $password = '';
	
	private function config(){
		$LINK= new PDO($this->mysql,$this->user,$this->password);
		$LINK-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$LINK-> exec("set names utf8");
		return $LINK;
	}
	public function LINK(){
		return $this->config();
	}
}

class Paging extends connect{
	private $user_name;
	private $page; 			//分页数量
	private $num=5;			//每页5条数据
	private $table_name;	//表名
	private $list;			//列名
	private $url;
	
	/*传参*/
	public function __construct($user_name,$table_name,$list,$page,$url){
		$this->user_name = $user_name;
		$this->table_name = $table_name;
		$this->list = $list;
		$this->page = $page;
		$this->url = $url;
	}

	/*查询数据的总数*/
	private function pagenum(){
		$page = $this->page;
		$user_name=$this->user_name;
		$table_name = $this->table_name;
		$sql="SELECT count(*) from $table_name where user_name ='$user_name' ";			//查询数据的总数total
		$res = $this->LINK()->prepare($sql);
		$res->execute();
		$total = $res->fetchAll(PDO::FETCH_ASSOC);
		$s2=implode('',$total[0]);
		$pagenum=ceil($s2/$this->num);			//获得总页数 pagenum
		//假如传入的页数参数apge 大于总页数 pagenum，则显示错误信息
		if($page>$pagenum || $page == 0){
	       echo "Error : Can not found the page!";
	       exit;
		}
		return $pagenum;
	}

	/*每页的内容*/
	private function pageshow(){
		$user_name=$this->user_name;
		$table_name = $this->table_name;
		$num = $this->num;
		$page = $this->page;
		$offset=($page-1)*$num;     //获取每页的第一个page
		$info = "SELECT * from $table_name where user_name ='$user_name' limit $offset,$num ";   //获取相应页数所需要显示的数据
		$res = $this->LINK()->prepare($info);
		$res->execute();
		return($res->fetchAll(PDO::FETCH_ASSOC));
	}

	/*删除功能*///分页自带删除
	private function delete($id){
		$table_name = $this->table_name;
		$sql2="DELETE FROM $table_name where ID= $id";
		$res2 = $this->LINK()->exec($sql2);
	}


	/*返回结果*/ //此分页加入了修饰，不影响功能
	public function show(){
		$table_name = $this->table_name;
		$page = $this->page;
		$pagenum = $this->pagenum();
		$list = $this->list;
		$url = $this->url;
		echo "<div style='height:15%;'>";
		foreach($this->pageshow() as $key => $value){
       		echo "<div style='margin-left:10%;width:5%;float:left;'><a href='".$url."?ID=".$value['ID']."'>".$value[$list]."</a></div>";
       		echo "<a style='float:middle;margin-left:20%' href='../../Controller/".$table_name."controller.php?num=2&ID=".$value['ID']."'>删除</a>";
       		echo"<br />";
		}
		echo"</div>";
		echo "<div style='margin-left:9%;margin-top:100px'><a href='".$url."?page=1'>首页</a>"." ";
		for($i=1;$i<=$pagenum;$i++){
			$show1=($i!=$page)?"<a href='".$url."?page=".$i."'>$i</a>":"<b>$i</b>";
			echo $show1." ";
		}
		echo "<a href='".$url."?page=".($i-1)."'>末页</a>"."</div>";
	}
}

//*这些话应放在Controller
//*这句话是获取Page数，如果不存在，那么页数就是1。

$page=isset($_GET['page'])?intval($_GET['page']):1; 
$user_name = 'caicaibi';
$table_name = 'diary';
$list = 'diary_title';
$url = $_SERVER['PHP_SELF'];
//实例化 show()里面的东西可以直接放到view里面
$output = new Paging($user_name,$table_name,$list,$page,$url);
$output->show();

?>