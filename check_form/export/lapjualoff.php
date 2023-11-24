
<?php 
require '../../koneksi.php';




 if(isset($_POST["export"]))  
    { 


header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan_Offline.xls");

$distributor = $_POST['distributor'];
$urutan = $_POST['urutan'];


//$con=mysqli_connect("localhost","root","","kontrol_db");
$a= 1;


  if($urutan == "menyamping") {




$query="	


SELECT               													IF(noseri_off IS NULL,
																		'<i>Belum di Input</i>',
																		(GROUP_CONCAT(DISTINCT(noseri_off))))AS noseri, harga_off * jumlah_off as total, status_off,
																		jumlah_off,harga_off,tglsj_off,idorder_off, pabrik, nam_prod, sing_prod,  
																        nopo_off, tglpo_off, nodo_off, tgldo_off, 
																		tglterima_off, tglserah_off, nosj_off, nama_eks, noresi_off, tglkirim_off, nilai_off,pemesan_off


																		 FROM spa_off LEFT JOIN admjual_off ON spa_off.idorder_off = admjual_off.idorderadm_off
																		 LEFT JOIN qc_off ON qc_off.idorderqc_off = admjual_off.idorderadm_off
																		 LEFT JOIN gudang_off ON gudang_off.idordergdg_off = admjual_off.idorderadm_off
																		 LEFT JOIN ekspedisi_off ON gudang_off.idordergdg_off = ekspedisi_off.idordereks_off
																		 LEFT JOIN ongkirdb_off ON ongkirdb_off.idorderfk_off = spa_off.idorder_off
																		 JOIN distributor ON distributor.iddsb = spa_off.pabrik_off
																		 JOIN produk_master ON produk_master.id_prod = spa_off.idprod_off
															 			
																		 LEFT JOIN ekspedisi2_off ON ekspedisi2_off.idordereks_fk = ekspedisi_off.idordereks_off
																		 LEFT JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_off.jasafk_off
																		 LEFT JOIN  seri_off ON spa_off.idorder_off = seri_off.idorderfk_off

							
												   ";	
  }
  
  
  else {
	  
	  
	  
	  $query="	SELECT               IF(noseri_off IS NULL,
																		'<i>Belum di Input</i>',
																		(GROUP_CONCAT(DISTINCT(noseri_off) SEPARATOR '<br>')))AS noseri, harga_off * jumlah_off as total, status_off,
																		jumlah_off,harga_off,tglsj_off,idorder_off, pabrik, nam_prod, sing_prod,  
																        nopo_off, tglpo_off, nodo_off, tgldo_off, 
																		tglterima_off, tglserah_off, nosj_off, nama_eks, noresi_off, tglkirim_off, nilai_off,pemesan_off


																		 FROM spa_off LEFT JOIN admjual_off ON spa_off.idorder_off = admjual_off.idorderadm_off
																		 LEFT JOIN qc_off ON qc_off.idorderqc_off = admjual_off.idorderadm_off
																		 LEFT JOIN gudang_off ON gudang_off.idordergdg_off = admjual_off.idorderadm_off
																		 LEFT JOIN ekspedisi_off ON gudang_off.idordergdg_off = ekspedisi_off.idordereks_off
																		 LEFT JOIN ongkirdb_off ON ongkirdb_off.idorderfk_off = spa_off.idorder_off
																		 JOIN distributor ON distributor.iddsb = spa_off.pabrik_off
																		 JOIN produk_master ON produk_master.id_prod = spa_off.idprod_off
															 			
																		 LEFT JOIN ekspedisi2_off ON ekspedisi2_off.idordereks_fk = ekspedisi_off.idordereks_off
																		 LEFT JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_off.jasafk_off
																		 LEFT JOIN  seri_off ON spa_off.idorder_off = seri_off.idorderfk_off
								
												   ";	
	  
  }
												   
												   
										if($distributor != "Semua" ) 

												 $query.=" WHERE pabrik_off='$distributor' ";
												 
												 $query.=" GROUP BY idorder_off ORDER BY idorder_off +0 DESC  ";
										

												   
									
												   
												   
												   

												   
												   
												   
?>

