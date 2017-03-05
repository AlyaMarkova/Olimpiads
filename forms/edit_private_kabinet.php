<?php
include ("js/Generation_pass.js");
session_start();
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8"> 


</head>
<body>		
	
	<form action="../bd/save_edit_user.php" method="post">
		<div class="lk_schoolboy_blok">
		<div id="admin1">
			<label id="lk_schoolboy">Фамилия</label>
			<input required name="surname" id="surname" type="text" >
		</div>
		<div id="admin2">
			<label id="lk_schoolboy">Имя</label>
			<input required name="forename" id="forename" type="text" >
		</div> 
		<div id="admin3">
			<label id="lk_schoolboy">Отчество</label>
			<input required name="patronymic" id="patronymic" type="text" >
		</div> 	  
		</div> 	
		<div class="lk_schoolboy_blok">		
		<div id="professor">
			<label id="lk_schoolboy">Пол</label>
			<input type="radio" id="sex" name="sex" value="Мужской" checked /> <label>Мужской</label>
			<input type="radio" id="sex2" name="sex" value="Женский"  /> <label>Женский</label>
		</div>
		<div id="professor5">
			<label id="lk_schoolboy">Дата рождения</label>
			
			<select class="day_class" name="day1" id="day1"></select>
			<select class="month_class" name="month1" id="month1"   ></select>
			<select class="years_class" name="year1" id="year1"   ></select>
		</div>
		<div id="professor1">
			<label id="lk_schoolboy">Школа</label>
			<input  name="school" id="school" type="text" >
		</div>
		<div id="professor2">
			<label id="lk_schoolboy">Класс</label>		
			<SELECT title="Вы не можете изменить класс" class="classik" id="select_class" disabled="disabled" name="select_class" size="1">
			   <option value="0">№
			   <option value="1">1
			   <option value="2">2
			   <option value="3">3
			   <option value="4">4
			   <option value="5">5
			   <option value="6">6
			   <option value="7">7
			   <option value="8">8
			   <option value="9">9
			   <option value="10">10
			   <option value="11">11
			</SELECT>
		</div>
		</div>
		<div class="lk_schoolboy_blok">
		<div>
			<label id="lk_schoolboy">Логин</label>
			<input title="Вы не можете изменить логин"id="login" readonly="true" name="login" type="text" >
		</div>
	

	<!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->  
		<div title="Если не хотите менять пароль, оставьте поле пустым!" class="tooltip">
			<label id="lk_schoolboy" title="213">Новый пароль</label>
			<input id="password" name="password" type="text" >
			<input type="button" class="knopka_generation" onclick="generatePass('password')">		
			<input  type="button" class="knopka_seeit" onclick="ShowHidePassword('password')"> 	
			<abbr title="Это поле обязательно для заполнения"><span></span></abbr> 

<script language="Javascript">
function ShowHidePassword(id){
element = $('#'+id)
element.replaceWith(element.clone().attr('type',(element.attr('type') == 'password') ? 'text' : 'password'))
}
</script>
			
		</div>
		</div>
		<div class="lk_schoolboy_blok">
		<div id="professor3">
			<label id="lk_schoolboy">Место жительства</label>
			<input id="location" name="location" type="text" >
		</div>	
		<div id="admin4">
			<label id="lk_schoolboy">Мобильный телефон</label>
			<input id="mob_number" name="mob_number" type="text" pattern="[0-9]{5,11}" oninvalid="this.setCustomValidity('Введите корректный номер телефона (не более 11 цифр).')" oninput="setCustomValidity(' ')">
		</div>
		<div id="admin5">
			<label id="lk_schoolboy">Адрес эл. почты</label>
			<input required id="email" name="email" type="email" >
		</div>
		</div>
		<p id="professor4">
			<label id="lk_schoolboy">Рассылка на эл.почту</label>
			<input type="checkbox" id="spam_email" name="spam_email" value="ON"> 
		</p>
		
		
	<div class="button_all">
		<p>
			<input class="knopka_retain" type="submit" name="save_lk" value="Сохранить">
			<input class="knopka_cansel" type="button" name="cancel_lk" onclick="location_cancel()" value="Отмена">
		</p>
	</div>	
	
	</form>
	</body>
</html>
<script>

