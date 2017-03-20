<?php
	session_start();
	include("comments/config.php");
	include ("bd.php");
	$id = $_GET['id'];
	$myrow = mysql_fetch_array(mysql_query("SELECT name_olympiad FROM olympics WHERE id='$id'"));
?>
<html>
	<head>
		<title><?php echo $myrow[0]?> - Информация</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/button.css" media="screen" />
		<script type="text/javascript" src="comments/js/jquery-1.4.3.min.js"></script>
		<script type="text/javascript" src="comments/js/tiny_mce/jquery.tinymce.js"></script>		
		<?php
			if(!empty($_SESSION['id'])){?><script type="text/javascript"	src="comments/js/rcheComment.js"></script><?}
		
		?>
		
		<link href="comments/css/rcheComment.css" rel="stylesheet" type="text/css"/>
		
		
	</head>
	<body>	
		<?php include ("header.php");?>
	<div id=main">
		<div id="inside_main">
			<div id="name">
				<p id="name_p">Олимпиада</p>
			</div>
			
			<div id="right_cont">
				<?php
	
						include ("calendar/index.php");
						
				?>
				<div id="best"><?php include ("forms/best.php");?></div>
			</div>
			<script> $.noConflict();</script>
			
			<div id="left_cont">
				<div id="content">
					<?php

						 include ("forms/Olympiad.php");
			 
				$comments->outComments(); 
					?>
				</div>
			
			</div>
			
		
			</div>
			<div style="clear:both;"></div>
		</div>
	
		<?php include ("footer.php");?>	

	</body>
</html>

