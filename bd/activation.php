<?php
   include ("../bd.php");// ���� bd.php ������ ���� � ��� �� �����, ��� � ��� ���������, ���� ��� �� ���, �� ������    �������� ����  
   if    (isset($_GET['code'])) {$code =$_GET['code']; } //��� ������������� 
   else 
        {    
		exit("��    ����� �� �������� ��� ���� �������������!");} //���� �� ������� code,    �� ������ ������
	if (isset($_GET['login'])) {$login=$_GET['login'];    } //�����,�������    ����� ������������
        else 
            {   
		exit("��    ����� �� �������� ��� ������!");} //���� �� ������� �����, �� ������ ������
		
		$result = mysql_query("SELECT    *    FROM    users WHERE login='$login'",$db); //���������    ������������� ������������ � ������ �������
            $myrow    = mysql_fetch_array($result); 
			$n=$myrow['activation'];
			
			
			
			
 $activation    = md5($myrow['id']).md5($login);//�������    ����� �� ��� �������������
 if ($activation == $code) {//���������� ���������� �� url � ��������������� ��� 
					if($n!=-1){
						?>
						<script>
							alert("��������, ������ ���������!");
						</script>
						<?
						exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
					}
                     mysql_query("UPDATE    users SET activation='0' WHERE login='$login'",$db);//���� �����, �� ���������� ������������
					 exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
                     }
            else {echo "������! ��� �-���� ��    �����������! <a    href='../index.php'>�������    ��������</a>";
            //����    �� ���������� �� url �    ��������������� ��� �� �����, �� ������ ������
            }
?>