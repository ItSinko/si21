
<html>
    <head>		
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

	    <!-- font libs -->
		<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" />
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
		
		<!-- demo page styles -->
		<link href="dist/css/jplist.demo-pages.min.css" rel="stylesheet" type="text/css" />
				
		<!-- jQuery lib -->		
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		
		<!-- jPList core js and css  -->
		<link href="dist/css/jplist.core.min.css" rel="stylesheet" type="text/css" />		
		<script src="dist/js/jplist.core.min.js"></script>
        
        <!-- jPList textbox filter control -->
		<script src="dist/js/jplist.textbox-filter.min.js"></script>
		<link href="dist/css/jplist.textbox-filter.min.css" rel="stylesheet" type="text/css" />
		
		<!-- jPList pagination bundle -->
		<script src="dist/js/jplist.pagination-bundle.min.js"></script>
		<link href="dist/css/jplist.pagination-bundle.min.css" rel="stylesheet" type="text/css" />		
		
		<!-- jPList history bundle -->
		<script src="dist/js/jplist.history-bundle.min.js"></script>
		<link href="dist/css/jplist.history-bundle.min.css" rel="stylesheet" type="text/css" />
        
		  <!-- sort button control -->
        <script src="dist/js/jplist.sort-buttons.min.js"></script>
	
	
		<!-- jPList toggle bundle -->
		<script src="dist/js/jplist.filter-toggle-bundle.min.js"></script>
		<link href="dist/css/jplist.filter-toggle-bundle.min.css" rel="stylesheet" type="text/css" />
	
		<!-- jPList start -->
		<script>
		$('document').ready(function(){
		
			$('document').ready(function () {

                //jplist plugin call
                $('#demo').jplist({

                    itemsBox: '.demo-tbl'
                    ,itemPath: '.tbl-item'
                    ,panelPath: '.jplist-panel'

                    //save plugin state
                    ,storage: 'localstorage' //'', 'cookies', 'localstorage'			
                    ,storageName: 'jplist-table-sortable-cols'
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
	width: 5000px;
	height: auto;
			  }
  
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
	


	, td {
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
<?php
if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'ekspor':
				include 'lapjualon/export_excel.php';
				break;
		}
	} else {
?>
	
<div id="demo" class="horizon" style="margin: 20px 0 50px 0">
<p class="h5">Laporan Keuangan (Offline)</p>
<hr class="my-2">
		<!-- ios button: show/hide panel -->
		<div class="jplist-ios-button">
			<i class="fa fa-sort"></i>
			jPList Actions
		</div>

<!-- panel -->
<div class="jplist-panel box panel-top">
		
		<!-- reset button -->
		<button 
			type="button" 
			class="jplist-reset-btn"
			data-control-type="reset" 
			data-control-name="reset" 
			data-control-action="reset">
			Refresh &nbsp;<i class="fa fa-share"></i>
		</button>
		<!-- search any text in the element -->
						<div class="text-filter-box">

						   <i class="fa fa-pencil jplist-icon"></i>
						   
						   <!--[if lt IE 10]>
						   <div class="jplist-label">Search any text in the element:</div>
						   <![endif]-->
						   
						   <input 
							  data-path="*" 
							  type="text" 
							  value="" 
							  placeholder="Pencarian" 
							  data-control-type="textbox" 
							  data-control-name="title-filter" 
							  data-control-action="filter"
						   />
						</div>	

		<!-- filter by nama produk -->
		<div class="text-filter-box">
			<i class="fa fa-search  jplist-icon"></i>
			<!--[if lt IE 10]>
			<div class="jplist-label">Filter by Title:</div>
			<![endif]-->
			<input 
			data-path=".nmprd" 
			type="text" 
			value="" 
			placeholder="Nama Produk" 
			data-control-type="textbox" 
			data-control-name="nmprd-filter" 
			data-control-action="filter"
			/>
		</div>

		<!-- filter by distributor -->
		<div class="text-filter-box">
			<i class="fa fa-search  jplist-icon"></i>
			<!--[if lt IE 10]>
			<div class="jplist-label">Filter by Description:</div>
			<![endif]-->
			<input 
			data-path=".dsb" 
			type="text" 
			value="" 
			placeholder="Distributor " 
			data-control-type="textbox" 
			data-control-name="dsb-filter" 
			data-control-action="filter"
			/>	
		</div>	



	
		<!-- filter by Tgl Edit -->
		<div class="text-filter-box">
			<i class="fa fa-search  jplist-icon"></i>
			<!--[if lt IE 10]>
			<div class="jplist-label">Filter by Description:</div>
			<![endif]-->
			<input 
			data-path=".noinv" 
			type="text" 
			value="" 
			placeholder="No Invoice" 
			data-control-type="textbox" 
			data-control-name="noinv-filter" 
			data-control-action="filter"
			/>	
		</div>	
	
			<div class="text-filter-box">
			<i class="fa fa-search  jplist-icon"></i>
			<!--[if lt IE 10]>
			<div class="jplist-label">Filter by Description:</div>
			<![endif]-->
			
			<input 
			data-path=".nosj" 
			type="text" 
			value="" 
			placeholder="No SJ" 
			data-control-type="textbox" 
			data-control-name="nosj-filter" 
			data-control-action="filter"
			/>	
			</div>		
	
	
		<div class="jplist-panel box panel-top">															
			<!-- checkbox text filter -->
			
				<button class="btn btn-primary"   onclick="location.href='lapkeuoff/export_excel.php'">Export Data</button>				
		</div>	

		<!-- items per page dropdown -->
		<div 
		class="jplist-drop-down" 
		data-control-type="items-per-page-drop-down" 
		data-control-name="paging" 
		data-control-action="paging">
		<ul>						
			<li><span data-number="10" > 10 per Hal </span></li>
			<li><span data-number="30" data-default="true"> 30 per Hal </span></li>
			<li><span data-number="50" > 50 per Hal </span></li>
			<li><span data-number="100" > 100 per Hal </span></li>
			<li><span data-number="all">Tampilkan Semua</span></li>
		</ul>
		</div>

		<!-- pagination results -->
		<div 
		class="jplist-label" 
		data-type="Page {current} of {pages}" 
		data-control-type="pagination-info" 
		data-control-name="paging" 
		data-control-action="paging">
		</div>

		<!-- pagination -->
		<div 
		class="jplist-pagination" 
		data-control-type="pagination" 
		data-control-name="paging" 
		data-control-action="paging">
		</div>
</div>	
 <!-- data -->

                    <div class="horizon">
                        <table class="demo-tbl">					
                            <!-- one more panel section -->
                            <thead class="jplist-panel">

							
							
  <tr>
		 
          <th colspan="28" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Akunting (Keuangan)</th>
          <th colspan="10" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Uji Fungsi</th>
 
         
          </tr>
							
                                <tr data-control-type="sort-buttons-group"
                                    data-control-name="header-sort-buttons"
                                    data-control-action="sort"
                                    data-mode="single"
                                    data-datetime-format="{month}/{day}/{year}">

									<th  width=1% class="text-center">No</th>
									<th  width="2%">ID Order</th>
									<th  width="2%">E-Faktur</th>
									<th  width="3%">No Faktur Penjualan</th>
									<th  width="3%"><span class="header">Distributor</span>
                                        <span class="sort-btns">
                                            <i class="fa fa-caret-up" data-path=".dsb" data-type="text" data-order="asc" title="Sort by Title Asc"></i>
                                            <i class="fa fa-caret-down" data-path=".dsb" data-type="text" data-order="desc" title="Sort by Title Desc"></i>
                                        </span></th>
									
									<th  width="2.5%">No Surat Jalan</th>
									<th  width="6%"><span class="header">Nama Produk</span>
                                        <span class="sort-btns">
                                            <i class="fa fa-caret-up" data-path=".nmprd" data-type="text" data-order="asc" title="Sort by Title Asc"></i>
                                            <i class="fa fa-caret-down" data-path=".nmprd" data-type="text" data-order="desc" title="Sort by Title Desc"></i>
                                        </span></th>
									<th  width="2%">Harga</th>
									<th  width="1%">Jumlah</th>
									<th  width="2%">Total</th>
									<th  width="1%">Tarif Diskon</th>
									<th  width="2%">Diskon  Faktur Penjualan</th>
									<th  width="2%">Total Penjualan Barang</th>
									<th  width="2%">DPP Faktur Penjualan</th>
									<th  width="2%">PPN  Faktur Penjualan</th>
									<th  width="2%">Biaya Ekspedisi</th>
									<th  width="2%">Total  Faktur Penjualan</th>
									<th  width="2%">PPN</th>
									<th  width="2%">PPH 1.5%</th>
									<th  width="2%">Nilai yang Harus Diterima</th>
									<th  width="1%">Term. Bayar</th>
									<th  width="2%">Tgl Jatuh Tempo</th>
									<th  width="2%">Realisasi Pelunasan</th>
									<th  width="2%">Tgl Pelunasan</th>
									<th  width="2%">Selisih</th>
									<th  width="2%">Bank</th>
									<th  width="2%">Keterangan</th>
									<th width=2% bgcolor="#ade1ff">No Inv</th>
									<th width=2% bgcolor="#ade1ff">Tgl Inv</th>
									<th width=2% bgcolor="#ade1ff">Tarif Uji Fungsi</th>
									<th width=2% bgcolor="#ade1ff">Nilai Uji Fungsi</th>
									<th width=2% bgcolor="#ade1ff">DPP Uji Fungsi</th>
									<th width=2% bgcolor="#ade1ff">PPN Uji Fungsi</th>
									<th width=2% bgcolor="#ade1ff">PPH Uji Fungsi</th>
									<th width=2% bgcolor="#ade1ff">Total Uji Bayar</th>
									<th width=2% bgcolor="#ade1ff">Tgl Bayar</th>
									<th width=1% bgcolor="#ade1ff">Kas</th>
									
									</tr>
									</thead>

							
				
						<?php 
						//$con=mysqli_connect("localhost","root","","kontrol_db");
						$a= 1;
						$result=mysqli_query($con,"SELECT   * ,harga_off * jumlah_off as total
								,(harga_off * jumlah_off) * diskonacc_off / 100 as disfakturbeli	
								,(harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)  as totaljual
								,((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)) / 1.1 as dppfaktur
								,(((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)) / 1.1) * 0.1 as ppnfaktur
                 				,IF(iddsb='SPA',
								(SUM(DISTINCT nilai)/ 1.1),
								((((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)) / 1.1) * 0.1)*1)AS ppn
								,IF(iddsb='SPA',
								(SUM(DISTINCT nilai)/ 1.1)*0.015,
								((((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)) / 1.1) * 0.1)*0)AS pph
								
							,IF(iddsb='SPA',
								((((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)) + SUM(DISTINCT nilai))/1.1) * 0.985,
								(harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100) + SUM(DISTINCT nilai) ) AS nilaiterima
								
								,IF(iddsb='SPA',
								(((((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)) + SUM(DISTINCT nilai))/1.1) * 0.985) - SUM(DISTINCT nilai_lunas)  ,
								((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100) + SUM(DISTINCT nilai)) - SUM(DISTINCT nilai_lunas)  ) AS selisihharga
								
								,SUM( DISTINCT nilai) as kirim
								 ,SUM(DISTINCT nilai_lunas) as total_lunas
								,((harga_off * jumlah_off) - ((harga_off * jumlah_off) * diskonacc_off / 100)) + SUM(DISTINCT nilai)  as totpiu
								
								
								,(harga_off * jumlah_off) * tarifuji_off / 100 as nilaiuji
								,((harga_off * jumlah_off) * tarifuji_off / 100) / 1.1  as dppuji
								,(((harga_off * jumlah_off) * tarifuji_off / 100) / 1.1) * 0.1 as ppnuji
								,(((harga_off * jumlah_off) * tarifuji_off / 100) / 1.1) * 0.02 as pphuji
								,((harga_off * jumlah_off) * tarifuji_off / 100 ) - ((((harga_off * jumlah_off) * tarifuji_off / 100) / 1.1) * 0.02) as totaluji
								
								FROM acc_off											
      							LEFT JOIN gudang_off ON gudang_off.idordergdg_off = acc_off.idorderacc_off
								LEFT JOIN spa_off ON spa_off.idorder_off = acc_off.idorderacc_off
								 JOIN ongkirdb_off ON ongkirdb_off.idorderfk_off = acc_off.idorderacc_off
								 JOIN distributor ON distributor.iddsb = acc_off.pabrikacc_off
								 JOIN produk_master ON produk_master.id_prod = acc_off.idprodacc_off
								 LEFT JOIN piutang_off ON piutang_off.idorderuji_off = acc_off.idorderacc_off	
								 JOIN history_lunas_off ON history_lunas_off.idorderahs_fk = acc_off.idorderacc_off    
								GROUP by idorderfk_off												
								ORDER BY idorderacc_off +0 DESC	
								
      							");													
						 	
		
						while($row = mysqli_fetch_array($result)){
							$tgl1 = $row["tglsj_off"];
			$jumlah = $row["temphariacc_off"];
      	    $bayarbatas = date('d/m/Y', strtotime('+'.($jumlah).'days', strtotime($tgl1))); 				
		
	 			
						echo'
                            
                            <tbody>
                             
                                <tr class=tbl-item>
	
							        <td>'.$a++.'</td>				
									<td >OFF-'.$row['idorderacc_off'].'</td>	
									<td>'.$row['noefak_off'].'</td>
                                    <td >'. $row['nofakju_off'].'</td>	
									<td class=dsb>'.$row['pabrik'].'</td>
                                   	  
								    <td class=nosj>'.$row['nosj_off'].'</td>  									
								    <td class=nmprd>'.$row['nam_prod'].'</td>  	
									<td class=tglbuat>'.number_format($row['harga_off']).'</td>			
									<td >'.$row['jumlah_off'].' Unit</td>	
									<td>'.number_format($row['total']).'</td>	
									<td>'.number_format($row['diskonacc_off']).'%</td>	
									<td>'.number_format($row['disfakturbeli']).'</td>	
									<td>'. number_format($row['totaljual']).'</td>	
									<td>'. number_format($row['dppfaktur']).'</td>	
									<td>'. number_format($row['ppnfaktur']).'</td>	
									<td>'. number_format($row['kirim']).'</td>	
									<td>'. number_format($row['totpiu']).'</td>	
									<td>'. number_format($row['ppn']).'</td>	
									<td>'. number_format($row['pph']).'</td>	
									<td>'. number_format($row['nilaiterima']).'</td>	
									<td>'.$row['temphariacc_off'].' Hari</td>	
									<td>'.$bayarbatas.'</td>	
									<td>'. number_format($row['total_lunas']).'</td>										
									<td >'.$row['tgllunas_off'].'</td>								
									<td>'.number_format($row['selisihharga']).' </td>										
                                    <td>'.$row['kas_off'].'</td>
                                    <td>'.$row['ketaccoff'].'</td>
                                    <td class=noinv>'.$row['invuji_off'].'</td>
                                    <td>'.$row['tgluji_off'].'</td>
                                    <td>'. number_format($row['tarifuji_off']).'%</td>
									<td>'.number_format($row['nilaiuji']).' </td>	
									<td>'.number_format($row['dppuji']).' </td>	
									<td>'.number_format($row['ppnuji']).' </td>	
									<td>'.number_format($row['pphuji']).' </td>	
									<td >'.number_format($row['totaluji']).' </td>								
														
									<td >'.$row['tglbayaruji_off'].'</td>
									<td>'.$row['kasuji_off'].'</td>
												
									</tr>
									';  
								}		
								?>

                    </tbody>
                    </table>					
                    </div>
							
							
                    <div class="box jplist-no-results text-shadow align-center">
                        <p>Maaf, hasil yang anda cari tidak ditemukan :(</p>
                    </div>
                    
                    <div class="jplist-ios-button">
                        <i class="fa fa-sort"></i>
                        jPList Actions
                    </div>
					
                    <div class="jplist-panel box panel-bottom">						
                        <!-- pagination results -->
                        <div 
                            class="jplist-label" 
                            data-type="{start} - {end} of {all}"
                            data-control-type="pagination-info" 
                            data-control-name="paging" 
                            data-control-action="paging">
                        </div>

						<div 
                            class="jplist-pagination" 
                            data-control-type="pagination" 
                            data-control-name="paging" 
                            data-control-action="paging"
                            data-control-animate-to-top="true">
                        </div>

                    </div>
				</div>
				<?php
				}
				?>
				
    </body>
</html>