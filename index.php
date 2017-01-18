<!DOCTYPE html>
<html>
	<head>

		<?php
		require_once ("functions/functions.php"); 
		$title = "Расписание поездов";
		require_once ("blocks/head.php"); 
		$trains = getTrains();
		?>
	</head>
	<body>
			<?php require_once ("blocks/header.php"); ?>
			<div id="wrapper">
				<?php
					$trains_num = count ($trains);				
					echo "<table border=1><tr><th>Название поезда</th><th>Время отправления</th>
					<th>Дни движения</th><th>Пункт назначения</th><th>Действия:</th></tr>";
					for ($i = 0; $i<$trains_num; $i++){
						echo "<td>".$trains[$i]['train_num']."</td>";
						echo "<td>".$trains[$i]['start_time']."</td>";
						echo "<td>".$trains[$i]['traveldays']."</td>";
						echo "<td>".$trains[$i]['destination_point']."</td>";
						echo "<td>";
						echo "<a href='deltrain.php?id=".$trains[$i]['id']."'>удалить</a>";
						echo " | ";
						echo "<a href='editrain.php?id=".$trains[$i]['id']."'>редактировать</a>";
						echo "</td></tr>";
						}
					echo "</table>";
					?>
			</div>
			<?php require_once ("blocks/footer.php"); ?>
			
	</body>
</html> 