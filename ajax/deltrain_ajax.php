<?php
	require_once ("../functions/functions.php");
	
	$id = htmlspecialchars ($_POST['id']);
	if ($id == '') {
		echo 'Заполните все поля!';
		exit;
	}
	
	// delete train
	
	dellTrain($id);
		
?>