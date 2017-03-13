<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8"> 
<?php
if    (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);}    } //заносим введенный пользователем логин в переменную $login, если он пустой,    то уничтожаем переменную
if    (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } //заносим введенный пользователем e-mail, если он    пустой, то уничтожаем переменную
if    (isset($login) and isset($email)) {//если существуют необходимые переменные  
	include ("../bd.php"); // файл    bd.php должен быть в той же папке, что и все остальные, если это не так, то    просто измените путь 

	$result = mysql_query("SELECT id FROM users WHERE login='$login'");//такой ли у пользователя логин
	$myrow = mysql_fetch_array($result);
	$id_user = $myrow['id'];

	$result2 = mysql_query("SELECT email FROM schoolboy WHERE Users_id='$id_user'");//такой ли у пользователя е-мейл 
	$myrow2 = mysql_fetch_array($result2);
	$bd_email = $myrow2['email'];

	$result2 = mysql_query("SELECT email FROM professor WHERE users_id='$id_user'");//такой ли у пользователя е-мейл 
	$myrow2 = mysql_fetch_array($result2);
	$bd_email2 = $myrow2['email'];

	if($email!=$bd_email and $email!=$bd_email2){ 
		?>
		<script>
			alert("Пользователь с такой парой логин-e-mail не обнаружен!");
		</script>
		<?
		exit("<html><head><meta http-equiv='Refresh' content='0; URL=../pass.php'></head></html>");
	}

	//если пользователь с таким логином и е-мейлом найден,    то необходимо сгенерировать для него случайный пароль, обновить его в базе и    отправить на е-мейл
	$datenow = date('YmdHis');//извлекаем    дату 
	$new_password = md5($datenow);// шифруем    дату
	$new_password = substr($new_password,    2, 6); //извлекаем из шифра 6 символов начиная    со второго. Это и будет наш случайный пароль. Далее запишем его в базу,    зашифровав точно так же, как и обычно.

	$new_password_sh =    strrev(md5($new_password))."b3p6f";//зашифровали 
	$new_password55=md5($new_password);
	mysql_query("UPDATE users SET    pass='$new_password55' WHERE login='$login'");// обновили в базе 

	//формируем сообщение

	$message = "Здравствуйте,    ".$login."! Мы сгененриоровали для Вас пароль, теперь Вы сможете    войти на сайт citename.ru, используя его. После входа желательно его сменить.    Пароль:\n".$new_password;//текст сообщения
	mail($email, "Восстановление пароля", $message, "Content-type:text/plane; Charset=windows-1251\r\n");//отправляем сообщение 

	?>
	<script>
		alert("На Ваш e-mail отправлено письмо с паролем.");
	</script>
	<?
	exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
}

?>