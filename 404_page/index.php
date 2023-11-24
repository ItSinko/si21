<html>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<head>
<title>PT. Sinko Prima Alloy</title>
</head>
<style>
.carousel {
    margin-bottom: 0;
	padding: 0 40px 30px 40px;
}

.carousel-control-next,
.carousel-control-prev {
    filter: invert(100%);
}


.jumbotron {
    background-color : red;
}

</style>


<body>




<?php include "menu.php"; ?>
<div class="alert alert-primary" role="alert">
  Untuk mengedit, menambah, dan menghapus value diharuskan untuk melakukan <strong>login</strong> terlebih dahulu 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

				<?php
	if( isset($_REQUEST['hlm'] )){

		$hlm = $_REQUEST['hlm'];

		switch( $hlm ){

//MASTER_DATA

			case 'dsb':
				include "distributor/distributor.php";
				break;
				
				
			case 'diskon':
				include "diskon/diskon.php";
				break;
					
					
			case 'efaktur':
				include "efaktur/efaktur.php";
				break;
				
				
			case 'jasaeks':
				include "jasaeks/jasaeks.php";
				break;
				
				
//MASTER_PRODUK
		    case 'addprd':
				include "produk/addproduk.php";
				break;


		    case 'dafprd':
				include "daftarprd/daftarprd.php";
				break;
			
			case 'harprd':
				include "hargaprd/hargaprd.php";
				break;
				
			case 'namcoo':
				include "namacoo/namacoo.php";
				break;
				
			case 'ijinprd':
				include "ijinprd/ijinprd.php";
				break;
		
//SPA_ONLINE			

			case 'spa':
				include "spa/spa.php";
				break;
					
			case 'admon':
				include "penjualan/penjualan.php";
				break;
				
			case 'qcon':
				include "qc/qc.php";
				break;
					
			case 'noserion':
				include "noserion/noseri.php";
				break;			
					
			case 'gudangon':
				include "gudang/gudang.php";
				break;	
				
			case 'ekson':
				include "ekspedisi/ekspedisi.php";
				break;	
				
			case 'accon':
				include "akunting/akunting.php";
				break;	
				
			case 'piuon':
				include "ujifungsi/ujifungsi.php";
				break;	
				
			case 'deton':
				include "detailcoo/detailcoo.php";
				break;	
						
//SPA_OFFLINE	
		
			case 'spaoff':
				include "spaoff/spa.php";
				break;
					
			case 'admoff':
				include "penjualanoff/penjualan.php";
				break;
				
			case 'qcoff':
				include "qcoff/qc.php";
				break;
					
			case 'gudangoff':
				include "gudangoff/gudang.php";
				break;	
				
			case 'noserioff':
				include "noserioff/noseri.php";
				break;			
			
			case 'eksoff':
				include "ekspedisioff/ekspedisi.php";
				break;	
				
			case 'accoff':
				include "akuntingoff/akunting.php";
				break;	
				
			case 'piuoff':
				include "ujifungsioff/ujifungsi.php";
				break;	
				
			case 'detoff':
				include "detailcoooff/detailcoo.php";
				break;
			
			
//SPB 			
			
			
			case 'spb':
				include "spb/spb.php";
				break;
					
			case 'admspb':
				include "spbadm/spbadm.php";
				break;
				
			case 'qcspb':
				include "spbqc/qcspb.php";
				break;
					
			case 'gudangspb':
				include "spbgudang/gdgspb.php";
				break;	
				
			case 'noserispb':
				include "noserispb/noseri.php";
				break;		
			
			case 'eksspb':
				include "spbekspedisi/ekspedisi.php";
				break;	
				
			case 'keuanganspb':
				include "spbakunting/accspb.php";
				break;	
				
//LAPORAN ONLINE	

			case 'lapkeuon':
				include "lapkeuon/akuuji.php";
				break;
			
			case 'lapjualon':
				include "lapjualon/lapjual.php";
				break;
				
			case 'lapkirimon':
				include "lapkirimon/lapkirimon.php";
				break;

			case 'datajualon':
				include "datajualon/datajualon.php";
				break;

//LAPORAN OFFLINE		
			
			case 'lapkeuoff':
				include "lapkeuoff/akuuji.php";
				break;
			
			case 'lapjualoff':
				include "lapjualoff/lapjual.php";
				break;
				
			case 'lapkirimoff':
				include "lapkirimoff/lapkirimoff.php";
				break;
			
			case 'datajualoff';
				include "datajualoff/datajualoff.php";
				break;
//LAPORAN SPB
			case 'lapkirimspb':
				include "lapkirimspb/lapkirimspb.php";
				break;
			
			case 'lapjualspb':
				include "lapjualspb/lapjualspb.php";
				break;

			case 'datajualspb':
				include "datajualspb/datajualspb.php";
				break;
//LAPORAN ORDER
			case 'laporderon':
				include "lospaon/laporanorder.php";
				break;
			case 'laporderoff':
				include "lospaoff/laporanorder.php";
				break;	
			case 'laporderspb':
				include "lospb/laporanorder.php";
				break;
			
//LAPORAN ORDER
			
			case 'live':
				include "live/index.php";
				break;			
			
			
			
			
//404
			
			case '404_page':
				include "404_page/404.php";
				break;	
		}	
	} 
	
	else {
	?>		
	

<div id="slide_home" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active ">
      <div class="jumbotron" style="background-image: url(Gray.jpg);">
	  
  <h5 class="display-5">Selamat Datang,</h5>
  <p class="lead">di Sistem Informasi Kontrol Penjualan</p>
  <hr class="my-4">
  
<small class="pull-left" align="center"> IT Team © 2020 | PT Sinko Prima Alloy </small>
</div>

<img class="d-block w-50" src="bg_image\Poster_2.jpg" alt="Second slide" style="position: relative; left: 20%;"> 
    </div>
    <div class="carousel-item">
       <img class="d-block w-50" src="bg_image\Alur SPA.jpg" alt="Second slide" style="position: relative; left: 20%;"> 
    </div>
    <div class="carousel-item">
      <img class="d-block w-50" src="bg_image\Alur SPB.jpg" alt="Third slide" style="position: relative; left: 20%;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#slide_home" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#slide_home" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- spinner border -->
<div class="spinner-border" role="status">
	<span class="sr-only">Loading...</span>
</div>
 
<?php
	}
	?>		  
	
 </body>
  </html>



	
	
	



