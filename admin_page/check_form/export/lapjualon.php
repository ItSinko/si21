
<?php 

require '../../koneksi.php';

 if(isset($_POST["export"]))  
    { 


header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan_Online.xls");

$distributor = $_POST['distributor'];
$urutan = $_POST['urutan'];


//$con=mysqli_connect("localhost","root","","kontrol_db");
$a= 1;


  if($urutan == "menyamping") {




$query="	SELECT 													
																	
																		IF(noseri_on IS NULL,
																		'<i>Belum di Input</i>',
																		(GROUP_CONCAT(DISTINCT(noseri_on))))AS noseri,
																																				
																		harga_on * jumlah_on as total, status_on,
																		jumlah_on,harga_on,tglsj_on,nolkpp_on, pabrik, noaks_on, nam_prod, ongkos_on,sing_prod, despaket_on, instansi_on, 
																		satuan_on, nopo_on, tglpo_on, nodo_on, tgldo_on, 
																		tglterima_on, tglserah_on, nosj_on, nama_eks, noresi_on, tglkirim_on, nilai_on 
																		
																		
																		
																		
																		FROM spa_on  LEFT JOIN seri_on ON spa_on.nolkpp_on = seri_on.lkppfk_on 
																		LEFT JOIN admjual_on ON spa_on.nolkpp_on = admjual_on.nolkppadm_on
																		 LEFT JOIN qc_on ON qc_on.nolkppqc_on = admjual_on.nolkppadm_on
																		 LEFT JOIN gudang_on ON gudang_on.nolkppgdg_on = admjual_on.nolkppadm_on
																		 LEFT JOIN ekspedisi_on ON gudang_on.nolkppgdg_on = ekspedisi_on.nolkppeks_on
																		 LEFT JOIN ongkirdb_on ON ongkirdb_on.nolkppkirfk_on = spa_on.nolkpp_on
																		 
																		 JOIN distributor ON distributor.iddsb = spa_on.pabrik_on
																		 JOIN produk_master ON produk_master.id_prod = spa_on.idprod_on
															 			
																		 LEFT JOIN ekspedisi2_on ON ekspedisi2_on.nolkppeksfk_on = ekspedisi_on.nolkppeks_on
																		 LEFT JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_on.nolkppeksfk_on
								
												   ";	
  }
  
  
  else {
	  
	  
	  
	  $query="	SELECT 													
																	
																		IF(noseri_on IS NULL,
																		'<i>Belum di Input</i>',
																		(GROUP_CONCAT(DISTINCT(noseri_on) SEPARATOR '<br>')))AS noseri,
																																				
																		harga_on * jumlah_on as total, status_on,
																		jumlah_on,harga_on,tglsj_on,nolkpp_on, pabrik, noaks_on, nam_prod, sing_prod, ongkos_on, despaket_on, instansi_on, 
																		satuan_on, nopo_on, tglpo_on, nodo_on, tgldo_on, 
																		tglterima_on, tglserah_on, nosj_on, nama_eks, noresi_on, tglkirim_on, nilai_on 
																		
																		
																		
																		
																		FROM spa_on  LEFT JOIN seri_on ON spa_on.nolkpp_on = seri_on.lkppfk_on 
																		LEFT JOIN admjual_on ON spa_on.nolkpp_on = admjual_on.nolkppadm_on
																		 LEFT JOIN qc_on ON qc_on.nolkppqc_on = admjual_on.nolkppadm_on
																		 LEFT JOIN gudang_on ON gudang_on.nolkppgdg_on = admjual_on.nolkppadm_on
																		 LEFT JOIN ekspedisi_on ON gudang_on.nolkppgdg_on = ekspedisi_on.nolkppeks_on
																		 LEFT JOIN ongkirdb_on ON ongkirdb_on.nolkppkirfk_on = spa_on.nolkpp_on
																		 
																		 JOIN distributor ON distributor.iddsb = spa_on.pabrik_on
																		 JOIN produk_master ON produk_master.id_prod = spa_on.idprod_on
															 			
																		 LEFT JOIN ekspedisi2_on ON ekspedisi2_on.nolkppeksfk_on = ekspedisi_on.nolkppeks_on
																		 LEFT JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_on.nolkppeksfk_on
								
												   ";	
	  
  }
												   
												   
										if($distributor != "Semua" ) 

												 $query.=" WHERE pabrik_on='$distributor' ";
												 
												 $query.=" GROUP BY nolkpp_on ORDER BY nolkpp_on + 0 DESC ";
										

												   
									
												   
												   
												   

												   
												   
												   
?>

<body><h3>Laporan Penjualan (SPA Online) - PT. SINKO PRIMA ALLOY</h3>
     <table class="tes" id="tabelExport" border="1">
        <thead>
									
		   <tr> 
          <th colspan="15" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Info Pesanan</th>
          <th colspan="4" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Adm Penjualan</th>
          <th colspan="2" style="width:  15.33%;   font-size:20px;"  class="align-middle" >QC (Quality Control)</th>
          <th colspan="2" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Gudang</th>
          <th colspan="4" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Ekspedisi / Pengiriman</th>
          </tr>
		  
        <tr>
	<th width=1% class="text-center" bgcolor="#ffe0ad">No</th>
	<th width=1% class="text-center" bgcolor="#ffe0ad">Status</th>
	<th width=1% class="text-center" bgcolor="#ffe0ad">Status PO</th>
	<th width=1% bgcolor="#ffe0ad">No LKPP</th>
	<th width=3% bgcolor="#ffe0ad">Distributor</th>
	<th width=2% bgcolor="#ffe0ad">No AKS</th>
	<th width=1% bgcolor="#ffe0ad">Jumlah</th>
	<th width=4% bgcolor="#ffe0ad">Nama Produk</th>
	<th width=2% bgcolor="#ffe0ad">Type Produk</th>
	<!-- Pembatas -->
	<th width=2% bgcolor="#f44242">No Seri</th>
	<th width=1% bgcolor="#ffe0ad">Harga Produk</th>
	<th width=1% bgcolor="#ffe0ad">Ongkos Kirim</th>
	<th width=1% bgcolor="#ffe0ad">Total Harga</th>
	<th width=3% bgcolor="#ffe0ad">Deskripsi Paket</th>
	<th width=3% bgcolor="#ffe0ad">Instansi</th>
	<th width=3% bgcolor="#ffe0ad">Satuan</th>
	<!-- Pembatas -->
	<th width=2% bgcolor="#f3ffe5">No PO</th>
	<th width=2% bgcolor="#f3ffe5">Tgl PO</th>
	<th width=2% bgcolor="#f3ffe5">No DO</th>
	<th width=2% bgcolor="#f3ffe5">Tgl DO</th>
	<!-- Pembatas -->
	<th width=2% bgcolor="#f96534">Tgl Terima</th>
	<th width=2% bgcolor="#f96534">Tgl Serah</th>
	<!-- Pembatas -->
	<th width=1% bgcolor="#34f937">No SJ</th>
	<th width=1% bgcolor="#34f937">Tgl SJ</th>
<!-- Pembatas -->
	<th width=1% bgcolor="##7c7bc4">Ekspedisi</th>
	<th width=2% bgcolor="##7c7bc4">No Resi</th>
	<th width=1% bgcolor="##7c7bc4">Tgl Kirim</th>
	<th width=1% bgcolor="##7c7bc4">Biaya </th>
	</tr>
       </thead>
		<tbody>


		
<?php 







								$result = mysqli_query($con,$query);
	
		
		 while($row = mysqli_fetch_array($result)){
		
	
		
		
		echo'
		<tr class="task-list-row"
		
		
	>
	
	
			
			<td>'. $a++ .'</td> ';	
		$po = $row['nopo_on'];
									 
									 
									 if (!empty($po)) {
									echo '<td  class=status><i class="cus-accept" title="Sudah Input PO"></i><br>Sudah Input</td>';
									 }
									 
									 else {
										echo '<td class=status><i class="cus-cancel"></i title="Belum Input PO"><br>Belum Input</td>';
										 
									 }
		$angka = $row['status_on'];
switch ($angka) {
	case "Masih Negosiasi":
		echo '<td><i class="cus-error" title="Masih Negoisasi"></i><br> '.$row['status_on'].'</td>';
		break;
	
	case "Batal":
		echo '<td><i class="cus-cancel"></i title="Batal"> '.$row['status_on'].'</td>';
		break;
	
	case"Sepakat":
		echo '<td><i class="cus-accept" title="Sepakat"></i> '.$row['status_on'].'</td>';
		break;
	
	default:
		echo "<td>-</td>";
		break;
}
		
		echo'
			<td>'. $row["nolkpp_on"].'</td>
			<td class=kiri>'. $row["pabrik"].'</td>
			<td>'. $row["noaks_on"].'</td>
			<td>'. $row["jumlah_on"].'</td>
			<td class=kiri>'. $row["nam_prod"].'</td>
			<td>'. $row["sing_prod"].'</td>
			<td><b>'.$row['noseri'].'</b></td>
			<td class=kanan>'. number_format($row["harga_on"]).'</td>
			<td class=kanan>'. number_format($row["ongkos_on"]).'</td>
			<td class=kanan>'. number_format($row["total"]).'</td>
			<td>'. $row["despaket_on"].'</td>
			<td>'. $row["instansi_on"].'</td>
			<td>'. $row["satuan_on"].'</td>
			<td>'. $row["nopo_on"].'</td>		
			<td>'. $row["tglpo_on"].'</td>
			<td>'. $row["nodo_on"].'</td>		
			<td>'. $row["tgldo_on"].'</td>
			<td>'. $row["tglterima_on"].'</td>
			<td>'. $row["tglserah_on"].'</td>
			<td>'. $row["nosj_on"].'</td>
			<td>'. $row["tglsj_on"].'</td>
			<td>'. $row["nama_eks"].'</td>
			<td>'. $row["noresi_on"].'</td>
			<td>'. $row["tglkirim_on"].'</td>

			<td class=kanan>'. number_format($row["nilai_on"]).'</td>
			</tr>';     
			}
			?>	  
			
	</tbody>
    </table>















	<script>
			$(function() {
				$(".demo-tbl").table2excel({
					exclude: "",
					name: "Excel Document Name",
					filename: "Laporan Penjualan Online",
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
			});
		</script>
		
	
</body>
</html>

<?php

	}
	
	
	?>