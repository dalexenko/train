<?php
	require_once ("../functions/functions.php");
	
	$train_num = htmlspecialchars ($_POST['train_num']);
	$start_time = htmlspecialchars ($_POST['start_time']);
	$destination_point = htmlspecialchars ($_POST['destination_point']);
	$traveldays = htmlspecialchars ($_POST['traveldays']);
	if ($train_num == '' || $start_time == '' || $destination_point == '' || $traveldays == '') {
		echo 'Заполните все поля!';
		exit;
	}
	
	// insert train
	
	insertTrain($train_num, $start_time, $traveldays, $destination_point);
		
?>