
<?php
	//session_start();
	include ("../bd.php");
	$data = json_decode($_POST['jsonData']);
	$id=$data->id;	
	$result = mysql_query("SELECT * FROM olympics WHERE id='$id'");
	$myrow = mysql_fetch_array($result);	
	
	//if ($myrow['nextStage'] != '0') { 
	//else {$type=0}
	//}
	
	if ($myrow['nextStage'] != '0') { 
	$type=1;
	$id_stages = explode("!", $myrow['nextStage']); 
	for ($i=0; $i<count($id_stages); $i++) { 
	$row_date = mysql_fetch_array(mysql_query("SELECT date FROM olympics WHERE id='$id_stages[$i]'")); 
	$dates = $row_date['date']; 
	}  
	} else {$type=0;}
	
	$jsonn=array(				
		'id'=>$myrow['id'],
		'date'=>$dates,
		'type'=>$type,
		'description'=>$myrow['description'],
		'name_olympiad'=>$myrow['name_olympiad'],
		'subject'=>$myrow['subject'],
		'professor_users_id'=>$myrow['professor_users_id'],						
		'classes'=>$myrow['classes'],						
		'terms'=>$myrow['terms'],						
		'location'=>$myrow['location'],						
	);
	echo json_encode($jsonn);	
?>
