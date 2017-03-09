<?php
	session_start();
	include ("js/fio.js");
?>
<html>
	<form id="activation_admin" action="" method="post">
	<div id="lk_fio_div">
			<label id="lk_fio"></label>
	</div>
	<div class="lk_schoolboy_blok">
		<div id="lk_birthdate">
			<label id="lk_schoolboy">Дата рождения</label><label class="lk_scoolboy" id="birthdate_lk"></label>
		</div>
		<div id="lk_gender">
			<label id="lk_schoolboy">Пол</label><label class="lk_scoolboy" id="gender_lk"></label>
		</div>
		<div id="lk_school">
			<label id="lk_schoolboy">Школа</label><label class="lk_scoolboy" id="school_lk"></label>
		</div>
		<div id="lk_classes">
			<label id="lk_schoolboy">Класс</label><label class="lk_scoolboy" id="classes_lk"></label>
		</div>
		</div>
		<div class="lk_schoolboy_blok">
		<div id="lk_home_adress">
			<label id="lk_schoolboy">Адрес проживания</label><label class="lk_scoolboy" id="home_adress_lk"></label>
		</div>
		<div id="lk_phone">
			<label id="lk_schoolboy">Мобильный телефон</label><label class="lk_scoolboy" id="phone_lk"></label>
		</div>
		<div id="lk_email">
			<label id="lk_schoolboy">Адрес эл. почты</label><label class="lk_scoolboy" id="email_lk"></label>
		</div>
		</div>
		<div class="button_all">
		<input type="submit" class="knopka_retain" name="submit_confirmation" value="Подтвердить">
		<input type="button" class="knopka_no_retain" name="submit_no_confirmation" onClick="no_confirmation()" value="Не подтвердить">
		<input type="button" class="knopka_cansel" onclick="location_cancel()" name="cansel" value="Отмена">
		</div>
	</form>
	

	
</html>
<script>
	//var id=<?php echo $_SESSION['id'];?>;
	function no_confirmation(){
		
	}
	function location_cancel(){		
		document.location.href="../confirmation_user.php";
	}
	var rights=0;
	var id=<?php echo $_GET['id'];?>;
	document.getElementById('activation_admin').action="bd/activation_admin.php?id="+id;		
	//alert(document.getElementById('activation_admin').action);
	
	
		var par2={	
					
				'id': id,				
				}				
		$.ajax({
				type: "POST",
				url: "../bd/rights_user.php",
				data: 'jsonData=' + JSON.stringify(par2),  
				success: function(html){
					html=JSON.parse(html);				
					//alert(html.rights);
					rights=html.rights;
					if(rights==1){
						var par2={	
								'action': "1",		
								'id': id,				
								}				
						$.ajax({
								type: "POST",
								url: "../bd/lk.php",
								data: 'jsonData=' + JSON.stringify(par2),  
								success: function(html){
									html=JSON.parse(html);				
									var FIO =FIO_1(html.FIO);
									var classes =html.classes;
									var school =html.school;
									var birthdate =html.birthdate;
									var phone =html.phone;
									var email =html.email;
									var gender =html.gender;
									var home_adress =html.home_adress;
									var rating =html.rating;					
									document.getElementById('lk_fio').innerHTML=FIO;
									document.getElementById('classes_lk').innerHTML=classes;
									document.getElementById('school_lk').innerHTML=school;
									document.getElementById('birthdate_lk').innerHTML=birthdate;
									document.getElementById('phone_lk').innerHTML=phone;
									document.getElementById('email_lk').innerHTML=email;
									document.getElementById('gender_lk').innerHTML=gender;
									document.getElementById('home_adress_lk').innerHTML=home_adress;
									//document.getElementById('rating').innerHTML=rating;
											
								}
							});
						
					}
					if(rights==2){
						var par2={	
								'action': "2",
								'id': id,				
								}				
						$.ajax({
								type: "POST",
								url: "../bd/lk.php",
								data: 'jsonData=' + JSON.stringify(par2),  
								success: function(html){
									html=JSON.parse(html);				
									var FIO =FIO_1(html.FIO);									
									var phone =html.phone;
									var email =html.email;
							
									document.getElementById('lk_classes').style.display="none";
									document.getElementById('lk_school').style.display="none";
									document.getElementById('lk_birthdate').style.display="none";
									document.getElementById('lk_gender').style.display="none";
									document.getElementById('lk_home_adress').style.display="none";
							
									document.getElementById('lk_fio').innerHTML=FIO;
									document.getElementById('phone_lk').innerHTML=phone;
									document.getElementById('email_lk').innerHTML=email;							
								}
							});
						
					}
						if(rights==3){
						var par2={	
								'action': "3",
								'id': id,				
								}				
						$.ajax({
								type: "POST",
								url: "../bd/lk.php",
								data: 'jsonData=' + JSON.stringify(par2),  
								success: function(html){
									html=JSON.parse(html);				
									var login =html.login;
									
									document.getElementById('lk_classes').style.display="none";
									document.getElementById('lk_school').style.display="none";
									document.getElementById('lk_birthdate').style.display="none";
									document.getElementById('lk_gender').style.display="none";
									document.getElementById('lk_home_adress').style.display="none";
									document.getElementById('lk_phone').style.display="none";
									document.getElementById('lk_email').style.display="none";
									
									document.getElementById('lk_fio').innerHTML=login;
											
								}
							});
						
					}
				}
			});	
</script>
