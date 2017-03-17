<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8"> 
<?php
	//заносим введенный пользователем логин в переменную $login, если он пустой,  то уничтожаем переменную
	if    (isset($_POST['login'])) 
	{ 
		$login = str_replace(" ","",$_POST['login']); 
		if ($login == '') 
		{ 
			unset($login);
		}    
	} 
	//заносим введенный пользователем e-mail, если он    пустой, то уничтожаем переменную
	if    (isset($_POST['email'])) 
	{ 
		$email = str_replace(" ","",$_POST['email']); 
		if ($email == '') 
		{ 
			unset($email);
		} 
	} 
	//если существуют необходимые переменные  
	if    (isset($login) and isset($email)) 
	{
		
		$dsn = 'mysql:dbname=olimpiada;host=127.0.0.1;port=3306;charset=utf8';
		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
		$pdo = new PDO($dsn, 'root', '', $opt);
		
		$sql="SELECT id FROM users WHERE login=?";
		$stm = $pdo->prepare($sql);
		$stm->execute([$login]);
		$res = $stm->fetch();
		$id_user=$res['id'];
		
		
		$sql="SELECT email FROM schoolboy WHERE Users_id=?";
		$stm = $pdo->prepare($sql);
		$stm->execute([$id_user]);
		$res = $stm->fetch();
		$bd_email=$res['email'];
		
		$sql="SELECT email FROM professor WHERE Users_id=?";
		$stm = $pdo->prepare($sql);
		$stm->execute([$id_user]);
		$res = $stm->fetch();
		$bd_email2=$res['email'];
		
		if($email!=$bd_email and $email!=$bd_email2){ 
			?>
			<script>
				alert("Пользователь с такой парой логин-e-mail не обнаружен!");
			</script>
			<?
			exit("<html><head><meta http-equiv='Refresh' content='0; URL=../pass.php'></head></html>");
		}
		else
		{
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
	}
	else
	{
		?>
		<script>
			alert("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
		</script>
		<?
		exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
	}
?>