<link rel="stylesheet" type="text/css" href="css/button.css" media="screen" />
<?
 require_once '../bd.php';   
 $id=$_SESSION['id'];
 echo $_POST[select__big_subject];
/*
$result = mysql_query("SELECT email FROM schoolboy where delivery=1");
while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
	$subject    = $_POST['theme'];//���� ���������
	$message    = $_POST['delivery'];
	
	//����� ��� �������?
	if($_POST['class_olimp'.$row['class']]=="ON"){
		mail($row['email'], $subject, $message, "Content-type:text/plane;    Charset=windows-1251\r\n");
	}
}*/
?>