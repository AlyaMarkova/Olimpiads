<?php
include ("../bd.php");
$data = json_decode($_POST['jsonData']);
$id=$data->id;

$result3 = mysql_query("SELECT schoolboy_users_id FROM schoolboy_olympics WHERE olympics_id='$id'");
//$n=mysql_num_rows($result3);

$myrow2 = mysql_fetch_array(mysql_query("SELECT name_olympiad FROM olympics WHERE  id='$id'"));	 

while ($row3 = mysql_fetch_assoc($result3)) {
	$id_user = $row3['schoolboy_users_id'];
	$row = mysql_fetch_array(mysql_query("SELECT email, Fio_schoolboy, gender FROM schoolboy WHERE Users_id='$id_user'"));
	
	$name = explode("!", $row['Fio_schoolboy']); //name[1] - это ИМЯ учащегося

	if ($row['gender'] == "Женский") 
		$ending = "ая";
	else 
		$ending = "ый";	
	
	$subject = "Удалена Олимпиада";//тема сообщения
	$message = "Уважаем".$ending." ".$name[1]."!\nСообщаем Вам, что олимпиада под названием: ".$myrow2[0].", в которой Вы участвовали, была удалена организатором.\nПриносим свои извинения!\n\nС уважением, Администрация olimpiada.ru";
	mail($row['email'], $subject, $message, "Content-type:text/plane;    Charset=windows-1251\r\n");					
}
mysql_query("DELETE FROM olympics WHERE  id='$id'");
mysql_query("DELETE FROM schoolboy_olympics WHERE  olympics_id='$id'");	
?>
