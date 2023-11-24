
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
	width: 1500px;
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
	
	
	
.cus-page {
    width: 16px;
    height: 16px;
    background-position: -473px -499px;
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

					   		/*PEMBATAS TOOLTIPS ! */



    </style>	
    </head>
    <body>
	<?php


if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'detailcoo/tambah.php';
				break;
			
			case 'more':
				include 'detailcoo/detail.php';
				break;
		
		
		}
	} else {
		
		
?>
	
	<div id="demo" class="horizon" style="margin: 20px 0 50px 0">
	<p class="h5">Tabel Detail COO (Online)</p>
	<hr class="my-2">
				
.
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
	  
	  
				
						
				
						
	
						    <!-- items per page dropdown -->
                        <div 
                            class="jplist-drop-down" 
                            data-control-type="items-per-page-drop-down" 
                            data-control-name="paging" 
                            data-control-action="paging">

                            <ul>
                                <li><span data-number="10" data-default="true"> 10 per Hal </span></li>
                                <li><span data-number="30"> 30 per Hal </span></li>
                                <li><span data-number="50" > 50 per Hal </span></li>
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
									
	<th width=2% class="text-center">No</th>
	<th width=3%>No LKPP</th>
	<th width=9% class="text-center">No AKN</th>
	<th width=9%>Kepada</th>
	<th width=9%>Nama Paket</th>
	<th width=9%>Distributor</th>
	
	</tr>
                            </thead>

				<?php 
				$a= 1;
				$result=mysqli_query($con,"
											SELECT nolkppcoo_on,noaks_on,pabrik,instansi_on,despaket_on, nolkppcoo_on FROM spa_on 
											INNER JOIN detailcoo_on ON spa_on.nolkpp_on=detailcoo_on.nolkppcoo_on
											INNER JOIN distributor ON distributor.iddsb=spa_on.pabrik_on	
											GROUP BY noaks_on 
											ORDER BY nolkpp_on + 0 DESC
										");		
							
		
							while($row = mysqli_fetch_array($result)){	

				
				
							echo' 

								
							<tbody>                      
							<tr class=tbl-item>
							<td>'.$a++.'</td>	
							<td><ul>
							';
											$res=mysqli_query($con,"
											SELECT nolkpp_on, nolkppcoo_on FROM spa_on INNER JOIN detailcoo_on ON spa_on.nolkpp_on=detailcoo_on.nolkppcoo_on
											WHERE noaks_on = '".$row["noaks_on"]."' GROUP BY nolkpp_on

										");		
							
								while($tes = mysqli_fetch_array($res)){	
								
								echo'
								<li><a href="?hlm=deton&aksi=more&nolkpp_on='.$tes["nolkpp_on"].'">'.$tes["nolkpp_on"].'</a></li>
								
								
								';
								
								}
							
							echo'
							<td class=noaks>'. $row["noaks_on"].'<br></td>		
							<td class=type>'. $row["instansi_on"].'</td>
							<td>'. $row["despaket_on"].'</td>
							<td class=dsb>'. $row["pabrik"].'</td>
							
							
							</ul>
							</td>
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