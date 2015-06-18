<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Diary</title>
	<link rel="stylesheet" href="diary.css">
</head>
<body>
	<div class="boothead" id="boothead">
		<img height="80" width="70" src="../../../bin/123.png">
		<div class="boothead_href">
			<a href="../Main/index.html">home</a>
			<a href="../Album/">Album</a>
			<a href="../Diary/diary.html">Diary</a>
			<a href="../MessageBoard/messageboard.html">MessageBoard</a>
			<a href="../AboutMe/">Aboout Me</a>
		</div>
		<hr/>
	</div>
	<div class="ShowDiary" id="ShowDiary"><!-- 主页面-->
		<div class="boothead_form">
			<form method="post" action="#">
				<input type="text" name="" value="" placeholder="搜索">
				<button type="submit">确定</button>
			</form>
		</div>
        <button class="write" onclick="Towrite()" >写日志</button>
	</div>
	<div class="WriteDiary" id="WriteDiary">  <!-- 写日志的界面 -->
		<form method="post" action="" class="form">
		<div>
			<div>
				<input type="text" placeholder="请输入日志标题" class="title" id="title" onblur="text()" onkeydown="text()">
	 		</div>
	  		<div>
	  			<textarea type="text" placeholder="请输入日志内容" class="message" id="message" onblur="text()" onkeydown="text()"></textarea>
	  		</div>
	  		<div>
	  			<span>分类:</span>
	  			<select>
           			<option value ="个人日记">个人日记</option>
              		<option value ="entertainment">娱乐</option>
              		<option value="study">学习</option>
              		<option value="CQUPT">重邮</option>
           		</select>
	       	</div>
	       	<div>
	          	<input type="submit" value="发表" class="put" id="get" disabled="disabled" onclick="Toget()">
	       		<input type="button" value="取消" class="put"  onclick="Tocancel()" > 
        	</div>
        </div>
		</form>
	</div>
</body>
<script type="text/javascript">
var	boothead = document.getElementById("boothead");
var	ShowDiary = document.getElementById("ShowDiary");
var	WriteDiary = document.getElementById("WriteDiary");
var title = document.getElementById("title");
var message  = document.getElementById("message");
var get   = document.getElementById("get");
//写日志
function Towrite(){
    ShowDiary.style.display="none";
    WriteDiary.style.display="block";
}
//提交写日志
function Toget(){
	ShowDiary.style.display="block";
	WriteDiary.style.display="none";
	alert("提交成功");
}
//取消写日志
function  Tocancel(){
    ShowDiary.style.display="block";
    WriteDiary.style.display="none";
    alert("取消提交");
}
// 验证标题内容是否为空
function text(){
    if(title.value !="" && message.value != ""){
    	get.disabled = false;
    }else{
        get.disabled = true;
	}
}
</script>
</html>