window.onload = function () {
    var day = new Date,
        md = (new Date(day.getFullYear(), day.getMonth() + 1, 0, 0, 0, 0, 0)).getDate(),
        $month_name = "января февраля марта апреля мая июня июля августа сентября октября ноября декабря".split(" ");
 
    function set_select(a, c, d, e) {
        var el = document.getElementsByName(a)[0];
        for (var b = el.options.length = 0; b < c; b++) {

            el.options[b] = new Option(a == 'month1' ? $month_name[b] : b + d, b + d);
         }
		// el.options[0] = new Option(e);
		 //el.value=e;
		 //alert("ds");
		
		
        el.options[e] && (el.options[e].selected = !0)
    }
	set_select("day1", md, 1, "дд");
    set_select("month1", 12, 1, "мм");
    set_select("year1", 13, day.getFullYear()-19, "гг");/*
	set_select("day1", md, 1, day.getDate() - 1);

    set_select("month1", 12, 1, day.getMonth());

    set_select("year1", 11, day.getFullYear()-10, 10);*/

 
   // document.getElementsByName('hour')[0].value = day.getHours();
   // document.getElementsByName('minute')[0].value = day.getMinutes();
 
    var year1 = document.getElementById('year1');
    var month1 = document.getElementById("month1");
 
    function check_date() {
        var a = year1.value | 0,
            c = month1.value | 0;
			
        md = (new Date(a, c, 0, 0, 0, 0, 0)).getDate();
        a = document.getElementById("day1").selectedIndex;
		
        set_select("day1", md, 1, a);
    };
	

	
	
    if (document.addEventListener) {
        year1.addEventListener('change', check_date, false);
        month1.addEventListener('change', check_date, false);
 
    } else {
        year1.detachEvent('onchange', check_date);
        month1.detachEvent('onchange', check_date);
    }

}
		var login='<?php echo $_SESSION['login'];?>';
		var rights ='<?php echo $_SESSION['rights'];?>';
		var par2={	
				'rights':<?php echo $_SESSION['rights'];?>,
				'id':<?php echo $_SESSION['id'];?>,				
				}				
		$.ajax({
				type: "POST",
				url: "../bd/edit_user.php",
				data: 'jsonData=' + JSON.stringify(par2),  
				success: function(html){
					html=JSON.parse(html);	

					if(rights==1){
						document.getElementById('surname').value=html.surname;						
						document.getElementById('forename').value=html.forename;					
						document.getElementById('patronymic').value=html.patronymic;						
						document.getElementById('email').value=html.email;					
						document.getElementById('mob_number').value=html.phone;
						document.getElementById('select_class').value=html.class;
						document.getElementById('select_class').required=true;
						//document.getElementById('DOB').value=html.birthdate;
						if(html.delivery==1){
						document.getElementById('spam_email').checked='checked';
						}
						
						
						newstr2=html.birthdate;
						
						var from2 = newstr2.search('-'); 
						var to2 = newstr2.length;
				
						document.getElementById('year1').value=newstr2.substring(0, from2);
						newstr2=newstr2.substring(from2+1, newstr2.length);
						
						var from2 = newstr2.search('-'); 
						var to2 = newstr2.length;

						document.getElementById('month1').value=Number(newstr2.substring(0, from2));
						newstr2=newstr2.substring(from2+1, newstr2.length);
						
						
						document.getElementById('day1').value=Number(newstr2);
						newstr2=newstr2.substring(from2+1, newstr2.length);
						
						
						document.getElementById('location').value=html.home_adress;
						document.getElementById('location').required=true;
						document.getElementById('school').value=html.school;
						document.getElementById('school').required=true;
						document.getElementById('login').value=login;
						if(html.gender=="Женский"){
							document.getElementById('sex2').checked=true;
						}
					}
					if(rights==2||rights==3){
						document.getElementById('surname').value=html.surname;
						document.getElementById('forename').value=html.forename;
						document.getElementById('patronymic').value=html.patronymic;
						document.getElementById('email').value=html.email;
						document.getElementById('mob_number').value=html.phone;
						document.getElementById('login').value=login;
						
						document.getElementById('professor').style.display="none";
						document.getElementById('professor1').style.display="none";
						document.getElementById('professor2').style.display="none";
						document.getElementById('professor3').style.display="none";
						document.getElementById('professor4').style.display="none";
						document.getElementById('professor5').style.display="none";
					}
					/*if(rights==3){
						document.getElementById('login').value=login;	
						
						document.getElementById('admin1').style.display="none";
						document.getElementById('admin2').style.display="none";
						document.getElementById('admin3').style.display="none";						
						document.getElementById('admin4').style.display="none";						
						document.getElementById('admin5').style.display="none";						
						document.getElementById('professor').style.display="none";
						document.getElementById('professor1').style.display="none";
						document.getElementById('professor2').style.display="none";
						document.getElementById('professor3').style.display="none";
						document.getElementById('professor4').style.display="none";
						document.getElementById('professor5').style.display="none";
					}*/
					//alert(html.patronymic);
							
				}
			});
	function location_cancel(){		
		document.location.href="../lk.php";
	}
	
document.getElementById('mob_number').onkeypress=function(event){
 event= event || window.event;
 if (event.charCode && (event.charCode < 48 || event.charCode > 57))
  return false;
}
</script>



