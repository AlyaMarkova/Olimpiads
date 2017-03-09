<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<div id="registr_form1">
<table class="table1">
  <tr>
    <td id="stroka2">Здравствуйте,</td>
  </tr>
  <tr>
    <td id="stroka3"><?php echo $_SESSION['login']; ?></td>
  </tr>
   <tr>
    <td class="td4"> <input title="Личный кабинет" class="tooltip" id ="knopka2" type="submit" value="" onClick='location.href="lk.php"'></td>	
  </tr> 
   <tr>
    <td id = "white2"> <a id = "white2" href='bd/exit.php'>Выйти из системы </a></td>
  </tr>
</table>				
</div>