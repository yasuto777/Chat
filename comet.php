<?php

// First load
function load(){

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
			$id = $row['id'];
		}
		//Free $result
		mysqli_free_result($result);
	}
	//Close connection
	mysqli_close($mysqli);
}

//Check Updata & reload
function update(){
	
}

$mode = $_POST['mode'];
switch($mode){
case 0://First load
	load();
	break;
case 1://check update
	update();
	break;
}

?>
