<?php
$con= mysqli_connect("localhost","root","","kontrol_db");

?>
<html>
<head>
 <title>Data Print</title> 
<style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 50%;
    border: 1px solid #ddd;
	font-family:'Lucida Fax','Calibri',sans-serif;
	font-size:12px;
	}

table th {
  padding: 5px 30px;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background: #ededed;
}
	
	
th, td {
    text-align: center;
    padding: 8px;
}


tr:nth-child(even){background-color: #f2f2f2}


tr td:hover { background: #666; color: #FFF; }  
/* Hover cell effect! */


	
</style>
<head>
<body>

	
<table>


            <tr>
			<th width="1%">No</th>
			<th width="3%">Riwayat</th>
			</tr>
			
			
			
			
<?php	
$nocoo_off=$_GET['nocoo_off'];
$sql=mysqli_query($con,"SELECT * FROM detailcoo_off INNER JOIN tglprintcoo_off ON detailcoo_off.nocoo_off=tglprintcoo_off.nocoofk_off
									
				WHERE nocoo_off ='$nocoo_off' ");		 
$a=1;		 


if(mysqli_num_rows($sql) > 0){
	
	
while($row = mysqli_fetch_array($sql)){
	
	
 echo			'<tr>		
			<td>'.$a++.'</td>
			<td>'.$row['tglprint_off'].'</td>
			</tr>';
			
}



}


 else

	 {
echo '<td colspan="2"><p align=left >
				 Kosong, Sertifikat Belum Pernah Dicetak <u>
			 </u> </p></center></td></tr>';
			 
}	
					
			?>
			

</table>
	</body>
	</html>