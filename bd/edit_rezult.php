<?php
	//session_start();
	include ("../bd.php");
	$data = json_decode($_POST['jsonData']);
	$arr_id_user=$data->arr_id_user;
	$arr_place=$data->arr_place;
	$arr_rating=$data->arr_rating;
	$get_id=$data->get_id;
	$array_new_result = array(count($arr_id_user));
	
	for($i=0;$i<count($arr_id_user);$i++){
		$result = mysql_query("SELECT * FROM schoolboy_past_olympics WHERE olympics_id='$get_id' AND schoolboy_users_id='$arr_id_user[$i]'");
		$myrow=mysql_fetch_array($result);
		
		$result2 = mysql_query("SELECT * FROM schoolboy WHERE Users_id='$arr_id_user[$i]'");
		$myrow2=mysql_fetch_array($result2);
		
		$array_new_result[$i] = $myrow2['rating'] + $arr_rating[$i] - $myrow['rating_mark'];

		/*********** формирование рассылки для участников ********************/
		if ($myrow2['delivery'] == 1) {
			$name = explode("!", $myrow2['Fio_schoolboy']); //name[1] - это ИМЯ учащегося	
			if ($myrow2['gender'] == "Женский") { $ending = "ая"; }
			else { $ending = "ый"; }
			
			$row_name = mysql_fetch_array(mysql_query("SELECT name_olympiad FROM olympics WHERE id='$get_id'"));
			$name_olimp = $row_name['name_olympiad'];
			
			$message = "Уважаем".$ending." ".$name[1]."!\nНа сайте опубликованы результаты от \"".$name_olimp."\", в которой Вы принимали участие!\n \nС уважением,\nАдминистрация olimpiada.ru";
			mail($myrow2['email'], "Результаты олимпиады", $message, "Content-type:text/plane;    Charset=UTF-8\r\n");
		}
	}
	for($i=0;$i<count($arr_id_user);$i++){		
		mysql_query ("UPDATE  schoolboy_past_olympics SET place = '$arr_place[$i]', rating_mark = '$arr_rating[$i]' WHERE olympics_id='$get_id' AND schoolboy_users_id='$arr_id_user[$i]'");	
		mysql_query ("UPDATE  schoolboy SET rating = '$array_new_result[$i]' WHERE Users_id='$arr_id_user[$i]'");	
	}	
	$jsonn=array(				
		'name'=>"name2",
				
	);
	echo json_encode($jsonn);
?>
