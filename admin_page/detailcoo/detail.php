<?php
$nolkpp_on=$_GET['nolkpp_on'];

if( isset( $_REQUEST['coo'] )){
		$coo = $_REQUEST['coo'];
		switch($coo){
			
				case 'edit':
				include 'detailcoo/edit_coo.php';
				break;
				
				case 'cetak':
				include 'cetak/cetak_coo.php';
				break;
				
				case 'riwayat':
				include 'cetak/dataprint.php';
				break;
				
		}
		
	} else {
	
?>

<html>


<head>




</head>

<body>  

		
  
    <div class="container-fluid">
       

  <table id='userTable' class="table">
            <thead>
                <tr>
                    <th width="1%">No</th>
			<th width="3%">No Coo</th>
		    <th width="5%">No Seri</th>
		    <th width="5%">Type</th>
		    <th width="8%">Nama Produk</th>
		    <th width="5%">No AKD</th>
			<th width="5%">Bulan</th>
			<th width="5%">No LKPP</th>
			<th width="5%">Tgl SJ</th>
			<th width="5%">Tgl Kirim</th>
			<th width="5%">Ttd Terima</th>		
			<th width="5%">Cetak</th>
			<th width="5%">Tombol</th>
				</tr>
            
			</thead>

               <?php
			   
			 

				$sqlSelect = "SELECT * FROM detailcoo_on
													INNER JOIN spa_on ON detailcoo_on.nolkppcoo_on=spa_on.nolkpp_on
													INNER JOIN gudang_on ON gudang_on.nolkppgdg_on=detailcoo_on.nolkppcoo_on
													INNER JOIN distributor ON distributor.iddsb=spa_on.pabrik_on
													INNER JOIN produk_master ON produk_master.id_prod=spa_on.idprod_on
													INNER JOIN seri_on ON seri_on.idseri_on=detailcoo_on.idserifk_on 
													WHERE  nolkppcoo_on='$nolkpp_on' GROUP BY idseri_on";
            
   
            $result = mysqli_query($con, $sqlSelect);


			$a=1;
            if (mysqli_num_rows($result) > 0) {
                ?>
				
				<?php		
                
				while ($row = mysqli_fetch_array($result)) {
				
				$array_bulan = array(01=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
                $bulan = $array_bulan[date(''.$row["bulan_on"].'')]; 	
  
				
				echo'				
				<tbody>
                <tr>
                <td width=1%">'. $a++ .'</td>
                <td>'.$row['nocoo_on'].'</td>			                   				
                <td>'.$row['noseri_on'].'</td>			
				<td>'.$row['sing_prod'].'</td>
				<td>'.$row['nam_prod'].'</td>
				<td>'.$row['noakd'].'</td>
				<td>'.$bulan.'</td>
				<td>'.$row['nolkppcoo_on'].'</td>
				<td>'.$row['tglsj_on'].'</td>
				<td>'.$row['tglkirimcooon'].'</td>
				<td>'.$row['tandacooon'].'</td>';
				?>
					<td>	
					<a  href="cetak/cetak_coo_online_back_ttd.php?nocoo_on=<?= $row["nocoo_on"]; ?>""  title="Cetak Dokumen Dengan Background dan Stempel" onclick="return confirm('Yakin Ingin Cetak Sertifikat COO?');" class="cus-page" target="_blank"></a> | <a  href="cetak/cetak_coo_online_back.php?nocoo_on=<?= $row["nocoo_on"]; ?>""  title="Cetak Dokumen Dengan Background" onclick="return confirm('Yakin Ingin Cetak Sertifikat COO?');" class="cus-page" target="_blank"></a> | <a  href="cetak/cetak_coo_online_noback.php?nocoo_on=<?= $row["nocoo_on"]; ?>""  title="Cetak Dokumen Tanpa Background" onclick="return confirm('Yakin Ingin Cetak Sertifikat COO?');" class="cus-page" target="_blank"></a> 
					</td>
					
					<td><a href="dataprint.php?nocoo_on=<?= $row["nocoo_on"]; ?>"  
					onclick="window.open('?hlm=deton&aksi=more&nolkpp_on=<?= $row["nolkpp_on"]; ?>&coo=edit&nocoo_on=<?= $row["nocoo_on"]; ?>  ', 
                         'newwindow', 
                         'width=300,height=250'); 
					return false;"  title="Hapus Data Ini"  class="cus-application_form_edit"></a></td>
					
					<?php 
					}
					?>
					
					
					</tbody>
					</table>
        <?php
		} 
		
		else  
		echo '<td colspan="8"><p align=left >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Maaf, Nomer Seri belum di input !
				 </u> </p></center></td></tr>		 
				 
				 ';
	}
	
	?>
	
     </div>
</body>
</html>