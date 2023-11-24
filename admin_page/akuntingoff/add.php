
<!DOCTYPE html>
<html>
<head>
<title> Tambah Data </title>
</head>
<style>

 .cd:hover { background: #0000; color: #000; }  
/* Hover cell effect! */



   
	.field_form{
		border: 1px solid #ddd !important;
		margin: 0;
		xmin-width: 0;
		padding: 10px;       
		position: relative;
		border-radius:4px;
		background-color:#f5f5f5;
		padding-left:10px!important;
	}	
	
		.legend_form
		{
			font-size:12px;
			font-weight:bold;
			margin-bottom: 0px; 
			width: 35%; 
			border: 1px solid #ddd;
			border-radius: 4px; 
			padding: 5px 5px 5px 10px; 
			background-color: #ffffff;
		}
		
		 form-control-inline {
    height: 10%;

}			  
	
	
	
	input[id=pabrik_on]{
display: none;
	               }
				   
input[id=idprod_on]{
display: none;
	               }
				   
input[id=diskonuji]{
display: none;
}
input[id=nosjgdg]{
display: none;
}


</style>

<body onchange="uang();">

<div class="container-fluid" >
<table class="table" >


<form id="check" method="post" >
<fieldset>
 
<p id="error_message" class="font-weight-bold text-danger"></p>
<p  id="success_message" class="font-weight-bold text-success"></p>
<legend>Tambah Data</legend>
</fieldset>
 
<tr> 
 <td class="cd" colspan="1">  
 <fieldset class="field_form">
 <legend class="legend_form">Info Produk</legend>




  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No Surat Jalan</label>
	<div class="col-sm-1 ">
	<select type="text"  class="selectpicker"  data-live-search="true" style="width: 213px;"  id="sj" > 
	         <option value="s">Pilih Surat Jalan</option>
			<?php
				//$con= mysqli_connect("localhost","root","","kontrol_db");
                $query = mysqli_query($con,"SELECT * FROM spa_off 
                                                        
                                                        INNER JOIN gudang_off ON gudang_off.idordergdg_off = spa_off.idorder_off                                                        
                                                                
                                                        INNER JOIN distributor ON distributor.iddsb = spa_off.pabrik_off                                                                                                
                                                        INNER JOIN produk_master ON produk_master.id_prod = spa_off.idprod_off                                                      
                                                        
WHERE
                                            
                                            NOT EXISTS (
                                                SELECT
                                                    1
                                                FROM
                                                    acc_off
                                                WHERE
                                                    acc_off.idorderacc_off = spa_off.idorder_off
                                            )
                                            GROUP by nosj_off    
                                                        ORDER BY idorder_off DESC
																	");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['nosj_off']; ?>"><?php echo $row['nosj_off']; ?></option>
                <?php
                }
                ?>
	</select>
	</div>
	</div>









     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">ID Order *</label>
     <div class="col-sm-4 ">
      <select  class="form-control form-control-inline" style=" height:38px;" onchange="changeValue(this.value)" onclick="hitung();uang();" id="idorder" required>
	  <option value=0 >-ID Order-</option>		
				<?php 
		
     $result = mysqli_query($con,"SELECT * FROM spa_off 
                                                        
                                                        INNER JOIN gudang_off ON gudang_off.idordergdg_off = spa_off.idorder_off                                                        
                                                                
                                                        INNER JOIN distributor ON distributor.iddsb = spa_off.pabrik_off                                                                                                
                                                        INNER JOIN produk_master ON produk_master.id_prod = spa_off.idprod_off                                                      
                                                        
WHERE
                                            
                                            NOT EXISTS (
                                                SELECT
                                                    1
                                                FROM
                                                    acc_off
                                                WHERE
                                                    acc_off.idorderacc_off = spa_off.idorder_off
                                            )
                                            GROUP by idorder_off    
                                                        ORDER BY idorder_off + 0 DESC
														
														");    								
	$jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysqli_fetch_array($result)) {    
        echo '<option class="'.$row['nosj_off'].'" value="' . $row['idorder_off'] . '">OFF-' . $row['idorder_off'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['idorder_off'] . "'] = {noaks:'" . addslashes($row['noaks_off']) . "',
														   nama:'" . addslashes($row['nam_prod']) . "',
														   harga:'" . addslashes($row['harga_off']) . "',
														   jumlah:'".addslashes($row['jumlah_off']). "',
														   nosj:'".addslashes($row['nosj_off']). "',
														   diskon:'".addslashes($row['diskon_nota_off']). "',
														   distributor:'".addslashes($row['pabrik']). "',
														   expdate:'".addslashes($row['temphari_off']). "',
														   tglsj:'".addslashes($row['tglsj_off']). "',
														   diskonuji:'".addslashes($row['diskon_uji_off']). "',			   
														   idprod_on:'" .addslashes($row['id_prod'])."',
														   pabrik_on:'" .addslashes($row['iddsb'])."',	
														  
														   satuan_prod:'" .addslashes($row['satuan_prod'])."',	
														  
												};\n";
	
												} 
	
				?> 
      </select>
     </div>
     </div>


     
	 


     <input type="text" class="form-control harga"  id="nosjgdg" placeholder="SPA-111"   readonly>
 


	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Distributor </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="1" placeholder="Distributor" id="dsb" readonly></textarea>
     </div>
     </div>


     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nama Produk </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="2" placeholder="Nama Produk" id="nama"  readonly ></textarea>
     </div>
     </div>


     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Harga</label>
     <div class="col-sm-6">
     <input type="text" class="form-control hargaprd"  id="harga" onkeyup="uang();hitung();"   placeholder="Harga Produk" readonly>
     </div>
     </div> 
	 
	 
	 <div class="form-group row">
     <label class="col-sm-3 col-form-label" >Jumlah</label>
     <div class="col-sm-2">
     <div class="input-group-prepend">
     <input class="form-control jumlahprd"  type="text"  style="height:28px; width:70px;" onkeyup="hitung();" id="jumlah"placeholder="99" readonly>
	 <input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;">
	
     </div>
     </div>
     </div>
     </div> 
 
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Total</label>
     <div class="col-sm-6">
     <input type="text" class="form-control totalprd"  id="total"   onclick="uang();hitung();"  placeholder="Total Harga" readonly >
     </div>
     </div>
	 
	 </fieldset>
     </td>
	
     <td class="cd" colspan="1">  
     <fieldset class="field_form">
     <legend class="legend_form">Penghitungan Harga</legend> 
	 <div class="form-group row">
     <label class="col-sm-3 col-form-label" >Diskon *</label>
     <div class="col-sm-2">
     <div class="input-group-prepend">
     <input class="form-control tarifdiskon"  type="text"  style="height:28px; width:70px;"  id="tarif" onkeyup="hitung();"  placeholder="99" >
	 <div class="input-group-text" style="height:28px;">
	 %
     </div>
     </div>
     </div>
     </div> 
	 
	 
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Diskon FP</label>
     <div class="col-sm-6">
      <input type="text" class="form-control diskonfaktur"  id="diskon" onkeyup="uang();"  placeholder="Diskon Faktur Penjualan"   readonly >
     </div>
     </div>

     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Total Jual Barang</label>
     <div class="col-sm-6">
      <input type="text" class="form-control totaljual"  id="totaljual"  onkeyup="uang();"  placeholder="Total Jual Barang" readonly>
     </div>
     </div>
	 
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">DPP FP</label>
     <div class="col-sm-6">
      <input type="text" class="form-control dppfaktur"  id="dppfp" onkeyup="uang();"  placeholder="DPP Faktur Penjualan"  readonly >
     </div>
     </div>

	   	    <div class="form-group row">
     <label  class="col-sm-3 col-form-label">PPN FP</label>
     <div class="col-sm-6">
      <input type="text" class="form-control ppnfaktur"  id="ppnfp" onkeyup="uang();"  placeholder="PPN Faktur Penjualan" readonly  >
     </div>
     </div>


	 
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Total Faktur Jual</label>
     <div class="col-sm-6">
      <input type="text" class="form-control totalfaktur" id="totalfp" onkeyup="uang();" placeholder="Total Faktur Penjualan" readonly>
     </div>
     </div>
	 </fieldset>
     </td>

	  <td  class="cd" colspan="1">  
 <fieldset class="field_form">
<legend class="legend_form">Info Faktur</legend>
	   <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No Referensi *</label>
    <div class="col-sm-6 ">
      <select  class="form-control form-control-inline" style=" height:38px;"  id="noref" required>  
		<option value="">-Pilih Referensi-</option>
                <?php
				//$con= mysqli_connect("localhost","root","","kontrol_db");
                $query = mysqli_query($con,"SELECT * FROM infofaktur ORDER BY norefinfo");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['norefinfo']; ?>"><?php echo $row['norefinfo']; ?> </option>
					
				<?php
                }
                ?>
      </select>
    </div>
  </div>

  
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">E-Faktur *</label>
    <div class="col-sm-6 ">
      <select  class="form-control form-control-inline" id="efaktur" name="noefak_on" style=" height:38px;">	  
	  <?php
				//$con= mysqli_connect("localhost","root","","kontrol_db");
                $query = mysqli_query($con,"SELECT * FROM efaktur INNER JOIN infofaktur ON
											efaktur.noref=infofaktur.norefinfo  ");
											
                while ($row = mysqli_fetch_array($query)) {
                
				?>
                    <option class="<?php echo $row['norefinfo']; ?>" value="<?php echo $row['noefak']; ?>"><?php echo $row['noefak']; ?></option>		    
			 <?php
                }
		     ?>  
	  </select>
	</div>
  </div>
  </fieldset>
	
	<fieldset class="field_form">
    <legend class="legend_form">Lain Lain</legend>
	<div class="form-group row">
    <label class="col-sm-3 col-form-label" >Batas</label>
    <div class="col-sm-2">
    <div class="input-group-prepend">
    <input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"  id="term"  placeholder="99" readonly>
	<div class="input-group-text" style="height:28px;">Hari
     </div>
     </div>
     </div>
     </div> 
	
	 <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Realisasi *</label>
    <div class="col-sm-6">
    <input type="text" class="form-control realisasiacc"  id="realisasiacc" onkeyup="uang();hitung();" placeholder="Biaya Realisasi"   >
    </div>
    </div>

	 <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tanggal Realisasi</label>
    <div class="col-sm-6">
    <input type="date" class="form-control harga"  id="tglbayaracc"  >
    </div>
    </div> 

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Selisih Bayar</label>
    <div class="col-sm-6">
      <input type="text" class="form-control selisihbayar"  id="selisihbayar" placeholder="Selisih Pembayaran"  onclick="uang();" readonly>
    </div>
  </div>

  
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Kas / Bank *</label>
    <div class="col-sm-6 ">
     <select  class="form-control form-control-inline" style=" height:38px;"   id="kas" >
	<option value="">-Pilih Bank-</option>
	<option value="BCA SPA">BCA SPA</option>
	<option value="OCBC SPA">OCBC SPA</option>
	<option value="Tunai / Cash">Tunai / Cash</option>
	  </select>
    </div>
  </div>
  
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Keterangan *</label>
    <div class="col-sm-6 ">
      <textarea rows="2" id="ket"class="form-control" placeholder="Keterangan"></textarea>
    </div>
  </div>
   </fieldset>

   
    <input type="hidden" class="form-control "  id="idprodacc_off" placeholder="Selisih Pembayaran" >
	  <input type="hidden" class="form-control "  id="pabrikacc_off" placeholder="Selisih Pembayaran" >
	  <input type="hidden" class="form-control "  id="diskonujiacc_off" placeholder="Selisih Pembayaran" >
	 
</td>
</tr>
</table>


<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="tambah" >Tambah Data  </button>	
     <a href="./index.php?hlm=accoff" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a> 
</form>

<script type="text/javascript">    

	<?php echo $jsArray; ?>  
	function changeValue(nolkpp){  
	
	document.getElementById('nosjgdg').value = dtMhs[nolkpp].nosj;
	document.getElementById('idprodacc_off').value = dtMhs[nolkpp].idprod_on;	
	document.getElementById('pabrikacc_off').value = dtMhs[nolkpp].pabrik_on;	
	
	document.getElementById('diskonujiacc_off').value = dtMhs[nolkpp].diskonuji;	
	document.getElementById('nama').value = dtMhs[nolkpp].nama;
	document.getElementById('harga').value = dtMhs[nolkpp].harga;
	
	document.getElementById('jumlah').value = dtMhs[nolkpp].jumlah;
	document.getElementById('dsb').value = dtMhs[nolkpp].distributor;
	document.getElementById('tarif').value = dtMhs[nolkpp].diskon;
	document.getElementById('satuan_prod').value = dtMhs[nolkpp].satuan_prod;
   
	document.getElementById('term').value = dtMhs[nolkpp].expdate;
	document.getElementById('tglsj').value = dtMhs[nolkpp].tglsj;
	

	};

	</script>

<script type="text/javascript" src="jquery.price_format.2.0.js"></script>


<script>
  function uang() {
		   $('#harga').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
			
			  $('#total').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
						
			  $('#diskon').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
			 $('#totaljual').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
				
			 $('#dppfp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
						
			 $('#ppnfp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });

		
			
			$('#totalfp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });

			
			$('#realisasiacc').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });

			$('#selisihbayar').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });			
  }
