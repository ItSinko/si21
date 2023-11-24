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
				include 'spbakunting/tambah.php';
				break;
			case 'edit':
				include 'spbakunting/ubah.php';
				break;
			case 'delete':
				include 'spbakunting/hapus.php';
				break;
		
		}
	} else {
?>
	
	<div id="demo" class="horizon" style="margin: 20px 0 50px 0">
	<p class="h5">Tabel Piutang (SPB)</p>
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
                     
						<div class="jplist-panel box panel-top">															
						<button class="btn btn-primary"   onclick="location.href='./index.php?hlm=keuanganspb&aksi=baru'">Tambah Data</button>						
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
                                <tr data-control-type="sort-buttons-group"
                                    data-control-name="header-sort-buttons"
                                    data-control-action="sort"
                                    data-mode="single"
                                    data-datetime-format="{month}/{day}/{year}">
								    <th width="2%">No</th>
									<th width="4%">ID
									<i class="fa fa-caret-up" data-path=".idorder" data-type="number" data-order="asc" title="Sort by Title Asc"></i>
                                        <i class="fa fa-caret-down" data-path=".idorder" data-type="number" data-order="desc" title="Sort by Title Desc"></i>
                                   
									
									
									</th>
									
									<th width="5%">
										No Fakju
										<i class="fa fa-caret-up" data-path=".nofakju" data-type="text" data-order="asc" title="Sort by Title Asc"></i>
                                        <i class="fa fa-caret-down" data-path=".nofakju" data-type="text" data-order="desc" title="Sort by Title Desc"></i>
									</th>
									<th width="5%">Nama Produk</th>
									<th width="10%">
                                        Pelanggan
                                        <i class="fa fa-caret-up" data-path=".plgn" data-type="text" data-order="asc" title="Sort by Title Asc"></i>
                                        <i class="fa fa-caret-down" data-path=".plgn" data-type="text" data-order="desc" title="Sort by Title Desc"></i>
                                    </th>
									<th width="3%">Tgl SJ</th>
                                    <th width="1%">Jumlah</th>
									<th width="10%">Harga Produk</th>
									<th width="3%">Total</th>
								    <th width="1%">Diskon FP</th>
									<th width="1%">Total FP</th>
									<th width="1%">Biaya Ekspedisi</th>
									<th width="1%">Total Piutang</th>
									<th width="1%">Tgl Lunas</th>
									<th width="1%">Nilai Terima</th>
									<th width="1%">Kas</th>
									<th width="1%">Keterangan</th>
									<th width="1%">Tombol</th>
                                </tr>
                            </thead>

							
						<?php 
						
						$a= 1;
						$result=mysqli_query($con,"SELECT *,harga_spb * jumlah_spb as total 
											,(harga_spb * jumlah_spb) - diskonfp_spb as total_fp 
											,SUM(nilai_spb) as kirim
											,((harga_spb * jumlah_spb) - diskonfp_spb) + SUM(nilai_spb) as totpiu		
											FROM acc_spb 
											INNER JOIN spb ON acc_spb.noacc_spb=spb.nospb
											INNER JOIN ekspedisi2_spb ON acc_spb.noacc_spb = ekspedisi2_spb.noeksfk_spb
											INNER JOIN gudang_spb ON acc_spb.noacc_spb=gudang_spb.nogdg_spb
											INNER JOIN produk_master ON acc_spb.idprodacc_spb=produk_master.id_prod
											GROUP BY noeksfk_spb
											ORDER BY noacc_spb + 0 DESC			
											");		
		
						while($row = mysqli_fetch_array($result)){
						echo'<tr class=tbl-item
						data-plg="'.$row['pelanggan_spb'].'"
						data-prd="'.$row['nam_prod'].'">
						<td>'.$a++.'</td>	
						<td class=idorder>'.$row["noacc_spb"].'</td>	
						<td class=nofakju>'.$row["nosjgdg_spb"].'</td>	
						<td class=nmprd>'.$row["nam_prod"].'</td>	
						<td class=plgn>'.$row["pelanggan_spb"].'</td>
						<td>'.$row["tglsjgdg_spb"].'</td>
						';
						echo'
						<td>'.$row["jumlah_spb"].' '.$row["satuan_prod"].'</td>	
						<td>'.number_format($row["harga_spb"]).'</td>
						<td>'.number_format($row["total"]).'</td>
						<td>'.number_format($row["diskonfp_spb"]).'</td>
						<td>'.number_format($row["total_fp"]).'</td>
						<td>'.number_format($row["kirim"]).'</td>
						<td>'.number_format($row["totpiu"]).'</td>
						<td>'.$row["tgllunas_spb"].'</td>
						';
						echo'
						<td>'.number_format($row["totpiu"]).'</td>
						<td>'.$row["kasacc_spb"].'</td>
						<td>'.$row["ketacc_spb"].'</td>';
						?>
						<td><a href="?hlm=keuanganspb&aksi=edit&noacc_spb=<?=$row["noacc_spb"]?>" class="cus-application_form_edit"></a>
						<a href="#" type="button" class="cus-cross" data-toggle="modal" data-target="#myModal<?=$row["noacc_spb"]; ?>"></a>
						</td>
						</tr>
						
						
								<div class="modal fade" id="myModal<?php echo $row["noacc_spb"]; ?>" role="dialog"  tabindex="-1" >
				<div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
				   <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="spbakunting\hapus.php" method="get">

                        <?php
                        $noacc_spb = $row["noacc_spb"]; 
                        $query_edit = mysqli_query($con,"SELECT * FROM acc_spb WHERE noacc_spb='$noacc_spb'");
                        //$result = mysqli_query($conn, $query);
                        while ($rows = mysqli_fetch_array($query_edit)) {  
                        ?>

                        <input type="hidden" name="noacc_spb" value="<?php echo $rows["noacc_spb"] ?>" >
						<input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>" >

                      <div class="form-group">
						<label for="message-text" class="col-form-label">Alasan ID  <b><?php echo $rows["noacc_spb"] ?></b> dihapus ?</label>
					   <textarea class="form-control" id="message-text" placeholder="Wajib mengisi keterangan  " name="ket_log" minlength="5" required></textarea>
						</div>

                        <div class="modal-footer">  
                          <button type="submit" class="btn btn-success">Hapus</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                        <?php 
                        }
                     
                        ?>        
                      </form>
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