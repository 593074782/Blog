<?php
class config{
	private $mysql='mysql:host=localhost;dbname=blog';
	private $user = 'root';
	private $password = '';

	private function connect(){
		$LINK= new PDO($this->mysql,$this->user,$this->password);
		$LINK-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$LINK-> exec("set names utf8");
		return $LINK;
	}
	public function LINK(){
		return $this->connect();
	}
}
?>