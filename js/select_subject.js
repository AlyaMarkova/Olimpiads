<script>
subjecr_string="";
function select_subject_activation(value,id){
	if (document.getElementById(value)==null  && value !='Список предметов'){		
		var btn = document.createElement('input')
		btn.id = value
		btn.name = value
		if(value=="Математика"){btn.className = "subject_math"} 
		if(value=="Русский язык"){btn.className = "subject_russ"} 
		if(value=="Информатика"){btn.className = "subject_inf"} 
		if(value=="Обществознание"){btn.className = "subject_soc"}
		btn.type = 'button'
		btn.value = value
		var next = document.getElementById(id);	
		next.parentNode.appendChild(btn);
		document.getElementById(value).onclick = function() {delete_button(value);};		
		document.getElementById('subject_string').value = document.getElementById('subject_string').value+value+"!";
		
		document.getElementById('select_subject').required=false;
	}
	document.getElementById('select_subject').value = "";
}

function delete_button(id){
	if (document.getElementById(id).type=='button'){
		document.getElementById('subject_string').value=document.getElementById('subject_string').value.replace(document.getElementById(id).value+"!","");
	}
	document.getElementById(id).remove();
	
	if(document.getElementById('subject_string').value==""){
		document.getElementById('select_subject').required=true;
	}
}

var number_date=0;
var number_place=0;

