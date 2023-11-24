<?php 

$nolkppacc_on=$_GET['nolkppacc_on'];


//$con=mysqli_connect("localhost","root","","kontrol_db");
$result=mysqli_query($con,"SELECT *     FROM acc_on 
									INNER JOIN spa_on ON spa_on.nolkpp_on = acc_on.nolkppacc_on 
									INNER JOIN history_lunas_on ON history_lunas_on.nolkppahs_fk = acc_on.nolkppacc_on
							WHERE  nolkppahs_fk = '$nolkppacc_on' ");


if( isset( $_REQUEST['aksiseri'] )){
		$aksiseri = $_REQUEST['aksiseri'];
		switch($aksiseri){
			
			case 'tambah':
				include 'akunting/tambah_lunas.php';
				break;
			
			case 'edit':
				include 'akunting/edit_lunas.php';
				break;			
		}
		
	} else {
	
	echo '
	
	<html>
	<head>
	<p class="h5">History Pelunasan</p>
	<hr class="my-2">
 
</head>
<body> 
    <div class="container">
	<br>
  <table id=userTable class=table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tgl Pelunasan</th>
					 <th>Nilai Pelunasan (Rp.)</th>
					 <th>Keterangan / Catatan</th>
					
                </tr>
            </thead>			
	';		
$a=1;	
while($row = mysqli_fetch_array($result)){

echo '		<tr>
			<td>'.$a++.'</td>
			<td>'.$row['tgl_pelunasan'].'</td>
			<td>'.number_format($row["nilai_lunas"]).'</td>
			<td>'.$row['ket_hs'].'</td>
			
			
			'; 
										  } 
echo '
			</tr>
		    </table>	 
	 ';
			
		//mengambil nilai total yang dilunasi 	
		$result=mysqli_query($con,"SELECT *, SUM(DISTINCT nilai_lunas) as total_lunas FROM history_lunas_on WHERE  nolkppahs_fk = '$nolkppacc_on' ");
	
		while($row = mysqli_fetch_array($result)){
	
			$total_lunas_var = $row['total_lunas'];
	
			echo '
			<b>Total yang sudah dilunasi : </b> Rp. '.number_format($row['total_lunas']).' 
			
			';		
		}
			
			$result=mysqli_query($con,"SELECT   *  
			
										,IF(iddsb='SPA',
									  ((((harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100)) + SUM( DISTINCT nilai))/1.1) * 0.985,
									  (harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100) + SUM( DISTINCT nilai) ) AS totpiu
			
												FROM acc_on											
												INNER JOIN spa_on ON spa_on.nolkpp_on = acc_on.nolkppacc_on
												INNER JOIN ongkirdb_on ON ongkirdb_on.nolkppkirfk_on = acc_on.nolkppacc_on 
												INNER JOIN distributor ON distributor.iddsb = acc_on.pabrikacc_on
											    WHERE nolkppacc_on = '$nolkppacc_on' ");
			while($row = mysqli_fetch_array($result)){
			
			
			$total_piutang_var = $row['totpiu'];
			}
			echo'
			&nbsp;&nbsp;<b>dari</b>&nbsp;&nbsp; Rp. '.number_format($total_piutang_var).'
		
		<br>
		';









	if ($total_lunas_var == $total_piutang_var) {
		
		echo'<b class=text-success>Hutang sudah lunas </b>';
	
	}
	
	else if ($total_lunas_var > $total_piutang_var) 
	{
	
	
		
		$kelebihan_piutang = $total_lunas_var - $total_piutang_var;
		
		echo'<b class=text-danger>Hutang sudah lunas, pelunasan kelebihan :</b> Rp. '.number_format($kelebihan_piutang).''; 
		
	
	}
	else {
	$kekurangan_piutang = $total_piutang_var - $total_lunas_var;
		
		echo'<b  class=text-primary>Hutang masih belum lunas, pelunasan kurang :</b> Rp. '.number_format($kekurangan_piutang).''; 
	
	
	
	
	}
	}
	
	
	

	
	
	
?>


</body>
</html>