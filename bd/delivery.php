<link rel="stylesheet" type="text/css" href="css/button.css" media="screen" />
<?
 require_once '../bd.php';   
 $id=$_SESSION['id'];
 if ($_POST[whom]==0){
 $result = mysql_query("SELECT schoolboy.email FROM schoolboy, schoolboy_olympics WHERE schoolboy_olympics.olympics_id=".$_POST[select__big_subject]." AND schoolboy_olympics.schoolboy_users_id=schoolboy.Users_id AND schoolboy.delivery=1");
 }
 else if($_POST[whom]==1){
 $result = mysql_query("SELECT schoolboy.email FROM schoolboy, schoolboy_olympics WHERE schoolboy_olympics.olympics_id=".$_POST[select__big_subject]." AND schoolboy_olympics.schoolboy_users_id=schoolboy.Users_id");
 }else {
 $result = mysql_query("SELECT email FROM schoolboy");
 }
	while ($row = mysql_fetch_array($result)) {
		echo $row['email'];
		$subject    = $_POST['theme'];//тема сообщения
		$message    = $_POST['delivery'];
		mail($row['email'],    $subject, $message, "Content-type:text/plane;    Charset=windows-1251\r\n");
	}
	exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
?>