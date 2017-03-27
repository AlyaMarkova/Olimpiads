<?php
	include ("../bd.php");
	$data = json_decode($_POST['jsonData']);
	$id_parent=$data->id_parent;
	$id_stage=$data->id_stage;
	
	$row_parent = mysql_fetch_array(mysql_query("SELECT Olympiad_status,nextStage FROM  olympics WHERE id='$id_parent'"));
	
	if ($id_stage==0) { // самый первый этап (родитель)
		if ($row_parent['Olympiad_status'] == 0) { // проверяем статус
			mysql_query ("UPDATE olympics SET Olympiad_status=1 WHERE id='$id_parent'"); // меняем на недействительную
	
			$result = mysql_query("SELECT * FROM  schoolboy_olympics WHERE olympics_id='$id_parent'"); //ставим прошедшей у всех участников
			$n=mysql_num_rows($result);		
			for($i=0;$i<$n;$i++){
				$myrow=mysql_fetch_array($result);
				$user_id=$myrow['schoolboy_users_id'];
				mysql_query("INSERT INTO schoolboy_past_olympics VALUES('$id_parent','$user_id',0,0)");
			}
		}
	} else { // если id_stage>0, значит какой-то из последующих этапов прошёл и нужно заменить у него статус
		$id_stages = explode("!", $row_parent['nextStage']); // расчленяем строку последующих этапов
		$id_stage--;
		$row_child = mysql_fetch_array(mysql_query("SELECT Olympiad_status FROM olympics WHERE id='$id_stages[$id_stage]'")); //получаем статус действия того этапа, у которого дата уже прошла
		
		if ($row_child['Olympiad_status'] == 0) { // если статус действителен
			mysql_query ("UPDATE olympics SET Olympiad_status=1 WHERE id='$id_stages[$id_stage]'"); // делаем недействительной
			
			$result = mysql_query("SELECT * FROM  schoolboy_olympics WHERE olympics_id='$id_stages[$id_stage]'"); //у всех участников ставим этап прошедшим
			$n=mysql_num_rows($result);		
			for($i=0;$i<$n;$i++){
				$myrow=mysql_fetch_array($result);
				$user_id=$myrow['schoolboy_users_id'];
				$n_past=mysql_num_rows(mysql_query("SELECT * FROM  schoolboy_past_olympics WHERE olympics_id='$id_stages[$id_stage]' AND schoolboy_users_id='$user_id'"));
				if ($n_past = 0) 
					mysql_query("INSERT INTO schoolboy_past_olympics VALUES('$id_stages[$id_stage]','$user_id',0,0)");
			}
		}
	}
	
?>