<body><h3>Laporan Penjualan (SPA Offline) - PT. SINKO PRIMA ALLOY</h3>
     <table class="tes" id="tabelExport" border="1">
         <thead>
								
		<tr>
          <th colspan="11" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Informasi Pesanan</th>
          <th colspan="2" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Adm Penjualan</th>
          <th colspan="2" style="width:  15.33%;   font-size:20px;"  class="align-middle" >QC (Quality Control)</th>
          <th colspan="2" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Gudang</th>
          <th colspan="4" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Ekspedisi / Pengiriman</th>
          </tr>
		  
    <tr>
	<th width=1% class="text-center" bgcolor="#ffe0ad">No</th>
	<th width=1% class="text-center" bgcolor="#ffe0ad">Status PO</th>
	<th width=1% class="text-center" bgcolor="#ffe0ad">Status</th>
	<th width=1% bgcolor="#ffe0ad">ID Order</th>
	<th width=3% bgcolor="#ffe0ad">Distributor</th>
	<th width=2% bgcolor="#ffe0ad">Pemesan</th>
	<th width=1% bgcolor="#ffe0ad">Jumlah</th>
	<th width=4% bgcolor="#ffe0ad">Nama Produk</th>
	<th width=2% bgcolor="#ffe0ad">Type Produk</th>
	<!-- Pembatas -->
	<th width=2% bgcolor="#f44242">No Seri</th>
	<th width=1% bgcolor="#ffe0ad">Harga Produk</th>
	<th width=1% bgcolor="#ffe0ad">Total Harga</th>
	
	<!-- Pembatas -->
	<th width=2% bgcolor="#f3ffe5">No PO</th>
	<th width=2% bgcolor="#f3ffe5">Tgl PO</th>
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
		
	
		
		
		echo'<tr class="task-list-row"
		
		 data-dsb="'.$row['pabrik'].'"
		 data-nmprd="'.$row['nam_prod'].'"
		     data-noaks="'.$row['pemesan_off'].'"
			  data-nopo="'.$row['nopo_off'].'"
		 data-noseri="'.$row['noseri'].'"
		     data-status="'.$row['status_off'].'"
	>
			
			<td>'. $a++ .'</td> ';	
				$po = $row['nopo_off'];
									 
									 
									 if (!empty($po)) {
									echo '<td  class=status_po><i class="cus-accept" title="Sudah Input PO"></i><br>Sudah Input</td>';
									 }
									 
									 else {
										echo '<td class=status_po><i class="cus-cancel"></i title="Belum Input PO"><br>Belum Input</td>';
										 
									 }			
		$angka = $row['status_off'];
switch ($angka) {
	case "Masih Negosiasi":
		echo '<td><i class="cus-error" title="Masih Negoisasi"></i><br> '.$row['status_off'].'</td>';
		break;
	
	case "Batal":
		echo '<td><i class="cus-cancel"></i title="Batal"> '.$row['status_off'].'</td>';
		break;
	
	case"Sepakat":
		echo '<td><i class="cus-accept" title="Sepakat"></i> '.$row['status_off'].'</td>';
		break;
	
	default:
		echo "<td>-</td>";
		break;
}
		
		echo'
	
			<td>OFF-'. $row["idorder_off"].'</td>
			<td class=kiri>'. $row["pabrik"].'</td>
			<td>'. $row["pemesan_off"].'</td>
			<td>'. $row["jumlah_off"].'</td>
			<td class=kiri>'. $row["nam_prod"].'</td>
			<td>'. $row["sing_prod"].'</td>
			<td><b>'. $row["noseri"].'<b></td>
			<td class=kanan>'. number_format($row["harga_off"]).'</td>
			<td class=kanan>'. number_format($row["total"]).'</td>
			<td>'. $row["nopo_off"].'</td>		
			<td>'. $row["tglpo_off"].'</td>
			<td>'. $row["tglterima_off"].'</td>
			<td>'. $row["tglserah_off"].'</td>
			<td>'. $row["nosj_off"].'</td>
			<td>'. $row["tglsj_off"].'</td>
			<td>'. $row["nama_eks"].'</td>
			<td>'. $row["noresi_off"].'</td>
			<td>'. $row["tglkirim_off"].'</td>
			<td class=kanan>'. number_format($row["nilai_off"]).'</td>
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