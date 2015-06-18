<html>
<head>
	<meta charset="UTF-8">
	<title>BackStage</title>
	<link rel="stylesheet" type="text/css" href="backstage.css">
</head>
<body>
	<div class="title">
		<button onclick="allshow()">返回主界面</button>	
		<button onclick="forshow(home)">home</button>
		<button onclick="forshow(diary)">diary</button>
		<button onclick="forshow(messageboard)">messageboard</button>
		<button onclick="forshow(album)">album</button>
		<button onclick="forshow(aboutme)">aboutme</button>
		<button onclick="forshow(linkes)">links</button>
	</div>
	<div class="allmessage" id="home">
		<p>home内容</p>
		<div>
		</div>
	</div>
	<div class="allmessage" id="diary">
		<p>diary内容</p>
		<button onclick="towrite()">写日志</button>
		<div class="diary_label"><!-- 显示标签 -->
			<a href="">思维</a>
			<a href="">娱乐</a>
			<a href="">学习</a>
			<a href="">重邮</a>
		</div>
		<div class="show_title"><!-- 显示日志标题的界面 -->
			<?php 
				include"../../Controller/diarycontroller.php";
			?>
		</div>
		<div class="WriteDiary" id="WriteDiary">  <!-- 写日志的界面 -->
			<form method="post" action="../../Controller/diarycontroller.php?num=1" class="toform">
			<div>
				<div>
					<input type="text" name="diary_title" placeholder="请输入日志标题" class="totitle" id="title" onblur="text()" onkeydown="text()">
	 			</div>
				<div>
					<textarea type="text"  name="diary_brief" placeholder="请输入日志简介" class="tobrief" id="brief" onblur="text()" onkeydown="text()"></textarea>
	 			</div>
	  			<div>
	  				<textarea type="text"  name="diary_con" placeholder="请输入日志内容" class="tomessage" id="message" onblur="text()" onkeydown="text()"></textarea>
	  			</div>
	  			<div>
	  				<span>分类:</span>
	  				<select name="diary_label">
           				<option value ="个人日记">个人日记</option>
            	  		<option value ="娱乐">娱乐</option>
            	  		<option value="学习">学习</option>
            	  		<option value="重邮">重邮</option>
           			</select>
	       		</div>
	       		<div>
	        	  	<input type="submit" value="发表" class="toput" id="get" disabled="disabled" onclick="Toget()">
	       			<input type="button" value="取消" class="toput"  onclick="Tocancel()" > 
        		</div>
        	</div>
			</form>
		</div>

	</div>
	<div class="allmessage" id="messageboard">
		<p>messageboard内容</p>
	</div>
	<div class="allmessage" id="album">
		<p>album内容</p>
	</div>
	<div class="allmessage" id="aboutme">
		<p>aboutme</p>
	</div>
	<div class="allmessage" id="linkes">
		<button onclick="toadd()">添加链接</button>
		<div class="WriteDiary" id="Writelink">  <!-- 添加链接 -->
			<form method="post" action="../../Controller/linkscontroller.php?num=1" class="toform">
			<div>
				<div>
					<input type="text" name="link_name" placeholder="请输入链接名称" class="totitle" id="link_name" onblur="text2()" onkeydown="text2()">
	 			</div>
				<div>
					<input type="text"  name="link_con" placeholder="请输入链接内容" class="totitle" id="link_con" onblur="text2()" onkeydown="text2()">
	 			</div>
	       		<div>
	        	  	<input type="submit" value="发表" class="toput" id="get2" disabled="disabled" onclick="Toget2()">
	       			<input type="button" value="取消" class="toput"  onclick="Tocancel()" > 
        		</div>
        	</div>
			</form>
		</div>
		<div class="links">
			<?php 
				//require_once"../../Controller/linkscontroller.php";
			?>
		</div>
	</div>
</body>
<script type="text/javascript" src="backstage.js"></script>
</html>