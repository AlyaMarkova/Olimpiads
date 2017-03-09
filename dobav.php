<?php
session_start();
?>
<html>
	<head>
		<title>Создание олимпиады - Олимпиады ДВФУ</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/create.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/button.css" media="screen" />
	</head>
	<body>	
		<?php include ("header.php");?>
	<div id="main">
		<div id="inside_main">
			<div id="name">
			<p id="name_p">Создание олимпиады</p>

			</div>
			
			
				<div id="left_cont">
					<div id="content">
						<?php

						 include ("forms/Create_olimpiad.php");
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