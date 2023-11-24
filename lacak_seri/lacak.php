
<html>
    <head>		
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php include ('./views/header.php'); ?>

	    <!-- font libs -->
		
		<!-- jPList start -->
		<script>
		$('document').ready(function(){
		
			$('document').ready(function () {

                //jplist plugin call
                $('#demo').jplist({

                    itemsBox: '.demo-tbl'
                    ,itemPath: '.tbl-item'
                    ,panelPath: '.jplist-panel'

                       });

                //alternate up / down buttons on header click
                $('.demo-tbl .header').on('click', function () {
                    $(this).next('.sort-btns').find('[data-path]:not(.jplist-selected):first').trigger('click');
                });
		  });
		});
		</script>
        
        <!-- example of additional styles for this page -->
        <style>
            .header,
            .sort-btns {
                display: inline-block;
                float: left;
                cursor: pointer;
            }

            .sort-btns {
                width: 10px;
                margin: 0 0 0 10px;
            }

            .sort-btns .fa {
                display: block;
                font-size: 20px;
                line-height: 12px;
                cursor: pointer;
            }

            @media (max-width: 600px) {

                #demo table {
                    border: 0;
                }

                #demo td {
                    display: block;
                    width: 94%;
                    float: left;
                    border: 0;
                    padding: 5px 3% 0 3%;
                }
            }
			
			
			
			
				
[class^="cus-"],
[class*=" cus-"] {
  display: inline-block;
  width: 17px;
  height: 16px;
  *margin-right: .3em;
  line-height: 14px;
  vertical-align: text-top;
  background-image: url("spritesheet.png");
  background-position: 14px 14px;
  background-repeat: no-repeat;
}
[class^="cus-"]:last-child,
[class*=" cus-"]:last-child {
  *margin-left: 0;
}

	.cus-date_add {
    width: 16px;
    height: 16px;
    background-position: -395px -265px;
	}


	.cus-date_edit {
    width: 16px;
    height: 16px;
    background-position: -447px -265px;
	}




    .cus-cross {
    width: 16px;
    height: 16px;
    background-position: -369px -239px;
	}

    .cus-application_form_edit {
    width: 16px;
    height: 16px;
    background-position: -343px -5px;
	}



	.horizon { 
	width: 1400px;
	height: auto; }
  
	.cus-accept {
    width: 16px;
    height: 16px;
    background-position: -5px -5px;
	}

	.cus-error {
    width: 16px;
    height: 16px;
    background-position: -421px -317px;
	}

	.cus-cancel {
    width: 16px;
    height: 16px;
    background-position: -577px -135px;
	}


	.cus-arrow_right {
    width: 16px;
    height: 16px;
    background-position: -551px -31px;
	}
	
	
	
	
	
	table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: px solid #ddd;
	font-family:'Lucida Fax','Calibri',sans-serif;
	font-size:12px;
	

	}

table th {
	
  padding: 0;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  text-align: center; 
 background: #ededed;

 }
	table td {
 text-align: center; 
}


th, td {
    text-align: center;
    padding: 0;
  vertical-align: middle;
  height:45px;
	}
 
