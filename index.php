<!DOCTYPE html>
<html lang="ja">
<head>
		<meta charset="UTF-8">
		<title>Chat</title>
		<link rel="stylesheet" href="index.css">
<script src="js/jquery-2.1.4.min.js"></script>
<!--script src="js/main.js"></script-->
<!--script type="text/javascript" src="js/comet.js"></script-->
</head>
<body>
<h1>リアルタイムチャット</h1>
<div class="outputField">
<br>
<!-- First Load -->
<?php
include './load.php';
?>
<!--script>load();</script-->
<!-- comet -->
</div>

	<div class="inputField">
	User:<input type="text" name="user" id="user">
	Message:<input type="text" name="message" id="message">
	<input type="button" value="Send" id="send">
	</div>
	</body>
	</html>