function delete_button2(id){
	if(number_date>1){
		document.getElementById('knopka_retain1').disabled=false;
		
		document.getElementById('btn1').disabled=false;
		document.getElementById('number_date').value=document.getElementById('number_date').value-1;
		if (document.getElementById(id).type=='button'){
				document.getElementById('subject_string').value=document.getElementById('subject_string').value.replace(document.getElementById(id).value+" ","");
		}
		document.getElementById(id).remove();
		number_date=number_date-1;
		var idd = Number(id.substring(6));
		var id_staroe = idd;
			for(var i = id_staroe; i<number_date+1; i++){
				var id_novoe = i+1;
				
					switch (i)
					{		  
					  case 1: s="1"; break;
					  case 2: s="2"; break;
					  case 3: s="3"; break;
					  case 4: s="4"; break;
					  case 5: s="5"; break;
					  case 6: s="6"; break;
					  case 7: s="7"; break;
					}
				
				
				document.getElementById('p_elem'+id_novoe).id = 'p_elem'+i;
				
				document.getElementById(id_novoe+' Этап ').innerHTML = s+' этап ';
				document.getElementById(id_novoe+' Этап ').id = i+' Этап ';
				
				document.getElementById('day'+id_novoe).name= 'day'+i;
				document.getElementById('day'+id_novoe).id = 'day'+i;
				
				document.getElementById('month'+id_novoe).name = 'month'+i;
				document.getElementById('month'+id_novoe).id = 'month'+i;
				
				document.getElementById('year'+id_novoe).name = 'year'+i;
				document.getElementById('year'+id_novoe).id = 'year'+i;
				
				document.getElementById('1time'+id_novoe).name = '1tm'+i;
				document.getElementById('1time'+id_novoe).id = '1time'+i;
				
				document.getElementById('2time'+id_novoe).name = '2tm'+i;
				document.getElementById('2time'+id_novoe).id = '2time'+i;
				
				document.getElementById('btn'+id_novoe).id = 'btn'+i;
							
			}
			if(number_date==1){
				document.getElementById('btn1').style.opacity=0.5;
			}
	}
	else{
		document.getElementById('btn1').disabled=false;
		document.getElementById('btn1').style.opacity=0.5;
	}	
			
}

	
function create_date(i){
	if(number_date==6){
		document.getElementById('knopka_retain1').disabled=true;
	}
	if(number_date<7){
		
	number_date=number_date+1;
	i=number_date;	
	document.getElementById('number_date').value=i;
		
		
		
		var next = document.getElementById('div_p_date_olimp');
		var p_elem = document.createElement('div');
		p_elem.className = 'div_date';
		p_elem.id='p_elem'+i;
		var label = document.createElement('label');		
		label.id =i+" Этап ";		
		
		switch (i)
		{		  
		  case 1: s="1"; break;
		  case 2: s="2"; break;
		  case 3: s="3"; break;
	      case 4: s="4"; break;
          case 5: s="5"; break;
		  case 6: s="6"; break;
		  case 7: s="7"; break;
		}
		
		label.innerHTML = s+" этап ";
		id_last_elem=label.id;
		p_elem.appendChild(label);			
		
		var dt = document.createElement('select')
		dt.id ="day"+i,
		dt.name ="day"+i,
		dt.className ="day_class",
		dt.value="дд";
		dt.required=true;
		p_elem.appendChild(dt);	
		
		var dt = document.createElement('select')
		dt.id ="month"+i,	
		dt.className ="month_class",
		dt.name ="month"+i,
		dt.required=true;
		dt.onchange=function(){check(dt.id );};	
		p_elem.appendChild(dt);	
		
		var dt = document.createElement('select')
		dt.id ="year"+i	,
		dt.name ="year"+i,
		dt.required=true;
		dt.className ="years_class",
		dt.onchange=function(){check(dt.id );};	
		p_elem.appendChild(dt);
		
		
		var label = document.createElement('label');
		label.innerHTML = ' время ';
		p_elem.appendChild(label);
			
		var tm = document.createElement('input');		
		tm.id ="1time"+i;
		tm.name ="1tm"+i;
		tm.className ="time_number";
		tm.type = 'number'
		tm.min = 00
		tm.max = 23
		tm.required=true;
		
		tm.value = 00;
		p_elem.appendChild(tm);	
		
		var label = document.createElement('label');		
		label.innerHTML = ' : ';
		label.className ="dvoetochie";
		//label.style.font-weight=600;
		//font-weight: 600; 
		p_elem.appendChild(label);

		var tm = document.createElement('input');		
		tm.id ="2time"+i;
		tm.name ="2tm"+i;
		tm.required=true;
		tm.className ="time_number";
		tm.type = 'number'
		tm.min = 00;
		
		tm.max = 59
		tm.value = 00
		p_elem.appendChild(tm);		
		
		var btn = document.createElement('input')
		btn.id ="btn"+i
		btn.type = 'button'	
		btn.className = "knopka_cansel1"
		btn.value = 'Удалить'
		btn.onclick = function() {delete_button2(p_elem.id);};	
		p_elem.appendChild(btn);	
		
		next.parentNode.appendChild(p_elem);
		
		var day = new Date,
        md = (new Date(day.getFullYear(), day.getMonth() + 1, 0, 0, 0, 0, 0)).getDate(),
        $month_name = "января февраля марта апреля мая июня июля августа сентября октября ноября декабря".split(" ");
		
		set_select("day"+i, md, 1, "дд");
		set_select("month"+i, 12, 1, "мм");
		set_select("year"+i, 11, day.getFullYear(), "гг");
		document.getElementById('btn1').style.opacity=1;
	}
	if(number_date==1){
		document.getElementById('btn1').style.opacity=0.5;
	}
}	
	


function create_place(i){
	
	/*
	
	<div class="div_date">
	<input class="create_text"  name="location_olimp" type="text"> <abbr title="Это поле можно не заполнять"> <spant></spant></abbr>
	</div>
	
	<div id="place_olimp">
	<label  id="lk_schoolboy" >Место проведения</label>
	</div>*/
	
	
	if(number_place==6){ 
		document.getElementById('knopka_retain0').disabled=true; 
	}
	 if(number_place<7){ 
	 
		number_place=number_place+1;
		i=number_place;	
		document.getElementById('number_place').value=i;
		
		var next_place = document.getElementById('div_date');
		var p1_elem = document.createElement('div'); 
		p1_elem.className="div_date";
		p1_elem.id='p1_elem'+i;
		var label = document.createElement('label');		
		label.id =i+" Этап ";	
        	
		switch (i)
		{		  
		  case 1: s="1"; break;
		  case 2: s="2"; break;
		  case 3: s="3"; break;
	      case 4: s="4"; break;
          case 5: s="5"; break;
		  case 6: s="6"; break;
		  case 7: s="7"; break;
		}
		//alert("блиать");
		label.innerHTML = s+" этап ";
		id_last_elem1=label.id;
		p1_elem.appendChild(label);	
		
		//abbra.appendChild(span1);	
		//inp1.appendChild(abbra);	
		//p1_elem.appendChild(inp1);	
		
		//label1.innerHTML = s+" этап ";
		//id_last_elem1=label1.id;
		//place.parentNode.appendChild(p1_elem);	
		
		var inp1 =  document.createElement('input');
		inp1.class="create_text";
		inp1.name="location_olimp";
		inp1.type="text";
		p1_elem.appendChild(inp1);
		
		var  abbra=document.createElement('abbr'); 
		abbra.title="Это поле можно не заполнять";
		inp1.appendChild(abbra);
		
		var span1=document.createElement('spant'); 
		abbra.appendChild(span1);	
		
		
		
		
		//place.parentNode.appendChild(p1_elem);
		//id_last_elem=label.id;
		//label.id =i+" Этап ";		
		
	
	
	}
	else if(number_place==1){
		document.getElementById('btn1').style.opacity=0.5;
	}
}	


