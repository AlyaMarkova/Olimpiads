<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8"> 
<?php
if (isset($_POST['login'])) { $login = str_replace(" ","",$_POST['login']);  if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password = str_replace(" ","",$_POST['password']); if ($password =='') { unset($password);} }
if (isset($_POST['select_status'])) { $select_status=$_POST['select_status']; if ($select_status =='') { unset($select_status);} }
if (isset($_POST['surname'])) { $surname=$_POST['surname']; if ($surname =='') { unset($surname);} }
if (isset($_POST['forename'])) { $forename=$_POST['forename']; if ($forename =='') { unset($forename);} }
if (isset($_POST['patronymic'])) { $patronymic=$_POST['patronymic']; if ($patronymic =='') { unset($patronymic);} }
if (isset($_POST['sex'])) { $sex=$_POST['sex']; if ($sex =='') { unset($sex);} }
//if (isset($_POST['DOB'])) { $DOB=$_POST['DOB']; if ($DOB =='') { unset($DOB);} }
if (isset($_POST['school'])) { $school=$_POST['school']; if ($school =='') { unset($school);} }
if (isset($_POST['select_class'])) { $select_class=$_POST['select_class']; if ($select_class =='') { unset($select_class);} }
if (isset($_POST['location'])) { $location=$_POST['location']; if ($location =='') { unset($location);} }
if (isset($_POST['mob_number'])) { $mob_number=$_POST['mob_number']; if ($mob_number =='') { unset($mob_number);} }
if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
if (isset($_POST['spam_email'])) { $spam_email=$_POST['spam_email']; if ($spam_email =='') { unset($spam_email);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

if (empty($login) or empty($password)){ //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
	?>
	<script>
		alert("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
	</script>
	<?
	exit("<html><head><meta http-equiv='Refresh' content='0; URL=../registr_form.php'></head></html>");
}

//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
	$dsn = 'mysql:dbname=olimpiada;host=127.0.0.1;port=3306;charset=utf8';
	$opt = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	 
	$pdo = new PDO($dsn, 'root', '', $opt);
	$sql="SELECT * FROM users WHERE login=?";
	
	$stm = $pdo->prepare($sql);
	$stm->execute([$login]);
	$res = $stm->fetch();
	if ($res) {
		?>
		<script>
			alert("Извините, введённый вами логин уже зарегистрирован. Введите другой логин");
			javascript:history.back() 
		</script>
		<?
		/*exit("<html><head><meta http-equiv='Refresh' content='0; URL=../registr_form.php'></head></html>");*/
	}
	else 
	{
		// если такого нет, то сохраняем данные 
		$stmt = $pdo->prepare("INSERT INTO users (login,pass,rights,activation) VALUES (?,?,?,?)");
		$stmt->bindParam(1, $login);
		$stmt->bindParam(2, $password);
		$stmt->bindParam(3, $select_status);
		$stmt->bindParam(4, -1);
		$stmt->execute();
		
		/******** для школьника **********/
		If ($select_status=="1"){
			if($spam_email=="ON"){
				$spam_email=1;
			} else {
				$spam_email=0;
			}
			$sql="SELECT id FROM users WHERE login=?";
			$stm = $pdo->prepare($sql);
			$stm->execute([$login]);
			$id_select_user = $stm->fetch();
			
			//составляем строки для ФИО и даты рождения
			$fio = $surname."!".$forename."!".$patronymic."!";
			$DOB = $_POST['year1']."-".str_pad($_POST["month1"], 2, '0', STR_PAD_LEFT)."-".str_pad($_POST["day1"], 2, '0', STR_PAD_LEFT);
			
			$sql="SELECT Users_id FROM schoolboy WHERE email=?"); 
			$stm = $pdo->prepare($sql);
			$stm->execute([$login]);
			$myrow_email = $stm->fetch();
			
			if ($myrow_email[0] != ""){ //если поле для эл адреса не пустое
				?>
				<script>
					alert("Извините, введённая вами почта уже зарегистрирована. Введите другую почту");
					javascript:history.back() 
				</script>
				<?
				$bool=false;	
			} 
			else 
			{
				$sql="INSERT INTO schoolboy (Users_id,Fio_schoolboy,school,class,birthdate, phone, email,gender, home_adress,delivery) VALUES(?,?,?,?,?,?,?,?,?,?)"); 
				$stm = $pdo->prepare($sql);
				$stm->bindParam(0, $id_select_user);
				$stm->bindParam(1, $fio);
				$stm->bindParam(2, $school);
				$stm->bindParam(3, $select_class);
				$stm->bindParam(4, $DOB);
				$stm->bindParam(5, $mob_number);
				$stm->bindParam(6, $email);
				$stm->bindParam(7, $sex);
				$stm->bindParam(8, $location);
				$stm->bindParam(9, $spam_email);
				$stm->execute();	
			}
		}
		
		/************ для организатора ***********/
		else 
		{
		
			$sql="SELECT id FROM users WHERE login=?";
			$stm = $pdo->prepare($sql);
			$stm->execute([$login]);
			$id_select_user = $stm->fetch();
			
			$fio=$surname."!".$forename."!".$patronymic."!";
					
			$sql="SELECT Users_id FROM professor WHERE email=?"); 
			$stm = $pdo->prepare($sql);
			$stm->execute([$login]);
			$myrow_email = $stm->fetch();
			
			if ($myrow_email[0] == ""){
				$sql="INSERT INTO professor (Users_id,Fio_professor, phone, email) VALUES(?,?,?,?)"); 
				$stm = $pdo->prepare($sql);
				$stm->bindParam(0, $id_select_user);
				$stm->bindParam(1, $fio);
				$stm->bindParam(2, $mob_number);
				$stm->bindParam(3, $email);
				$stm->execute();	
			} else {
				?>
				<script>
					alert("Извините, введённая вами почта уже зарегистрирована. Введите другую почту");
					javascript:history.back() 
				</script>
				<?
				$bool=false;
			}
		}
		
		if ($bool){
			$activation = md5($id_select_user).md5($login);//код активации аккаунта. Зашифруем    через функцию md5 идентификатор и логин. Такое сочетание пользователь вряд ли    сможет подобрать вручную через адресную строку.
			$subject = "Подтверждение регистрации";//тема сообщения
			$message = "Здравствуйте! Спасибо за регистрацию на olimpiada.ru\nВаш логин:    ".$login."\n
			Перейдите    по ссылке, чтобы активировать ваш    аккаунт:\nhttp://olimp/bd/activation.php?login=".$login."&code=".$activation."\nС    уважением,\n
			Администрация    olimpiada.ru";//содержание сообщение
			mail($email,    $subject, $message, "Content-type:text/plane;    Charset=windows-1251\r\n");//отправляем сообщение
			// Проверяем, есть ли ошибки
			if ($result2=='TRUE') {	
				?>
				<script>
					alert("Вам на электронную почту было выслано письмо. Подтвердите свой электронный адрес!");
				</script>
				<?
				exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
			} else {
				?>
				<script>
					alert("Ошибка! Вы не зарегистрированы.");
					javascript:history.back() 
				</script>
				<?
			}
		}
	}
?>
