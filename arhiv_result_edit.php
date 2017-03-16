<?php
session_start();
include ("bd.php");
$id = $_GET['id'];
$myrow = mysql_fetch_array(mysql_query("SELECT name_olympiad FROM olympics WHERE id='$id'"));
?>
<html>
	<head>
		<title><?php echo $myrow[0]?> - Редактирование итогов</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/style3.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/button.css" media="screen" />
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	</head>
	<body>	
		<?php include ("header.php");?>
		<div id="main">
		<div id="inside_main">
			<div id="name">		
				<p id="name_p">Редактирование итогов олимпиады</p>
			</div>
			
			<div id="left_cont">
				<div id="content">
					<?php

						include ("forms/result_olympiad_edit.php");
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
