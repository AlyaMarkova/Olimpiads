<?php
require_once 'config.php';
require_once 'functions.php';
$events = get_events();
$events = get_json($events);
//print_arr($events);
?>

	<meta charset="UTF-8">
	<title>Календарь событий</title>
	<link rel="stylesheet" href="calendar/css/eventCalendar.css">
	<link rel="stylesheet" href="calendar/css/eventCalendar_theme_responsive.css">


	<div id="eventCalendar" style="height: 220px; width: 300px; margin: 5px auto;"></div>
	
	<!--<script src="calendar/js/js-min.js"></script>-->
	<script src="calendar/js/moment.js"></script>
	
	<script src="calendar/js/jquery.eventCalendar.js"></script>
	<script>
	$(function(){
		var data = <?php echo $events; ?>;
		jQuery('#eventCalendar').eventCalendar({
			jsonData: data,
			// eventsjson: 'data.json',
			jsonDateFormat: 'human',
			startWeekOnMonday: true,
			openEventInNewWindow: false,
			dateFormat: 'dddd DD-MM-YYYY',
			showDescription: false,
			locales: {
				locale: "ru",
				moment: {
					"months" : [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
					"Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ],
					"monthsShort" : [ "Янв", "Фев", "Мар", "Апр", "Май", "Июн",
					"Июл", "Авг", "Сен", "Окт", "Ноя", "Дек" ],
					"weekdays" : [ "Воскресенье", "Понедельник","Вторник","Среда","Четверг",
					"Пятница","Суббота" ],
					"weekdaysShort" : [ "Вс","Пн","Вт","Ср","Чт",
					"Пт","Сб" ],
					"weekdaysMin" : [ "Вс","Пн","Вт","Ср","Чт",
					"Пт","Сб" ]
				}
			}
		});
	});
	//alert( document.getElementById('dayList_1').value);
	
	//document.getElementById('dayList_1').style.ge1;
	</script>
