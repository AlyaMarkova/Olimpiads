<?php
	session_start();
	include('js/fio.js');	
	
?>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/modal_window.css" media="screen" />
<html>
	<div id=label>
		<div>	
			<h1 id="name_olympiad"></h1>
		</div>
		<div id="description_olympiad1">
		<div class="batton_olimpiad">
			<div>
				<input type="button" id="list_of_participants" onclick="list_user()">
			</div>
			<div>
				<input type="button" id="organizer" onclick="info_organizer()">
			</div>
			<div>
				<!--<input type="button"  id="tax_request"  value="Подать">-->
				<!--<input type="button" id="tax_request2" value="Отменить заявку"  for="modal-1"">-->
				
				<!-- Кнопка активации -->
				<label class="btn" id="tax_request"  for="modal-1"></label>
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
						<label onclick="tax_request_function()" id="yes" class="btn2 btn-primary" for="modal-1">Подтвердить</label>
						<label class="btn2 btn-primary2" for="modal-1">Отклонить</label>
					  </div>
					</div>
				  </div>
				</div>
				
				
				
			</div>
			<div>
				<!--<input type="button"  id="tax_request"  value="Подать">-->
				<!--<input type="button" id="tax_request2" value="Отменить заявку"  for="modal-1"">-->
				<label class="btn2" id="tax_request2" style="height:6px;"  value="Отменить" for="modal-3"></label>
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
						<h2>Заявка успешно принята! </h2>
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
			
			
			
			
		</div>
		</div>	
	</div>
			<div>
				<label id="lk_schoolboy">Класс</label><label class="do" id="classes_olympiad"></label>
			</div>
			<div>
				<label id="lk_schoolboy" >Предмет</label><label class="do" id="subject_olympiad"></label>
			</div>
			<div>
				<label id="lk_schoolboy" name="place_olimpiad">Дата и место проведения</label><label class="do" id="location_olympiad"></label>
			</div>
			<!--<div>
				<label id="lk_schoolboy" name="date_of_olimpiad">Дата проведения</label><label class="do" id="date_olympiad"></label>
			</div>-->
			<div>
				<label id="lk_schoolboy">Приём заявок до</label><label class="do" id="terms_olympiad"></label>
			</div>
			<div>
				<label id="lk_schoolboy">Описание</label><div id="opisanie" required="" name="opisanie"></div>
			</div>
