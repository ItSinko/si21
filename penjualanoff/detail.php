<?php


$idorderadm_off=$_GET['idorderadm_off'];

$con=mysqli_connect("localhost","root","","kontrol_db");

$query = mysqli_query($con,"SELECT * FROM admjual_off INNER JOIN spa_off ON spa_off.idorder_off = admjual_off.idorderadm_off
							INNER JOIN distributor ON distributor.iddsb= admjual_off.pabrikadm_off
							INNER JOIN produk_master ON produk_master.id_prod= admjual_off.idprodadm_off WHERE idorderadm_off='$idorderadm_off' ");





$detail = mysqli_fetch_assoc($query);
$nolkppadm= $detail['idorderadm_off'];
$distributor= $detail['pabrik'];
$alias= $detail['sing_prod'];
$noaks= $detail['idorderadm_off'];
$namprod= $detail['nam_prod'];
$instansi= $detail['pemesan_off'];
$jumlahspa= $detail['jumlah_off'];










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
echo '<h4>ID Order : <b>'.$noaks.'</b></h4>
    <hr/> 
	
	
	<table>
           <tr> <th width="10%">Pemesan</th>
             <th width="5%">Distributor</th>
			 <th width="10%">Nama Produk</th>
             <th width="10%">Type Produk</th>
			
			 <th width="10%">Jumlah</th>
   
			</tr>
	
			<tr>
				 <td>'.$instansi.'</td>
			 <td class="dsbr">'.$distributor.'</td>
				 <td class="nmprd">'.$namprod.'</td>
			 <td>'.$alias.'</td>
			 
			 <td>'.$jumlahspa.' Unit</td>
			</tr>
	</table>
	
	
	
	
	
	
	
	
	'



	
	
	
	?>
	</body>
	</html>