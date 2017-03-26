<?php
if (isset($_POST['name_olimp'])) { $name_olimp = $_POST['name_olimp']; if ($name_olimp == '') { unset($name_olimp);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['location_olimp'])) { $location_olimp = $_POST['location_olimp']; if ($location_olimp == '') { unset($location_olimp);} }
if (isset($_POST['date_application'])) { $date_application = $_POST['date_application']; if ($date_application == '') { unset($date_application);} }
if (isset($_POST['description_olimp'])) { $description_olimp = $_POST['description_olimp']; if ($description_olimp == '') { unset($description_olimp);} }
if (isset($_POST['Org_olimp'])) { $Org_olimp = $_POST['Org_olimp']; if ($Org_olimp == '') { unset($Org_olimp);} }

include ("../bd.php");
$id_o=$_GET['id'];

//$result2 = mysql_query("SELECT name_olympiad FROM olympics WHERE id='$id_o'"); 
//$result = mysql_query("SELECT email FROM schoolboy where delivery=1"); //адреса тех, кто подписан на рассылку
//$result = mysql_query("SELECT email FROM schoolboy"); //просто все адреса
$result=mysql_query("SELECT name_olympiad, nextStage FROM olympics WHERE id='$id_o'");//получаем имя редактируемой олимпиады 

while ($row = mysql_fetch_array($result)) {
	$row_name = $row['name_olympiad'];
	$stage=$row['nextStage'];
	$kol=0;
	if ($stage!=0){
		$nextStage=explode("!", $stage);
		$kol=$nextStage.length;
	}
	$kol++;//количество было
}

$result = mysql_query("SELECT schoolboy_users_id FROM schoolboy_olympics WHERE olympics_id='$id_o'"); //получаем ид участников этой олимпиады
$result = mysql_query("SELECT schoolboy_users_id FROM schoolboy_olympics WHERE olympics_id='$id_o'"); //получаем ид участников этой олимпиады

while ($row = mysql_fetch_array($result)) {
	$id_sb = $row['schoolboy_users_id'];
	$row_sb = mysql_fetch_array(mysql_query("SELECT email, Fio_schoolboy, gender FROM schoolboy WHERE Users_id='$id_sb'"));
	
	$name = explode("!", $row_sb['Fio_schoolboy']); //name[1] - это ИМЯ учащегося
	
	if ($row_sb['gender'] == "Женский") 
		$ending = "ая";
	else 
		$ending = "ый";	
	
	if($row_name['name_olympiad']==$name_olimp){
		$message = "Уважаем".$ending." ".$name[1]."!\nВ информации об олимпиаде под названием: ".$name_olimp.", в которой Вы участвуете, произошли изменения. Просим Вас ознакомиться с данной информацией.\n\nС уважением, Администрация olimpiada.ru";
	} else {
		$message = "Уважаем".$ending." ".$name[1]."!\nВ информации об олимпиаде под названием: ".$row_name['name_olympiad']." (".$name_olimp."), в которой Вы участвуете, произошли изменения. Просим Вас ознакомиться с данной информацией.\n\nС уважением, Администрация olimpiada.ru";
	}
	mail($row_sb['email'], "Изменилась информация об олимпиаде", $message, "Content-type:text/plane;    Charset=windows-1251\r\n");//отправляем сообщение
}

$subject=$_POST['subject_string'];
$class_string="";

$flag=true;
$flag2=false;

for($i=1;$i<12;$i++){
	if($i==11&&$_POST['class_olimp'.$i]=="ON"){
		if($flag==true&&$class_string!=""){
			$class_string=$class_string."-".($i);	
			continue;
		}
		if($flag==true&&$class_string==""){
			$class_string=$i;	
			continue;
		}
	}	
	if(($_POST['class_olimp'.$i]=="ON")&&($class_string=="")){	
		$class_string=$i;		
		continue;
	}
	if(($_POST['class_olimp'.$i]=="ON")&&($class_string!="")&&($flag==false)){
		$flag=true;
		$flag2=false;
		$class_string=$class_string.",".$i;
		continue;
	}
	if(($_POST['class_olimp'.$i]!="ON")&&($class_string!="")&&($flag==true)){
		if($flag2==true){
			$class_string=$class_string."-".($i-1);		
		}
		$flag=false;
		continue;
	}
	if($_POST['class_olimp'.$i]=="ON"){
		$flag2=true;
	}	
}
	
$date_application=$_POST["year0"]."-".str_pad($_POST["month0"], 2, '0', STR_PAD_LEFT)."-".str_pad($_POST["day0"], 2, '0', STR_PAD_LEFT);

//if (isset($_POST['select_subject'])) { $select_subject = $_POST['select_subject']; if ($select_subject == '') { unset($select_subject);} }
// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
//mysql_query ("INSERT INTO olympics (name_olympiad, date, location,classes, terms,description, subject,professor_users_id) VALUES('$name_olimp','$dt1','$location_olimp','$class_string', '$date_application','$description_olimp','$subject','$Org_olimp')",$db);

if (isset($_POST['number_date'])) { $number_date = $_POST['number_date']; if ($number_date == '') { unset($number_date);} }
$id=$id_o;

if($number_date==0){
	$number_date=1;
}

