
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
	<?php


if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			
			case 'tambah':
				include 'distributor/tambah.php';
				break;
				
			case 'edit':
				include 'distributor/edit.php';
				break;
			
			case 'delete':
				include 'distributor/hapus.php';
				break;
		}
		
	} else {
		
		
?>
	

	<div id="demo" class="horizon_disable" style="margin: 20px 0 50px 0">
	<p class="h5">Daftar Distributor</p>
	<hr class="my-2">
				
				
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
							  placeholder="Pencarian Umum" 
							  data-control-type="textbox" 
							  data-control-name="title-filter" 
							  data-control-action="filter"
						   />
						</div>	

						                 <!-- filter by type produk -->
                        <div class="text-filter-box">

                            <i class="fa fa-search  jplist-icon"></i>

                            <!--[if lt IE 10]>
                            <div class="jplist-label">Filter by Title:</div>
                            <![endif]-->

                            <input 
                                data-path=".dsb" 
                                type="text" 
                                value="" 
                                placeholder="Nama Distributor" 
                                data-control-type="textbox" 
                                data-control-name="dsb-filter" 
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
                                <li><span data-number="10" data-default="true"> 10 baris</span></li>
                                <li><span data-number="30"> 30 baris </span></li>
                                <li><span data-number="50" > 50 baris </span></li>
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
 
 
                    <div class="horizon_disable">
                        <table class="demo-tbl">
                            <thead class="jplist-panel">
                                
								  <tr>
		 
          <th colspan="6" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Info Distributor</th>
          <th colspan="3" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Info Diskon</th>
          <th colspan="2" style="width:  15.33%;   font-size:20px;"  class="align-middle" ></th>
 
         
          </tr>
								
								
								<tr data-control-type="sort-buttons-group"
                                    data-control-name="header-sort-buttons"
                                    data-control-action="sort"
                                    data-mode="single"
                                    data-datetime-format="{month}/{day}/{year}">
				
									<th width="2%">Nomor</th>
									<th width="5%">ID Distibutor</th>		
									<th width="5%">
                                    Nama Distributor
										</th>
										<th width="5%">
                                        Telepon
										</th>									
										<th width="8%">Alamat</th>
										<th width="8%">Email</th>
										<th width="2%">Diskon Nota</th>
										<th width="2%">Diskon Uji Fungsi</th>
										<th width="2%">Jatuh Tempo</th>
										<th width="10%">Catatan</th>
										
                                </tr>
                            </thead>

				
							<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");
$a= 1;
$result=mysqli_query($con, "SELECT * FROM Distributor");		
		
		 while($row = mysqli_fetch_array($result)){
	 			
							echo'                 
                            <tbody>                      
                                <tr class=tbl-item>
								    <td>'.$a++.'</td>		
									<td>'.$row['iddsb'].'</td>
									<td class=dsb>'.$row['pabrik'].'</td>
									<td>'.$row['telp_dsb'].'</td>	
									<td>'.$row['alamat_dsb'].'</td>	
									<td>'.$row['alamat_email'].'</td>	
									<td>'.$row['diskonnota'].' %</td>	
									<td>'.$row['diskonuji'].' %</td>	
									<td>'.$row['temphari'].' Hari</td>	
									<td>'.$row['ket_dsb'].'</td>';	
									?>
								    																	
								</tr>
								
								
								
								
								
										
							<!-- Modal Edit Mahasiswa-->
            <div class="modal fade" id="myModal<?php echo $row["iddsb"]; ?>" role="dialog"  tabindex="-1" >
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
				   <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="distributor\hapus.php" method="get">

                        <?php
                        $iddsb = $row["iddsb"]; 
                        $query_edit = mysqli_query($con,"SELECT * FROM distributor WHERE iddsb='$iddsb'");
                        //$result = mysqli_query($conn, $query);
                        while ($rows = mysqli_fetch_array($query_edit)) {  
                        ?>

                        <input type="hidden" name="id" value="<?php echo $rows["iddsb"] ?>" >
                        <input type="hidden" name="id_log" value="<?php echo $rows["pabrik"] ?>" >
						<input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>" >

                      <div class="form-group">
						<label for="message-text" class="col-form-label">Alasan data dihapus ?</label>
					   <textarea class="form-control" id="message-text" placeholder="Wajib mengisi keterangan  " name="ket_log" minlength="5" required></textarea>
						</div>

                               
                        <div class="modal-footer">  
                          <button type="submit" class="btn btn-success">Hapus</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                        <?php 
                        }
                        //mysql_close($host);
                        ?>        
                      </form>
                  </div>
                </div>
                
              </div>
            </div>							
								
	<?php  
								}	
								?> 					
                    </tbody>
                    </table>
                    </div>
				
                    <div class="box jplist-no-results text-shadow align-center">
                    <p>Data tidak ditemukan<br>atau Tekan Refresh</p>
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