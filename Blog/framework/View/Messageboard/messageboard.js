var xmlhttp = null;
function GetXmlHttpObject(){
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else if(window.ActiveXObject){
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	return xmlhttp;
}
function answer(vercode){
	xmlhttp = GetXmlHttpObject();
	var url="test.php"
	url=url+"?answer="+vercode
	xmlhttp.onreadystatechange=showanswer
	xmlhttp.open("GET",url,true)
	xmlhttp.send(null)
}
function showanswer() { 
	var values = true;
	if(xmlhttp.readyState==4 || xmlhttp.readyState=="complete"){
		if(xmlhttp.responseText=="right"){
			values = false;
		}
	document.getElementById("test").disabled=values; 
	}
}