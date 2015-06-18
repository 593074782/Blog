<?php 
$value = ;//接收验证码内容
$answer = $_GET["answer"];
if($answer == $value){
	echo "right";
}
?>