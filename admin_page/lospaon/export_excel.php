LEFT<!doctype html>
<html>
<head>
<title>LAP ORDER (SPA ON)</title>

  

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
<?php
 header("Content-Type: application/force-download");
 header("Cache-Control: no-cache, must-revalidate");
 header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
 header("content-disposition: attachment;filename=Laporan_Order_(Online).xls");
 
?>

    <table id="textTable" class="table table-bordered" border="1">
      
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
  
       
        <tbody>
		
    <?php

$a= 1;
$result=mysqli_query($con,"SELECT * FROM spa_on LEFT JOIN  admjual_on ON spa_on.nolkpp_on=admjual_on.nolkppadm_on
												
												LEFT JOIN qc_on ON admjual_on.nolkppadm_on = qc_on.nolkppqc_on
												LEFT JOIN  gudang_on ON qc_on.nolkppqc_on = gudang_on.nolkppgdg_on
												INNER JOIN  produk_master ON produk_master.id_prod = spa_on.idprod_on
												
												INNER JOIN  distributor ON distributor.iddsb = spa_on.pabrik_on
												LEFT JOIN ekspedisi2_on ON ekspedisi2_on.nolkppeksfk_on = spa_on.nolkpp_on
												LEFT JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_on.jasafk_on
												LEFT JOIN  seri_on ON gudang_on.nolkppgdg_on = seri_on.lkppfk_on
												GROUP BY noseri_on
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
   
        </tbody>
    </table>
    
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    
	<script src="jquery.table.marge.js"></script>
    
	<script>
        $('#textTable').margetable({
            type: 2,
            colindex: [1,2,3,4,5,6,7,8,9,10,11]
        });
    </script>
</body>


</html>
