<?php
	session_start();
	include ("js/fio.js");	
	require_once 'bd.php';
    
    $idd = $_GET['id'];
	//$res1 = mysql_query("SELECT schoolboy_users_id, rating_mark, place FROM schoolboy_past_olympics WHERE olympics_id = $idd");
	$res = mysql_query('SELECT Users_id, Fio_schoolboy, school , class as class1, rating FROM schoolboy');
	$i=0;
	
	$result2 = mysql_query("SELECT * FROM olympics WHERE id='$idd'");
	$myrow2= mysql_fetch_array($result2);	
	
	while($row=mysql_fetch_array($res)){	
		$res1 = mysql_query("SELECT rating_mark, place FROM schoolboy_past_olympics WHERE olympics_id = $idd AND schoolboy_users_id = $row[Users_id]");
		$row4=mysql_fetch_assoc($res1);
		$row1 = explode("!", $row[Fio_schoolboy]);
		
		$row3[$i]= array('Users_id'=>$row[Users_id],'school'=>$row[school], 'class'=>$row[class1], 'Fio_schoolboy'=>$row1, 'rating_mark'=>$row4[rating_mark], 'place'=>$row4[place] ); 
		$i=$i+1;
	}
?>
<html>

<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8"> 
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>

<div class="cont">
	<div id="name_olymp_rezult">
		<label id="name_olymp_rezult"></label>
	</div>
    <table id="table_reiting">
		<thead id="table_reiting_thead">
		<tr> 
			<td class="table_reiting_td"> № </td> 
			<td class="table_reiting_FIO">ФИО
            <input id="regexp" /> 
			</td>
			
			<td class="table_reiting_td">
            <select id="digits">
            <option class = "option"  value="">Школа</option>    
				
<?				
for($c=0, $arr_l=count($row3); $c<=$arr_l; $c++){
	if ($row3[$c]["rating_mark"] <> "" and $row3[$c]["place"] <> "" and $row3[$c]['school'] <> $row3[$c-1]['school'] )  {
	echo '<option class = "option" value="'.$row3[$c]['school'].'" >'.$row3[$c]['school'];
	}
	}
	/*<div id="inf_org">
		<label id="name_olympiad1"></label>
		<label id="organizator_info">Итоги</label>
	</div>*/
?>
                
            </select>
        </td>
			<td class="table_reiting_td">
            <select id="digits1">
                <option class = "option" value="">Класс</option>
                <option class = "option" value="1">1</option>
                <option class = "option" value="2">2</option>
                <option class = "option" value="3">3</option>
				<option class = "option" value="4">4</option>
				<option class = "option" value="5">5</option>
				<option class = "option" value="6">6</option>
				<option class = "option" value="7">7</option>
				<option class = "option" value="8">8</option>
				<option class = "option" value="9">9</option>
				<option class = "option" value="10">10</option>
				<option class = "option" value="11">11</option>
            </select>
        </td>
			<td class="table_reiting_td_shapka" onclick="sort(document.getElementById('ol'))">Итоговый балл
        </td>
			
			<td class="table_reiting_td">
            <select id="digits3">
            <option class = "option"  value="">Диплом</option>    
				
			<option class = "option" value="-">-</option>
            <option class = "option" value="I степень">I степень</option>
            <option class = "option" value="II степень">II степень</option>	
			<option class = "option" value="III степень">III степень</option>
                
            </select>
			</td>
		
		</tr>
		</thead>
		<tbody id="target">
		<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
		<tbody>
		<tr id ="tr1"><td></td><td></td><td></td><td></td><td></td><td></td></tr>
</table>

</div>

<div style="margin-top:30px;" class="button_all">
	<input id="save_btn" type="button" class="knopka_retain" onclick="save_rezult()" value="Сохранить">
	<input id="cancel_btn" type="button" onclick="cancel()" class="knopka_cansel" value="Отменить">
