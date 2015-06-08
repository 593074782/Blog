<?php

class operation extends config{
	private $table_name;
	private $line_name;
	private $user_name;
	private $value;
	private $spare;
	/*传参*/
	public function __construct($user_name,$value,$line_name,$table_name,$spare){
		$this->user_name = $user_name;
		$this->value = $value;
		$this->line_name = $line_name;
		$this->table_name =$table_name;
		$this->spare = $spare; 
	}

	//SQL 增 
	private function add(){
		$table_name = $this->table_name;
		$line_name  = $this->line_name;
		$value = $this->value;
		$sql = "INSERT INTO $table_name($line_name) values ($value) ";
		$this->LINK()->exec($sql);
	}

	//SQL 删  根据ID
	private function delete(){
		$table_name = $this->table_name;
		$value = $this->value;
		$sql = "DELETE  FROM $table_name where ID = $value";
		$this->LINK()->exec($sql);
		echo "success!";
	}

	//SQL 改 根据ID
	private function update(){
		$table_name = $this->table_name;
		$value = $this->value;
		$sql = "UPDATE $table_name set $new_value where ID=$value";
		$res = $this->LINK()->exec($sql);
	}

	//SQL 查 根据用户名 一些情况下，调用分页类取代这个
	private function select(){
		 $table_name = $this->table_name;
		 $user_name = $this->user_name;
		 $sql = "SELECT * from $table_name where user_name = '$user_name'";
		 $res = $this->LINK()->prepare($sql);
		 $res -> execute();
		 return $res->fetchAll(PDO::FETCH_ASSOC);
	}
	public function forshow($values){
		switch ($values){
		case 1: $this->add();break;
		case 2: $this->delete();break;
		case 3: $this->update();break;
		case 4: return $this->select();
	}
	}
}
?>
	