<?php 
$mysqli = false;

/* connect to DB*/
function connectDB (){
	global $mysqli;
	$mysqli = new mysqli("localhost", "u226856428_train", "trains", "u226856428_train");
	$mysqli->set_charset("utf8");
}

/* close DB connections */
function closeDB (){
	global $mysqli;
	$mysqli->close();
}
?>