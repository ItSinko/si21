<?php


$nolkpp_on = $_REQUEST['nolkpp_on'];


$query = mysqli_query($con,"SELECT *
									,IF(iddsb='SPA',(harga_on * jumlah_on) + nilai,(harga_on * jumlah_on )+ongkos_on) as totala
															FROM spa_on INNER JOIN  distributor ON distributor.iddsb =spa_on.pabrik_on
																		INNER JOIN  produk_master ON spa_on.idprod_on = produk_master.id_prod
																		LEFT JOIN  ongkirdb_on ON spa_on.nolkpp_on = ongkirdb_on.nolkppkirfk_on
														WHERE nolkpp_on ='$nolkpp_on' ");


$detail = mysqli_fetch_assoc($query);
$noaks= $detail['noaks_on'];
?>


<html>
<head>
 <title>Detail</title> 
<style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
	font-family:'Lucida Fax','Calibri',sans-serif;
	font-size:12px;
	}

table th {
  padding: 5px 35px;
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



<!-- Query Pemanggilan Untuk Nolkpp : -->

<?php

	  $result2= mysqli_query($con,"SELECT *,harga_on * jumlah_on + ongkos_on as totallkpp FROM spa_on INNER JOIN  distributor ON distributor.iddsb =spa_on.pabrik_on
												INNER JOIN  produk_master ON spa_on.idprod_on = produk_master.id_prod  WHERE noaks_on='$noaks'");		 
echo'
<br>
<h5><b>'.$noaks.'</b></h5>
<hr/> 
<table>

<tr>
<th>No LKPP</th>
<th>Type Produk</th>
<th>Nama Produk</th>
<th>Jumlah</th>
<th>Harga</th>
<th>Ongkos</th>

<th>Total Harga (Rp.)</th>
</tr>';

//menampilkan angka lkpp
	 while($row = mysqli_fetch_array($result2)){	 
			$jumlahdipesan =  $row['jumlah_on'];

echo'
	
<tr>
 <td>'.$row['nolkpp_on'].'</td>
 <td>'.$row['sing_prod'].'</td>
  <td>'.$row['nam_prod'].'</td>
 <td>'.$row['jumlah_on'].'</td>
  <td>'.number_format($row['harga_on']).'</td>
 <td>'.number_format($row['ongkos_on']).'</td>
  <td>'.number_format($row['totallkpp']).'</td>
</tr>';
}


//menampilkan total dari beberapa lkpp
	   $result3= mysqli_query($con,"SELECT *, SUM(harga_on * jumlah_on + ongkos_on) as totalakhir
			                  FROM spa_on   WHERE noaks_on='$noaks' ");
							  
	  while($row = mysqli_fetch_array($result3)){	       
	  echo'
	  <tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
    <td>Total</td>
		';
echo'
 <td>'.number_format($row['totalakhir']).'</td>';
												}
  
  
  echo'
</tr>
</table>
';
 
?>	
	
	</body>
	</html>