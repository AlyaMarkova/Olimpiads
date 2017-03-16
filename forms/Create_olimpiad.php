<?php
include ("js/select_subject.js");
?>

<script>
	function validate_form (form){
		return twodates()&& manydates();
	}
	
	function manydates(){
		var value_of_return = true
		var date0 = new Date();
		var date1 = new Date();
		for (var i = 2; i <= form.number_date.value; i++) {
			date0=new Date(document.getElementById("year"+(i-1)).value, document.getElementById("month"+(i-1)).value-1, document.getElementById("day"+(i-1)).value);
			date1=new Date(document.getElementById("year"+i).value, document.getElementById("month"+i).value-1, document.getElementById("day"+i).value);
			if (date0 >= date1)
				value_of_return = false;
		}
		if (!value_of_return)
			alert("Даты этапов проведения олимпиад указаны неверно!");
		return value_of_return
	}
	
	function twodates(){
		var date0 = new Date(document.getElementById("year0").value, document.getElementById("month0").value-1, document.getElementById("day0").value); //дата окончания срока подачи заявок
		var date1 = new Date(document.getElementById("year1").value, document.getElementById("month1").value-1, document.getElementById("day1").value); //дата первого этапа
        if (date0 < date1){
            return true;
        }
		else {
			alert("Срок подачи заявки указан неверно!");
            return false;
		}
	}
</script>

<form id="form" action="bd/create_olimpiada.php" method="post" onsubmit="return validate_form (this );">
<link rel="stylesheet" type="text/css" href="css/button.css" media="screen" />
	<p>
		<label id="lk_schoolboy" >Название олимпиады</label>
		<input class="create_text"  name="name_olimp" required type="text">
	</p>
	
	<div>			
		<label class="lk_schoolboy">Тип олимпиады</label>		
		<SELECT class="status_olimp" id="select_status" onchange = "change()" value="2" name="select_status" size="1">
		   <option value="2">Одноэтапная</option>
		   <option value="1">Многоэтапная</option>			
		</SELECT>
	</div>
	
	<div>
	<div>
		<div id="div_p_date_olimp">
			<label id="lk_schoolboy" >Дата проведения</label>						
		</div>
	</div>
	
	<div>
	<p id="knopka_retain__"> <input type="button" id="knopka_retain1" onclick="create_date(number_date)" value="Добавить этап"></p>	
	</div>
	</div>
	
	<div>
	<div>
		<div id="place_olimp">
			<label  id="lk_schoolboy" >Место проведения</label>
		</div>
	</div>
	
	<div>
		<p id="knopka_retain__"> <input type="button" id="knopka_retain0" onclick="create_place(number_place)" value="Добавить место"></p>
	</div>
	</div>
	
	<p>
	<div id="org_block">
		<label id="lk_schoolboy" >Организатор</label>
		<input id="Org_olimp" name="Org_olimp" type="text" >
	</div>
	
	<div>
		<p>
		<label id="lk_schoolboy" >Срок подачи заявки</label>
		<label class="do">до</label>
		<select name="day0" class="day_class" required id="day0"></select>
		<select name="month0" class="month_class" required id="month0" onchange="check(id)"  ></select>
		<select name="year0"  class="years_class" required id="year0" onchange="check(id)"  ></select>
	</div>

	<p>
	
	<label id="lk_schoolboy"  >Класс</label>
		<input type="checkbox" required onclick="status_chek()" class="check_class" id="class_olimp1" name="class_olimp1" value="ON" > <label>1</label>
		<input type="checkbox" onclick="status_chek()" class="check_class" id="class_olimp2" name="class_olimp2" value="ON"> <label>2</label>
		<input type="checkbox" onclick="status_chek()" class="check_class" id="class_olimp3" name="class_olimp3" value="ON"> <label>3</label>
		<input type="checkbox" onclick="status_chek()" class="check_class" id="class_olimp4" name="class_olimp4" value="ON"> <label>4</label>
		<input type="checkbox" onclick="status_chek()" class="check_class" id="class_olimp5" name="class_olimp5" value="ON"> <label>5</label>
		<input type="checkbox" onclick="status_chek()" class="check_class" id="class_olimp6" name="class_olimp6" value="ON"> <label>6</label>
		<input type="checkbox" onclick="status_chek()" class="check_class" id="class_olimp7" name="class_olimp7" value="ON"> <label>7</label>
		<input type="checkbox" onclick="status_chek()" class="check_class" id="class_olimp8" name="class_olimp8" value="ON"> <label>8</label>
		<input type="checkbox" onclick="status_chek()" class="check_class" id="class_olimp9" name="class_olimp9" value="ON"> <label>9</label>
		<input type="checkbox" onclick="status_chek()" class="check_class" id="class_olimp10" name="class_olimp10" value="ON"> <label>10</label>
		<input type="checkbox" onclick="status_chek()" class="check_class" id="class_olimp11" name="class_olimp11" value="ON"> <label>11</label>
	
	<label id="lk_schoolboy" >Предмет</label>		
	<SELECT  id="select_subject" required  name="select_subject" size="1" onchange="select_subject_activation(select_subject.value,select_subject.id)">			
	   <option value="">Список предметов</option>
	   <option>Математика</option>
	   <option>Русский язык</option>
	   <option>Информатика</option>
	   <option>Обществознание</option>
	</SELECT>
	
	</p>
	
	<div>
		<label id="lk_schoolboy" >Описание</label>
		<textarea id="description_olimp" required name="description_olimp"></textarea>		
	</div>
	
	<div id="div_none">
		<input id="number_date" name="number_date" type="text" > <!-- количество этапов -->
		<input id="number_place" name="number_place" type="text" > <!-- количество мест-->
 		<input id="subject_string" name="subject_string" type="text" >
	</div>
	
	<div style="margin-top: 100px;" class="button_all">
		<input type="submit" class="knopka_retain" name="submit_create" value="Создать">
		<input type="button"  class="knopka_cansel" onclick="location_cancel()" name="submit_cancel" value="Отмена">
	</div>
