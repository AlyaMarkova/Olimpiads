<?php
if (isset($_POST['name_olimp'])) { $name_olimp = $_POST['name_olimp']; if ($name_olimp == '') { unset($name_olimp);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['date_application'])) { $date_application = $_POST['date_application']; if ($date_application == '') { unset($date_application);} }
if (isset($_POST['description_olimp'])) { $description_olimp = $_POST['description_olimp']; if ($description_olimp == '') { unset($description_olimp);} }
if (isset($_POST['Org_olimp'])) { $Org_olimp = $_POST['Org_olimp']; if ($Org_olimp == '') { unset($Org_olimp);} }

include ("../bd.php"); //коннект с бд

$result = mysql_query("SELECT email,class FROM schoolboy where delivery=1");
while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
	$subject    = "Новая Олимпиада";//тема сообщения
	$message    = "Здравствуйте!\nНа сайте olimpiada.ru появилась новая олимпиада:".$name_olimp.".\nПриглашаем Вас принять в ней участие!\n\nС уважением, Администрация olimpiada.ru";
	
	if($_POST['class_olimp'.$row['class']]=="ON"){
		mail($row['email'], $subject, $message, "Content-type:text/plane;    Charset=windows-1251\r\n");
	}
}

$subject=$_POST['subject_string'];
$class_string="";

$flag=true;
$flag2=false;

for($i=1;$i<12;$i++){ //ваще не вкуриваю, для чего этот цикл // две недели спустя: ааааа, это он формирует классы, которые принимают участие!
	if($i==11&&$_POST['class_olimp'.$i]=="ON"){				 // ааааааааааааааааа вот оно чо
		if($flag==true&&$class_string!=""){					 // (c) Аля
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

//дата окончания приёма заявок
$date_application = $_POST["year0"]."-".str_pad($_POST["month0"], 2, '0', STR_PAD_LEFT)."-".str_pad($_POST["day0"], 2, '0', STR_PAD_LEFT); 

if($number_date==0){
	$number_date=1;
}
if (isset($_POST['number_date'])) { $number_date = $_POST['number_date']; if ($number_date == '') { unset($number_date);} }
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

if ($number_date == 1) { //если этап всего один
	$stages = "0"; //stages=0, т.е. больше этапов нет
	$id=mysql_insert_id(); //добавляем в бд
	mysql_query ("INSERT INTO olympics (name_olympiad, date, location,classes, terms,description, subject,professor_users_id, stages) VALUES('$name_olimp','$date_time','$location_olimp','$class_string', '$date_application','$description_olimp','$subject','$Org_olimp','$stages')",$db);
	exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");

} else {
	$id=mysql_insert_id();
	mysql_query ("INSERT INTO olympics (name_olympiad, date, location,classes, terms,description, subject,professor_users_id, stages) VALUES('$name_olimp','$date_time','$location_olimp','$class_string', '$date_application','$description_olimp','$subject','$Org_olimp','$stages')",$db);
	$parent_id = $id;
	
	for($i=2; $i<=$number_date; $i++){
		$time = $_POST["tm".$i];
		$time1 = $_POST["1tm".$i];
		$time2 = $_POST["2tm".$i];
		$time3 = str_pad($time1, 2, '0', STR_PAD_LEFT).":".str_pad($time2, 2, '0', STR_PAD_LEFT);
		
		$date_time = $_POST["year".$i]."-".str_pad($_POST["month".$i], 2, '0', STR_PAD_LEFT)."-".str_pad($_POST["day".$i], 2, '0', STR_PAD_LEFT)." ".$time3."!";
		$location_olimp = $_POST["place".$i];
		
		$id=mysql_insert_id();
		 
		$stages = "0"; 
		$st_parent .= $id."!";
		$isChild = 1;
		
		mysql_query ("INSERT INTO olympics (name_olympiad, date, location,classes, terms,description, subject,professor_users_id, stages, IsChild) VALUES('$name_olimp','$date_time','$location_olimp','$class_string', '$date_application','$description_olimp','$subject','$Org_olimp','$stages','$isChild')",$db);
	}
	mysql_query("UPDATE olympics SET stages='$st_parent' WHERE id='$parent_id'");
	exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
}

?>