</script>

<script>
function hitung() {
    
	
//penetapan variabel	
	var jumlahprd 		= $(".jumlahprd").val();
	var hargaprd 		= $(".hargaprd").val();
    var totalprd 		= $(".totalprd").val();
	var tarifdiskon		= $(".tarifdiskon").val();
	var totaljual 	    = $(".totaljual").val();
	
	var dppfaktur 	    = $(".dppfaktur").val();
	var ppnfaktur 	    = $(".ppnfaktur").val();
	var totalfaktur 	    = $(".totalfaktur").val();
	var realisasiacc 	    = $(".realisasiacc").val();
	var selisihbayar 	    = $(".selisihbayar").val();
	var diskon 			= 100;
	var koma 			= 1.1;
	var nolkoma 		= 0.1;
	
//split label rp
	 hargaprd   = hargaprd.split('Rp ').join('');
     hargaprd   = hargaprd.split('.').join('');
      
	 totalprd   = totalprd.split('Rp ').join('');
     totalprd   = totalprd.split('.').join('');
	 
	 totaljual   = totaljual.split('Rp ').join('');
     totaljual   = totaljual.split('.').join(''); 
	  
	  
	 dppfaktur   = dppfaktur.split('Rp ').join('');
     dppfaktur   = dppfaktur.split('.').join('');
	 
	  ppnfaktur   = ppnfaktur.split('Rp ').join('');
     ppnfaktur   = ppnfaktur.split('.').join('');
	 
	   totalfaktur   = totalfaktur.split('Rp ').join('');
     totalfaktur   = totalfaktur.split('.').join('');
	 
	
	 
 	 	 
	 realisasiacc   = realisasiacc.split('Rp ').join('');
     realisasiacc   = realisasiacc.split('.').join('');
	 
	  selisihbayar   = selisihbayar.split('Rp ').join('');
     selisihbayar   = selisihbayar.split('.').join('');

	 
	 //fungsi penjumlahan	  
     totalprd = Math.round(jumlahprd * hargaprd); 
     $(".totalprd").val(totalprd);
	 
	 diskonfaktur = Math.round(totalprd * tarifdiskon / diskon); 
    $(".diskonfaktur").val(diskonfaktur);
	
	totaljual = Math.round(totalprd - diskonfaktur); 
    $(".totaljual").val(totaljual);	
	
	dppfaktur = Math.round(totaljual / koma);
	$(".dppfaktur").val(dppfaktur);

	ppnfaktur = Math.round(dppfaktur * nolkoma);
	$(".ppnfaktur").val(ppnfaktur);
	
	totalfaktur = (totaljual*1 + 0); 
    $(".totalfaktur").val(totalfaktur);	
	
	selisihbayar = (realisasiacc - totalfaktur); 
    $(".selisihbayar").val(selisihbayar);		
}
</script>
		
	<script src="jquery.chained.min.js"></script> 
	 <script>
     $("#efaktur").chained("#noref");
     </script>
		
		
		 <script>
     $("#idorder").chained("#sj");
     </script>
	
 	<script>
