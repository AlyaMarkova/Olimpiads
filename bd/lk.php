<?php
	include ("../bd.php");
	$data = json_decode($_POST['jsonData']);
	$id=$data->id;
	$action=$data->action;
	if($action==1){
		$result = mysql_query("SELECT * FROM schoolboy WHERE Users_id='$id'");
		$myrow= mysql_fetch_array($result);	
		$jsonn=array(				
			'id'=>$id,	
			'FIO'=>$myrow['Fio_schoolboy'],
			'school'=>$myrow['school'],
			'classes'=>$myrow['class'],
			'birthdate'=>$myrow['birthdate'],
			'phone'=>$myrow['phone'],
			'email'=>$myrow['email'],
			'gender'=>$myrow['gender'],
			'home_adress'=>$myrow['home_adress'],
			'rating'=>$myrow['rating'],
			);
		echo json_encode($jsonn);		
	}
	if($action==2){
		$result = mysql_query("SELECT * FROM professor WHERE users_id='$id'");
		$myrow= mysql_fetch_array($result);	
		$result = mysql_query("SELECT name_olympiad FROM olympics WHERE professor_users_id='$id'");
		$name_olympiad= mysql_fetch_array($result);	
		$jsonn=array(				
			'id'=>$id,	
			'FIO'=>$myrow['Fio_professor'],
			'email'=>$myrow['email'],
			'phone'=>$myrow['phone'],	
			'name_olympiad'=>$name_olympiad,
			);
		echo json_encode($jsonn);		
	}
	if($action==3){
		$result = mysql_query("SELECT * FROM users WHERE id='$id'");
		$myrow= mysql_fetch_array($result);	
		$jsonn=array(				
			'id'=>$id,	
			'login'=>$myrow['login'],		
			);
		echo json_encode($jsonn);		
	}
?>
