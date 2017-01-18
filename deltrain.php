<!DOCTYPE html>
<html>
	<head>

		<?php
		require_once ("functions/functions.php");
		$title = "Удалить поезд из расписания";
		require_once ("blocks/head.php"); 
		
		$id = htmlspecialchars ($_GET['id']);
		if ($id == '')
			{
			echo "not data to delete";;
			}
			else
			{
			$train_data_arr = selectTrain($id);
			}
		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script>
		$(document).ready(function(){
			$("#done").click (function (){
				$('#messageShow').hide;
				var id = <?=$id ?>;
				var train_num = $("#train_num").val ();
				var start_time = $("#start_time").val ();
				var traveldays = $("#traveldays").val ();
				var destination_point = $("#destination_point").val ();
				var fail = "";
				if (train_num.length <1) fail = "Введите номер поезда!";
				//else if (start_time.length <1) 
				//	fail = "Введите корректную дату отправления";
				else if (destination_point.length <1) 
					fail = "Введите пункт назначения";
				if (fail != ""){
					$('#messageShow').html(fail + "<div class='clear'><br></div>");
					$('#messageShow').show;
					return false;
				}
				$.ajax({
					url: 'ajax/deltrain_ajax.php',
					type: 'POST',
					cache: false,
					data: {'id': id, 'train_num': train_num, 'start_time': start_time, 'traveldays': traveldays, 'destination_point': destination_point},
					dataType: 'html',
					success: function (data) {
						$('#messageShow').html(data + "<div class='clear'><br></div>");
						$('#messageShow').show;						
					}
				});
				
			});
		});
		</script>
	</head>
	<body>
			<?php require_once ("blocks/header.php"); ?>
			<div id="wrapper">

				<h2>Подтвердите удаление поезда из расписания:</h2><br />
					НОМЕР ПОЕЗДА:<input type="text" readonly="readonly" id="train_num" name="train_num" value="<?=$train_data_arr['train_num'] ?>"><br />
					ОТПРАВЛЕНИЕ:<input type="time" readonly="readonly" id="start_time" name="start_time" value="<?=$train_data_arr['start_time'] ?>"><br />
					РЕЖИМ ДВИЖЕНИЯ ПОЕЗДОВ:<select id="traveldays" name="traveldays" disabled>
						<option disabled>Выберите режим движения поездов</option>
						<option value="workdays">Будние дни</option>
						<option selected value="everydays">Каждый день</option>
						<option value="holydays">По выходным</option>
					</select><br />
					ПУНКТ НАЗНАЧЕНИЯ:<input type="text" readonly="readonly" placeholder="ПУНКТ НАЗНАЧЕНИЯ" id="destination_point" name="destination_point" 
					value=<?=$train_data_arr['destination_point'] ?>><br />
					
					<div id="messageShow"></div>
					<input type="button" value="УДАЛИТЬ ИЗ РАСПИСАНИЯ" id="done" name="done"><br />

			</div>
			<?php require_once ("blocks/footer.php"); ?>
	</body>
</html> 