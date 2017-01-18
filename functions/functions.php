<?php 
/*include file with DB connect functions */
require_once ("connect.php");

/* get trains list */
function getTrains(){
	global $mysqli;
	connectDB();
	$result = $mysqli->query("SELECT * FROM trainschedules ORDER BY id");
	closeDB();
	return resultToArray($result);
}

/* select train from DB by destination_point */
function selectTrainByDestination($destination_point){
	global $mysqli;
	connectDB();
	$result = $mysqli->query("SELECT * FROM trainschedules WHERE destination_point ='".$destination_point."'");
	closeDB();	
	return resultToArray($result);	
}

function resultToArray($result){
	$array = array();
	while(($row = $result->fetch_assoc()) != false)
		$array[] = $row;
	return $array;
}

/* delete train from DB by id */
function dellTrain($id){
	global $mysqli;
	connectDB();
	$sql = "DELETE FROM trainschedules WHERE id =".$id;
	if ($mysqli->query($sql) === TRUE) {
		echo "Поезд удален из расписания!";
		} else {
		echo "Error: " . $sql . "<br>" . $mysqli->error;
		};
	closeDB();
}



/* select train from DB by id */
function selectTrain($id){
	global $mysqli;
	connectDB();
	$result = $mysqli->query("SELECT * FROM trainschedules WHERE id =".$id);
	closeDB();	
	return $result->fetch_assoc();	
}

/* edit train in DB by id  - maybe do not need */
function editTrain($id, $train_num, $start_time, $traveldays, $destination_point){
	global $mysqli;
	connectDB();
	$sql = "UPDATE trainschedules SET train_num = '".$train_num."', start_time = '".$start_time."', traveldays = '".$traveldays."', destination_point = '".$destination_point."' WHERE id =".$id;
	if ($mysqli->query($sql) === TRUE) {
		echo "Расписание отредактировано!";
		} else {
		echo "Error: " . $sql . "<br>" . $mysqli->error;
		};
	closeDB();
}

function insertTrain($train_num, $start_time, $traveldays, $destination_point){
	global $mysqli;
	connectDB();
	$sql = "INSERT INTO trainschedules (train_num, start_time, traveldays, destination_point) VALUES ('".$train_num."', '".$start_time."', '".$traveldays."', '".$destination_point."')";
	if ($mysqli->query($sql) === TRUE) {
		echo "Поезд добавлен в расписание!";
		} else {
		echo "Error: " . $sql . "<br>" . $mysqli->error;
		};
	closeDB();
}
?>