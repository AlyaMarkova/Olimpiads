<?php
session_start();
?>
<html>
	<head>
		<title>Регистрация пользователя - Олимпиады ДВФУ</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/modal_window.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/button.css" media="screen" />
		<script type="text/javascript" src="js/jquery-3.2.0.js"></script>
		<link href="dist/css/select2.min.css" rel="stylesheet" />
		<script src="dist/js/select2.min.js"></script>
	</head>
	<body>	
		<?php include ("header.php");?>
	<div id="main">
	
		<div id="inside_main">
			<div id="name">		
				<p id="name_p">Регистрация пользователя</p>
			</div>
			
			<div id="left_cont">
				<div id="content">
					<?php

						include ("forms/reg.php");
					?>
				</div>
			
			</div>
			
			<div id="right_cont">
				<?php

						include ("calendar/index.php");
						
				?>
				<div id="best"><?php include ("forms/best.php");?></div>
			</div>
			
			<div style="clear:both;"></div>
		</div>
	</div>
		<?php include ("footer.php");?>	
		
	</body>
</html>
