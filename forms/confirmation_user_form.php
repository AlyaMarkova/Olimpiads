<meta charset="UTF-8"><?php
include ("js/fio.js");
?>
<div class="cont">
     <table id="Number_tr" >
		<thead id="table_reiting_thead">
		<tr class="table_reiting_FIO"> 
			<td id="Number_user"> № </td> 
			<td> ФИО </td>
			<td> Статус </td>
		</tr>
</table>
</div>
<script>	

		var par2={	
				'rights':<?php echo $_SESSION['rights'];?>,
						
		}			

			$.ajax({
				type: "POST",
				url: "../bd/confirmation_user_list.php",
				data: 'jsonData=' + JSON.stringify(par2),  
				success: function(html){
					html=JSON.parse(html);		
					var array_id=html.array_id;
					//alert(array_id.length);
					if((array_id.length==1)&&(html.array_name_user[0]=="")){
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
						//alert(html.array_name_user[i]);
						document.getElementById('Number_tr').innerHTML=document.getElementById('Number_tr').innerHTML+'<tr class="'+color+'" onclick="onclick_user(id)" id='+html.array_id[i]+'>'+'<td>'+(i+1)+'</td>'+'<td>'+FIO_1(html.array_name_user[i])+'</td>'+'<td>'+html.array_name_rights[i]+'</td>'+'</tr>';
						//document.getElementById('Number_user').innerHTML=document.getElementById('Number_user').innerHTML+i;
						
					}				
					//alert(html.array_name_user[1]);						
				}
			});
			function onclick_user(id){
				document.location.href='../confirmation_lk.php?'+'id='+id;	
				
			}
</script>