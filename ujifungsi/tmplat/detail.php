<?php


$nolkppadm=$_GET['lkppuji'];


$con=mysqli_connect("localhost","root","","sinko1");

$query = mysqli_query($con,"SELECT * from accspa WHERE nolkppacc=2191");





$detail = mysqli_fetch_assoc($query);
$nofakju= $detail['nofakju'];
$namaproduk= $detail['namaprodukacc'];
$jumlah= $detail['jumlahprdacc'];
$harga= $detail['hargaprd'];







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
echo '<h4>No Faktur Jual : <b>'.$nofakju.'</b></h4>
    <hr/> 
	
	
	<table>
           <tr>
             <th width="5%">Nama Produk</th>
             <th width="5%">Jumlah</th>
             <th width="10%">Harga Satuan</th>
        
   
			</tr>
	
			<tr>
			 <td>'.$namaproduk.'</td>
			 <td> '.$jumlah.' Produk </td>
			 <td>'.$harga.'</td>

			</tr>
	</table>
	
	
	
	
	
	
	
	
	'



	
	
	
	?>
	</body>
	</html>