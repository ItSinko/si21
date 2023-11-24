
<!doctype html>
<html>
<head>

<title>LAP ORDER (SPA ON)</title>

  
    <link rel="stylesheet" href="bootstrap.min.css">
  <!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css" >

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





 <h5>Laporan Order SPA (Online)</h5>



 <br/><br>

 
   <div class="table-multi-columns table-fill">
<table id="example" class="table table-small-font table-bordered table-striped"  style="min-width: 3400px;" border="1px">
  
  
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
$result=mysqli_query($con,"SELECT * FROM spa_on INNER JOIN  admjual_on ON spa_on.nolkpp_on=admjual_on.nolkppadm_on
												
												INNER JOIN qc_on ON admjual_on.nolkppadm_on = qc_on.nolkppqc_on
												INNER JOIN  gudang_on ON qc_on.nolkppqc_on = gudang_on.nolkppgdg_on
												INNER JOIN  produk_master ON produk_master.id_prod = spa_on.idprod_on
												
												INNER JOIN  distributor ON distributor.iddsb = spa_on.pabrik_on
												INNER JOIN ekspedisi2_on ON ekspedisi2_on.nolkppeksfk_on = spa_on.nolkpp_on
												INNER JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_on.jasafk_on
												LEFT JOIN  seri_on ON gudang_on.nolkppgdg_on = seri_on.lkppfk_on
				 ");		
				 
				 $a= 1;
		 while($row = mysqli_fetch_array($result)){
        echo'<tr >
		
  
	          <td >'. $a++ .'</td>
		
          <td >'. $row["tglsj_on"].'</td>     
    	  <td>'. $row["pabrik"].'</td>
          <td>'. $row["nopo_on"].'</td>
		  <td>-</td>
          <td>-</td>
          <td class=left>'. $row["nam_prod"].'</td>
          <td>'. $row["jumlah_on"].'</td>
          <td>'. $row["tglsj_on"].'</td>
          <td>'. $row["nosj_on"].'</td>
          <td>'. $row["tglsj_on"].'</td>
		  <td>-</td>		  
		  <td>'. $row["noseri_on"].'</td>
 <td>-</td>			  
		
  </tr>';
  
		 }
  ?>
</table>
</div>
</body>
<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>

<script src="jquery.table.marge.js"></script>

  <script>
 
        $('#example').margetable({
            type: 2,
            colindex: [0]
        });
    </script>

</body>
</html>
