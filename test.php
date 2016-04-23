<html>
<head>
<title>PHPからMySQLに接続</title>
<meta charset="utf-8">
</head>
<body>

<?php
$mysqli = mysqli_connect("localhost","chatadmin","talk","chat");

// Check connection
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

// Run SELECT query
$query = "SELECT * FROM table1";

if ($result = mysqli_query($mysqli,$query)){

	// Get associative array
	while($row = mysqli_fetch_assoc($result)){
		printf("user:%s<br>message:%s<br><br>",$row["user"],$row["message"]);
	}
	//Free $result
	mysql_free_result($result);
}
// Close connection
mysqli_close($mysqli);
?>

</body>
</html>