tr:nth-child(even){background-color: #f2f2f2}


 td:hover { background: #666; color: #FFF; }  
/* Hover cell effect! */



hover {opacity: 1}

th, td {
    text-align: left;
    padding: 8px;
}

	

    </style>	
    </head>
    <body>
	


	



<div class="container">
  <div class="row">
    <div class="col-sm"> 
    </div>
    <div class="col-sm">
     <h4>Lacak Nomer Seri</h2>
	 <form method="post" name="lacak">
	 <br>
	 Masukan nomer seri dibawah ini*
	 
	 
	  <div class="form-group row">
     <div class="col-sm-12">
     <input class="form-control" rows="4" placeholder="No Seri" id="noseri" name="noseri" required>
     </div>
     </div>
	 
	  Database Penjualan
	 	 <br>
	  <div class="form-group row">
    
     <div class="col-sm-6 ">
      <select  class="form-control"    id="database" name="database">
	 <option value="online">SPA</option>
	 <option value="offline">SPA (Offline)</option>
	 <option value="spb">SPB</option>
     </select>
     </div>
     </div>
	 
	 <button type="submit" class="btn btn-success"  name="lacak" >Lacak</button>	

	 
    </div>
	<div class="col-sm">	
    </div>
  </div>
  </form>
  
  <?php
if (isset($_POST['lacak'])) {
   
   $noseri = $_POST['noseri'];
   $database = $_POST['database'];
	$a= 1;
						
  
  if ($database == 'online') {
	 
	  
	  
	  $result=mysqli_query($con,"SELECT * FROM spa_on 
												LEFT JOIN  admjual_on ON admjual_on.nolkppadm_on =spa_on.nolkpp_on
												LEFT JOIN  qc_on ON qc_on.nolkppqc_on =spa_on.nolkpp_on
												LEFT JOIN  gudang_on ON gudang_on.nolkppgdg_on =spa_on.nolkpp_on
												 LEFT JOIN ekspedisi2_on ON ekspedisi2_on.nolkppeksfk_on = spa_on.nolkpp_on
												LEFT JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_on.jasafk_on
												LEFT JOIN acc_on ON acc_on.nolkppacc_on = spa_on.nolkpp_on								
												LEFT JOIN seri_on ON seri_on.lkppfk_on = spa_on.nolkpp_on								
												INNER JOIN  produk_master ON spa_on.idprod_on = produk_master.id_prod WHERE noseri_on ='$noseri'
												ORDER BY nolkpp_on + 0 DESC 
									
	  ");	
	  
	  
	 echo' 
	  Hasil pencarian dengan nomer seri : '.$noseri.'
	  
	  <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
	    <th scope="col">Id</th>
      <th scope="col">Type Produk</th>
    
      <th scope="col">No SJ</th>
      <th scope="col">Tgl SJ</th>
      <th scope="col">No PO</th>
      <th scope="col">Kepada</th>
      <th scope="col">Pengiriman</th>
    </tr>
  </thead>'; 
  
  
	  while($row = mysqli_fetch_array($result)){	
	
	
	echo'
  <tbody>
    <tr>
      <th scope="row">'.$a++.'</th>
     
      <td>'.$row['nolkpp_on'].'</td>
	   <td>'.$row['sing_prod'].'</td>
	   <td>'.$row['nosj_on'].'</td>
	   <td>'.$row['tglsj_on'].'</td>
		<td>'.$row['nopo_on'].'</td>
		<td>'.$row['instansi_on'].'</td>';

									 
	//Status EKS
		$eks = $row['ideks_on'];
									 
									 
									 if (!empty($eks)) {
									echo '<td  class=status_po><i class="cus-accept" title="Sudah Terkirim"></i><br>Sudah Terkirim<br>'.$row['nama_eks'].'<br>'.$row['noresi_on'].'</td>';
									 }
									 
									 else {
										echo '<td class=status_po><i class="cus-cancel"></i title=">Belum Terkirim"><br>Belum Terkirim</td>';
										 
									 }
	
	echo'
    </tr>';
 
    }
	echo'

	  </tbody>
</table>';
  }
  else if($database == 'offline') {
	  $result=mysqli_query($con,"SELECT * FROM spa_off 
									 LEFT JOIN admjual_off ON spa_off.idorder_off = admjual_off.idorderadm_off
									  LEFT JOIN qc_off ON qc_off.idorderqc_off = spa_off.idorder_off
									  LEFT JOIN  gudang_off ON gudang_off.idordergdg_off =spa_off.idorder_off
									  LEFT JOIN ekspedisi2_off ON spa_off.idorder_off = ekspedisi2_off.idordereks_fk
									  LEFT JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_off.jasafk_off
									  LEFT JOIN acc_off ON acc_off.idorderacc_off = spa_off.idorder_off
									 LEFT JOIN seri_off ON seri_off.idorderfk_off = spa_off.idorder_off	
									 INNER JOIN  produk_master ON spa_off.idprod_off = produk_master.id_prod
									 WHERE  noseri_off ='$noseri'");
  
  
  echo' 
    Hasil pencarian dengan nomer seri : '.$noseri.'
  <table class="table">
  <thead>
    <tr>
       <th scope="col">No</th>
	    <th scope="col">Id</th>
      <th scope="col">Type Produk</th>
    
      <th scope="col">No SJ</th>
      <th scope="col">Tgl SJ</th>
      <th scope="col">No PO</th>
      <th scope="col">Kepada</th>
      <th scope="col">Pengiriman</th>
    </tr>
  </thead>';	  
  
  while($row = mysqli_fetch_array($result)){	


echo'
 <tbody>
    <tr>
      <th scope="row">'.$a++.'</th>
      <td>OFF-'.$row['idorder_off'].'</td>
       <td>'.$row['sing_prod'].'</td>
    <td>'.$row['nosj_off'].'</td>
    <td>'.$row['tglsj_off'].'</td>
    <td>'.$row['nopo_off'].'</td>
    <td>'.$row['ket_off'].'</td>
	';
	
	

	
		//Status EKS
		$eks = $row['ideks_off'];
									 
									 
									 if (!empty($eks)) {
									echo '<td  class=status_po><i class="cus-accept" title="Sudah Terkirim"></i><br>Sudah Terkirim<br>'.$row['nama_eks'].'<br>'.$row['noresi_off'].'</td>';
									 }
									 
									 else {
										echo '<td class=status_po><i class="cus-cancel"></i title=">Belum Terkirim"><br>Belum Terkirim</td>';
										 
									 }
									 
									 								 
	
									 
	
	
	echo'
	</tr>


';


			
	
	}
	echo'
	  </tbody>
</table>';
	} 
	else {
		
		
	 $result=mysqli_query($con,"SELECT * FROM spb 
								LEFT JOIN admjual_spb ON admjual_spb.noadm_spb = spb.nospb 
								LEFT JOIN qc_spb ON qc_spb.noqc_spb = spb.nospb 
								 LEFT JOIN  gudang_spb ON gudang_spb.nogdg_spb = spb.nospb
								 LEFT JOIN ekspedisi2_spb ON spb.nospb = ekspedisi2_spb.noeksfk_spb
							    LEFT JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_spb.jasafk_spb
								LEFT JOIN acc_spb ON acc_spb.noacc_spb = spb.nospb								
								 LEFT JOIN seri_spb ON seri_spb.nogdgfk = spb.nospb 
								INNER JOIN  produk_master ON spb.idprod_spb = produk_master.id_prod
								WHERE noseri_spb = '$noseri' ");
								
	
	echo' 
	  Hasil pencarian dengan nomer seri : '.$noseri.'
	<table class="table">
  <thead>
    <tr>
       <th scope="col">No</th>
	    <th scope="col">Id</th>
      <th scope="col">Type Produk</th>
    
      <th scope="col">No SJ</th>
      <th scope="col">Tgl SJ</th>
      <th scope="col">No PO</th>
      <th scope="col">Kepada</th>
      <th scope="col">Pengiriman</th>
    </tr>
  </thead>';	
		
		  while($row = mysqli_fetch_array($result)){	
		
	echo'
 <tbody>
    <tr>
      <th scope="row">'.$a++.'</th>
      <td>SPB-'.$row['nospb'].'</td>
       <td>'.$row['sing_prod'].'</td>
       <td>'.$row['nosjgdg_spb'].'</td>
       <td>'.$row['tglsjgdg_spb'].'</td>
       <td>'.$row['nopo_spb'].'</td>
       <td>'.$row['pelanggan_spb'].'</td>
      ';	
		
		
		
		//Status EKS
		$eks = $row['ideks_spb'];
									 
									 
									 if (!empty($eks)) {
									echo '<td  class=status_po><i class="cus-accept" title="Sudah Terkirim"></i><br>Sudah Terkirim<br>'.$row['nama_eks'].'<br>'.$row['noresi_spb'].'</td>';
									 }
									 
									 else {
										echo '<td class=status_po><i class="cus-cancel"></i title=">Belum Terkirim"><br>Belum Terkirim</td>';
										 
									 }
									 
		
		
		  }	
		
	}
  }
			?>
</div>















	
	
    </body>
</html>