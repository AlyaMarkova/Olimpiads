<?php
header('Content-Type: text/html; charset=utf-8', true); 
session_start();// вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!!!
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
	if    (isset($_POST['password'])) 
	{ 
		$password = str_replace(" ","",$_POST['password']);
		if ($password == '') 
		{ 
			unset($password);
		} 
	} 
	//если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
	if (empty($login) or empty($password)) 
	{ //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
		?>
		<script>
			alert("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
		</script>
		<?
		exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
	}
	else
	{
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
		if (!$res)
		{
			?>
			<script>
				alert("Извините, введённый вами логин неверный.");
			</script>
			<?
			exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
		} 
		else
		{ //если существует, то сверяем пароли
		
			$password=md5($password);
			if ($res['pass']==$password) 
			{
				if($res['activation']==0)
				{
					?>
					<script>
						alert("Извините, ваша учётная запись ещё не подтверждена администратором сайта, попробуйте позже!");
					</script>
					<?
					exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
				}
				else if($res['activation']==-1)
				{
					?>
					<script>
						alert("Извините, вы не подтвердили свой электронный адрес!");
					</script>
					<?
					exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
				}
				else if($res['activation']==-2)
				{
					$_SESSION['login']=$res['login']; 
					$_SESSION['password']=$res['pass']; 
					$_SESSION['id']=$res['id'];
					$_SESSION['rights']=$res['rights'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
					$_SESSION['activation']=$res['activation'];
				
					?>
					<script>
						alert("Извините, Ваш профиль был отклонён администрацией сайта! Вы можете изменить свои данные, и мы повторно рассмотрим Вашу заявку.");
					</script>
					<?
					exit("<html><head><meta http-equiv='Refresh' content='0; URL=../lk_save.php'></head></html>");
				}
				else
				{
					//если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
					$_SESSION['login']=$res['login']; 
					$_SESSION['password']=$res['pass']; 
					$_SESSION['id']=$res['id'];
					$_SESSION['rights']=$res['rights'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
					$_SESSION['activation']=$res['activation'];
					
					if ($_SESSION['activation']==-2)
					{
						exit("<html><head><meta http-equiv='Refresh' content='0; URL=../lk_save.php'></head></html>");
					}
					else
					{
						exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
					}
				}
			}
			else 
			{
				?>
				<script>
					alert("Извините, введённый пароль неверный.");
				</script>
				<?
				exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
			}
		}
	}   
?>