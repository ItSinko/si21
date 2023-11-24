<?php

$con=mysqli_connect("localhost","root","","kontrol_db");

$nolkpp_on = $_REQUEST['nolkpp_on'];


$query = mysqli_query($con,"SELECT * FROM spa_on INNER JOIN  distributor ON distributor.iddsb =spa_on.pabrik_on
												INNER JOIN  produk_master ON spa_on.idprod_on = produk_master.id_prod
												        WHERE nolkpp_on ='$nolkpp_on' ");


$detail = mysqli_fetch_assoc($query);
$noaks= $detail['noaks_on'];
$jumlahspa= $detail['jumlah_on'];
$alias= $detail['sing_prod'];
$namprod= $detail['nam_prod'];
$hargaspa= $detail['harga_on'];
$ongkosspa= $detail['ongkos_on'];
$totalspa= $detail['total_on'];
$noakd = $detail['noakd'];


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
<?php
echo '<h4>NO AKS : <b>'.$noaks.'</b></h4>
    <hr/> 
	
	
	<table>
           <tr>
             <th width="5%">Jumlah</th>
             <th width="10%">Type Produk</th>
             <th width="10%">Nama Produk</th>
			 <th width="10%">No AKD</th>
             <th width="10%">Harga Barang (Rp.)</th>
             <th width="10%">Ongkos Barang (Rp.)</th>
			<th width="10%">Total Harga (Rp.)</th>
			</tr>

			<tr>
			 <td>'.$jumlahspa.' Unit</td>
			 <td>'.$alias.'</td>
			 <td>'.$namprod.'</td>
			  <td>'.$noakd.'</td>
			 <td>'.number_format ($hargaspa).'</td>
			 <td>'.number_format ($ongkosspa).'</td>
			 <td>'.number_format ($totalspa).'</td>
			</tr>
	</table>
	
	
	
	
	
	
	
	
	'



	
	
	
	?>
	</body>
	</html>