$("#check").submit(function(e) {
	e.preventDefault();
	var idorder = $("#idorder").val();	
	var noref = $("#noref").val();	
	var efaktur = $("#efaktur").val();	
	var tarif = $("#tarif").val();	
	var realisasiacc = $("#realisasiacc").val();	
	var term = $("#term").val();	
	var tglbayaracc = $("#tglbayaracc").val();	
	var kas = $("#kas").val();	
	var ket = $("#ket").val();	
	var idprodacc_off = $("#idprodacc_off").val();	
	var pabrikacc_off = $("#pabrikacc_off").val();	
	var diskonujiacc_off = $("#diskonujiacc_off").val();	
	var nosjgdg = $("#nosjgdg").val();	
	
	
	
	
	if(idorder== "" || tarif== "" || efaktur== "" || kas== "" || ket== "" ) {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
		} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/tambah/akuntingoff.php",
			data: "idorder="+idorder+"&noref="+noref+"&efaktur="+efaktur+"&tarif="+tarif+"&realisasiacc="+realisasiacc+"&term="+term+"&tglbayaracc="+tglbayaracc+"&kas="+kas+"&ket="+ket+"&idprodacc_off="+idprodacc_off+"&pabrikacc_off="+pabrikacc_off+"&diskonujiacc_off="+diskonujiacc_off+"&nosjgdg="+nosjgdg,
         
		 
		 success: function(data){
				$('#success_message').fadeIn().html(data);
				setTimeout(function() {
					$('#success_message').fadeOut("slow");
				}, 2000 );

				}
			});
		}
	})
</script>       

</body>
</html>