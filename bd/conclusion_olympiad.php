<?php
	include ("../bd.php");
	$data = json_decode($_POST['jsonData']);
	$id=$data->id;
	$result = mysql_query("SELECT * FROM olympics WHERE id='$id'");
	$myrow= mysql_fetch_array($result);
	
	$id_user=$data->id_user;
	$result2 = mysql_query("SELECT * FROM schoolboy_olympics WHERE olympics_id='$id' AND schoolboy_users_id='$id_user'");

	
	//$result2 = mysql_query("SELECT * FROM schoolboy_olympics WHERE olympics_id='$id' AND schoolboy_users_id='$id_user'");
	//$myrow2= mysql_fetch_array($result2);
	//$result2_2 = mysql_query($result2);
	$n=mysql_num_rows($result2);
	if($n==0){
		$a=1;
	}
	else{
		$a=2;
	}
	$result3 = mysql_query("SELECT * FROM schoolboy WHERE Users_id='$id_user'");
	$myrow3=mysql_fetch_array($result3);
	
	$dates = $myrow['date'];
	
	if ($myrow['nextStage'] != '0') {
		$id_stages = explode("!", $myrow['nextStage']);
		for ($i=0; $i<count($id_stages); $i++) {
			$row_date = mysql_fetch_array(mysql_query("SELECT date FROM olympics WHERE id='$id_stages[$i]'"));
			$dates .= $row_date['date'];
		}
	}
	
	$jsonn=array(				
		'id'=>$id,	
		'status'=>$a,
		'name'=>$myrow['name_olympiad'],
		'date'=>$dates,
		'description'=>$myrow['description'],
		'professor_users_id'=>$myrow['professor_users_id'],
		'user_classes'=>$myrow3['class'],
		'subject'=>$myrow['subject'],
		'terms'=>$myrow['terms'],
		'location'=>$myrow['location'],
		'classes'=>$myrow['classes'],
		'professor_users_id'=>$myrow['professor_users_id'],
		);
	echo json_encode($jsonn);
?>
