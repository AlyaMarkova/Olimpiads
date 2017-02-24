<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style3.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/button.css" media="screen" />
<?php
session_start();
 require_once 'bd.php';   
	$idS = $_SESSION['id'];
	$res = mysql_query('SELECT id, date as date1, name_olympiad, subject, professor_users_id FROM olympics WHERE Olympiad_status = 1 order by date desc');	
	$result = mysql_query("SELECT rights FROM users WHERE id = '$idS'");
	$ro=mysql_fetch_array($result);
	$i=0;
	while($row=mysql_fetch_array($res))
		
	{	
		$row1[$i] = explode("!", $row[date1]);
		$row1[$i] = mb_strimwidth($row1[$i][0],0,10);
		$row1[$i] = explode("-", $row1[$i]);
		switch ($row1[$i][1]) {
    case 01:
        $row1[$i][1] = "янв";
        break;
    case 02:
        $row1[$i][1] = "фев";
        break;
    case 03:
        $row1[$i][1] = "мар";
        break;
	case 04:
        $row1[$i][1] = "апр";
        break;
	case 05:
        $row1[$i][1] = "май";
        break;
	case 06:
        $row1[$i][1] = "июн";
        break;
	case 07:
        $row1[$i][1] = "июл";
        break;
	case 08:
        $row1[$i][1] = "авг";
        break;
	case 09:
        $row1[$i][1] = "сен";
        break;
	case 10:
        $row1[$i][1] = "окт";
        break;
	case 11:
        $row1[$i][1] = "ноя";
        break;
	case 12:
        $row1[$i][1] = "дек";
        break;
	}
	$row1[$i] = $row1[$i][2]." ".$row1[$i][1]." ".$row1[$i][0];
	$row2[$i] = explode("!", $row[subject]);
	//echo $row2[$i][2];
	$row2[$i] = $row2[$i][0]." ".$row2[$i][1]." ".$row2[$i][2]." ".$row2[$i][3];
	
	$row3[$i] = mb_strimwidth($row[name_olympiad], 0, 99, "...");
	
	
	
	$row4[$i]= array('date1'=>$row1[$i], 'name_olympiad'=>$row3[$i], 'subject'=>$row2[$i], 'professor_users_id'=>$row[professor_users_id], 'id'=>$row[id], 'rights'=>$ro[rights]); 
		$i=$i+1;
	}
	//echo '<pre>' . print_r($row4, true) . '</pre>';
	
?>

<table style="margin-top: 17px;" id="table_arhiv">
    <thead id="table_arhiv_thead">
    <tr >
		<td class="table_arhiv_td2">Дата</td>
        <td class="table_arhiv_td2">Название <input id="regexp1"/> </td>
        <!--<td class="table_arhiv_na">
            
        </td>-->
        <td class="table_arhiv_td" >	
            <select  id="digits11">
               <option class = "option" value="">Предмет</option>
			   <option class = "option" value="Математика">Математика</option>
			   <option class = "option" value="Русский язык">Русский язык</option>
			   <option class = "option" value="Информатика">Информатика</option>
			   <option class = "option" value="Обществознание">Обществознание</option>
            </select>
		</td>
        <td class="table_arhiv_td_shapka"> </td> <!-- это для добавления и редактирования итогов--> 
    </tr>
    </thead>
    <tbody id="target1">

<?        for($i=0, $arr_l=count($row4); $i<$arr_l; $i++){ 
?>
			<tr class="arh_str">
		   <td class="table_arhiv_td1"> <?echo $row4[$i]["date1"] ?> </td>
           <td class="table_arhiv_td3"><a id="best_href1" href="../arhiv_result.php?id=<?echo $row4[$i]["id"]?>"> <? echo $row4[$i]["name_olympiad"]?></a></td>
		   <td class="table_arhiv_td4"><?echo $row4[$i]["subject"] ?></td>
		   <td class="table_arhiv_td1"><? if ($row4[$i]["rights"] >=2) { ?>
			 <input class="redak_itog" title="Редактировать итоги олимпиады" type = "button" <? if ($idS == $row4[$i]["professor_users_id"] or $row4[$i]["rights"] == 3) { ?>
			 title="Вы не можете редактировать итоги этой олимпиаду"	onclick = "location.href='../arhiv_result_edit.php?id=<?echo $row4[$i]["id"]?>'"
<? 			} else {?> disabled <?}?> >
<?		   } ?>

		   </td>
		   </tr>
<?                
	

    }
?>
    
    </tbody>
</table>
<script src="js/filterTable.v1.1.min.js"></script>
<script>
    filterTable( document.getElementById("target1"), {
            /* Фильтр для второго столбца текстовое поле - только точное совпадение: */
            1: filterTable.Filter(document.getElementById("regexp1"),
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
			
            /* Фильтр для четвертого столбца радио кнопки: */
            2: document.getElementById("digits11"),
        }
    );
	//onchange="subject_select(digits11.value)"
	//subject_select(digits11.value)
</script>