</html>
<script>
	
	var non_confirmed = <?php if ($_SESSION['activation']){echo $_SESSION['activation'];}else{echo -2;}?>;
	function tax_request_function(){
		var get_id=<?php echo $_GET['id'];?>;
		
		var id_user=<?php if (empty($_SESSION['id'])){echo -1;}else{echo $_SESSION['id'];}?>;
		var par2={	
				'id_olymp':get_id,
				'id_user':id_user,						
		}
		$.ajax({
			type: "POST",
			url: "../bd/reg_na_olymp.php",
			data: 'jsonData=' + JSON.stringify(par2),  
			success: function(html){
				html=JSON.parse(html);
				if(html.status==1){
					document.getElementById('tax_request').style.display="none";
					document.getElementById('tax_request2').style.display="block";
					document.getElementById('tax_request3').click();
					setTimeout(function(){						
						document.getElementById('cancel_id').click();
					},3000);
					document.getElementById('yes').innerHTML="Отменить";
					
				}
				else{
					document.getElementById('tax_request2').style.display="none";
					document.getElementById('tax_request').style.display="block";
					document.getElementById('yes').innerHTML="Подтвердить";
				}				
				
								
			}
		});
		
	}
	function list_user(){
		
		document.location.href='../list_user.php?'+'id='+<?php echo $_GET['id'];?>;		
	}
	
	function info_organizer(){
		
		document.location.href='../info_organizer.php?'+'id='+<?php echo $_GET['id'];?>;		
	}
	var id_user=<?php if (empty($_SESSION['id'])){echo -1;}else{echo $_SESSION['id'];}?>;
	//var id_user=<?php echo $_SESSION['id'];?>;
	var get_id=<?php echo $_GET['id'];?>;
	var rights_user=<?php if (empty($_SESSION['rights'])){echo -1;}else{echo $_SESSION['rights'];}?>;
	//alert(get_id);
	var par2={
				
				'id': get_id,
				'id_user':id_user,
				
				}
				
			$.ajax({
				type: "POST",
				url: "../bd/conclusion_olympiad.php",
				data: 'jsonData=' + JSON.stringify(par2),  
				success: function(html){
					html=JSON.parse(html);	
					var name =html.name;
					var date =html.date;
					var description =html.description;
					var subject =html.subject;
					var terms =html.terms;
					var location =html.location;
					var classes =html.classes;
					var professor_users_id =html.professor_users_id;	
					document.getElementById('name_olympiad').innerHTML=name;
					document.getElementById('name_olympiad_modal').innerHTML=name;
					document.getElementById('name_olympiad_modal2').innerHTML=name;
					document.getElementById('classes_olympiad').innerHTML=classes;
					document.getElementById('subject_olympiad').innerHTML=FIO_1(subject);				
					document.getElementById('opisanie').innerHTML=description;				
					var str = date;				
					var newstr = date;
					var i=0;
					do {
						i++;
						from = str.search('!'); 
						to = str.length;
						newstr = str.substring(0,from);
						str=str.substring(from+1,to);
						var dat = new Date(newstr);						
						var curr_date = __lead0(dat.getDate());
						var curr_month = __lead0(dat.getMonth());
						curr_month++;
						var curr_year = __lead0(dat.getFullYear());
						var date_dat=curr_date + "." + curr_month + "." + curr_year;
						var time = __lead0(dat.getHours())+':'+ __lead0(dat.getMinutes());
							
						switch (i)
							{		  
							  case 1: s="1"; break;
							  case 2: s="2"; break;
							  case 3: s="3"; break;
							  case 4: s="4"; break;
							  case 5: s="5"; break;
							}
						//document.getElementById('location_olympiad').innerHTML+='<p>'+s+" этап "+date_dat+" время "+time+s+" "+location[i-1]+'</p>';
						/*document.getElementById('location_olympiad').innerHTML+='<p id="etap">'+s+" этап "+'</p>';
						document.getElementById('location_olympiad').innerHTML+='<p id="tab_dat">'+date_dat+" время "+time+'</p>';
						document.getElementById('location_olympiad').innerHTML+='<p id="etap"></p>';
						document.getElementById('location_olympiad').innerHTML+='<p id="tab_loc">'+"         "+location[i-1]+'</p>';*/document.getElementById('location_olympiad').innerHTML+='<table><tr><td id="tab_dat">'+s+" этап "+'</td><td>'+date_dat+" время "+time+'</td></tr><tr id="etap"><td id="tab_dat"></td><td>'+"         "+location[i-1]+'</td></tr></table>';

						
					} while (str.length>0);
					
					
					document.getElementById('terms_olympiad').innerHTML=terms;
					
					if(html.status==2){
						document.getElementById('tax_request').style.display="none";
						document.getElementById('tax_request2').style.display="block";
						document.getElementById('yes').innerHTML="Отменить";
					}
					else{
						document.getElementById('tax_request2').style.display="none";
						document.getElementById('tax_request').style.display="block";
						document.getElementById('yes').innerHTML="Подтвердить";
					}
					
					
					if(rights_user==0){
						document.getElementById(i+'btn_edit').style.display="none";
						document.getElementById(i+'btn_delete').style.display="none";
						 document.getElementById('tax_request2').A = "none";
						 document.getElementById('tax_request').style.pointerEvents = "none";
					}				
					if(rights_user!=1 || non_confirmed==-2){
						document.getElementById('tax_request2').style.pointerEvents = "none";
						
						 document.getElementById('tax_request').style.pointerEvents = "none";
						 document.getElementById('tax_request2').style.opacity = 0.5;
						 document.getElementById('tax_request').style.opacity = 0.5;
						 
					}
					if(rights_user==1){
						 document.getElementById('tax_request2').style.pointerEvents = "block";
						 document.getElementById('tax_request').style.pointerEvents = "block";
					}					
					if((rights_user==1)&&(classes_function(html.classes,html.user_classes)==false)){

						 document.getElementById('tax_request2').style.pointerEvents = "none";
						 document.getElementById('tax_request').style.pointerEvents = "none";
						 
					}	
					var now3 = new Date();								
					var now4 = new Date(terms);
					if(now3>now4){
						 document.getElementById('tax_request2').style.opacity = 0.5;
						 document.getElementById('tax_request').style.opacity = 0.5;
						document.getElementById('tax_request2').style.pointerEvents = "none";
						document.getElementById('tax_request').style.pointerEvents = "none";
					}
				}
			});
			var __lead0 = function (s) {
				return ((s + '').length < 2) ? '0' + s : s;
			}
			
	function classes_function(olymp_class,user_class){
		
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

	
	
</script>