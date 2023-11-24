<?php
$idordercoo_off=$_GET['idordercoo_off'];


if( isset( $_REQUEST['coo'] )){
	$coo = $_REQUEST['coo'];
	switch($coo){
		case 'edit':
		include 'detailcoooff/edit_coo.php';
		break;
				
		case 'cetak':
		include 'detailcoooff/print.php';
		break;
				
		case 'riwayat':
		include 'detailcoooff/dataprint.php';
		break;
	}
}
else {
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
			<th width="5%">ID Order</th>
			<th width="5%">Tgl SJ</th>
			<th width="5%">Tgl Kirim</th>
			<th width="5%">Ttd Terima</th>				
			<th width="5%">Cetak</th>
			
            </tr>
		</thead>

	<?php
	$sqlSelect = "SELECT * FROM detailcoo_off
				INNER JOIN spa_off ON detailcoo_off.idordercoo_off=spa_off.idorder_off
				INNER JOIN gudang_off ON gudang_off.idordergdg_off=detailcoo_off.idordercoo_off
				INNER JOIN distributor ON distributor.iddsb=spa_off.pabrik_off
				INNER JOIN produk_master ON produk_master.id_prod=spa_off.idprod_off
				INNER JOIN seri_off ON seri_off.idseri_off=detailcoo_off.idserifk_off 
				WHERE  idordercoo_off='$idordercoo_off' ORDER BY idordercoo_off + 0 DESC";
	$result = mysqli_query($con, $sqlSelect);
	$a=1;
	if (mysqli_num_rows($result) > 0) {
		?>
		<?php		
		while ($row = mysqli_fetch_array($result)) {
				$array_bulan = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
				$bulan = $array_bulan[date(''.$row["bulan_off"].'')]; 	
			echo'				
                <tbody>
				<tr>
				<td width=1%">'. $a++ .'</td>
				<td>'.$row['nocoo_off'].'</td>			                   				
				<td>'.$row['noseri_off'].'</td>			
				<td>'.$row['sing_prod'].'</td>
				<td>'.$row['nam_prod'].'</td>
				<td>'.$row['noakd'].'</td>
				<td>'.$bulan.'</td>
				<td>OFF-'.$row['idordercoo_off'].'</td>
				<td>'.$row['tglsj_off'].'</td>
				<td>'.$row['tglkirimcoo_off'].'</td>
				<td>'.$row['tandaterima_off'].'</td>';
		?>
			
		
			<td>	
				<a  href="cetak/cetak_coo_offline_back_ttd.php?nocoo_off=<?= $row["nocoo_off"]; ?>""  title="Cetak Dokumen Dengan Background dan Stempel" onclick="return confirm('Yakin Ingin Cetak Sertifikat COO?');" class="cus-page" target="_blank"></a> | <a href="cetak/cetak_coo_offline_back.php?nocoo_off=<?= $row["nocoo_off"]; ?>""  title="Cetak Dokumen Dengan Background" onclick="return confirm('Yakin Ingin Cetak Sertifikat COO?');" class="cus-page" target="_blank"></a> | <a href="cetak/cetak_coo_offline_noback.php?nocoo_off=<?= $row["nocoo_off"]; ?>""  title="Cetak Dokumen Tanpa Background" onclick="return confirm('Yakin Ingin Cetak Sertifikat COO?');" class="cus-page" target="_blank"></a> 
			</td>
	
		<?php 
		}
		?>
				</tbody>
	</table>
	<?php } 
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