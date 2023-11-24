
<html>
    <head>		
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

	   <?php include ('./views/header.php'); ?>

	
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
<p class="h5">Laporan Penjualan (SPB)</p>
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
			data-path=".plg" 
			type="text" 
			value="" 
			placeholder="Pelanggan" 
			data-control-type="textbox" 
			data-control-name="plg-filter" 
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

	

		<!-- filter by Tgl Buat -->
		<div class="text-filter-box">
			<i class="fa fa-search  jplist-icon"></i>
			<!--[if lt IE 10]>
			<div class="jplist-label">Filter by Description:</div>
			<![endif]-->
			<input 
			data-path=".noseri" 
			type="text" 
			value="" 
			placeholder="No Seri" 
			data-control-type="textbox" 
			data-control-name="tglbuat-filter" 
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
			data-path=".nopo" 
			type="text" 
			value="" 
			placeholder="No PO" 
			data-control-type="textbox" 
			data-control-name="nopo-filter" 
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
			data-path=".nodo" 
			type="text" 
			value="" 
			placeholder="No DO" 
			data-control-type="textbox" 
			data-control-name="nopo-filter" 
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
	
			
			<div class="text-filter-box">
			<i class="fa fa-search  jplist-icon"></i>
			<!--[if lt IE 10]>
			<div class="jplist-label">Filter by Description:</div>
			<![endif]-->
			
			<input 
			data-path=".noresi" 
			type="text" 
			value="" 
			placeholder="No Resi" 
			data-control-type="textbox" 
			data-control-name="noresi-filter" 
			data-control-action="filter"
			/>	
			</div>	
	
			<div class="text-filter-box">
			<i class="fa fa-search  jplist-icon"></i>
			<!--[if lt IE 10]>
			<div class="jplist-label">Filter by Description:</div>
			<![endif]-->
			
			<input 
			data-path=".eks" 
			type="text" 
			value="" 
			placeholder="Ekspedisi" 
			data-control-type="textbox" 
			data-control-name="eks-filter" 
			data-control-action="filter"
			/>	
			</div>	
	
	
	
	
	
		<div class="jplist-panel box panel-top">															
			<!-- checkbox text filter -->
			
		<button class="button"   onClick="window.open('lapjualspb/filter_export.php', 
                         'new window', 
                         'width=800,height=650');">
    Export Data
