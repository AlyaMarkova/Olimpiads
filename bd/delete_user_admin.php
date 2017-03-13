<?php
include ("../bd.php");
$data = json_decode($_POST['jsonData']);
$id=$data->id;
$id2=$data->id2;
$myrow = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='$id'"));

/******** отсылаем сообщение о такой досадной новости *********/
if ($myrow['rights'] == 1) 
	$row = mysql_fetch_array(mysql_query("SELECT email FROM schoolboy WHERE Users_id='$id'"));
else $row = mysql_fetch_array(mysql_query("SELECT email FROM professor WHERE users_id='$id'"));
$email = $row['email'];
$message = "Уважаемый ".$myrow['login']."!\nСообщаем, что Ваш профиль был удалён Администрацией сайта.\n\nС уважением,\nАдминистрация olimpiada.ru";
mail($email, "Удаление профиля", $message, "Content-type:text/plane;    Charset=UTF-8\r\n");
/***********************************************/

//удаляем из бд
$rights=$myrow['rights'];
mysql_query("DELETE FROM users WHERE  id='$id'");
if($rights==1){
	mysql_query("DELETE FROM comments WHERE user='$id' or reply='$id'");
	mysql_query("DELETE FROM schoolboy_past_olympics WHERE schoolboy_users_id='$id'");
	mysql_query("DELETE FROM schoolboy_olympics WHERE schoolboy_users_id='$id'");
	mysql_query("DELETE FROM schoolboy WHERE Users_id='$id'");
}
if($rights==2){
	mysql_query("DELETE FROM comments WHERE user='$id' or reply='$id'");
	mysql_query("DELETE FROM professor WHERE  users_id='$id'");
	mysql_query ("UPDATE  olympics SET professor_users_id = '$id2' WHERE professor_users_id='$id'");	
}
?>
