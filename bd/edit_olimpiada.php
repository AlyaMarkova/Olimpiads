<?php
if (isset($_POST['name_olimp'])) { $name_olimp = $_POST['name_olimp']; if ($name_olimp == '') { unset($name_olimp);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['location_olimp'])) { $location_olimp = $_POST['location_olimp']; if ($location_olimp == '') { unset($location_olimp);} }
if (isset($_POST['date_application'])) { $date_application = $_POST['date_application']; if ($date_application == '') { unset($date_application);} }
if (isset($_POST['description_olimp'])) { $description_olimp = $_POST['description_olimp']; if ($description_olimp == '') { unset($description_olimp);} }
if (isset($_POST['Org_olimp'])) { $Org_olimp = $_POST['Org_olimp']; if ($Org_olimp == '') { unset($Org_olimp);} }

$id_o=$_GET['id'];
include ("../bd.php");
$result2 = mysql_query("SELECT name_olympiad FROM olympics WHERE id='$id_o'");
$row2 = mysql_fetch_array($result2);
$result = mysql_query("SELECT email FROM schoolboy where delivery=1");

while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
$subject    = "Изменилась информация об олимпиаде";//тема сообщения
	if($row2['name_olympiad']==$name_olimp){
		$message    = "Здравствуйте!
		На сайте olimpiada.ru изменилась информация об олимпиаде под названием: ".$name_olimp.". Эта информация может вас заинтересовать. 
		С    уважением, Администрация    olimpiada.ru";
	}
	else {
		$message    = "Здравствуйте!
		На сайте olimpiada.ru изменилась информация об олимпиаде под названием: ".$row2['name_olympiad']."(".$name_olimp."). Эта информация может вас заинтересовать. 
		С    уважением, Администрация    olimpiada.ru";
	}
	mail($row[0], $subject, $message, "Content-type:text/plane;    Charset=windows-1251\r\n");
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

$date_time = '';

for($i=1; $i<=$number_date; $i++){	
	$time = $_POST["tm".$i];
	$time1 = $_POST["1tm".$i];
	$time2 = $_POST["2tm".$i];
	$time3 = str_pad($time1, 2, '0', STR_PAD_LEFT).":".str_pad($time2, 2, '0', STR_PAD_LEFT);
	
	$date_time .= $_POST["year".$i]."-".str_pad($_POST["month".$i], 2, '0', STR_PAD_LEFT)."-".str_pad($_POST["day".$i], 2, '0', STR_PAD_LEFT)." ".$time3."!";
}
mysql_query("UPDATE olympics SET name_olympiad='$name_olimp',date='$date_time',location='$location_olimp',classes='$class_string',terms='$date_application',description='$description_olimp',subject='$subject',professor_users_id='$Org_olimp' WHERE id='$id_o'");
exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
?>
