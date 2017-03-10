<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8"> 
    <title>Забыли пароль?</title>
</head>
<body>
    
    <form action="../bd/password_recovery_bd.php"    method="post">
		<div>
			<label id="label_pass">Введите Ваш логин и адрес электронной почты, которые указывали при регистрации</label>  
		</div>
		<div>
			<label id="lk_schoolboy">Логин</label>  
			<input type="text"    name="login"></input>
		</div>
		<div>
			<label id="lk_schoolboy">Адрес эл.почты</label>  
			<input type="text"    name="email"></input>
		</div>
		<div>
			<label id="label_pass">На Ваш электронный адрес придёт сообщение с новым паролем</label>  
		</div>
		<div class="button_all">
			<input type="submit" class="knopka_retain"   name="submit" value="Отправить">
			<input type="button" class="knopka_cansel"  onclick="onclick_user()"  name="submit" value="Отмена">
		</div>
    </form>
</body>
</html>
<script>
	function onclick_user(){
		document.location.href='../index.php';	
				
	}
</script>