
<html>
    <head>		
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

	    <!-- font libs -->
		<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" />
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
		
		
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
	width: 3000px;
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
	
<div id="demo" class="horizon_disable" style="margin: 20px 0 50px 0">
<p class="h5">Laporan Pengiriman (SPB)</p>
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
			data-path=".type" 
			type="text" 
			value="" 
			placeholder="Type Produk" 
			data-control-type="textbox" 
			data-control-name="type-filter" 
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
	
		
			
				<div class="text-filter-box">
			<i class="fa fa-search  jplist-icon"></i>
			<!--[if lt IE 10]>
			<div class="jplist-label">Filter by Description:</div>
			<![endif]-->
			
			<input 
			data-path=".dsb" 
			type="text" 
			value="" 
			placeholder="Distributor" 
			data-control-type="textbox" 
			data-control-name="dsb-filter" 
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
			
		<button class="btn btn-primary"   onclick="location.href='lapkirimspb/export_excel.php'">Export Data</button>						
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
          <th colspan="7" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Info Pesanan</th>
          <th colspan="4" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Adm Penjualan</th>
          <th colspan="2" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Gudang</th>
          <th colspan="3" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Ekspedisi / Pengiriman</th>
         
          </tr>
							
                                <tr data-control-type="sort-buttons-group"
                                    data-control-name="header-sort-buttons"
                                    data-control-action="sort"
                                    data-mode="single"
                                    data-datetime-format="{month}/{day}/{year}">
						
									<th width=1% class="text-center" bgcolor="#ffe0ad">No</th>		
									<th width=1% class="text-center" bgcolor="#ffe0ad">ID Order</th>												
									<th width=3% bgcolor="#ffe0ad">
									 <span class="header">Pelanggan</span>
                                        <span class="sort-btns">
                                            <i class="fa fa-caret-up" data-path=".dsb" data-type="text" data-order="asc" title="Sort by Title Asc"></i>
                                            <i class="fa fa-caret-down" data-path=".dsb" data-type="text" data-order="desc" title="Sort by Title Desc"></i>
                                        </span>
									</th>
								
									<th width=2% bgcolor="#ffe0ad">
									 <span class="header">Type</span>
                                        <span class="sort-btns">
                                            <i class="fa fa-caret-up" data-path=".type" data-type="text" data-order="asc" title="Sort by Title Asc"></i>
                                            <i class="fa fa-caret-down" data-path=".type" data-type="text" data-order="desc" title="Sort by Title Desc"></i>
                                        </span>
										</th>
									<th width=4% bgcolor="#ffe0ad"> <span class="header">Nama Produk</span>
                                        <span class="sort-btns">
                                            <i class="fa fa-caret-up" data-path=".nmprd" data-type="text" data-order="asc" title="Sort by Title Asc"></i>
                                            <i class="fa fa-caret-down" data-path=".nmprd" data-type="text" data-order="desc" title="Sort by Title Desc"></i>
                                        </span></th>
									<th width=1% bgcolor="#ffe0ad">Jumlah</th>
									
									<!-- Pembatas -->
									<th width=2% bgcolor="#f3ffe5">No PO</th>
									<th width=2% bgcolor="#f3ffe5">Tgl PO
									</th>
									<th width=2% bgcolor="#f3ffe5">No DO</th>
									<th width=2% bgcolor="#f3ffe5">Tgl DO</th>
									
									<!-- Pembatas -->
									<th width=1% bgcolor="#34f937">No SJ</th>
									<th width=1% bgcolor="#34f937">Tgl SJ</th>
									
									<!-- Pembatas -->
									<th width=1% bgcolor="##7c7bc4"> <span class="header">Ekspedisi</span>
                                        <span class="sort-btns">
                                            <i class="fa fa-caret-up" data-path=".eks" data-type="text" data-order="asc" title="Sort by Title Asc"></i>
                                            <i class="fa fa-caret-down" data-path=".eks" data-type="text" data-order="desc" title="Sort by Title Desc"></i>
                                        </span></th>
									<th width=2% bgcolor="##7c7bc4">No Resi</th>
									<th width=1% bgcolor="##7c7bc4">Tgl Kirim</th>
                                </tr>
                            </thead>

						<?php 
						//$con=mysqli_connect("localhost","root","","kontrol_db");
						$a= 1;
						$result=mysqli_query($con,"SELECT * FROM spb  JOIN produk_master ON produk_master.id_prod = spb.idprod_spb	
																	  LEFT JOIN  admjual_spb ON admjual_spb.noadm_spb=spb.nospb
																	  LEFT JOIN  qc_spb ON admjual_spb.noadm_spb = qc_spb.noqc_spb
																	  LEFT JOIN gudang_spb ON qc_spb.noqc_spb = gudang_spb.nogdg_spb
																	  LEFT JOIN ekspedisi2_spb ON ekspedisi2_spb.noeksfk_spb = spb.nospb
																	   LEFT JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_spb.jasafk_spb
																	 
																	  ");	
						while($row = mysqli_fetch_array($result)){
						echo'
                            <tbody>
                             
                                <tr class=tbl-item>
								
							        <td >'.$a++.'</td>
									<td >'.$row['nospb'].'</td>									
									<td class=dsb>'.$row['pelanggan_spb'].'</td>	
									
									
									<td class=type>'.$row['sing_prod'].'</td>
                                    <td class=nmprd>'.$row['nam_prod'].'</td>				
									<td >'.$row['jumlah_spb'].' '.$row['satuan_prod'].'</td> ';
									
									
									$nodo = $row["nodo_spb"];
									$tgldo = $row["tgldo_spb"];
									$nopo = $row["nopo_spb"];
									$tglpo = $row["tglpo_spb"];
									$nosj = $row["nosjgdg_spb"];
									$tglsj = $row["tglsjgdg_spb"];
									$eks = $row["nama_eks"];	
									$noresi = $row["noresi_spb"];

								if (empty($nopo))  { 
									echo '<td class=nopo>(blank)</td>';
	
												}

								else {
									
									echo '<td class=nopo >'.$row['nopo_spb'].'</td>';
												}
												
												
												
										if (empty($tglpo))  { 
									echo '<td class=tglpo>(blank)</td>';
	
												}

								else {
									
									echo '<td class=tglpo >'.$row['tglpo_spb'].'</td>';
												}		
												
												
												
												
												
											if (empty($nodo))  { 
									echo '<td class=nodo>(blank)</td>';
	
												}

								else {
									
									echo '<td class=nodo >'.$row['nodo_spb'].'</td>';
												}		
												
												
									
								if (empty($tgldo))  { 
									echo '<td class=tgldo>(blank)</td>';
	
												}

								else {
									
									echo '<td class=tgldo >'.$row['tgldo_spb'].'</td>';
												}		
												
									
									
									
									
									
									
									if (empty($nosj))  { 
									echo '<td class=nosj>(blank)</td>';
	
												}

								else {
									
									echo '<td class=nosj >'.$row['nosjgdg_spb'].'</td>';
												}			
												
									
									
									
									if (empty($nosj))  { 
									echo '<td class=tglsj>(blank)</td>';
	
												}

								else {
									
									echo '<td class=tglsj >'.$row['tglsjgdg_spb'].'</td>';
												}	



							if (empty($eks))  { 
									echo '<td class=eks>(blank)</td>';
	
												}

								else {
									
									echo '<td class=eks >'.$row['nama_eks'].'</td>';
												}													
												
									
									
									if (empty($noresi))  { 
									echo '<td class=noresi>(blank)</td>';
	
												}

								else {
									
									echo '<td class=noresi >'.$row['noresi_spb'].'</td>';
												}		
									
									


									
                                 
									if (empty($nosj))  { 
									echo '<td >(blank)</td>';
	
												}

								else {
									
									echo '<td  >'.$row['tglkirim_spb'].'</td>';
												}					
									
									
									
									
									echo'
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