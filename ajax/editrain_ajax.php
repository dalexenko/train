<?php
	require_once ("../functions/functions.php");
	
	$id = htmlspecialchars ($_POST['id']);
	$train_num = htmlspecialchars ($_POST['train_num']);
	$start_time = htmlspecialchars ($_POST['start_time']);
	$destination_point = htmlspecialchars ($_POST['destination_point']);
	$traveldays = htmlspecialchars ($_POST['traveldays']);
//die;
	if ($id == '' || $train_num == '' || $start_time == '' || $destination_point == '' || $traveldays == '') {
		echo 'Заполните все поля!';
		exit;
	}
	
	// insert
	
	editTrain($id, $train_num, $start_time, $traveldays, $destination_point)
		
?>