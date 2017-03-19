<link rel="stylesheet" type="text/css" href="css/button.css" media="screen" />
<?php
	session_start();
	include ("js/fio.js");
 require_once 'bd.php';   
	
	$idS = $_SESSION['id'];
	$rights=$_SESSION['rights'];
	$res = mysql_query("SELECT id, name_olympiad FROM olympics WHERE professor_users_id = '$idS'");	
	$i=0;
	while($row=mysql_fetch_array($res))
	{
		$id_ol[$i]=$row['id'];
		$name_olympiad[$i]=$row['name_olympiad'];
		$i=$i+1;
	}
?>
	<link rel="stylesheet"  type="text/css" href="css/button.css" media="screen" />
	
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
	<div id="lk_home_adress">
		<label id="lk_schoolboy">Адрес проживания</label><label class="lk_scoolboy" id="home_adress_lk"></label>
	</div>
	<div class="lk_schoolboy_blok">
		<div id="lk_phone">
			<label id="lk_schoolboy">Мобильный телефон</label><label class="lk_scoolboy" id="phone_lk"></label>
		</div>
		<div id="lk_email">
			<label id="lk_schoolboy">Адрес эл. почты</label><label class="lk_scoolboy" id="email_lk"></label>
		</div>
		<div id="lk_email">
			<label id="lk_schoolboy">Срочная рассылка</label>
			<SELECT  id="select__big_subject" required  name="select__big_subject" size="1" 
			onchange="select_subject_activation(select__big_subject.value,select__big_subject.id)">
				   <option value="">Список олимпиад</option>
				  
<?        for($i=0, $arr_l=count($id_ol); $i<$arr_l; $i++){ 
?>
					<option value="<?echo $id_ol[$i] ?>"><?echo $name_olympiad[$i] ?></option>
<?}?>
			</SELECT>
			<input id="rassylka" type="button" title="Создать рассылку" class="rassylka">
		</div>
		
		<div id="lk_email">
			<label id="lk_schoolboy">Текст рассылки</label>
			<textarea id="description_olimp" required="" name="description_olimp"></textarea>
		</div>
		<div style="margin-top: 100px;" class="button_all">
		<input type="submit" class="knopka_retain" name="submit_create" value="Отправить">
		<input type="button" class="knopka_cansel" onclick="location_cancel()" name="submit_cancel" value="Отмена">
		</div>
	</div>
	

	
<script>
	var id=<?php echo $_SESSION['id'];?>;
	var rights=<?php echo $_SESSION['rights'];?>;
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
					var FIO =html.FIO;
					var classes =html.classes;
					var school =html.school;
					var birthdate =html.birthdate;
					var phone =html.phone;
					var email =html.email;
					var gender =html.gender;
					var home_adress =html.home_adress;
					var rating =html.rating;					
					document.getElementById('lk_fio').innerHTML=FIO_1(FIO);
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
	if(rights==2||rights==3){
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
					var FIO =html.FIO;									
					var phone =html.phone;
					var email =html.email;
			
					document.getElementById('lk_classes').style.display="none";
					document.getElementById('lk_school').style.display="none";
					document.getElementById('lk_birthdate').style.display="none";
					document.getElementById('lk_gender').style.display="none";
					document.getElementById('lk_home_adress').style.display="none";
			
					document.getElementById('lk_fio').innerHTML=FIO_1(FIO);
					document.getElementById('phone_lk').innerHTML=phone;
					document.getElementById('email_lk').innerHTML=email;							
				}
			});
		
	}
		/*if(rights==3){
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
		
	}*/
	
</script>
