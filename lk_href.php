<?php
session_start();
include ("bd.php");
$id = $_GET['id'];
$myrow = mysql_fetch_array(mysql_query("SELECT Fio_schoolboy FROM schoolboy WHERE Users_id='$id'"));
$fio_ex = explode("!", $myrow[0]);
$fio_sp = implode(" ", $fio_ex);
?>
<html>
	<head>
		<title><?php echo $fio_sp?></title>
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

			</div>
			
			<div id="left_cont">
				<div id="content">
					<?php
						include ("forms/private_kabinet_href.php");
					?>
				</div>
			
			</div>
			
			
			<div id="right_cont">
				
				<?php
					
						include ("forms/achievements_get.php");
					
				?>
			</div>
			
		</div>
			<div style="clear:both;"></div>
	</div>
		<?php include ("footer.php");?>	
		
	</body>
</html>
