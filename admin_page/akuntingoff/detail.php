<?php
    $idspa = $_REQUEST['idspa'];




//$con=mysqli_connect("localhost","root","","sinko1");
$query = mysqli_query($con,"SELECT noaks,jenpaket,jumlahspa,alias,namprod,hargaspa,ongkosspa,totalspa FROM spa WHERE idspa='$idspa' ");




$detail = mysqli_fetch_assoc($query);
$noaks= $detail['noaks'];
$jenpaket= $detail['jenpaket'];
$jumlahspa= $detail['jumlahspa'];
$alias= $detail['alias'];
$namprod= $detail['namprod'];
$hargaspa= $detail['hargaspa'];
$ongkosspa= $detail['ongkosspa'];
$totalspa= $detail['totalspa'];

//echo $detail['alias']; // assuming column 'Title' is first row
//echo $detail['namprod']; // assuming column 'Description' is second row
//echo $detail['hargaspa']; // assuming column 'Description' is second row

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
             <th width="5%">Jumlah Paket</th>
             <th width="5%">Jumlah Barang</th>
             <th width="10%">Alias</th>
             <th width="10%">Nama Produk</th>
             <th width="10%">Harga Barang (Rp.)</th>
             <th width="10%">Ongkos Barang (Rp.)</th>
			<th width="10%">Total Harga (Rp.)</th>
			</tr>
	
			<tr>
			 <td>'.$jenpaket.'</td>
			 <td>'.$jumlahspa.'</td>
			 <td>'.$alias.'</td>
			 <td>'.$namprod.'</td>
			 <td>'.$hargaspa.'</td>
			 <td>'.$ongkosspa.'</td>
			 <td>'.$totalspa.'</td>
			</tr>
	</table>
	
	
	
	
	
	
	
	
	'



	
	
	
	?>
	</body>
	</html>