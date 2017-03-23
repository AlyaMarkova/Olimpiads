<?php
	include ("../bd.php");
	$data = json_decode($_POST['jsonData']);
	$id=$data->id;
	mysql_query ("UPDATE olympics SET process='passed' WHERE id='$id'");	
?>