</body>
</html>

<script>
function location_cancel(){		
	document.location.href="../index.php";
}
form = document.getElementById('form'); 
form.subject_string.value = "";
form.number_date.value = "";
form.number_place.value = "";
document.getElementById('Org_olimp').value=<?echo $_SESSION['id'];?>; //получаем ид организатора олимпиады
document.getElementById('org_block').style.display="none";
	
window.onload = function () {
	change();
    var day = new Date,
        md = (new Date(day.getFullYear(), day.getMonth() + 1, 0, 0, 0, 0, 0)).getDate(),
       $month_name = "января февраля марта апреля мая июня июля августа сентября октября ноября декабря".split(" ");
	create_date(number_date);
	create_place(number_place);
	
    function set_select(a, c, d, e) {
        var el = document.getElementsByName(a)[0];
        for (var b = el.options.length = 0; b < c; b++) {
			if (a.search('month') != -1){
				el.options[b+1] = new Option(month_name[b],b + d);
			} else {
				el.options[b+1] = new Option(a == 'month1' ? $month_name[b] : b + d, b + d);
			}
        }
		el.options[0] = new Option(e);
		el.options[0].value="";
		document.getElementById(a).value="";
		 //el.value=e;
      //  el.options[e] && (el.options[e].selected = !0)
    }
	
    set_select("day1", md, 1, "дд");
    set_select("month1", 12, 1, "мм");
    set_select("year1", 11, day.getFullYear(), "гг");
	
	set_select("day0", md, 1, "дд");
    set_select("month0", 12, 1, "мм");
    set_select("year0", 11, day.getFullYear(), "гг");
 
    var year1 = document.getElementById('year1');
    var month1 = document.getElementById("month1");
 
    /*function check_date() {
        var a = year1.value | 0,
            c = month1.value | 0;
			
        md = (new Date(a, c, 0, 0, 0, 0, 0)).getDate();
        a = document.getElementById("day1").selectedIndex;
		
        set_select("day", md, 1, a);
    };
	
    if (document.addEventListener) {
        year.addEventListener('change', check_date, false);
        month.addEventListener('change', check_date, false);
 
    } else {
        year.detachEvent('onchange', check_date);
        month.detachEvent('onchange', check_date);
    }*/
	document.getElementById('day0').value="";
	document.getElementById('month0').value="";
	document.getElementById('year0').value="";
}
	//document.getElementById('year1').value=5;
	//alert(document.getElementById('year1').value);
	var day = new Date,
        md = (new Date(day.getFullYear(), day.getMonth() + 1, 0, 0, 0, 0, 0)).getDate();
        var month_name = "января февраля марта апреля мая июня июля августа сентября октября ноября декабря".split(" ");
	var year1 = document.getElementById('year1');
	var month1 = document.getElementById("month1");
	
	function check(id){
		id=id.replace("year","");
		id=id.replace("month","");
		year1 = document.getElementById('year'+id);
		month1 = document.getElementById("month"+id);
		//alert(id);
		check_date(id);
	}
	
	function check_date(id) {
        var a = year1.value | 0,
            c = month1.value | 0;
        md = (new Date(a, c, 0, 0, 0, 0, 0)).getDate();
        a = document.getElementById("day"+id).selectedIndex;
        set_select("day"+id, md, 1, document.getElementById('day'+id).value);
    };	 
	function set_select(a, c, d, e) {
		id=a.replace("year","");
		id=a.replace("month","");
		id=a.replace("day","");
		//alert(id);
        var el = document.getElementsByName(a)[0];
		//if()
        for (var b = el.options.length = 0; b < c; b++) {
			if(a.search('month') != -1)
			{
				el.options[b+1] = new Option(month_name[b],b + d);
			}
			else
            el.options[b+1] = new Option(a == ('month'+id) ? month_name[b] : b + d, b + d);
        }
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
		//alert(document.getElementById('dt1').value);
	  
    }
	//document.getElementById('day0').option='2';
	//alert($("input:checkbox:checked"));
	
	function status_chek(){
		flag=false;
		for(i=1;i<12;i++){
			if(document.getElementById('class_olimp'+i).checked==true){
				flag=true;
			}
		}
		if(flag==false){
			document.getElementById('class_olimp1').required=true;
		}
		else{
			document.getElementById('class_olimp1').required=false;
		}
	}
	
	function hide_date(){
		if(document.getElementById('number_date').value>1) {
			while(document.getElementById('number_date').value>1) {
				delete_button2('p_elem'+document.getElementById('number_date').value);
				document.getElementById('number_date').value=document.getElementById('number_date').value-1;
				document.getElementById('number_date').value++;
			}	
		} 	
	}
	  
	function hide_place(){
		if(document.getElementById('number_place').value>1) {
				while(document.getElementById('number_place').value>1) {
					delete_button3('p1_elem'+document.getElementById('number_place').value);
					document.getElementById('number_place').value=document.getElementById('number_place').value-1;
					document.getElementById('number_place').value++;
			}
		}
	}
	function change(){
		if(document.getElementById('select_status').value==2){
			document.getElementById('knopka_retain0').style.display="none";
			document.getElementById('knopka_retain1').style.display="none"; 
			hide_date();
			hide_place();
		} else {
			document.getElementById('knopka_retain0').style.display="block";
			document.getElementById('knopka_retain1').style.display="block";
		}
	} 
	
</script>