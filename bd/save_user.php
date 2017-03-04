<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8"> 
<?php
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
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

if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
?>
<script>
alert("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
</script>
<?
exit("<html><head><meta http-equiv='Refresh' content='0; URL=../registr_form.php'></head></html>");

}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
$password = md5($password);


// подключаемся к базе
include ("../bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

// проверка на существование пользователя с таким же логином
$result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
?>
<script>
alert("Извините, введённый вами логин уже зарегистрирован. Введите другой логин");
</script>
<?
exit("<html><head><meta /*http-equiv='Refresh' content='0; URL=../registr_form.php'*/></head></html>");
//exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}

// если такого нет, то сохраняем данные 
$result2 = mysql_query ("INSERT INTO users (login,pass,rights,activation) VALUES('$login','$password','$select_status','-1')");
If ($select_status=="1"){
	if($spam_email=="ON"){
		$spam_email=1;
	}
	else{
		$spam_email=0;
	}
	$id_select = mysql_query("SELECT id FROM users WHERE login='$login'");
	$myrow = mysql_fetch_array($id_select);
	$id_select_user=$myrow['id'];
	$fio=$surname."!".$forename."!".$patronymic."!";
	$year=$_POST['year1'];
	$day = str_pad($_POST["day1"], 2, '0', STR_PAD_LEFT);
	$month = str_pad($_POST["month1"], 2, '0', STR_PAD_LEFT);
	$DOB=$year."-".$month."-".$day;
	$result_mail =  mysql_query("SELECT Users_id FROM schoolboy WHERE email='$email'"); 
	$myrow_email = mysql_fetch_array($result_mail);
	if ($myrow_email[0] == ""){
	//mysql_query ("INSERT INTO schoolboy (Users_id,Fio_schoolboy,school,class,birthdate, phone, email, gender, home_adress) VALUES('$id_select','$surname','$school','$class','$DOB','$mob_number','$email','$sex','$location')");
	mysql_query ("INSERT INTO schoolboy (Users_id,Fio_schoolboy,school,class,birthdate, phone, email,gender, home_adress,delivery) VALUES('$id_select_user','$fio','$school','$select_class','$DOB','$mob_number','$email','$sex','$location','$spam_email')");
	}
	else{
		?>
<script>
alert("Извините, введённая вами почта уже зарегистрирована. Введите другую почту");
</script>
<?
exit("<html><head><meta http-equiv='Refresh' content='0; URL=../registr_form.php'></head></html>");	
	}
}
else{
	$id_select = mysql_query("SELECT id FROM users WHERE login='$login'");
	$myrow = mysql_fetch_array($id_select);
	$id_select_user=$myrow['id'];
	$fio=$surname."!".$forename."!".$patronymic."!";
	$result_mail =  mysql_query("SELECT users_id FROM professor WHERE email='$email'");
	$myrow_email = mysql_fetch_array($result_mail);
	if ($myrow_email[0] == ""){
	//mysql_query ("INSERT INTO schoolboy (Users_id,Fio_schoolboy,school,class,birthdate, phone, email, gender, home_adress) VALUES('$id_select','$surname','$school','$class','$DOB','$mob_number','$email','$sex','$location')");
	mysql_query ("INSERT INTO professor (Users_id,Fio_professor, phone, email) VALUES('$id_select_user','$fio','$mob_number','$email')");
}
else{
	?>
<script>
alert("Извините, введённая вами почта уже зарегистрирована. Введите другую почту");
</script>
<?
exit("<html><head><meta http-equiv='Refresh' content='0; URL=../registr_form.php'></head></html>");
}
}
$activation    = md5($id_select_user).md5($login);//код активации аккаунта. Зашифруем    через функцию md5 идентификатор и логин. Такое сочетание пользователь вряд ли    сможет подобрать вручную через адресную строку.
$subject    = "Подтверждение регистрации";//тема сообщения
            $message    = "Здравствуйте! Спасибо за регистрацию на olimpiada.ru\nВаш логин:    ".$login."\n
            Перейдите    по ссылке, чтобы активировать ваш    аккаунт:\nhttp://olimp/bd/activation.php?login=".$login."&code=".$activation."\nС    уважением,\n
            Администрация    olimpiada.ru";//содержание сообщение
            mail($email,    $subject, $message, "Content-type:text/plane;    Charset=windows-1251\r\n");//отправляем сообщение
// Проверяем, есть ли ошибки
if ($result2=='TRUE')
{
	
		?>
		<script>
			alert("Вам на электронную почту было выслано письмо. Подтвердите свой электронный адрес!");
		</script>
		<?
		exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
}

else {
echo "Ошибка! Вы не зарегистрированы.";
     }
?>
