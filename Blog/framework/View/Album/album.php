<?php
		//相册动态化

//按照flash规定的格式来写xml
$head = '<?xml version="1.0" encoding="utf-8"?> <thumbnails>';	//xml固定的头
$foot = '</thumbnails>';	//xml固定的尾部


$pattern = '/filename=".*"/';//正则匹配的内容
$subject = file_get_contents("thumbnail_list_3.xml");//引入原来的内容
preg_match_all($pattern,$subject,$matches);//进行正则匹配，将原有内容（图片名称）匹配出来
$content=null;//清空内容
//循环使所有内容进入更新的文件中
for($i=0;$i<60;$i++){
	$content .="<thumbnail ".$matches[0][$i]."/>";
}

$value = $head.$content.$foot;
//将内容传入xml文件中
file_put_contents("readme.txt",$value);
?>