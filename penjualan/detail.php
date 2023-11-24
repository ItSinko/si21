<?php


$no_on=$_GET['nolkppadm_on'];


$con=mysqli_connect("localhost","root","","kontrol_db");

$query = mysqli_query($con,"SELECT * FROM admjual_on INNER JOIN spa_on ON spa_on.nolkpp_on = admjual_on.nolkppadm_on
							INNER JOIN distributor ON distributor.iddsb= admjual_on.pabrikadm_on
							INNER JOIN produk_master ON produk_master.id_prod= admjual_on.idprodadm_on WHERE nolkppadm_on=$no_on ");





$detail = mysqli_fetch_assoc($query);
$nolkppadm= $detail['no_on'];
$distributor= $detail['pabrik'];
$alias= $detail['sing_prod'];
$noaks= $detail['noaks_on'];
$namprod= $detail['nam_prod'];
$instansi= $detail['instansi_on'];
$jumlahspa= $detail['jumlah_on'];










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




.dsbr { text-align: left; }	
.nmprd { text-align: left; }	



</style>
<head>
<body>
<?php
echo '<h4>NO AKS : <b>'.$noaks.'</b></h4>
    <hr/> 
	
	
	<table>
           <tr>
             <th width="5%">Distributor</th>
			 <th width="10%">Instansi</th>
             <th width="10%">Type Produk</th>
			 <th width="10%">Nama Produk</th>
			 <th width="10%">Jumlah</th>
   
			</tr>
	
			<tr>
			 <td class="dsbr">'.$distributor.'</td>
				 <td>'.$instansi.'</td>
			 <td>'.$alias.'</td>
			 	 <td class="nmprd">'.$namprod.'</td>
			 <td>'.$jumlahspa.' Unit</td>
			</tr>
	</table>
	
	
	
	
	
	
	
	
	'



	
	
	
	?>
	</body>
	</html>