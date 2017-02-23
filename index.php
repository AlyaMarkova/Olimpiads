<?php
session_start();
include ("bd.php");
?>
<html>
	<head>
		<title>Hello, yopta</title>
		<meta charset="UTF-8">
		<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/modal_window.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/button.css" media="screen" />
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	</head>
	<body>	
		<?php include ("header.php");?>
	<div id="main">
		<div id="inside_main">
			<div id="name">		
				<p id="name_p">Олимпиады</p>
			</div>
			
			<div id="left_cont">
				<div id="content">
					<?php

						include ("forms/upcoming_Olympics.php");
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
