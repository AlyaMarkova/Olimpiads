<?php
	include ("../bd.php");
	$data = json_decode($_POST['jsonData']);
	$id_user_session=$data->id_user_session;
	$action=$data->action;
	$result = mysql_query("SELECT * FROM olympics WHERE process='in process'");
	$n=mysql_num_rows($result);
	$array_id = array($n);
	$array_name_olympiad = array($n);
	$array_date = array($n);
	$array_subject = array($n);
	$array_classes = array($n);
	$array_terms = array($n);
	$id_org = array($n);
	$status_display = array($n);
	
	for($i=0;$i<$n;$i++){
		$myrow=mysql_fetch_array($result);
		$array_name_olympiad[$i]=$myrow['name_olympiad'];
		$array_id[$i]=$myrow['id'];
		
		$array_subject[$i]=$myrow['subject'];
		$array_classes[$i]=$myrow['classes'];
		$array_terms[$i]=$myrow['terms'];
		
		$dates = $myrow['date'];
		if ($myrow['nextStage'] != '0') {
			$id_stages = explode("!", $myrow['nextStage']);
			for ($j=0; $j<count($id_stages); $j++) {
				$row_date = mysql_fetch_array(mysql_query("SELECT date FROM olympics WHERE id='$id_stages[$j]'"));
				$dates .= $row_date['date'];
			}
		}
		$array_date[$i]=$dates;
		$id_org[$i]=$myrow['professor_users_id'];
		if(!empty($id_user_session)){
			$result2 = mysql_query("SELECT * FROM schoolboy_olympics WHERE schoolboy_users_id='$id_user_session' AND olympics_id='$array_id[$i]'");
			$n2=mysql_num_rows($result2);
			if($n2!=0){
				$status_display[$i]=1;
			}
			else{
				$status_display[$i]=0;
			}
			
		}
	
	}
	$result2 = mysql_query("SELECT * FROM schoolboy WHERE Users_id='$id_user_session'");
	$myrow2=mysql_fetch_array($result2);
	
	$jsonn=array(				
		'id_org'=>$id_org,
		'array_id'=>$array_id,
		'array_name_olympiad'=>$array_name_olympiad,
		'array_subject'=>$array_subject,
		'array_classes'=>$array_classes,
		'array_terms'=>$array_terms,
		'array_date'=>$array_date,			
		'status_display'=>$status_display,	
		'class_schollboy'=>$myrow2['class'],
		);
	echo json_encode($jsonn);
?>