</div>
<script src="js/filterTable.v1.0.min.js"></script>
<script>
	var get_id=<?php echo $_GET['id'];?>;
	//alert(get_id);
	var arr_id_user = []; //массив ид участников?
	var arr_place = []; //массив дипломов
	var arr_rating = []; //массив баллов итоговых
	var par2={	
		"id": get_id,
		"action": "id_schoolboy",
	}
				
	$.ajax({
		type: "POST",
		url: "../bd/past_result_olympiad_edit.php",
		data: 'jsonData=' + JSON.stringify(par2),  
		success: function(html){
			html=JSON.parse(html);
			arr_id_user=html.schoolboy_users_id;
			arr_rating=html.rating_mark;
			arr_place=html.place;
			
			document.getElementById('name_olymp_rezult').innerHTML=html.name_olymp_rezult;
			
			var schoolboy_users_id =html.schoolboy_users_id;
			var rating_mark =html.rating_mark;	
			var place =html.place;	
			
			if((schoolboy_users_id.length==1)&&(html.schoolboy_users_id[0]=="")){
				schoolboy_users_id.length=0;
			}
			for(var i=0;i<schoolboy_users_id.length;i++){
				if(i%2 == 0){
				document.getElementById('target').innerHTML=document.getElementById('target').innerHTML+'<tr style="background:#E4F3FC;">'+
				'<td class="table_reiting_td">'+(i+1)+'</td>'+
				'<td class="table_reiting_td"  onclick="onclick_user(id)" id='+html.schoolboy_users_id[i]+'>'+FIO_1(html.array_fio[i])+'</td>'+
				'<td class="table_reiting_td">'+html.array_school[i]+'</td>'+
				'<td class="table_reiting_td">'+html.array_classes[i]+'</td>'+
				'<td id="ol" name="marks" style=" border-right: 1px solid #0A3C57; padding: 0 5px 0 5px; " contenteditable="true"> <label id="rating'+i+'" >'+html.rating_mark[i]+'</label></td>'+
				'<td class="table_reiting_td" contenteditable="true">'+ '<label style="color:#E4F3FC; font-size:1px;" id =q'+i+'></label>' +'<select style=" color: #0A3C57;  background: none; border-style: none; " id="place'+i+'"><option class = "option" value="0">-</option><option class = "option" value="1">I степень</option><option class = "option" value="2">II степень</option><option class = "option" value="3">III степень</option></select></td>'+
				'</tr>';	
				}
				else{
				document.getElementById('target').innerHTML=document.getElementById('target').innerHTML+'<tr style="background:#C3DCE9;">'+
				'<td class="table_reiting_td">'+(i+1)+'</td>'+
				'<td class="table_reiting_td"  onclick="onclick_user(id)" id='+html.schoolboy_users_id[i]+'>'+FIO_1(html.array_fio[i])+'</td>'+
				'<td class="table_reiting_td">'+html.array_school[i]+'</td>'+'<td class="table_reiting_td">'+html.array_classes[i]+'</td>'+
				'<td id="ol" name="marks" style=" border-right: 1px solid #0A3C57; padding: 0 5px 0 5px; " contenteditable="true">  <label id="rating'+i+'">'+html.rating_mark[i]+'</label></td>'+
				'<td class="table_reiting_td" contenteditable="true">'+ '<label style="color:#C3DCE9; font-size:1px;" id =q'+i+'></label>'+'<select style=" color: #0A3C57;  background: none; border-style: none; " id="place'+i+'"><option class = "option" value="0">-</option><option class = "option" value="1">I степень</option><option class = "option" value="2">II степень</option><option class = "option" value="3">III степень</option></select></td>'+
				'</tr>';
				}
			}
			for(var i=0;i<schoolboy_users_id.length;i++){
				var str="";
				if(arr_place[i]=="0"){
					document.getElementById('place'+i).options[0].selected=true;
					document.getElementById('q'+i).innerHTML = '-';
				}
				if(arr_place[i]=="1"){
					document.getElementById('place'+i).options[1].selected=true;	
					document.getElementById('q'+i).innerHTML = 'I степень';							
				}
				if(arr_place[i]=="2"){
					document.getElementById('place'+i).options[2].selected=true;
					document.getElementById('q'+i).innerHTML = 'II степень';
				}
				if(arr_place[i]=="3"){
					document.getElementById('place'+i).options[3].selected=true;
					document.getElementById('q'+i).innerHTML = 'III степень';
				}						
			}					
		}
	});	
	
	function sort(el) {
	var col_sort = el.innerHTML;
	var tr = el.parentNode;
	var table = tr.parentNode;
	var td, arrow, col_sort_num;

    for (var i=0; (td = tr.getElementsByTagName("td").item(i)); i++) {
		if (td.innerHTML == col_sort) {
			col_sort_num = i;
			if (td.prevsort == "y"){
				el.up = Number(!el.up);
			} else {
				td.prevsort = "y";
				el.up = 0;
			}
		} else {
			if (td.prevsort == "y"){
				td.prevsort = "n";
			}
		}
    }
 
    var a = new Array();
 
    for(i=1; i < table.rows.length; i++) {
        a[i-1] = new Array();
        a[i-1][0]=table.rows[i].getElementsByTagName("td").item(col_sort_num).innerHTML /1000000;
        a[i-1][1]=table.rows[i];
     }

	a.sort();
	if(el.up) a.reverse();

	for(i=0; i < a.length; i++)
	table.appendChild(a[i][1]);
}
    filterTable( 
		document.getElementById("target"), {
			/* Фильтр для второго столбца текстовое поле - только точное совпадение: */
			1: filterTable.Filter(document.getElementById("regexp"),
			/* Коллбэк ф-ция
				валидации */
			function (value, filters, i) {
				var c_value = value.toLowerCase(),
					f_value = filters[i].value.toLowerCase();
					if( c_value.indexOf(f_value)>-1){
						return true;
					}
					else{
						return false;
					}
			},
			/* Будем вызывать
				валидацию по событию
				onkeyup фильтра */
			"onkeyup"
			),
			

			/* Фильтр для третьего столбца выпадающий список: */
		   2: document.getElementById("digits"),

			/* Фильтр для четвертого столбца радио кнопки: */
		   3: document.getElementById("digits1"),
		   5: document.getElementById("digits3"),
		}
    );
	
	
	function onclick_blur(){	
		for(var i = 0; i < arr_id_user.length; i++){ //для кажд участника
			if (document.getElementById('rating'+i)!=null) 
				var val = document.getElementById('rating'+i).innerHTML;
			else 
				var val = document.getElementsByName('marks')[i].innerHTML;
			arr_rating[i]=val; //записываем рейтинг
			 
			//alert(val);
			var val2 = document.getElementById('place'+i).value;
			arr_place[i]=val2;	//и диплом
		}	
	}
	
	function cancel(){
		document.location.href="../arhiv.php";
	}

	function save_rezult(){
		onclick_blur(); 
		//alert(get_id);
		var par2 = {				
			"arr_id_user": arr_id_user,
			"arr_place": arr_place,
			"arr_rating": arr_rating,
			"get_id": get_id,
		}	
		$.ajax({
			type: "POST",
			url: "../bd/edit_rezult.php",
			data: 'jsonData=' + JSON.stringify(par2),  
			success: function(html){
				html=JSON.parse(html);										
			}
		});	
		document.location.href="../arhiv.php";
	}
</script>