<?php
session_start();// ��� ��������� �������� �� �������. ������ � ��� �������� ������ ������������, ���� �� ��������� �� �����. ����� ����� ��������� �� � ����� ������ ���������!!!

if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //������� ��������� ������������� ����� � ���������� $login, ���� �� ������, �� ���������� ����������
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//������� ��������� ������������� ������ � ���������� $password, ���� �� ������, �� ���������� ����������

if (empty($login) or empty($password)) //���� ������������ �� ���� ����� ��� ������, �� ������ ������ � ������������� ������
{
?>
<script>
	alert("�� ����� �� ��� ����������, �������� ����� � ��������� ��� ����!");
</script>
<?
exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");

}

//���� ����� � ������ �������,�� ������������ ��, ����� ���� � ������� �� ��������, ���� �� ��� ���� ����� ������
$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

//������� ������ �������
$login = trim($login);
$password = trim($password);
$password=md5($password);

// ������������ � ����
include ("../bd.php");// ���� bd.php ������ ���� � ��� �� �����, ��� � ��� ���������, ���� ��� �� ���, �� ������ �������� ���� 



$result = mysql_query("SELECT * FROM users WHERE login='$login'",$db); //��������� �� ���� ��� ������ � ������������ � ��������� �������
$myrow = mysql_fetch_array($result);
if (empty($myrow['pass']))
   {
				?>
				<script>
					alert("��������, �������� ���� ����� ��� ������ ��������.");
				</script>
				<?
				exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");

			}
else {
//���� ����������, �� ������� ������
          if ($myrow['pass']==$password) {
			  if($myrow['activation']==0){
				?>
				<script>
					alert("��������, ���� ������� ������ ��� �� ������������ ��������������� �����, ���������� �����!");
				</script>
				<?
				exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
			  }
			  if($myrow['activation']==-1){
				?>
				<script>
					alert("��������, �� �� ����������� ���� ������� ������!");
				</script>
				<?
				exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
			  }
          //���� ������ ���������, �� ��������� ������������ ������! ������ ��� ����������, �� �����!
          $_SESSION['login']=$myrow['login']; 
		  $_SESSION['password']=$myrow['pass']; 
          $_SESSION['id']=$myrow['id'];
		  $_SESSION['rights']=$myrow['rights'];//��� ������ ����� ����� ������������, ��� �� � ����� "������ � �����" �������� ������������
		 
			  exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
		  
          }

       else 		   
		   {
				?>
				<script>
					alert("��������, �������� ���� ����� ��� ������ ��������.");
				</script>
				<?
				exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");

			}
		   
}   
?>