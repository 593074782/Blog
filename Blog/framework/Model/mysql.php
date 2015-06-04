<?php

class connect{
	
	public function LINK(){
		$LINK= new PDO('mysql:host=localhost;dbname=Exam','root','');
		$LINK-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$LINK-> exec("set names utf8");
		return $LINK;
	}
}

class operation extends connect{

	private $ComeIn;
	private $;

	//SQL 增
	public function add($table_name,$line_name,$value){
		$sql = "INSERT INTO $table_name($line_name) values ($value) ";
		$this->LINK()->exec($sql);
	}

	//SQL 删
	public function delete($value,$table_name){
		$sql = "DELETE $this->value FROM $this->table_name ";
		$this->LINK()->exec($sql);
	}

	//SQL 改
	public function update($table_name,$value,$old_value){
		$sql = "UPDATE $table_name set $new_value where $old_value";
		$res = $this->LINK()->exec($sql);
	}

	//SQL 查
	public function select($table_name,$value){
		$sql = "SELECT * from $table_name where (user_password='$value')";
		$res = $this->LINK()->prepare($sql);
		$res -> execute();
		return $all = $res->fetchAll(PDO::FETCH_ASSOC);
	}

	//SQL 登陆查
	public function selectUser($user_name,$user_password){
		$sql = "SELECT * from login where (user_name='$user_name' and user_password='$user_password')";
		$res = $this->LINK()->prepare($sql);
		$res -> execute();
		if($show = $res->fetchAll(PDO::FETCH_ASSOC))
			return 1;
	}
}
//$test = new connect();
//$test->LINK();
?>