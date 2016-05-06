<?php

// Include MySQL setting
include './localdb.php';
$mysqli = mysqli_connect($host,$dbuser,$dbpass,$db);

// Select mode
$mode = $_POST['mode'];

// $tmp <- newer, $id <- older
//$id;


switch($mode){
	//First load
case 0:
	load();
	break;
	//Send
case 1:
	send();
	break;
	//comet
case 2:
	comet();
	break;
}

//{{{ function load
function load(){
	//Setting for use database variables
	global $host;
	global $dbuser;
	global $dbpass;
	global $db;
	global $dbtable;
	global $mysqli;

	//Check connection
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
		}
		//Free $result
		mysqli_free_result($result);
	}
	//Close connection
	mysqli_close($mysqli);
}
//}}}

//{{{ function send
function send(){
	//Setting for use database variables
	global $host;
	global $dbuser;
	global $dbpass;
	global $db;
	global $dbtable;
	global $mysqli;

	$user = htmlspecialchars($_POST['user']);
	$message = htmlspecialchars($_POST['message']);
	$now = date("Y-m-d H:i:s");

	//Send query to MySQL
	$result = mysqli_query($mysqli,"INSERT INTO $dbtable (user,message,dt) VALUES('$user','$message','$now')");

	if(!$result){
		$err_message = 'Invalid query: '.mysqli_errno()."\n";
		$err_message .= 'Whole query';
		die($err_message);
	}
}
//}}}

//{{{ function comet
function comet(){
}
//}}}
?>
