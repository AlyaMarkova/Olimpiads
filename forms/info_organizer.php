<?php
	session_start();
	include ("js/fio.js");
?>
<html>
	<div id="lk_fio_div">
		<label id="lk_fio"></label>
	</div>
	<div id="inf_org">
		<label id="organizator_info"></label>
	</div>
	<div id="lk_phone">
		<label id="lk_schoolboy">Мобильный телефон</label><label id="phone_lk"></label>
	</div>
	<div id="lk_email">
		<label id="lk_schoolboy">Адрес эл. почты</label><label id="email_lk"></label>
	</div>
	
</html>
<script>
	var id=<?php echo $_GET['id'];?>;
	var rights=2;
	
		var par2={	
				'id': id,				
				}				
		$.ajax({
				type: "POST",
				url: "../bd/info_organizer.php",
				data: 'jsonData=' + JSON.stringify(par2),  
				success: function(html){
					html=JSON.parse(html);				
					var FIO =html.FIO;									
					var phone =html.phone;
					var email =html.email;
					//alert(email);
					document.getElementById('organizator_info').innerHTML=html.name_olympiad;
					document.getElementById('lk_fio').innerHTML=FIO_1(FIO);
					document.getElementById('phone_lk').innerHTML=phone;
					document.getElementById('email_lk').innerHTML=email;							
				}
			});
			
</script>
