
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
				include 'lapjualoff/export_excel.php';
				break;
		}
	} else {
?>
	
<div id="demo" class="horizon" style="margin: 20px 0 50px 0">
<p class="h5">Laporan Penjualan(Offline)</p>
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
									<div
			class="jplist-group"
			data-control-type="checkbox-text-filter"
			data-control-action="filter"
			data-control-name="status "
			data-path=".status"
			data-logic="or">
				<input
				value="Sepakat"
				id="status"
				type="checkbox"
				/>
				<label>Sepakat</label>
				<input
				value="Masih Negoisasi"
				id="status"
				type="checkbox"
				/>
				<label>Nego</label>
				<input
				value="Batal"
				id="status"
				type="checkbox"
				/>
				<label>Batal</label>
				</div>
			
		
						
										<!-- checkbox text filter -->
			<div
			class="jplist-group"
			data-control-type="checkbox-text-filter"
			data-control-action="filter"
			data-control-name="status_po "
			data-path=".status_po"
			data-logic="or">
				<input
				value="Belum Input"
				id="status_po"
				type="checkbox"
				/>
				<label>Belum Input PO</label>
				<input
				value="Sudah Input"
				id="status_po"
				type="checkbox"
				/>
				<label>Sudah Input PO</label>
				
				</div>	
		
	<button class="button"   onClick="window.open('lapjualoff/filter_export.php', 
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
		 
          <th colspan="11" style="width:  15.33%;   font-size:20px;"  class="align-middle" >Informasi Pesanan</th>
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
								<th width=1% class="text-center" bgcolor="#ffe0ad">Status PO</th>
								<th width=1% class="text-center" bgcolor="#ffe0ad">Status</th>
								<th width=1% bgcolor="#ffe0ad">ID Order 
								
											<i class="fa fa-caret-up" data-path=".idorder" data-type="number" data-order="asc" title="Sort by Title Asc"></i>
                                            <i class="fa fa-caret-down" data-path=".idorder" data-type="number" data-order="desc" title="Sort by Title Desc"></i>
                                    
								
								
								
								</th>
								<th width=3% bgcolor="#ffe0ad"><span class="header">Distributor</span>
                                        <span class="sort-btns">
                                            <i class="fa fa-caret-up" data-path=".dsb" data-type="text" data-order="asc" title="Sort by Title Asc"></i>
                                            <i class="fa fa-caret-down" data-path=".dsb" data-type="text" data-order="desc" title="Sort by Title Desc"></i>
                                        </span></th>
								<th width=2% bgcolor="#ffe0ad">Pemesan</th>
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
						
						$a= 1;
						$result=mysqli_query($con,"	SELECT               IF(noseri_off IS NULL,
																		'<i>Belum di Input</i>',
																		(GROUP_CONCAT(DISTINCT(noseri_off) SEPARATOR '<br>')))AS noseri, harga_off * jumlah_off as total, status_off,
																		jumlah_off,harga_off,tglsj_off,idorder_off, pabrik, nam_prod, sing_prod, satuan_prod, 
																        nopo_off, tglpo_off, nodo_off, tgldo_off, 
																		tglterima_off, tglserah_off, nosj_off, nama_eks, noresi_off, tglkirim_off, nilai_off,pemesan_off


																		 FROM spa_off LEFT JOIN admjual_off ON spa_off.idorder_off = admjual_off.idorderadm_off
																		 LEFT JOIN qc_off ON qc_off.idorderqc_off = admjual_off.idorderadm_off
																		 LEFT JOIN gudang_off ON gudang_off.idordergdg_off = admjual_off.idorderadm_off
																		 LEFT JOIN ekspedisi_off ON gudang_off.idordergdg_off = ekspedisi_off.idordereks_off
																		 LEFT JOIN ongkirdb_off ON ongkirdb_off.idorderfk_off = spa_off.idorder_off
																		 JOIN distributor ON distributor.iddsb = spa_off.pabrik_off
																		 JOIN produk_master ON produk_master.id_prod = spa_off.idprod_off
															 			
																		 LEFT JOIN ekspedisi2_off ON ekspedisi2_off.idordereks_fk = ekspedisi_off.idordereks_off
																		 LEFT JOIN jasaeks ON jasaeks.id_eks = ekspedisi2_off.jasafk_off
																		 LEFT JOIN  seri_off ON spa_off.idorder_off = seri_off.idorderfk_off
																         GROUP BY idorder_off
																		 ORDER BY idorder_off + 0 DESC
																		 ");		
						while($row = mysqli_fetch_array($result)){

							echo'
							 <tbody>
                                <tr class=tbl-item>	
							        <td >'.$a++.'</td>';

										$po = $row['nopo_off'];
									 
									 
									 if (!empty($po)) {
									echo '<td  class=status_po><i class="cus-accept" title="Sudah Input PO"></i><br>Sudah Input</td>';
									 }
									 
									 else {
										echo '<td class=status_po><i class="cus-cancel"></i title="Belum Input PO"><br>Belum Input</td>';
										 
									 }									
										$angka = $row['status_off'];
									switch ($angka) {
									case "Masih Negosiasi":
										echo '<td class=status><i class="cus-error" title="Masih Negoisasi"></i><br>Masih Negoisasi</td>';
										break;
	
									case "Batal":
										echo '<td class=status><i class="cus-cancel"></i title="Batal"><br>Batal</td>';
										break;
	
									case"Sepakat":
										echo '<td  class=status><i class="cus-accept" title="Sepakat"></i><br>Sepakat</td>';
										break;
	
									default:
										echo '<td class=status>-</td>';
										break;
										}	
								echo'			
									<td class= idorder>OFF-'.$row['idorder_off'].'</td>	
									<td class=dsb>'.$row['pabrik'].'</td>
                                    <td class=desc>'.$row['pemesan_off'].'</td>	
									<td>'.$row['jumlah_off'].' '.$row['satuan_prod'].'</td>
                                   	<td class=nmprd>'.$row['nam_prod'].'</td>  								   									
								    <td class=type>'.$row['sing_prod'].'</td>  									 									
									<td><b>'.$row['noseri'].'</b></td>
									<td class=tglbuat>'.number_format($row['harga_off']).'</td>									
									<td >'.number_format($row['total']).'</td>	
									<td class=nopo>'.$row['nopo_off'].'</td>	
									<td>'.$row['tglpo_off'].'</td>
									<td class=nodo>'.$row['nodo_off'].'</td>	
									<td>'.$row['tgldo_off'].'</td>
									<td >'.$row['tglterima_off'].'</td>							
									<td >'.$row['tglserah_off'].'</td>
                                    <td class=nosj>'.$row['nosj_off'].'</td>	
									<td>'.$row['tglsj_off'].'</td>
									<td  class=eks>'.$row['nama_eks'].'</td>
									<td  class=noresi>'.$row['noresi_off'].'</td>
									<td>'.$row['tglkirim_off'].'</td>
									<td >'.number_format($row['nilai_off']).'</td>
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