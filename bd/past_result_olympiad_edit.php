<?php
	include ("../bd.php");
	$data = json_decode($_POST['jsonData']);
	$action=$data->action;
	$id_olympiad=$data->id;	
	if($action=="id_schoolboy"){			
		$result = mysql_query("SELECT * FROM schoolboy_past_olympics WHERE olympics_id='$id_olympiad'");
		$n=mysql_num_rows($result);
		$array_id_schoolboy= array($n);
		$array_place = array($n);
		$array_rating_mark = array($n);
		$array_school = array($n);
		$array_classes = array($n);
		$array_fio = array($n);
		$school = array($n);
		
		
		
		
		for($i=0;$i<$n;$i++){
			$myrow=mysql_fetch_array($result);
			$array_id_schoolboy[$i]=$myrow['schoolboy_users_id'];			
			$result2 = mysql_query("SELECT * FROM schoolboy WHERE Users_id='$array_id_schoolboy[$i]'");
			$myrow2=mysql_fetch_array($result2);
			$array_fio[$i]=$myrow2['Fio_schoolboy'];
			$array_school[$i]=$myrow2['school'];
			$array_classes[$i]=$myrow2['class'];
			
			$array_place[$i]=$myrow['place'];		
			$array_rating_mark[$i]=$myrow['rating_mark'];	

			
			
		}
		$result3 = mysql_query("SELECT * FROM olympics WHERE id='$id_olympiad'");
		$myrow3=mysql_fetch_array($result3);
		$name_ol = $myrow3['name_olympiad'];
		if ($myrow3['IsChild']==0 && $myrow3['nextStage'] != '0')
			$name_ol = $myrow3['name_olympiad']." - 1 этап";
		$jsonn=array(	
			'name_olymp_rezult'=>$name_ol,
			'place'=>$array_place,
			'schoolboy_users_id'=>$array_id_schoolboy,
			'array_school'=>$array_school,
			'array_classes'=>$array_classes,
			'array_fio'=>$array_fio,
			'rating_mark'=>$array_rating_mark,		
			);
		echo json_encode($jsonn);
		
	}
	
	

?>