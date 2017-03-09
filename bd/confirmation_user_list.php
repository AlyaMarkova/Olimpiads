<?php
	include ("../bd.php");
	
	
	$data = json_decode($_POST['jsonData']);
	$result = mysql_query("SELECT * FROM users WHERE activation=0");
	$n=mysql_num_rows($result);
	$array_id = array($n);
	$array_name_user = array($n);
	$array_name_rights = array($n);
	for($i=0;$i<$n;$i++){
		$myrow=mysql_fetch_array($result);
		
		$array_id[$i]=$myrow['id'];
		if($myrow['rights']==1){
			$array_name_rights[$i]="Учащийся";
		}
		if($myrow['rights']==2){
			$array_name_rights[$i]="Организатор";
		}	
	}
	
	for($i=0;$i<$n;$i++){
		if($array_name_rights[$i]=="Учащийся"){
			$result = mysql_query("SELECT * FROM schoolboy WHERE Users_id=".$array_id[$i]);
			$myrow=mysql_fetch_array($result);
			$array_name_user[$i]=$myrow['Fio_schoolboy'];
			
		}
		if($array_name_rights[$i]=="Организатор"){
			$result = mysql_query("SELECT * FROM professor WHERE users_id=".$array_id[$i]);
			$myrow=mysql_fetch_array($result);
			$array_name_user[$i]=$myrow['Fio_professor'];
		}	
		
	}
	
	$jsonn=array(			

		'array_name_user'=>$array_name_user,
		'array_name_rights'=>$array_name_rights,
		'array_id'=>$array_id,
		
		);
	echo json_encode($jsonn);
?>