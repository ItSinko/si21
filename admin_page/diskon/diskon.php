
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
	width: 2500px;
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
	<?php


if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'diskon/tambah.php';
				break;
				
			case 'edit':
				include 'diskon/edit.php';
				break;
				
			case 'hapus':
				include 'diskon/hapus.php';
				break;
		
		
		}
	} else {
?>
	
	<div id="demo" class="horizon_disable" style="margin: 20px 0 50px 0">
	<p class="h5">Tabel Diskon (Rate 2)</p>
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

						                   	

		
  <button class="btn btn-primary"   onclick="location.href='./index.php?hlm=diskon&aksi=baru'">Tambah Data</button>						
	

								
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
 
                    <div class="horizon_disable">
                        <table class="demo-tbl">					
                            <!-- one more panel section -->
                            <thead class="jplist-panel">

                                <tr data-control-type="sort-buttons-group"
                                    data-control-name="header-sort-buttons"
                                    data-control-action="sort"
                                    data-mode="single"
                                    data-datetime-format="{month}/{day}/{year}">

									
								    <th width="2%">No</th>
									<th width="1%">ID Distributor</th>
									  <th width="5%">
                                        <span class="header">Distributor</span>
                                        <span class="sort-btns">
                                            <i class="fa fa-caret-up" data-path=".dsb" data-type="text" data-order="asc" title="Sort by Title Asc"></i>
                                            <i class="fa fa-caret-down" data-path=".dsb" data-type="text" data-order="desc" title="Sort by Title Desc"></i>
                                        </span>
                                    </th>

											     <th width="15%">
                                        <span class="header">Type Produk</span>
                                        <span class="sort-btns">
                                            <i class="fa fa-caret-up" data-path=".type" data-type="text" data-order="asc" title="Sort by Title Asc"></i>
                                            <i class="fa fa-caret-down" data-path=".type" data-type="text" data-order="desc" title="Sort by Title Desc"></i>
                                        </span>
                                    </th>
									
									<th width="10%">Nama Produk</th>
                                    <th width="15%">Diskon Nota </th>
									<th width="10%">Diskon Uji</th>
									<th width="10%">Temp </th>
									<th width="10%">Keterangan</th>
									
								     <th width="10%">Tombol</th>
                                </tr>
                            </thead>

							
				
						<?php 
							//$con=mysqli_connect("localhost","root","","kontrol_db");
							$a= 1;
							$result=mysqli_query($con,"SELECT * FROM produk_master INNER JOIN diskon_master ON produk_master.id_prod = diskon_master.idprodfk 
												   INNER JOIN  distributor ON diskon_master.pabrikfk=distributor.iddsb");		
		
							while($row = mysqli_fetch_array($result)){
	 			
							echo'
                            
                            <tbody>
                             
                                <tr class=tbl-item>
							        <td >'.$a++.'</td>		
									<td class=iddsb>'.$row['iddsb'].'</td>	
									<td class=dsb>'.$row['pabrik'].'</td>
                                    <td class=type>'.$row['sing_prod'].'</td>	
									<td class=nmprd>'.$row['nam_prod'].'</td>
								    <td>'.$row['diskonnota'].'%</td>  	
								    <td>'.$row['diskonuji'].'%</td>  
									<td>'.$row['temphari'].' Hari</td>  	
									<td>'.$row['ket'].'</td>  	
									<td><a href="?hlm=diskon&aksi=edit&idrate2='.$row["idrate2"].'" class="cus-application_form_edit"</a> <a href="?hlm=diskon&aksi=hapus&idrate2='.$row["idrate2"].' "  class="cus-cross"" title="Hapus Data" onclick="return confirm(\'Yakin Hapus Data ?\');"></a>  </td>	
									</tr> 
									';  }		
									?>
                    </tbody>
                    </table>					
                    </div>
							
							
                    <div class="box jplist-no-results text-shadow align-center">
                        <p>Maaf, hasil yang anda cari tidak ditemukan :(</p>
                    </div>
                    
                    <!-- ios button: show/hide panel -->
                    <div class="jplist-ios-button">
                        <i class="fa fa-sort"></i>
                        jPList Actions
                    </div>
					
                    <!-- panel -->
                    <div class="jplist-panel box panel-bottom">						
                        <!-- pagination results -->
                        <div 
                            class="jplist-label" 
                            data-type="{start} - {end} of {all}"
                            data-control-type="pagination-info" 
                            data-control-name="paging" 
                            data-control-action="paging">
                        </div>

					
                        <!-- pagination -->
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