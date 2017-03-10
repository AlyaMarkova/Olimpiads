<?php
include ("../bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто    измените путь  
$data = json_decode($_POST['jsonData']);

//получаем ид олимпиады и ученика
$id_olymp = $data->id_olymp;
$id_user = $data->id_user;

//получаем количество записей с искомыми ид олимпиады и ученика
$result = mysql_query("SELECT * FROM schoolboy_olympics WHERE olympics_id='$id_olymp' AND schoolboy_users_id='$id_user'");
//$myrow= mysql_fetch_array($result);

$n = mysql_num_rows($result); //количество полученных строк

if($n == 0){ //если таких записей нет (т.е. заявка только подаётся)
	mysql_query("INSERT INTO schoolboy_olympics (olympics_id,schoolboy_users_id) VALUES ('$id_olymp','$id_user')");
	$jsonn = array(
	'status'=>1,
	);	
	
	$myrow = mysql_fetch_array(mysql_query("SELECT email, Fio_schoolboy, gender, delivery FROM schoolboy WHERE Users_id='$id_user'"));
	
	if ($myrow['delivery'] == 1) {
		$email = $myrow['email'];
		$name = explode("!", $myrow['Fio_schoolboy']); //name[1] - это ИМЯ учащегося
		
		if ($myrow['gender'] == "Женский") 
			$ending = "ая";
		else 
			$ending = "ый";
		
		//получаем название олимпиады и дату проведения
		$myrow2 = mysql_fetch_array(mysql_query("SELECT name_olympiad, date FROM olympics WHERE id='$id_olymp'"));
		$name_olimp = $myrow2['name_olympiad'];
		$date = explode("!", $myrow2['date']); //date[0] - дата и время первого этапа
		
		//содержание сообщения 
		$message = "Уважаем".$ending." ".$name[1]."!\nВы записались на олимпиаду \"".$name_olimp."\", которая состоится ".date("d.m.Y", strtotime($date[0]))." в ".date("H:i", strtotime($date[0])).".\nУдачи!\n \nС уважением,\nАдминистрация olimpiada.ru";
		
		//отправляем сообщение
		mail($email, "Заявка на участие в олимпиаде", $message, "Content-type:text/plane;    Charset=UTF-8\r\n");
	}
} else { //если такая запись уже есть (т.е. заявка отменяется)
	mysql_query("DELETE FROM schoolboy_olympics WHERE olympics_id='$id_olymp' AND schoolboy_users_id='$id_user'");
	$jsonn = array(			
	'status'=>2,
	);	
}
echo json_encode($jsonn);
?>