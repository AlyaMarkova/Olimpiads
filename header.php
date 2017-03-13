<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/button.css" media="screen" />
<div id="header">
	<div id="menu">
		<ul class="main-menu">
			<li id="p_menu1"><a href="http://olimp/index.php">Олимпиады</a></li>
			<li id="p_menu2"><a href='http://olimp/reiting.php'>Рейтинг участников</a></li>
			<li id="p_menu3"><a href="http://olimp/arhiv.php">Итоги олимпиад</a>
				<!--
				class="cursorik"
					<ul class="sub-menu">
					<li id="p_menu4"><a href="http://olimp/arhiv.php">Итоги олимпиад</a></li>
				</ul>-->
			</li>
		</ul>
	</div>
		
</script> 
<?php 
if (empty($_SESSION['rights'])){
	include ("forms/login_form.php");
	}
if ($_SESSION['rights']==1){
	include ("forms/login_form_user.php");
}
if ($_SESSION['rights']==2){
	include ("forms/login_form_prof.php");
}
if ($_SESSION['rights']==3){
	include ("forms/login_form_admin.php");
}
?>
</div>
	
	