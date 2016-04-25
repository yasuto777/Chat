<?php

// Connecton setting to MySQL
include('./heroku_MySQL.php');

$mysqli = mysqli_connect($host,$dbuser,$dbpass,$db);

//Check connectin
if(mysqli_connect_errno()){
	printf("Connect failed: %s\n",mysqli_connect_errno());
	exit();
}

if($result = mysqli_query($mysqli,"SELECT * FROM $dbtable")){

	//Get associative array
	while($row = mysqli_fetch_assoc($result)){
		echo "<div class=\"arrow_name\">".htmlspecialchars($row['user'])."</div>";
		echo "<div class=\"arrow_box\">".htmlspecialchars($row['message'])."</div>";
		echo "<div class=\"send_time\">".$row['dt']."</div>";
		$latest = $row['id'];
		//echo $latest;
	}
	//Free $result
	mysqli_free_result($result);
}
//Close connection
mysqli_close($mysqli);
?>
