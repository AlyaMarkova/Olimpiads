<?php
	//session_start();
	include ("../bd.php");
	$id=$_GET['id'];
	$num=$_POST['numact'];
	//echo $_POST['delivery'];
	$rights = mysql_fetch_array(mysql_query("SELECT rights FROM users WHERE id='$id'"));
	
	if ($rights['rights'] == 1) 
		$row_for_mail = mysql_fetch_array(mysql_query("SELECT email, Fio_schoolboy FROM schoolboy WHERE Users_id='$id'"));
	else 
		$row_for_mail = mysql_fetch_array(mysql_query("SELECT email, Fio_professor FROM professor WHERE users_id='$id'"));

	$name = explode("!", $row_for_mail[1]);
	
	if ($num == 1) { 
		$message = "Здравствуйте, ".$name[1]."!\nВаш аккаунт успешно подтверждён! :)\n\n \nС уважением,\nАдминистрация olimpiada.ru";
		mail($row_for_mail[0], "Подтверждение аккаунта", $message, "Content-type:text/plane;    Charset=UTF-8\r\n");
	} else {
		mail($row_for_mail[0], "Ваш аккаунт не подтверждён", $_POST['delivery'], "Content-type:text/plane;    Charset=UTF-8\r\n");
	}
	
	mysql_query ("UPDATE users SET activation='$num' WHERE id='$id'");
	
	exit("<html><head><meta http-equiv='Refresh' content='0; URL=../confirmation_user.php'></head></html>");
?>