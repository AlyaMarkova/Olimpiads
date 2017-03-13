<?php
include ("js/Generation_pass.js");
?>

<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8"> 
<link rel="stylesheet" type="text/css" href="css/button.css" media="screen" />	
	<form action="../bd/save_user.php" method="post">
	<!--**** save_user.php - это адрес обработчика. То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей отправятся на страничку save_user.php методом "post" ***** -->
	<div class="lk_schoolboy_blok">
		<div>
			<label class="lk_schoolboy">Фамилия</label>
			<input required name="surname" type="text"> <abbr title="Это поле обязательно для заполнения"><spanz></spanz></abbr> 
		</div>
		<div>
			<label class="lk_schoolboy">Имя</label>
			<input required name="forename" type="text" > <abbr title="Это поле обязательно для заполнения"><spanz></spanz></abbr> 
		</div> 
		<div> 
			<label class="lk_schoolboy">Отчество</label>
			<input required name="patronymic" type="text" > <abbr title="Это поле обязательно для заполнения"><spanz></spanz></abbr> 
		</div> 
	</div>
	
	<div>			
		<label class="lk_schoolboy">Статус</label>		
		<SELECT class="status_member" id="select_status" onchange = "organ()" name="select_status" size="1">
		   <option value="1">Участник
		   <option value="2">Организатор			
		</SELECT>
	</div>
	
	<div class="lk_schoolboy_blok">
		<div name="none">
			<label class="lk_schoolboy">Пол</label>
			<input type="radio" id="sex" name="sex" value="Мужской" checked /> <label>Мужской</label>
			<input type="radio" id="sex" name="sex" value="Женский"  /> <label>Женский</label>
		</div>
		<div name="none">
			<label class="lk_schoolboy">Дата рождения</label>
			<select required class="day_class" name="day1" id="day1"></select>
			<select required class="month_class" name="month1" id="month1"></select>
			<select required class="years_class" name="year1" id="year1"></select> <abbr title="Это поле обязательно для заполнения"><spanz></spanz></abbr> 
		</div > 
		<div name="none">
			<label class="lk_schoolboy">Школа</label>
			<input required id="school"  name="school" type="text" > <abbr title="Это поле обязательно для заполнения"><spanz></spanz></abbr> 
		</div>
		<div name="none">
			<label  class="lk_schoolboy">Класс</label>		
			<SELECT  required class="classik" id="select_class"  name="select_class" size="1">
			   <option value="">№
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
			</SELECT> <abbr title="Это поле обязательно для заполнения."><spanz></spanz></abbr> 
		</div>
	</div>
	<div class="lk_schoolboy_blok">	
		<div>
			<label class="lk_schoolboy">Логин</label>
			<input required name="login" type="text"> <abbr title="Это поле обязательно для заполнения"><spanz></spanz></abbr> <!-- Собственно у этого поля проверяет наличие в базе данных-->
		</div>
	<!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->  
		<div>
			<label class="lk_schoolboy">Пароль</label>
			<input required id="password" name="password" type="password" >
			<input  type="button" class="knopka_seeit" onclick="ShowHidePassword('password')"> 
			<input  type="button" class="knopka_generation" onclick="generatePass('password')"> 		
			<abbr title="Это поле обязательно для заполнения"><spanz></spanz></abbr> 

<script language="Javascript">
function ShowHidePassword(id){
element = $('#'+id)
element.replaceWith(element.clone().attr('type',(element.attr('type') == 'password') ? 'text' : 'password'))
}
</script>


		</div>
	</div>	
	<div class="lk_schoolboy_blok">
		<div name="none">
			<label class="lk_schoolboy">Место жительства</label>
			<input required id="location" name="location" type="text" > <abbr title="Это поле обязательно для заполнения"><spanz></spanz></abbr> 
		</div>	
		<div>
			<label class="lk_schoolboy">Мобильный телефон</label>
			<input id="mobile" name="mob_number" type="text" pattern="[0-9]{0}|[0-9]{5,11}" oninvalid="this.setCustomValidity('Введите корректный номер (5-11 цифр)')" oninput="setCustomValidity('')" /> 
		</div>
		<div>
			<label class="lk_schoolboy">Адрес эл. почты</label> 
			<input required name="email" type="email" > <abbr title="Это поле обязательно для заполнения"><spanz></spanz></abbr> <!-- А еще у этого поля проверяем наличие в базе данных-->

		</div>
	</div>	
	<div class="lk_schoolboy_blok">
		<div  name="none">
			<label class="lk_schoolboy">Рассылка на эл.почту</label>
			
			<input type="checkbox" id="spam_email" name="spam_email" value="ON"> 
			
		</div>
	</div>	
		
		
	<!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->  
		<div class="button_all">
			<input type="submit" class="knopka_retain" name="submit" value="Зарегистрироваться">
			<input type="button" class="knopka_cansel" onclick="location_cancel()" name="cansel" value="Отмена">
	<!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** -->  
		</div>
	</form>

<script>

function seeit(){

}

function organ(){
	if(document.getElementById('select_status').value==2){
		document.getElementById('school').required=false;
		document.getElementById('select_class').required=false;
		document.getElementById('location').required=false;
		document.getElementById('day1').required=false;
		document.getElementById('month1').required=false;
		document.getElementById('year1').required=false;
		for (var i=0; i<document.getElementsByName('none').length; i++) {
			document.getElementsByName('none')[i].style.display="none";
		}
	}
	else{
		document.getElementById('school').required=true;
		document.getElementById('select_class').required=true;
		document.getElementById('location').required=true;
		document.getElementById('day1').required=true;
		document.getElementById('month1').required=true;
		document.getElementById('year1').required=true;
		for (var i=0; i<document.getElementsByName('none').length; i++) {
			document.getElementsByName('none')[i].style.display="block";
		}
	}
	
}  
function location_cancel(){		
		document.location.href="../index.php";
}
window.onload = function () {
    var day = new Date,
        md = (new Date(day.getFullYear(), day.getMonth() + 1, 0, 0, 0, 0, 0)).getDate(),
        $month_name = "января февраля марта апреля мая июня июля августа сентября октября ноября декабря".split(" ");
 
    function set_select(a, c, d, e) {
        var el = document.getElementsByName(a)[0];
        for (var b = el.options.length = 0; b < c; b++) {

            el.options[b+1] = new Option(a == 'month1' ? $month_name[b] : b + d, b + d);
         }
		// el.options[0] = new Option(e);
		 //el.value=e;
		 //alert("ds");
		
		
		if(a.search('day') != -1){el.options[0] = new Option("дд");
			el.options[0].value="";
			
			document.getElementById(a).value="";
	
		}
		if(a.search('month') != -1){el.options[0] = new Option("мм");
			el.options[0].value="";
			
			document.getElementById(a).value="";
		}
		if(a.search('year') != -1){el.options[0] = new Option("гг");
			el.options[0].value="";
			
			document.getElementById(a).value="";
		}
		
		
		
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
	organ();
	//document.getElementById('day1').value = "5";
}

document.getElementById('mobile').onkeypress=function(event){
	event = event || window.event;
	if (event.charCode && (event.charCode < 48 || event.charCode > 57))
		return false;
}

/*document.getElementById('login').onkeypress=function(event){
	event = event || window.event;
	if (event.charCode && (event.charCode < 48 || event.charCode > 57))
		return false;
}*/

</script>



