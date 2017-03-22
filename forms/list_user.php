<?php
	include ("js/fio.js");
?>
<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8"> 

	<div id="lk_fio_div">
		<label id="lk_fio"></label>
	</div>
<div class="cont">
	
    <table id="Number_tr" style="margin-top: 20px;">
	<thead id="table_reiting_thead">
		<tr> 
			<td id="Number_user"> № </td> 
			<td> ФИО </td>
			<td> Школа </td>
			<td> Класс </td>
		</tr>
</table>
</div>
<script>	
		var par2={	
			'id':<?php echo $_GET['id'];?>,
						
		}			

			$.ajax({
				type: "POST",
				url: "../bd/list_user.php",
				data: 'jsonData=' + JSON.stringify(par2),  
				success: function(html){
					html=JSON.parse(html);
					document.getElementById('lk_fio').innerHTML=html.name_olympiad;
					
					var array_id=html.array_id;
					if(array_id.length==1&&array_id[0]==""){
						array_id.length=0;
					}
					for(var i=0;i<array_id.length;i++){
						if(i%2==0){
							var color="fon_table";
						}
						else
						{
							var color="fon_table2";
						}
						document.getElementById('Number_tr').innerHTML=document.getElementById('Number_tr').innerHTML+'<tr class="'+color+'" onclick="onclick_user(id)" id='+html.array_id[i]+'>'+'<td>'+(i+1)+'</td>'+'<td>'+FIO_1(html.array_name_user[i])+'</td>'+'<td>'+html.array_school[i]+'</td>'+'<td>'+html.array_classes[i]+'</td>'+'</tr>';
						//document.getElementById('Number_tr').innerHTML=document.getElementById('Number_tr').innerHTML+'<tr onclick="onclick_user(id)" id='+html.array_id[i]+'>'+'<td>'+(i+1)+'</td>'+'<td>'+html.array_name_user[i]+'</td>'+'<td>'+html.array_name_rights[i]+'</td>'+'</tr>';
						//document.getElementById('Number_user').innerHTML=document.getElementById('Number_user').innerHTML+i;
						
					}	
					document.getElementById('Number_tr').innerHTML=document.getElementById('Number_tr').innerHTML+'<tr id="tr1"><td></td><td></td><td></td><td></td></tr>';					
					//alert(html.array_name_user[1]);						
				}
			});
			function onclick_user(id){
				
				document.location.href='../lk_href.php?'+'id='+id;	
				
			}
</script>