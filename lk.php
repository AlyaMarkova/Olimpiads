<?php
session_start();
?>
<html>
	<head>
		<title>Личный кабинет - Олимпиады ДВФУ</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	</head>
	<body>	
		<?php include ("header.php");?>
	<div id="main">
		<div id="inside_main">
			<div id="name">
					<p id="name_p">Личный кабинет</p>
					<input type="button" id="edit_lk" onclick='location.href="lk_save.php"'>		
			</div>
			
			<div id="left_cont">
				<div id="content">
					<?php
						include ("forms/private_kabinet.php");
					?>
				</div>
			
			</div>
			
			<div id="right_cont">
				
				<?php
					if($_SESSION['rights']==1){
						include ("forms/achievements.php");
					}
				?>
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
		<?php include ("footer.php");?>	
		
	</body>
</html>
