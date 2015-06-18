<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Messageboard</title>
	<link rel="stylesheet" href="messageboard.css">
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
	<div class="messageboard">

			<?php
				require"../../Controller/messageboardcontroller.php";
			?>

		<div>
			<p>留言：</p>
			<form class="">
				<input  type="text" maxlength="50">
				<input placeholder="请输入验证码" maxlength="4" id="vercode" onkeyup="answer(this.value)">
				<button disabled="submit" type="submit" id="test" >提交</button>
			</form>
		</div>
	</div>
</body>
<script src="messageboard.js">
</script>
</html>