if($number_date==1) { //всего один этап
//этот один этап
$date_time = '';
$stages = '';
$location_olimp = '';
$st_parent = '';

//формируем дату, время и место первого этапа
$time = $_POST["tm1"];
$time1 = $_POST["1tm1"];
$time2 = $_POST["2tm1"];
$time3 = str_pad($time1, 2, '0', STR_PAD_LEFT).":".str_pad($time2, 2, '0', STR_PAD_LEFT);
$date_time = $_POST["year1"]."-".str_pad($_POST["month1"], 2, '0', STR_PAD_LEFT)."-".str_pad($_POST["day1"], 2, '0', STR_PAD_LEFT)." ".$time3."!";
$location_olimp = $_POST["place1"];
//mysql_query ("UPDATE olympics (name_olympiad, date, location,classes, terms,description, subject,professor_users_id) VALUES('$name_olimp','$date_time','$location_olimp','$class_string', '$date_application','$description_olimp','$subject','$Org_olimp')WHERE id='$id_o'");
} 

else { //БОЛЬШЕ одного этапа

	
if($kol==$number_date){ //если колво старых этапов и новых СОВПАДАЕТ
//первый этап	
$time = $_POST["tm1"];
$time1 = $_POST["1tm1"];
$time2 = $_POST["2tm1"];
$time3 = str_pad($time1, 2, '0', STR_PAD_LEFT).":".str_pad($time2, 2, '0', STR_PAD_LEFT);
$date_time = $_POST["year1"]."-".str_pad($_POST["month1"], 2, '0', STR_PAD_LEFT)."-".str_pad($_POST["day1"], 2, '0', STR_PAD_LEFT)." ".$time3."!";
$location_olimp = $_POST["place1"];
mysql_query ("UPDATE olympics (name_olympiad, date, location,classes, terms,description, subject,professor_users_id) VALUES('$name_olimp','$date_time','$location_olimp','$class_string', '$date_application','$description_olimp','$subject','$Org_olimp') WHERE id='$id_o'");
	//формируем все последующие этапы в цикле
	for($i=2; $i<=$number_date; $i++){
		$time = $_POST["tm".$i];
		$time1 = $_POST["1tm".$i];
		$time2 = $_POST["2tm".$i];
		$time3 = str_pad($time1, 2, '0', STR_PAD_LEFT).":".str_pad($time2, 2, '0', STR_PAD_LEFT);
		$date_time = $_POST["year".$i]."-".str_pad($_POST["month".$i], 2, '0', STR_PAD_LEFT)."-".str_pad($_POST["day".$i], 2, '0', STR_PAD_LEFT)." ".$time3."!";
		$location_olimp = $_POST["place".$i];
		$isChild = $parent_id;
		$proc = "stage";
		$name_st = $name_olimp." - ".$i." этап";
		if ($i>2){ //ид предыдущего этапа
			$id_prev=$id_now;
		} else $id_prev=mysql_insert_id();
		
		mysql_query ("INSERT INTO olympics (name_olympiad, date, location,classes, terms,description, subject,professor_users_id, IsChild,process) VALUES('$name_st','$date_time','$location_olimp','$class_string', '$date_application','$description_olimp','$subject','$Org_olimp','$isChild','$proc')",$db);
		$id_now=mysql_insert_id(); //ид нынешнего этапа, который только что добавили
		
		if ($i>2) { //апдейтим поле nextStage у предыдущего этапа (чтобы он указывал на только что созданный)
			mysql_query("UPDATE olympics SET nextStage='$id_now' WHERE id='$id_prev'");
		}
		
		$st_parent .= $id_now."!"; //а для родителя формируем строку, где указаны ВСЕ следующие этапы
}
mysql_query("UPDATE olympics SET nextStage='$st_parent' WHERE id='$parent_id'"); //апдейтим поле nextStage у родителя
}

if($kol<$number_date){ //этапов стало БОЛЬШЕ
$id=mysql_insert_id(); //сохраняем ид родителя 
$parent_id = $id;
mysql_query ("UPDATE olympics (name_olympiad, date, location,classes, terms,description, subject,professor_users_id) VALUES('$name_olimp','$date_time','$location_olimp','$class_string', '$date_application','$description_olimp','$subject','$Org_olimp') WHERE id='$id_prev'");


}

if($kol>$number_date){ //этапов стало МЕНЬШЕ



}

}

/*for($i=1; $i<=$number_date; $i++){	
	$time = $_POST["tm".$i];
	$time1 = $_POST["1tm".$i];
	$time2 = $_POST["2tm".$i];
	$time3 = str_pad($time1, 2, '0', STR_PAD_LEFT).":".str_pad($time2, 2, '0', STR_PAD_LEFT);
	
	$date_time .= $_POST["year".$i]."-".str_pad($_POST["month".$i], 2, '0', STR_PAD_LEFT)."-".str_pad($_POST["day".$i], 2, '0', STR_PAD_LEFT)." ".$time3."!";
}*/
mysql_query("UPDATE olympics SET name_olympiad='$name_olimp',date='$date_time',location='$location_olimp',classes='$class_string',terms='$date_application',description='$description_olimp',subject='$subject',professor_users_id='$Org_olimp' WHERE id='$id_o'");
exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
?>
