<?php
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
?>