//а нужна ли эта функция?!!!!!!
function create_date2(i){
	number_date=number_date+1;
	i=number_date;	
	
	document.getElementById('number_date').value=i;
	var next = document.getElementById('div_p_date_olimp');
	var p_elem = document.createElement('div');
	p_elem.className = 'div_date';
	p_elem.id='p_elem'+i;
	var label = document.createElement('label');		
	label.id =i+" Этап ";
	
	label.innerHTML = label.id;
	id_last_elem=label.id;
	p_elem.appendChild(label);			
	
	var dt = document.createElement('select')
	dt.id ="day"+i,
	dt.name ="day"+i,
	dt.className ="day_class",
	dt.value="дд";
	dt.required=true;
	p_elem.appendChild(dt);	
	
	var dt = document.createElement('select')
	dt.id ="month"+i,	
	dt.name ="month"+i,
	dt.className ="month_class",
	dt.required=true;
	dt.onchange=function(){check(dt.id );};	
	p_elem.appendChild(dt);	
	
	var dt = document.createElement('select')
	dt.id ="year"+i	,
	dt.name ="year"+i,
	dt.className ="years_class",
	dt.required=true;
	dt.onchange=function(){check(dt.id );};	
	p_elem.appendChild(dt);
	
	var label = document.createElement('label');		
	label.innerHTML = ' время ';
	p_elem.appendChild(label);	

	var tm = document.createElement('input');		
	tm.id ="1time"+i;
	tm.name ="1tm"+i;
	tm.className ="time_number";
	tm.type = 'number';
	tm.required=true;
	tm.max=23;
	tm.min=00;
	
	p_elem.appendChild(tm);	
	
	var label = document.createElement('label');		
	label.innerHTML = ' : ';
	p_elem.appendChild(label);

	var tm = document.createElement('input');		
	tm.id ="2time"+i;
	tm.name ="2tm"+i;
	tm.max=59;
	tm.min=00;
	tm.required=true;
	tm.className ="time_number";
	tm.type = 'number'
	p_elem.appendChild(tm);				

	var btn = document.createElement('input')
	btn.id ="btn"+i
	btn.type = 'button'	
	btn.className = "knopka_cansel1"
	btn.value = 'Удалить'
	btn.onclick = function() {delete_button2(p_elem.id);};	
	p_elem.appendChild(btn);	
	
	next.parentNode.appendChild(p_elem);
	var day = new Date,
	md = (new Date(day.getFullYear(), day.getMonth() + 1, 0, 0, 0, 0, 0)).getDate(),
	$month_name = "января февраля марта апреля мая июня июля августа сентября октября ноября декабря".split(" ");
	//set_select("day"+i, md, 1, day.getDate() - 1);
	//set_select("month"+i, 12, 1, day.getMonth());
	// set_select("year"+i, 11, day.getFullYear(), 10);
	set_select("day"+i, md, 1, "дд");
	set_select("month"+i, 12, 1, "мм");
	set_select("year"+i, 11, day.getFullYear(), "гг");
	
	//document.getElementById(p_elem.id).
}	
</script>