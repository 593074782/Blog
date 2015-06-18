/*接收参数id*/
var main = document.getElementById("main");
var home = document.getElementById("home");
var diary = document.getElementById("diary");
var messageboard = document.getElementById("messageboard");
var album = document.getElementById("album");
var aboutme = document.getElementById("aboutme");
var linkes = document.getElementById("linkes");

var WriteDiary = document.getElementById("WriteDiary");

var Writelink = document.getElementById("Writelink");
/*实现页面的控制*/
function allshow(){
	home.style.display="block";
	diary.style.display="block";
	messageboard.style.display="block";
	album.style.display="block";
	aboutme.style.display="block";
	linkes.style.display="block";
	WriteDiary.style.display="none";
	Writelink.style.display="none";
}
function forshow(show){
	home.style.display="none";
	diary.style.display="none";
	messageboard.style.display="none";
	album.style.display="none";
	aboutme.style.display="none";
	linkes.style.display="none";
	WriteDiary.style.display="none";
	Writelink.style.display="none";
	show.style.display="block";
}

/*写日志界面*/
function towrite(){
	home.style.display="none";
	messageboard.style.display="none";
	album.style.display="none";
	aboutme.style.display="none";
	linkes.style.display="none";
	WriteDiary.style.display="block";
}
//提交写日志
function Toget(){
	WriteDiary.style.display="none";
	alert("提交成功");
}
//取消写日志
function  Tocancel(){
    WriteDiary.style.display="none";
    alert("取消提交");
}
// 验证日志写的内容是否为空
function text(){
    if(title.value !="" && message.value != "" && brief.value != ""){
    	get.disabled = false;
    }else{
        get.disabled = true;
	}
}
/*写链接*/
function toadd(){
	Writelink.style.display="block";	
}
function text2(){
    if(link_name.value !="" && link_con.value != ""){
    	get2.disabled = false;
    }else{
        get2.disabled = true;
	}
}

function Toget2(){
	Writelink.style.display="none";
	alert("提交成功");
}