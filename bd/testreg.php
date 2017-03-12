<?php
session_start();// вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!!!

if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

if (empty($login) or empty($password)) { //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
	?>
	<script>
		alert("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
	</script>
	<?
	exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
}

//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
$password=md5($password);

// подключаемся к базе
include ("../bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

$result = mysql_query("SELECT * FROM users WHERE login='$login'",$db); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysql_fetch_array($result);

if (empty($myrow['pass'])){
	?>
	<script>
		alert("Извините, введённый вами логин или пароль неверный.");
	</script>
	<?
	exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
} else { //если существует, то сверяем пароли
	if ($myrow['pass']==$password) {
		if($myrow['activation']==0){
			?>
			<script>
				alert("Извините, ваша учётная запись ещё не подтверждена администратором сайта, попробуйте позже!");
			</script>
			<?
			exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
		}
		if($myrow['activation']==-1){
			?>
			<script>
				alert("Извините, вы не подтвердили свой электронный адрес!");
			</script>
			<?
			exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
		}
		if($myrow['activation']==-2){
			?>
			<script>
				alert("Извините, Ваш профиль был отклонён администрацией сайта! Вы можете изменить свои данные, и мы повторно рассмотрим Вашу заявку.");
			</script>
			<?
			//exit("<html><head><meta http-equiv='Refresh' content='0; URL=../lk_save.php'></head></html>");
		}
		
	//если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
		$_SESSION['login']=$myrow['login']; 
		$_SESSION['password']=$myrow['pass']; 
		$_SESSION['id']=$myrow['id'];
		$_SESSION['rights']=$myrow['rights'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
		$_SESSION['activation']=$myrow['activation'];
		
		if ($_SESSION['activation']==-2)
			exit("<html><head><meta http-equiv='Refresh' content='0; URL=../lk_save.php'></head></html>");
		else
			exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
	}else {
		?>
		<script>
			alert("Извините, введённый вами логин или пароль неверный.");
		</script>
		<?
		exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
	}	   
}   
?>