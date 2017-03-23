<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<?php
 require_once 'bd.php';
    
    $idd = $_GET['id'];
	//$res1 = mysql_query("SELECT schoolboy_users_id, rating_mark, place FROM schoolboy_past_olympics WHERE olympics_id = $idd");
	$res = mysql_query('SELECT Users_id, Fio_schoolboy, school , class as class1, rating FROM schoolboy');
	$i=0;
	
	$result2 = mysql_query("SELECT * FROM olympics WHERE id='$idd'");
	$myrow2= mysql_fetch_array($result2);	
	
	while($row=mysql_fetch_array($res))
		
	{	
		$res1 = mysql_query("SELECT rating_mark, place FROM schoolboy_past_olympics WHERE olympics_id = $idd AND schoolboy_users_id = $row[Users_id]");
		$row4=mysql_fetch_assoc($res1);
		$row1 = explode("!", $row[Fio_schoolboy]);
		
		$row3[$i]= array('Users_id'=>$row[Users_id],'school'=>$row[school], 'class'=>$row[class1], 'Fio_schoolboy'=>$row1, 'rating_mark'=>$row4[rating_mark], 'place'=>$row4[place] ); 
		$i=$i+1;
	}
	
	//echo '<pre>' . print_r($row3, true) . '</pre>';
	
?>

	<div id="lk_fio_div" style="margin-top: 9px;">
		<label id="lk_fio"><? echo $myrow2['name_olympiad']?></label>
	</div>
<div >
<table id="table_reiting">
    <thead id="table_reiting_thead">
    <tr >
        <td class="table_reiting_td">№
        </td>
        <td class="table_reiting_FIO">ФИО
            <input id="regexp" />
        </td>
        <td class="table_reiting_td">
            <select id="digits">
            <option class = "option"  value="">Школа</option>    
				
<?			
	
$query = 'SELECT school FROM schoolboy inner join users on Users_id=id where activation = 1 GROUP BY school';
$result = mysql_query($query);

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
   echo '<option class = "option" value="'.$line['school'].'" >'.$line['school'];
          }

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
        <td class="table_reiting_td_shapka" onclick="sort(document.getElementById('table_reiting_td1'))">Итоговый балл
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
		<? $j = 0
			
		?>
		
		

<?        for($i=0, $arr_l=count($row3); $i<=$arr_l; $i++){
			for($l=0, $arr_l1=count($row3[$i]["Fio_schoolboy"])-1; $l<$arr_l1; $l=$l+3){
				if ($row3[$i]["rating_mark"] <> "" and $row3[$i]["place"] <> "")  {
   ?>
			<tr class="besttd">
		   <td class="table_reiting_td"><? $j =$j+1; echo $j; ?> </td>
           <td class="table_reiting_td"><a id="best_href1" href="../lk_href.php?id=<?echo $row3[$i]["Users_id"]?>"> <? echo $row3[$i]["Fio_schoolboy"][$l] ." ". $row3[$i]["Fio_schoolboy"][$l+1]." ". $row3[$i]["Fio_schoolboy"][$l+2]; ?></a></td>
		   <td class="table_reiting_td"><?echo $row3[$i]["school"] ?></td>
		   <td class="table_reiting_td"><?echo $row3[$i]["class"] ?></td>
		   <td id="table_reiting_td1"><? echo $row3[$i]["rating_mark"];
		   ?></td> 
		   <td class="table_reiting_td"><?if  ($row3[$i]["place"] ==0) echo "-";
			   if ($row3[$i]["place"] == 1) echo "I степень";
				   if ($row3[$i]["place"] == 2) echo "II степень";
					   if ($row3[$i]["place"] == 3) echo "III степень"; ?></td></tr>
<?                
	} 
	}
    }
?>
    
    </tbody>
	<tr id ="tr1"><td></td><td></td><td></td><td></td><td></td><td></td></tr>	
</table>
</div>
<script src="js/filterTable.v1.0.min.js"></script>
<script>
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
            }else{
                td.prevsort = "y";

                el.up = 0;
            }

        }else{
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
    filterTable( document.getElementById("target"), {
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
</script>