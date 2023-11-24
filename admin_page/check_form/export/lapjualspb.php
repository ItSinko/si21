
<?php 
require '../../koneksi.php';





 if(isset($_POST["export"]))  
    { 


header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan_Online.xls");

$pelanggan = $_POST['pelanggan'];
$urutan = $_POST['urutan'];


//$con=mysqli_connect("localhost","root","","kontrol_db");
$a= 1;


  if($urutan == "menyamping") {




$query="	 



											SELECT  
											IF(noseri_spb IS NULL,
											'<i>Belum di Input</i>',
											(GROUP_CONCAT(DISTINCT(noseri_spb)))) as noseri,
											harga_spb * jumlah_spb as total,
											 jumlah_spb,harga_spb,tglsjgdg_spb,nospb,pelanggan_spb, nam_prod, sing_prod, nopo_spb, nodo_spb, tglpo_spb, tgldo_spb, tglterimaqc_spb,
											 tglserahqc_spb, nosjgdg_spb,nama_eks, noresi_spb, tglkirim_spb,nilai_spb
											 FROM spb LEFT JOIN  admjual_spb ON admjual_spb.noadm_spb=spb.nospb
											 LEFT JOIN  qc_spb ON qc_spb.noqc_spb = admjual_spb.noadm_spb  
											 LEFT JOIN gudang_spb ON  gudang_spb.nogdg_spb = admjual_spb.noadm_spb 
											 LEFT JOIN ekspedisi_spb ON  gudang_spb.nogdg_spb = ekspedisi_spb.noeks_spb											 
											 JOIN produk_master ON produk_master.id_prod = spb.idprod_spb											 
											 LEFT JOIN  seri_spb ON gudang_spb.nogdg_spb = seri_spb.nogdgfk											 
											 LEFT JOIN ekspedisi2_spb ON ekspedisi2_spb.noeksfk_spb = ekspedisi_spb.noeks_spb
											 LEFT JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_spb.jasafk_spb											
											
												   ";	
  }
  
  
  else {
	  
	  
	  
	  $query="  
	  
	  
	  SELECT  
											IF(noseri_spb IS NULL,
											'<i>Belum di Input</i>',
											(GROUP_CONCAT(DISTINCT(noseri_spb)  SEPARATOR '<br>' ))) as noseri,
											harga_spb * jumlah_spb as total,
											 jumlah_spb,harga_spb,tglsjgdg_spb,nospb,pelanggan_spb, nam_prod, sing_prod, nopo_spb, nodo_spb, tglpo_spb, tgldo_spb, tglterimaqc_spb,
											 tglserahqc_spb, nosjgdg_spb,nama_eks, noresi_spb, tglkirim_spb,nilai_spb
											 FROM spb LEFT JOIN  admjual_spb ON admjual_spb.noadm_spb=spb.nospb
											 LEFT JOIN  qc_spb ON qc_spb.noqc_spb = admjual_spb.noadm_spb  
											 LEFT JOIN gudang_spb ON  gudang_spb.nogdg_spb = admjual_spb.noadm_spb 
											 LEFT JOIN ekspedisi_spb ON  gudang_spb.nogdg_spb = ekspedisi_spb.noeks_spb											 
											 JOIN produk_master ON produk_master.id_prod = spb.idprod_spb											 
											 LEFT JOIN  seri_spb ON gudang_spb.nogdg_spb = seri_spb.nogdgfk											 
											 LEFT JOIN ekspedisi2_spb ON ekspedisi2_spb.noeksfk_spb = ekspedisi_spb.noeks_spb
											 LEFT JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_spb.jasafk_spb	
								
												   ";	
	  
  }
												   
												   
												 if($pelanggan != "Semua" ) 

												 $query.=" WHERE pelanggan_spb='$pelanggan' ";
												 
												 $query.=" GROUP BY nospb ORDER BY nospb + 0 DESC ";
										

												   
									
												   
												   
												   

												   
												   
												   
?>

<body><h3>Laporan Penjualan (SPB) - PT. SINKO PRIMA ALLOY</h3>
     <table class="tes" id="tabelExport" border="1">
        <thead>
									
		   <tr> 
          <th colspan="9" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Info Pesanan</th>
          <th colspan="4" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Adm Penjualan</th>
          <th colspan="2" style="width:  15.33%;   font-size:20px;"  class="align-middle" >QC (Quality Control)</th>
          <th colspan="2" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Gudang</th>
          <th colspan="4" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Ekspedisi / Pengiriman</th>
          </tr>
		  
        <tr>
	<th width=1% class="text-center" bgcolor="#ffe0ad">No</th>
	<th width=1% class="text-center" bgcolor="#ffe0ad">Pelanggan</th>
	<th width=1% class="text-center" bgcolor="#ffe0ad">Jumlah</th>
	<th width=4% bgcolor="#ffe0ad">Nama Produk</th>
	<th width=2% bgcolor="#ffe0ad">Type Produk</th>
	<!-- Pembatas -->
	<th width=2% bgcolor="#f44242">No Seri</th>
	<th width=1% bgcolor="#ffe0ad">Harga Produk</th>
	<th width=1% bgcolor="#ffe0ad">Ongkos Kirim</th>
	<th width=1% bgcolor="#ffe0ad">Total Harga</th>
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
		<tr class="task-list-row">
			<td>'. $a++ .'</td>
			<td>'. $row['pelanggan_spb'] .'</td>
			<td>'. $row['jumlah_spb'] .'</td>
			<td>'. $row['nam_prod'] .'</td>
			<td>'. $row['sing_prod'] .'</td>
			<td>'. $row['noseri'] .'</td>
			<td>'. $row['harga_spb'] .'</td>
			<td>'. $row['nilai_spb'] .'</td>
			<td>'. $row['total'] .'</td>
			<td>'. $row['nopo_spb'] .'</td>
			<td>'. $row['tglpo_spb'] .'</td>
			<td>'. $row['nodo_spb'] .'</td>
			<td>'. $row['tgldo_spb'] .'</td>
			<td>'. $row['tglterimaqc_spb'] .'</td>
			<td>'. $row['tglserahqc_spb'] .'</td>
			<td  class=nosj>'.$row['nosjgdg_spb'].'</td>									
			<td >'.$row['tglsjgdg_spb'].'</td>
			<td >'.$row['nama_eks'].'</td>								
			<td class=noresi>'.$row['noresi_spb'].'</td>
			<td>'.$row['tglkirim_spb'].'</td>
			<td >'.number_format($row['nilai_spb']).'</td>
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