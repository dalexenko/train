<!DOCTYPE html>
<html>
	<head>

		<?php
		require_once ("functions/functions.php"); 
		$title = "Расписание поездов";
		require_once ("blocks/head.php"); 
		?>
	
	</head>
	<body>
			<?php require_once ("blocks/header.php"); ?>
			<div id="wrapper">						
				<form action="search.php" METHOD="POST">
					ПУНКТ НАЗНАЧЕНИЯ:<input type="text" placeholder="ПУНКТ НАЗНАЧЕНИЯ" id="destination_point" name="destination_point">
					<input type="submit" value="ОТФИЛЬТРОВАТЬ">
				</form>
				<?php
						
					$destination_point = htmlspecialchars ($_POST['destination_point']);
				
					if ($destination_point == '')
					{
						echo "Нет данных для отображения";
					}
					else
					{
					$train_data_arr = selectTrainByDestination($destination_point);
					$trains_num = count ($train_data_arr);
						if ($trains_num == 0){
							echo "Нет данных для отображения";
						}
						else{
						echo "<table border=1><tr><th>Название поезда</th><th>Время отправления</th>
						<th>Дни движения</th><th>Пункт назначения</th></tr>";
						for ($i = 0; $i<$trains_num; $i++){
							echo "<td>".$train_data_arr[$i]['train_num']."</td>";
							echo "<td>".$train_data_arr[$i]['start_time']."</td>";
							echo "<td>".$train_data_arr[$i]['traveldays']."</td>";
							echo "<td>".$train_data_arr[$i]['destination_point']."</td></tr>";
							}
						echo "</table>";							
						}
						
					}
				?>
			</div>
			<?php require_once ("blocks/footer.php"); ?>
			
	</body>
</html> 