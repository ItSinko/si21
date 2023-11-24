
<!doctype html>
<html>
<head>

<title>LAP ORDER (SPA OFF)</title>

  
 

<style>
  body{ zoom:80%;}
  
  
  
	
	th.align-middle{
	height:90px;	
	}
	
	
	th{
	text-align:center;	
	}

	th.align-text-top{
	text-align: left;	
	}
	
	td{
	text-align: center;
		
	}
	td.left{
	text-align: left;
		
	}
</style>
  </head>

<body>





 <h5>Laporan Order SPA (Offline)</h5>

<button class="btn btn-primary" id="action"  style="position: absolute; left:1.5%;">Grup Cell</button>
 
 <a target="_blank" href="lospaoff/export_excel.php" class="btn btn-success" style="position: absolute; left:10.5%;" title="Eksport Data ke Excel" > Export Data</a>
 <br/><br>
 
    <div class="table-multi-columns table-fill">
	<table id="example" class="table table-small-font table-bordered table-striped"   border="1px">
  
		  <tr>
		  <th rowspan="4" style="width:  1.33%; "  class="align-middle" >NO</th>
          <th colspan="3" style="width:  15.33%;   font-size:20px;"  class="align-middle" >PT SINKO PRIMA ALLOY</th>
          <th colspan="3" style="width:  22.33%; font-size:30px;" class="align-middle">LAPORAN ORDER</th>
          <th colspan="2" style="width:  5.33%"  class="align-text-top">Bulan :</th>
          <th colspan="3"  class="align-text-top"> Staff Penjualan :</th>
          <th colspan="2"    class="align-text-top">Office Manager :</th>  
          </tr>
       
		  <tr>
          <th rowspan="3" class="align-middle">TGL ORDER</th>
          <th rowspan="3"class="align-middle" >NAMA PELANGGAN</th>
          <th  colspan="6">ORDER</th>
          <th  colspan="3" style="width:  10.33%">PENGIRIMAN</th>
          <th rowspan="3" colspan="2" style="width:  5.33%" class="align-middle">KETERANGAN</th>
		  
		  <tr>
          <th  colspan="3">ORDER VIA</th>
          <th rowspan="2"  style="width:  8.33%" class="align-middle">NAMA / TYPE BARANG</th>
          <th rowspan="2" class="align-middle">JUMLAH</th>
          <th rowspan="2" class="align-middle">TGL HARUS DIKIRIM</th> 
		  <th rowspan="2" class="align-middle">NO SURAT JALAN</th>
		  <th rowspan="2" class="align-middle">TGL SURAT JALAN</th>
 		  <th rowspan="2"style="width:  3.33%" class="align-middle">RETUR</th>
          </tr>
			
    	  <tr>
          
		  <th style="width:  4.33%">NO PO</th>
          <th style="width:  4.33%">TELEPON</th>
          <th style="width:  4.33%">SMS / WA</th>         
          
		  </tr>		
  
  <?php
 
$a= 1;
$result=mysqli_query($con,"SELECT *
									

												FROM spa_off INNER JOIN  admjual_off ON spa_off.idorder_off=admjual_off.idorderadm_off
												LEFT JOIN qc_off ON admjual_off.idorderadm_off = qc_off.idorderqc_off
												LEFT JOIN gudang_off ON qc_off.idorderqc_off = gudang_off.idordergdg_off
												INNER JOIN produk_master ON produk_master.id_prod = spa_off.idprod_off
												INNER JOIN distributor ON distributor.iddsb = spa_off.pabrik_off
												LEFT JOIN ekspedisi2_off ON ekspedisi2_off.idordereks_fk = spa_off.idorder_off
												LEFT JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_off.jasafk_off
												LEFT JOIN  seri_off ON spa_off.idorder_off = seri_off.idorderfk_off
												GROUP BY noseri_off
				 ");		
				 
				 $a= 1;
		 while($row = mysqli_fetch_array($result)){
        echo'<tr >
		
  
	      <td >'. $a++ .'</td>
          <td >'. $row["tglsj_off"].'</td>     
    	  <td>'. $row["pabrik"].'</td>
          <td>'. $row["nopo_off"].'</td>
		  <td>-</td>
          <td>-</td>
          <td class=left>'. $row["nam_prod"].'</td>
          <td>'. $row["jumlah_off"].'</td>
          <td>'. $row["tglsj_off"].'</td>
          <td>'. $row["nosj_off"].'</td>
          <td>'. $row["tglsj_off"].'</td>
		  <td>-</td>		  
		  <td>'. $row["noseri_off"].'</td>
 <td>-</td>			  
		
  </tr>';
  
		 }
  ?>
</table>
</div>
</body>
<script src="jquery.rowspanizer.js"></script>
<script>
$('#action').on('click', function() {
  $("#example").rowspanizer({vertical_align: 'top'});
});
</script>



</body>
</html>
