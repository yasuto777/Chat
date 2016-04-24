<?php

date_default_timezone_set('Asia/Tokyo');

/*####### MySQL #########*/
// Local DB
//$host = "localhost";
//$dbuser = "chatadmin";
//$dbpass = "talk";
//$db = "chat";

// heroku DB
//$host = "us-cdbr-iron-east-03.cleardb.net";
//$dbuser = "b09d0ee9c1901c";
//$dbpass = "24cd1b17";
//$db = "heroku_d3f2a55ebc3f0af";
//$dbtable = "table1";

include('./heroku_MySQL.php');

// Connect to MySQL
$mysqli = mysqli_connect($host,$dbuser,$dbpass,$db);

// Check connection<
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
}

$user = $_POST['user'];
$message = $_POST['message'];
$now = date("Y-m-d H:i:s");

$new_user = htmlspecialchars($user);
$new_message = htmlspecialchars($message);


//Send query to MySQL
if(mysqli_query($mysqli,"INSERT INTO $dbtable (user,message,dt) VALUES('$user','$message','$now')") === TRUE){

echo "<br><div class=\"arrow_name\">".$new_user."</div>";
echo "<div class=\"arrow_box\">".$new_message."</div>";
echo "<div class=\"send_time\">".$now."</div>";

}
//Close connecton
mysqli_close($mysqli);

?>
