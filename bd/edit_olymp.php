
<?php
	//session_start();
	include ("../bd.php");
	$data = json_decode($_POST['jsonData']);
	$id=$data->id;	
	$result = mysql_query("SELECT * FROM olympics WHERE id='$id'");
	$myrow= mysql_fetch_array($result);	
	$jsonn=array(				
		'id'=>$myrow['id'],
		'description'=>$myrow['description'],
		'date'=>$myrow['date'],
		'name_olympiad'=>$myrow['name_olympiad'],
		'subject'=>$myrow['subject'],
		'professor_users_id'=>$myrow['professor_users_id'],						
		'classes'=>$myrow['classes'],						
		'terms'=>$myrow['terms'],						
		'location'=>$myrow['location'],						
	);
	echo json_encode($jsonn);	
?>
