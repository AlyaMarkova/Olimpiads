<?php
	include ("../bd.php");
	$data = json_decode($_POST['jsonData']);
	$id_user_session=$data->id_user_session;
	$action=$data->action;
	$qq=$data->id;
	$date=date ("Y-m-d", strtotime($qq));
	$result = mysql_query("SELECT * FROM olympics");
	$i=0;
	$k=0;
	while($row=mysql_fetch_array($result))		
	{	
		$row1 = explode("!", $row[date]);
		$row3[$i]= array('id'=>$row[id], 'date'=>$row1);  
		$i=$i+1;
	}
	for($i=0, $arr_l=count($row3); $i<=$arr_l; $i++){

		for($l=0, $arr_l1=count($row3[$i]["date"])-1; $l<$arr_l1; $l++){
			
			$data = date ("Y-m-d", strtotime($row3[$i]["date"][$l]));
			if($data == $date){
				$rowId[$k] =$row3[$i]["id"];
				$k=$k+1;
			}			
		}	
	}
	$n=count($rowId);
	for($i=0;$i<$n;$i++){
		$res = mysql_query("SELECT * FROM olympics WHERE id = '$rowId[$i]'");
		$myrow=mysql_fetch_array($res);
		$array_name_olympiad[$i]=$myrow['name_olympiad'];
		$array_id[$i]=$myrow['id'];		
		$array_subject[$i]=$myrow['subject'];
		$array_classes[$i]=$myrow['classes'];
		$array_terms[$i]=$myrow['terms'];
		$array_date[$i]=$qq ."!";
		$array_type[$i]=$myrow['IsChild'];
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
		'array_type'=>$array_type,
		'status_display'=>$status_display,	
		'class_schollboy'=>$myrow2['class'],
		);
	echo json_encode($jsonn);

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

?>