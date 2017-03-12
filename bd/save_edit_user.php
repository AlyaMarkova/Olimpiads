<?php
	session_start();
	include ("../bd.php");
	if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
	if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
	if (isset($_POST['select_status'])) { $select_status=$_POST['select_status']; if ($select_status =='') { unset($select_status);} }
	if (isset($_POST['surname'])) { $surname=$_POST['surname']; if ($surname =='') { unset($surname);} }
	if (isset($_POST['forename'])) { $forename=$_POST['forename']; if ($forename =='') { unset($forename);} }
	if (isset($_POST['patronymic'])) { $patronymic=$_POST['patronymic']; if ($patronymic =='') { unset($patronymic);} }
	if (isset($_POST['sex'])) { $sex=$_POST['sex']; if ($sex =='') { unset($sex);} }
	//if (isset($_POST['DOB'])) { $DOB=$_POST['DOB']; if ($DOB =='') { unset($DOB);} }
	if (isset($_POST['school'])) { $school=$_POST['school']; if ($school =='') { unset($school);} }
	if (isset($_POST['select_class'])) { $select_class=$_POST['select_class']; if ($select_class =='') { unset($select_class);} }
	if (isset($_POST['location'])) { $location=$_POST['location']; if ($location =='') { unset($location);} }
	if (isset($_POST['mob_number'])) { $mob_number=$_POST['mob_number']; if ($mob_number =='') { unset($mob_number);} }
	if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
	if (isset($_POST['spam_email'])) { $spam_email=$_POST['spam_email']; if ($spam_email =='') { unset($spam_email);} }
	if (isset($_POST['select_status'])) { $select_status=$_POST['select_status']; if ($select_status =='') { unset($select_status);} }	
	$year=$_POST['year1'];
	$day = str_pad($_POST["day1"], 2, '0', STR_PAD_LEFT);
	$month = str_pad($_POST["month1"], 2, '0', STR_PAD_LEFT);
	$DOB=$year."-".$month."-".$day;
	$result = mysql_query("SELECT * FROM users WHERE login='$login'");
	$myrow = mysql_fetch_array($result);
	$fio=$surname."!".$forename."!".$patronymic."!";
	$id = $myrow['id'];
	
	if($myrow['rights']==1){	
		if($spam_email=="ON"){
			$spam_email=1;
		}
		else{
			$spam_email=0;
		}	
		mysql_query ("UPDATE  schoolboy SET Fio_schoolboy = '$fio', school = '$school', email = '$email', home_adress = '$location', phone='$mob_number', birthdate='$DOB', gender='$sex',delivery='$spam_email'    WHERE Users_id='$id'");	
		if(empty($password)==false){
			$password=md5($password);
			mysql_query ("UPDATE users SET pass='$password' WHERE id='$id'");	
		}
	}
	if($myrow['rights']==2||$myrow['rights']==3){
		mysql_query ("UPDATE  professor SET Fio_professor = '$fio', email = '$email', phone='$mob_number'   WHERE Users_id='$id'");	
		if(empty($password)==false){
			$password=md5($password);
			mysql_query ("UPDATE users SET pass='$password' WHERE id='$id'");	
		}
		
	}
	/*if($myrow['rights']==3){
		if(empty($password)==false){
			mysql_query ("UPDATE users SET pass='$password' WHERE id='$id'");	
		}
		
	}*/
	if ($_SESSION['activation']==-2) {
		mysql_query ("UPDATE users SET activation=0 WHERE id='$id'");
		exit("<html><head><meta http-equiv='Refresh' content='0; URL=../bd/exit.php'></head></html>");
	} else {
		header('Location: ../lk.php');
	}
?>

