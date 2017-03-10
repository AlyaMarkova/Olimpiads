<?php
	include ("../bd.php");
	$data = json_decode($_POST['jsonData']);
	$id=$data->id;
	
	$result3 = mysql_query("SELECT schoolboy_users_id FROM schoolboy_olympics WHERE olympics_id='$id'");
	//$n=mysql_num_rows($result3);
	
	$result2 = mysql_query("SELECT name_olympiad FROM olympics WHERE  id='$id'");
	$myrow2 = mysql_fetch_array($result2);	 
	
	while ($row3 = mysql_fetch_assoc($result3)) {
		$id_user = $row3['schoolboy_users_id'];
		$result = mysql_query("SELECT email FROM schoolboy WHERE Users_id='$id_user' and delivery=1");
		$row = mysql_fetch_array($result);
			$subject    = "Удалена Олимпиада";//тема сообщения
			$message    = "Здравствуйте!
				На сайте olimpiada.ru удалилась олимпиада на которую вы были зарегистрированы, под названием: ".$myrow2[0]." . Приносим свои извинения!  
				С    уважением, Администрация    olimpiada.ru";
			mail($row['email'], $subject, $message, "Content-type:text/plane;    Charset=windows-1251\r\n");					
	}
	mysql_query("DELETE FROM olympics WHERE  id='$id'");
	mysql_query("DELETE FROM schoolboy_olympics WHERE  olympics_id='$id'");
	
?>