</button>			
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
									<th colspan="9" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Info Pesanan</th>
									<th colspan="4" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Adm Penjualan</th>
									<th colspan="2" style="width:  15.33%;   font-size:20px;"  class="align-middle" >QC (Quality Control)</th>
									<th colspan="2" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Gudang</th>
									<th colspan="4" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Ekspedisi / Pengiriman</th>
         
									</tr>
							
                                <tr data-control-type="sort-buttons-group"
                                    data-control-name="header-sort-buttons"
                                    data-control-action="sort"
                                    data-mode="single"
                                    data-datetime-format="{month}/{day}/{year}">
						
									<th width=1% class="text-center" bgcolor="#ffe0ad">No</th>
									<th width=3% bgcolor="#ffe0ad"><span class="header">Pelanggan</span>
                                        <span class="sort-btns">
                                            <i class="fa fa-caret-up" data-path=".plg" data-type="text" data-order="asc" title="Sort by Title Asc"></i>
                                            <i class="fa fa-caret-down" data-path=".plg" data-type="text" data-order="desc" title="Sort by Title Desc"></i>
                                        </span></th>
									<th width=1% bgcolor="#ffe0ad">Jumlah</th>
									<th width=4% bgcolor="#ffe0ad"><span class="header">Nama Produk</span>
                                        <span class="sort-btns">
                                            <i class="fa fa-caret-up" data-path=".nmprd" data-type="text" data-order="asc" title="Sort by Title Asc"></i>
                                            <i class="fa fa-caret-down" data-path=".nmprd" data-type="text" data-order="desc" title="Sort by Title Desc"></i>
                                        </span></th>
									<th width=2% bgcolor="#ffe0ad"><span class="header">Type Produk</span>
                                        <span class="sort-btns">
                                            <i class="fa fa-caret-up" data-path=".type" data-type="text" data-order="asc" title="Sort by Title Asc"></i>
                                            <i class="fa fa-caret-down" data-path=".type" data-type="text" data-order="desc" title="Sort by Title Desc"></i>
                                        </span></th>
									<!-- Pembatas -->
									<th width=2% bgcolor="#f44242">No Seri</th>
									<th width=1% bgcolor="#ffe0ad">Harga Produk</th>
									<th width=1% bgcolor="#ffe0ad">Ongkir Produk</th>
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
									<th width=1% bgcolor="##7c7bc4"><span class="header">Ekspedisi</span>
                                        <span class="sort-btns">
                                            <i class="fa fa-caret-up" data-path=".eks" data-type="text" data-order="asc" title="Sort by Title Asc"></i>
                                            <i class="fa fa-caret-down" data-path=".eks" data-type="text" data-order="desc" title="Sort by Title Desc"></i>
                                        </span></th>
									<th width=2% bgcolor="##7c7bc4">No Resi</th>
									<th width=1% bgcolor="##7c7bc4">Tgl Kirim</th>
									<th width=1% bgcolor="##7c7bc4">Biaya </th>
                                </tr>
                            </thead>
				
						<?php 
						//$con=mysqli_connect("localhost","root","","kontrol_db");
						$a= 1;
						$result=mysqli_query($con,"SELECT * ,harga_spb * jumlah_spb as total 
											 FROM spb LEFT JOIN  admjual_spb ON admjual_spb.noadm_spb=spb.nospb
											 LEFT JOIN  qc_spb ON qc_spb.noqc_spb = admjual_spb.noadm_spb  
											 LEFT JOIN gudang_spb ON  gudang_spb.nogdg_spb = admjual_spb.noadm_spb 
											 LEFT JOIN ekspedisi_spb ON  gudang_spb.nogdg_spb = ekspedisi_spb.noeks_spb											 
											 JOIN produk_master ON produk_master.id_prod = spb.idprod_spb											 
											 LEFT JOIN  seri_spb ON gudang_spb.nogdg_spb = seri_spb.nogdgfk											 
											 LEFT JOIN ekspedisi2_spb ON ekspedisi2_spb.noeksfk_spb = ekspedisi_spb.noeks_spb
											 LEFT JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_spb.jasafk_spb											
											 ORDER BY noadm_spb + 0 DESC ");	
						while($row = mysqli_fetch_array($result)){
						echo'
                            <tbody>
                             
                                <tr class=tbl-item>
								
							        <td >'.$a++.'</td>					
									<td class=plg>'.$row['pelanggan_spb'].'</td>	
									<td>'.$row['jumlah_spb'].' '.$row['satuan_prod'].'</td>
                                    <td class=nmprd>'.$row['nam_prod'].'</td>	
									<td class=type>'.$row['sing_prod'].'</td>
									<td class=noseri>'.$row['noseri_spb'].'</td> 
								    <td>'.number_format($row['harga_spb']).'</td>  									
								    <td>'.number_format($row['nilai_spb']).'</td>  												   
								    <td>'.number_format($row['total']).'</td>  												   					
									<td class=nopo>'.$row['nopo_spb'].'</td>	
									<td>'.$row['tglpo_spb'].'</td>	
									<td class=nodo>'.$row['nodo_spb'].'</td>	
									<td>'.$row['tgldo_spb'].'</td>	
									<td>'.$row['tglterimaqc_spb'].'</td>	
									<td>'.$row['tglserahqc_spb'].'</td>
									<td  class=nosj>'.$row['nosjgdg_spb'].'</td>									
									<td >'.$row['tglsjgdg_spb'].'</td>
                                    <td class=eks>'.$row['nama_eks'].'</td>								
									<td class=noresi>'.$row['noresi_spb'].'</td>
									<td>'.$row['tglkirim_spb'].'</td>
									<td >'.number_format($row['nilai_spb']).'</td>
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