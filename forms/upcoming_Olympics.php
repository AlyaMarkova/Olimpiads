	
	<div id="time_line"><a id="week" class="day_select" onclick="periud(id)">за неделю</a>
	<a id="month" class="day_select" onclick="periud(id)">за месяц</a>
	<a id="all" class="day_select2" onclick="periud(id)">показать все</a> </div>
	
	<!--<input id="date_vivod" name="date_vivod" type="radio" value="неделя"> неделя</input>
    <input id="date_vivod" name="date_vivod" type="radio" value="за месяц"> за месяц
    <input id="date_vivod" name="date_vivod" type="radio" value="показать всё" checked> показать всё
	-->
	
	<div id="-1">
	</div>
			<div>
				<!--<input type="button"  id="tax_request"  value="Подать">-->
				<input type="button" style="display: none" id="tax_request2" value="" onclick="tax_request_function()">
				
				<!-- Кнопка активации -->
				<label class="btn" style="display: none" id="tax_request" for="modal-1"></label>
				<!-- Модальное окно -->
				<div class="modal">
				  <input class="modal-open" id="modal-1" type="checkbox" hidden>
				  <div class="modal-wrap" aria-hidden="true" role="dialog">
					<label class="modal-overlay" for="modal-1"></label>
					<div class="modal-dialog">
					  <div class="modal-header">
						<h2>Заявка на участие </h2>
						<!--<label class="btn-close" for="modal-1" aria-hidden="true">×</label>-->
					  </div>
					  <div class="modal-body">
						<p id="name_olympiad_modal"></p>
					  </div>
					  <div class="modal-footer">
					  
						<label onclick="tax_request_function()" class="btn2 btn-primary" for="modal-1">Подтвердить</label>
						<label class="btn2 btn-primary2" for="modal-1">Отклонить</label>
					  </div>
					</div>
				  </div>
				</div>
				
				
				
			</div>
			
			
			
				<div>
				<!--<input type="button"  id="tax_request"  value="Подать">-->
				<!--<input type="button" id="tax_request2" value="Отменить заявку"  for="modal-1"">-->
				<label class="btn2" id="tax_request1" style="display: none"  value="Отменить" for="modal-3"></label>
				<!-- Кнопка активации -->
			
				<!-- Модальное окно -->
				<div class="modal">
				  <input class="modal-open" id="modal-3" type="checkbox" hidden>
				  <div class="modal-wrap" aria-hidden="true" role="dialog">
					<label class="modal-overlay" for="modal-3"></label>
					<div class="modal-dialog">
					  <div class="modal-header2">
						<h2>Заявка на участие </h2>
						<!--<label class="btn-close" for="modal-1" aria-hidden="true">×</label>-->
					  </div>
					  <div class="modal-body">
						<p id="name_olympiad_modal2"></p>
					  </div>
					  <div class="modal-condition">
						<p>Вы действительно хотите отменить заявку на участие?</p>
					  </div>
					  <div class="modal-footer">
						<label onclick="tax_request_function()" id="yes" class="btn2 btn-primary" for="modal-3">Да</label>
						<label class="btn2 btn-primary2" for="modal-3">Нет</label>
					  </div>
					</div>
				  </div>
				</div>
				
				
				
			</div>
			
			
			
			<div>
		<!-- Кнопка активации -->
				<label class="btn" style="display: none"  id="tax_request3" for="modal-2"></label>
				<!-- Модальное окно -->
				<div class="modal">
				  <input class="modal-open" id="modal-2" type="checkbox" hidden>
				  <div class="modal-wrap" aria-hidden="true" role="dialog">
					<label class="modal-overlay" for="modal-2"></label>
					<div class="modal-dialog">
					  <div class="modal-header2">
						<h2>Заявка успешно принята!</h2>
						<p style="display: none" id="name_olympiad_modal"></p>
						<!--<label class="btn-close" for="modal-1" aria-hidden="true">×</label>-->
					  </div>
					  <div class="modal-body2">
						<p>Вы были добавлены в предварительный список участников</p>
					  </div>
					  <div class="modal-footer">
						
						<label class="btn2 btn-primary" style="display: none" id="cancel_id" for="modal-2">Отклонить</label>
					  </div>
					</div>
				  </div>
				</div>
				
				
				
			</div>
			
			
			
