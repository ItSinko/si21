<?php
require 'functions.php';

$lkppuji=$_GET['lkppuji'];




$query = mysqli_query($con,"SELECT * 
                            FROM ujifungsi INNER JOIN tabel_spa
							ON tabel_spa.nolkpp=ujifungsi.lkppuji 

							WHERE lkppuji=$lkppuji ");





$detail = mysqli_fetch_assoc($query);
$nama= $detail['namprod'];
$noaks= $detail['noaks'];
$pabrik= $detail['distributor'];
$jum = $detail['jumlahspa'];
$harga = $detail['hargaspa'];

$abc = rupiah ($harga);


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
echo '<h4>No Faktur Jual : <b>'.$noaks.'</b></h4>
    <hr/> 
	
	
	<table>
           <tr>
             <th width="5%">Distributor</th>
              <th width="5%">Nama Produk</th>
			 <th width="10%">Jumlah</th>
			 <th width="10%">Harga Satuan</th>
        
   
			</tr>
	
			<tr>
			
			 <td>'.$pabrik.'</td>
			  <td>'.$nama.'</td>
			 <td>'.$jum.'</td>
			<td>'.$abc.'</td>
			</tr>
	</table>

	'

	?>
	
	</body>
	</html>