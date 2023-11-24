<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lap Order SPB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="narrow-jumbotron.css" rel="stylesheet">
    <!-- Custom style for Freeze Table -->
    <style>
    table {
        font-size: 10pt;

	}
    
	table th,
    .table-fill tr {
      background-color: rgb(255,255,255,1) !important;
    } 
	
	
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

  <h5>Laporan Order SPB</h5>
  
     <button  type="home" target=""  onclick="location.href='../index.php'"  title="Kembali Ke Halaman Utama Index !" class="btn btn-primary"  style="position: absolute; left:2%;   " > 
   Home </button> 
   
   <a target="_blank" href="export_excel.php" class="btn btn-success" style="position: absolute; left:8.5%;" > Export</a>
   
 <br/><br>
  <div class="table-multi-columns table-fill">
    <table cellspacing="0" class="table table-small-font table-bordered table-striped" style="min-width: 3400px;">
      <thead>
        
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
          <th rowspan="4" colspan="2" style="width:  5.33%" class="align-middle">KETERANGAN</th>
		  
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
			 	 
		</thead>
	
	
                <?php
				$con= mysqli_connect("localhost","root","","kontrol_db");
                $query = mysqli_query($con,"SELECT * ,harga_spb * jumlah_spb as total FROM spb 
											 INNER JOIN  admjual_spb ON admjual_spb.noadm_spb=spb.nospb
											 INNER JOIN  qc_spb ON admjual_spb.noadm_spb = qc_spb.noqc_spb
											 INNER JOIN gudang_spb ON qc_spb.noqc_spb = gudang_spb.nogdg_spb
											 INNER JOIN produk_master ON produk_master.id_prod = spb.idprod_spb											 
											 LEFT JOIN  seri_spb ON gudang_spb.nogdg_spb = seri_spb.nogdgfk											 
											 LEFT JOIN  ekspedisi_spb ON seri_spb.nogdgfk = ekspedisi_spb.noeks_spb 
											 INNER JOIN ekspedisi2_spb ON ekspedisi2_spb.noeksfk_spb = spb.nospb
											 INNER JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_spb.jasafk_spb
											
											");
											
											
											
				$a=1;								 
                
				while ($row = mysqli_fetch_array($query)) {
					
                
       echo '   
	   
      <tbody>
        <tr>
		<td>'. $a++ .'</td>
		
          <td>'. $row["tglsjgdg_spb"].'</td>
    	  <td>'. $row["pelanggan_spb"].'</td>
          <td>'. $row["nopo_spb"].'</td>
		  <td></td>
          <td></td>
          <td class=left>'. $row["nam_prod"].'</td>
          <td>'. $row["jumlah_spb"].'</td>
          <td>'. $row["tglsjgdg_spb"].'</td>
          <td>'. $row["nosjgdg_spb"].'</td>
          <td>'. $row["tglsjgdg_spb"].'</td>
          <td>-</td>
		  <td>'. $row["noseri_spb"].'</td>	
		<td ></td>  
  

        </tr>';
     
              } ?>
	 
      </tbody>
 
    </table>
  </div>
  <br>


 <script src="https://code.jquery.com/jquery-1.12.4.min.js" 
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" 
        crossorigin="anonymous"></script>
<script src="dist/js/freeze-table.js"></script>
<script>
$(".table-multi-columns").freezeTable({
	
 'scrollBar': true,
 

 });
</script>

</body>
</html>