<script> 
	var week = new Date();
	var mon=week.getMonth();
	switch (mon)
    {
      case 0: s="января"; break;
      case 1: s="февраля"; break;
      case 2: s="марта"; break;
      case 3: s="апреля"; break;
      case 4: s="мае"; break;
      case 5: s="июня"; break;
      case 6: s="июля"; break;
      case 7: s="августа"; break;
      case 8: s="сентября"; break;
      case 9: s="октября"; break;
      case 10: s="ноября"; break;
      case 11: s="декабря"; break;
    }
	document.getElementById('week').innerHTML=week.getDate()+" - "+(week.getDate()+6)+" "+s;
	var week2 = new Date(week);
	week2.setDate(week2.getDate() + 6);
	if(week2.getMonth()!=mon){
		switch (week.getMonth()+1)
		{
		  case 0: s2="января"; break;
		  case 1: s2="февраля"; break;
		  case 2: s2="марта"; break;
		  case 3: s2="апреля"; break;
		  case 4: s2="мае"; break;
		  case 5: s2="июня"; break;
		  case 6: s2="июля"; break;
		  case 7: s2="августа"; break;
		  case 8: s2="сентября"; break;
		  case 9: s2="октября"; break;
		  case 10: s2="ноября"; break;
		  case 11: s2="декабря"; break;
		  case 12: s2="января"; break;
		}
		var week5 = new Date();
		week5.setDate(week5.getDate() + 6);			
		document.getElementById('week').innerHTML=week.getDate()+" - "+week5.getDate()+" "+s+" - "+s2;
	}
		
	  




			var date_vidod = [];
			var count_record=0;
			var par2={
				
				"action": "vivod_olimpics",
				"id_user_session": <?php if (!empty($_SESSION['id'])){echo $_SESSION['id'];}else{ echo -1;}?>,
				}
			$.ajax({
				type: "POST",
				url: "../bd/upcoming_olimpics.php",
				data: 'jsonData=' + JSON.stringify(par2),  
				success: function(html){						
					html=JSON.parse(html);
					var array_id = html.array_id;
						count_record=html.array_id.length;
						if((count_record==1)&&(array_id[0]=="")){
							array_id.length=0;						}
							for(var i=0;i<array_id.length;i++){
								create_div_olimpics(i,html.array_id[i],html.array_name_olympiad[i],html.array_subject[i],html.array_classes[i],html.array_terms[i],html.array_date[i],html.id_org[i],html.status_display[i]);
								
								if($('#'+i)[0]){


								
								var rights_user=<?php if (empty($_SESSION['id'])){echo 0;}else{echo $_SESSION['rights'];}?>;
								var prof_user=<?php if (!empty($_SESSION['id'])){echo $_SESSION['id'];}else{ echo -1;}?>;
								if(rights_user==0){
									document.getElementById(i+'btn_edit').style.display="none";
									document.getElementById(i+'btn_delete').style.display="none";
									document.getElementById(html.array_id[i]+'btn_zayvka2').style.display="none";
									document.getElementById(html.array_id[i]+'btn_zayvka').style.display="none";
								}
								if((html.id_org[i]!=prof_user)&&(rights_user!=3)){
									document.getElementById(i+'btn_edit').disabled=true;
									document.getElementById(i+'btn_delete').disabled=true;
									document.getElementById(html.array_id[i]+'btn_zayvka2').disabled=true;
									document.getElementById(html.array_id[i]+'btn_zayvka').disabled=true;
									
								}
								
								if(rights_user!=1){
									document.getElementById(html.array_id[i]+'btn_zayvka2').disabled=true;
									document.getElementById(html.array_id[i]+'btn_zayvka').disabled=true;
										document.getElementById(html.array_id[i]+'btn_zayvka2').title="Вы не можете подать заявку";
									document.getElementById(html.array_id[i]+'btn_zayvka').title="Вы не можете подать заявку";
								}
								if(rights_user==1){
									document.getElementById(html.array_id[i]+'btn_zayvka2').disabled=false;
									document.getElementById(html.array_id[i]+'btn_zayvka').disabled=false;
									
									document.getElementById(i+'btn_edit').style.display="none";
									document.getElementById(i+'btn_delete').style.display="none";
		
								}
								if((rights_user==1)&&(classes(html.array_classes[i],html.class_schollboy)==false)){
									document.getElementById(html.array_id[i]+'btn_zayvka2').disabled=true;
									
									document.getElementById(html.array_id[i]+'btn_zayvka').disabled=true;
									document.getElementById(html.array_id[i]+'btn_zayvka2').title="Вы не можете подать заявку";
									document.getElementById(html.array_id[i]+'btn_zayvka').title="Вы не можете подать заявку";
								}
								var now3 = new Date();
								//now3.setDate(now3.getDate()-1);
								var now4 = new Date(html.array_terms[i]);
								if(now3>now4){
									document.getElementById(html.array_id[i]+'btn_zayvka2').disabled=true;
									document.getElementById(html.array_id[i]+'btn_zayvka').disabled=true;
										document.getElementById(html.array_id[i]+'btn_zayvka2').title="Вы не можете подать заявку";
									document.getElementById(html.array_id[i]+'btn_zayvka').title="Вы не можете подать заявку";
								}
								
								}
							}
						
					
				}
			});
			
	function classes(olymp_class,user_class){
		
		var str=olymp_class;
				do {
				var from = str.search(','); 
				if(from!=-1){
					var str2=str.substring(0,from);
					var from2 = str2.search('-'); 
					if(from2!=-1){
						var ii=str2.substring(0,from2);
						var i2=str2.substring(from2+1,str2.length);
						for(var i=Number(ii);i<= Number(i2);i++){
							if(i==user_class){
								return true;
							}
						}
					}
					else{
						if(str2==user_class){
							return true;
						}
					
					}
					str=str.substring(from+1,str.length);										
				}
				else{
					var from = str.search('-'); 
					if(from!=-1){
						var ii=str.substring(0,from);
						var i2=str.substring(from+1,str.length);
						//alert(Number("123"));
						for(var i=Number(ii);i<= Number(i2);i++){
							if(i==user_class){
								return true;
							}
						}
					}
					else{
						if(str==user_class){
							return true;
						}
					}
					str=str.substring(0,0);
				}				
			} while (str.length>0);
		return false;
	}		
			
	function periud(id){	
		
		var now = new Date();
		if(id=="week"){
			
			now.setDate(now.getDate()+6);
			//alert(now);
			for(var i=0;i<date_vidod.length;i++){
				//alert(document.getElementById(date_vidod[i]+'date').innerHTML);
				//alert(document.getElementById(date_vidod[i]+'date').innerHTML);

				var now2 = new Date(document.getElementById(date_vidod[i]+'date').value);
				//alert(date_vidod[i]);
				if(now<now2){

					document.getElementById(date_vidod[i]).style.display="none";
				}
				else{
					document.getElementById(date_vidod[i]).style.display="block";
				}
			}
			document.getElementById('week').setAttribute("class", "day_select2");
			document.getElementById('month').setAttribute("class", "day_select");
			document.getElementById('all').setAttribute("class", "day_select");
		}
		if(id=="month"){
			now.setMonth(now.getMonth()+1);
			//alert(now);
			for(var i=0;i<date_vidod.length;i++){
				//alert(document.getElementById(date_vidod[i]+'date').innerHTML);
				var now2 = new Date(document.getElementById(date_vidod[i]+'date').value);
				//alert(date_vidod[i]);
				if(now<now2){

					document.getElementById(date_vidod[i]).style.display="none";
				}
				else{
					document.getElementById(date_vidod[i]).style.display="block";
				}
			}
			document.getElementById('week').setAttribute("class", "day_select");
			document.getElementById('month').setAttribute("class", "day_select2");
			document.getElementById('all').setAttribute("class", "day_select");			
		}
		if(id=="all"){
			for(var i=0;i<date_vidod.length;i++){
				document.getElementById(date_vidod[i]).style.display="block";			
			}
			document.getElementById('week').setAttribute("class", "day_select");
			document.getElementById('month').setAttribute("class", "day_select");
			document.getElementById('all').setAttribute("class", "day_select2");	
		}
	
	/*
		for(var i=0;i<n;i++){
			document.getElementById(date_vidod[i]).style.display="block";
		}
		for(var i=n;i<count_record;i++){
			document.getElementById(date_vidod[i]).style.display="none";
		}*/
		
	}	
	var get_id=0;
	function id_olymp(id,name){
		
		
		document.getElementById('tax_request').click();
		document.getElementById('name_olympiad_modal').innerHTML=name;	
		//alert(id);
		get_id=id;
	}
	function id_olymp2(id,name){
		
		
		document.getElementById('tax_request1').click();
		document.getElementById('name_olympiad_modal2').innerHTML=name;	
		//alert(id);
		get_id=id;
	}
	
	
	function tax_request_function(){
		//var get_id=<?php echo $_GET['id'];?>;
		var id_user=<?php if (empty($_SESSION['id'])){echo -1;}else{echo $_SESSION['id'];}?>;
		var par2={	
				'id_olymp':get_id,
				'id_user':id_user,						
		}
		$.ajax({
			type: "POST",
			url: "bd/reg_na_olymp.php",
			data: 'jsonData=' + JSON.stringify(par2),  
			success: function(html){
				html=JSON.parse(html);
				if(html.status==1){
					document.getElementById(get_id+'btn_zayvka').style.display="none";
					document.getElementById(get_id+'btn_zayvka2').style.display="block";
					document.getElementById('tax_request3').click();
					//document.getElementById('tax_request3').click();
					var div_name=document.getElementById(get_id+'btn_zayvka2').name;
					document.getElementById(div_name).style.background="#53c84b";
					setTimeout(function(){						
						document.getElementById('cancel_id').click();
					},3000);
				}
				else{
					var div_name=document.getElementById(get_id+'btn_zayvka2').name;
					 document.getElementById(div_name).style.background="#6AC0ED";
					document.getElementById(get_id+'btn_zayvka2').style.display="none";
					document.getElementById(get_id+'btn_zayvka').style.display="block";
					
				}				
				
								
			}
		});
		
	}
	
	
	
	function action_olimpiad(id){
		var str=id;
		var from = str.search('name'); 
		var to = str.length;
		var newstr = str.substring(0,from);
		//alert(newstr);			
		document.location.href='../olimpiada.php?'+'id='+newstr;			
		
		
		
	}
	function delete_olimpiad(id){
		var par2={				
				"id": id,
				
				}
			$.ajax({
				type: "POST",
				url: "../bd/delete_olimpics.php",
				data: 'jsonData=' + JSON.stringify(par2),  
				success: function(html){					
					document.location.href='../index.php';			
					
				}
			});		
	}
	function info_organizator(id){		
		document.location.href='../info_organizer.php?'+'id='+id;			
	}
	
	function Edit_olimpiada(id){		
		document.location.href='../Edit_olimpiada.php?'+'id='+id;			
	}
	
	function tax_application(id){		
		//document.location.href='../info_organizer.php?'+'id='+id;			
	}
	
	function list_user(id){		
		document.location.href='../list_user.php?'+'id='+id;			
	}
	function  create_div_olimpics(i,id, name, subject, classes, terms, date,id_org,status){
			var div_elem = document.createElement('div');
			div_elem.id=i;
			
				div_elem.style.background = "#6AC0ED";
				div_elem.style.height = "45px";
				div_elem.style.margin = "5px 0 5px 0";	
				div_elem.style.position = "relative";
			var label_date = document.createElement('td');		
			label_date.id =i+'date';			
			var now = new Date();
			var str = date;				
			var newstr = date;
			do {
				from = str.search('!'); 
				to = str.length;
				newstr = str.substring(0,from);
				str=str.substring(from+1,to);				
				var dat = new Date(newstr);
				var dat22 = new Date(newstr);
				
			} while ((now>dat)&&(str.length>0));
			if(now>dat){
				var par2={
					
					"id": id,
					
					}
				$.ajax({
					type: "POST",
					url: "bd/automation_olympiad.php",
					data: 'jsonData=' + JSON.stringify(par2),  
					success: function(html){
						
					}
				});			
			}
			
			
			var newstr2 = newstr.substring(0, 10);
			var newstr1 = newstr2.split('-');
			var mon = "";
			//document.write(newstr1);
			switch (newstr1[1]) { 
			case "01": 
			mon = "янв"; 
			break; 
			case "02": 
			mon = "фев"; 
			break; 
			case "03": 
			mon = "мар"; 
			break; 
			case "04": 
			mon = "апр"; 
			break; 
			case "05": 
			mon = "май"; 
			break; 
			case "06": 
			mon = "июн"; 
			break; 
			case "07": 
			mon = "июл"; 
			break; 
			case "08": 
			mon = "авг"; 
			break; 
			case "09": 
			mon = "сен"; 
			break; 
			case "10": 
			mon = "окт"; 
			break; 
			case "11": 
			mon = "ноя"; 
			break; 
			case "12": 
			mon = "дек"; 
			break; 
			}
				var newstr3 = newstr1[2] + " " + mon + " " + newstr1[0];
			//document.write(newstr3);
			var dat = new Date(newstr2);
			label_date.value=newstr2;
				label_date.style.width = "50px";
				label_date.style.color = "#0A3C57";
				label_date.style.position = "absolute";
				label_date.style.top = "5px";
				label_date.style.left = "5px";
			label_date.innerHTML = newstr3;
			div_elem.appendChild(label_date);
			
			
			var label_name = document.createElement('td');		
			label_name.id =id+'name';
			if(name.length>50){
				name = name.substring(0, 50)+"...";
			}
				label_name.style.color = "#0A3C57";
				label_name.style.textDecoration = "underline";
				label_name.style.fontSize = "15pt";
				label_name.style.padding = "0 0 0 55px";
				label_name.style.cursor = "pointer";
			label_name.innerHTML = name;
			label_name.onclick= function(){action_olimpiad(label_name.id);};
			div_elem.appendChild(label_name);
			
			var btn_edit= document.createElement('input');		
			btn_edit.id =i+'btn_edit';
			btn_edit.type='button';
			btn_edit.onclick= function(){Edit_olimpiada(id);};
			//label_subject.innerHTML =subject;
				btn_edit.style.width = "25px";
				btn_edit.style.position = "absolute";
				btn_edit.style.top = "2px";
				btn_edit.style.right = "110px";
			btn_edit.title = "Редактировать олимпиаду";
			//btn_edit.value="Редактировать";
			btn_edit.setAttribute("class", "redak_olimp");
			div_elem.appendChild(btn_edit);
			
			var btn_edit= document.createElement('input');		
			btn_edit.id =i+'btn_delete';
			btn_edit.type='button';
			btn_edit.onclick= function(){delete_olimpiad(id);};
			//label_subject.innerHTML =subject;
				btn_edit.style.width = "25px";
				btn_edit.style.position = "absolute";
				btn_edit.style.top = "2px";
				btn_edit.style.right = "83px";
			btn_edit.setAttribute("class", "delite_olimp");
			btn_edit.title = "Удалить олимпиаду";
			//btn_edit.value="Удалить олимпиаду";
			div_elem.appendChild(btn_edit);
			
			var btn_edit= document.createElement('input');		
			btn_edit.id =i+'btn_organizator';
			btn_edit.type='button';
			btn_edit.onclick= function(){info_organizator(id);};
			//label_subject.innerHTML =subject;
				
				btn_edit.style.width = "25px";
				btn_edit.style.position = "absolute";
				btn_edit.style.top = "2px";
				btn_edit.style.right = "2px";
			btn_edit.title = "Организатор";
			//.value="Организатор";
			btn_edit.setAttribute("class", "organizator");
			div_elem.appendChild(btn_edit);
			
			var btn_edit= document.createElement('input');		
			btn_edit.id =i+'btn_list_user';
			btn_edit.type='button';
			btn_edit.onclick= function(){list_user(id);};
			//label_subject.innerHTML =subject;
				btn_edit.style.width = "25px";
				btn_edit.style.position = "absolute";
				btn_edit.style.top = "2px";
				btn_edit.style.right = "29px";
			btn_edit.title = "Список участников";
			//btn_edit.value="Список участников";
			btn_edit.setAttribute("class", "user_list");
			
			div_elem.appendChild(btn_edit);
			 
			var btn_edit= document.createElement('input');		
			btn_edit.id =id+'btn_zayvka';
			btn_edit.type='button';
			btn_edit.onclick= function(){id_olymp(id,name);};
			//label_subject.innerHTML =subject;
			status
			if(status==1){
				btn_edit.style.display='none';
			}
			btn_edit.style.width = "25px";
			btn_edit.style.position = "absolute";
			btn_edit.style.top = "2px";
			btn_edit.style.right = "56px";
			btn_edit.setAttribute("name", i);
			btn_edit.setAttribute("class", "request_zayvka");
			btn_edit.title = "Подать заявку";
			//btn_edit.value="Подать заявку";
			btn_edit.style.float='left';
			div_elem.appendChild(btn_edit);
			
			var btn_edit= document.createElement('input');		
			btn_edit.id =id+'btn_zayvka2';
			btn_edit.type='button';
			btn_edit.onclick= function(){id_olymp2(id,name);};
			//label_subject.innerHTML =subjec
			btn_edit.style.width = "25px";
			btn_edit.style.position = "absolute";
			btn_edit.setAttribute("class", "no_request_zayvka");
			btn_edit.style.top = "2px";
			btn_edit.style.right = "56px";
			btn_edit.setAttribute("name", i);
			btn_edit.title = "Отменить заявку";
			
			//btn_edit.value="Отменить заявку";
			if(status==0){
				btn_edit.style.display='none';
			}
			btn_edit.style.float='left';
			div_elem.appendChild(btn_edit);
			
			/*var btn_edit= document.createElement('label');		
			btn_edit.id ='tax_request';
			//btn_edit.type='label';
			btn_edit.for='modal-1';
			
			btn_edit.class='btn';
			btn_edit.onclick= function(){id_olymp(btn_edit.id);};
			//label_subject.innerHTML =subject;
			//btn_edit.value="Подать заявку";
			div_elem.appendChild(btn_edit);*/
			
				
				
			
			var label_classes= document.createElement('label');		
			label_classes.id =i+'classes';
				label_classes.style.color = "#0A3C57";
				label_classes.style.margin = "0 15px 0 55px";
			label_classes.innerHTML = 'Класс '+classes;
			div_elem.appendChild(label_classes);
			
			var label_subject= document.createElement('label');		
			label_subject.id =i+'subject';
			var str = subject;				
			from = str.search('!'); 
			var	newstr = str.substring(0,from);
			if(newstr.length < str.length-1){
				newstr = newstr+"...";
			}
			 //newstr = str.replace( /!/g, " " );
				label_subject.style.color = "#0A3C57";
				label_subject.style.fontSize = "12pt";
			label_subject.innerHTML =newstr;
			div_elem.appendChild(label_subject);
			
			var label_terms = document.createElement('label');		
			label_terms.id ='terms';
				label_terms.style.color = "#0A3C57";
				label_terms.style.fontSize = "10pt";
				label_terms.padding = "0 0 0 20px ";
				label_terms.style.position = "absolute";
				label_terms.style.bottom = "3px";
				label_terms.style.right = "0";
			label_terms.innerHTML = 'Приём заявок на участие длится до '+terms;
			div_elem.appendChild(label_terms);
			
			var next_elem=-1;
			for(var j=0;j<i;j++){
				if(document.getElementById(date_vidod[j]+'date')==null){
					continue;
				}
				var next=document.getElementById(date_vidod[j]+'date').value;	
				var dat2 = new Date(next);					
				if(dat22>dat2){
					next_elem=date_vidod[j];
				}
			}
			if(i==0){
				next_elem=-1;
				date_vidod[i]=next_elem+1;
			}	
			else{
				for(var j=i;j>next_elem;j--){
					date_vidod[j]=date_vidod[j-1];				
				}
				date_vidod[next_elem+1]=i;
			}
			if(status==1){				
				div_elem.style.background="#53c84b";
			}
		
			next_elem=document.getElementById(next_elem);
			if(now<dat22){
				if(next_elem.nextSibling){
					next_elem.parentNode.insertBefore(div_elem, next_elem.nextSibling);
				}
				else{
					next_elem.parentNode.appendChild(div_elem);
				}
			}			
			//document.getElementById(id).onclick = function() {action_olimpiad();};
					
	}
</script>
 

