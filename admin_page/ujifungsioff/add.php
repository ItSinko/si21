<html>
<head>
<title>SPA Tambah</title>
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
</style>
<body onclick="uang();" >
<div class="container-fluid" >
<table class="table" >
<form id="check" method="post" onchange="uang();" >
<fieldset > 
<legend>Tambah Data</legend>
<p id="error_message" class="font-weight-bold text-danger"></p>
<p id="success_message" class="font-weight-bold text-success"></p>
</fieldset>
<tr>
 
<td class="cd" colspan="1">  
<fieldset class="field_form">
<legend class="legend_form">Info Produk</legend>
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">ID Order *</label>
		<div class="col-sm-6 ">
		<select id="idorder" class="form-control form-control-inline" style=" height:38px;"   onchange="changeValue(this.value)"  onclick="uang();hitung();">
			<option value="" >-Pilih ID Order-</option>
			<?php 
			$result = mysqli_query($con,"SELECT * ,   harga_off * jumlah_off as total         
									FROM acc_off INNER JOIN spa_off ON acc_off.idorderacc_off = spa_off.idorder_off   
									INNER JOIN distributor ON distributor.iddsb=acc_off.pabrikacc_off
									INNER JOIN produk_master ON produk_master.id_prod=acc_off.idprodacc_off
									
									WHERE
                                            
                                            NOT EXISTS (
                                                SELECT
                                                    1
                                                FROM
                                                    piutang_off
                                                WHERE
                                                    piutang_off.idorderuji_off = spa_off.idorder_off )
													
									ORDER BY idorderacc_off + 0 DESC
									
									
									");									  
			$jsArray = "var dtMhs = new Array();\n";        
			while ($row = mysqli_fetch_array($result)) {    
			echo '<option value="' . $row['idorderacc_off'] . '">OFF-' . $row['idorderacc_off'] . '</option>';    
			$jsArray .= "dtMhs['" . $row['idorderacc_off'] . "'] = {
										nofakju:'" . addslashes($row['nofakju_off']) . "',
										tgllunas:'" . addslashes($row['tgllunas_off']) . "',
										namaprodukacc:'" . addslashes($row['nam_prod']) . "',
										hargaprd:'".addslashes($row['harga_off']). "',
										totalacc:'".addslashes($row['total']). "',
										distributor:'".addslashes($row['pabrik']). "',
										tarifuji_off:'".addslashes($row['diskonujiacc_off'])."',		
										idprodukuji_off:'".addslashes($row['id_prod'])."',														
										distributoruji_off:'".addslashes($row['iddsb'])."',
										};\n";
				}    
				?> 
		</select>
		</div>
	</div>
	
	<input type="hidden" class="form-control" id="idprodukuji_off"readonly>
	<input type="hidden" class="form-control" id="distributoruji_off"readonly>
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">No E-Faktur</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control " placeholder="No E- Faktur" id="noefaktur" readonly>
		</div>
	</div> 
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tanggal Lunas</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control " id="tgllunas" readonly>
		</div>
	</div> 
  
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Nama Produk </label>
		<div class="col-sm-8">
		<textarea class="form-control" rows="2" placeholder="Nama Produk" id="namabarang" readonly></textarea>
		</div>
	</div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Harga</label>
		<div class="col-sm-6">
		<input type="text" class="form-control" id="hargabarang" readonly placeholder="Harga Produk">
		</div>
    </div> 

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Total</label>
		<div class="col-sm-6">
		<input type="text" class="form-control total" id="total"  placeholder="Total Harga"  onkeyup="hitung();" readonly>
		</div>
    </div>
</fieldset>
</td>

<td class="cd" colspan="1">  
<fieldset class="field_form">
<legend class="legend_form">Penghitungan Piutang</legend>
   
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Tarif Uji</label>
		<div class="col-sm-2">
		<div class="input-group-prepend">
		<input class="form-control diskon"  type="text"  style="height:28px; width:70px;" onkeyup="uang();hitung();" id="tarifuji_off"placeholder="99">
			<div class="input-group-text" style="height:28px;">
			 %
			</div>
		</div>
		</div>
    </div> 
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Nilai Uji</label>
		<div class="col-sm-6">
		<input type="text" class="form-control nilaiuji" placeholder="Nilai Uji" id="nilaiuji"  onclick="uang();" readonly>
		</div>
    </div>
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">DPP Uji</label>
		<div class="col-sm-6">
		<input type="text" class="form-control dppuji" placeholder="DPP Uji" id="dppuji" readonly>
		</div>
    </div>
  	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">PPN Uji</label>
		<div class="col-sm-6">
		<input type="text" class="form-control ppnuji" placeholder="PPN Uji" id="ppnuji" readonly>
		</div>
    </div>
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">PPH Uji</label>
		<div class="col-sm-6">
		<input type="text" class="form-control pphuji" placeholder="PPH Uji" id="pphuji" readonly>
		</div>
    </div>
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Total Bayar</label>
		<div class="col-sm-6">
		<input type="text" class="form-control totaldibayar" placeholder="Total Bayar Piutang" id="totalbayar" readonly>
		</div>
    </div>
	
</fieldset>
</td>

<td  class="cd" colspan="1">  
<fieldset class="field_form">
<legend class="legend_form">Invoice</legend>

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Distributor </label>
		<div class="col-sm-8">
		<textarea class="form-control" rows="1" placeholder="Distributor"  id="distributor" readonly></textarea>
		</div>
    </div>
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">No Invoice *</label>
		<div class="col-sm-6">
		<input type="text" id="invuji_off" class="form-control" placeholder="No Invoice">
		</div>
    </div>
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tgl Invoice *</label>
		<div class="col-sm-6">
		<input type="date" class="form-control" id="tgluji_off">
		</div>
    </div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tgl Bayar Uji</label>
		<div class="col-sm-6">
		<input type="date" class="form-control" id="tglbayaruji_off">
		</div>
	</div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Kas / Bank *</label>
		<div class="col-sm-6 ">
		<select  class="form-control form-control-inline" style=" height:38px;" id="kasuji_off">
		<option value="">Pilih Kas / Bank</option>
			<option value="BCA">BCA</option>
			<option value="OCBC">OCBC</option>
			<option value="Kas">Kas</option>
		</select>
		</div>
    </div>

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Keterangan </label>
		<div class="col-sm-8">
		<textarea class="form-control" rows="2" placeholder="Keterangan" id="ketuji_off"></textarea>
		</div>
    </div>
	
</fieldset>
</td>
</tr>	
</table> 

<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="tambah" >Tambah Data</button>	
</div>

<a href="./index.php?hlm=piuoff" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>

</form>	
<script type="text/javascript">    
<?php echo $jsArray; ?>
	function changeValue(nolkppacc){  
	document.getElementById('noefaktur').value = dtMhs[nolkppacc].nofakju;
	document.getElementById('tgllunas').value = dtMhs[nolkppacc].tgllunas;
	document.getElementById('namabarang').value = dtMhs[nolkppacc].namaprodukacc;
	document.getElementById('hargabarang').value = dtMhs[nolkppacc].hargaprd;
	document.getElementById('total').value = dtMhs[nolkppacc].totalacc;
	document.getElementById('distributor').value = dtMhs[nolkppacc].distributor;
	document.getElementById('tarifuji_off').value = dtMhs[nolkppacc].tarifuji_off;
	document.getElementById('idprodukuji_off').value = dtMhs[nolkppacc].idprodukuji_off;
	document.getElementById('distributoruji_off').value = dtMhs[nolkppacc].distributoruji_off;
	};
</script>
 
<script>
function hitung() {
    var nilaiuji  = $(".nilaiuji").val();
	var total = $(".total").val();
    var diskon = $(".diskon").val();
    var persen = 100;
	var koma   = 1.1;
    var nolkoma = 0.1;
	var noldua = 0.02;
	var dppuji  = $(".dppuji").val();
	var pphuji  = $(".pphuji").val();
	
	 nilaiuji   = nilaiuji.split('Rp ').join('');
     nilaiuji   = nilaiuji.split('.').join('');
      	  	
	 total   = total.split('Rp ').join('');
     total   = total.split('.').join('');
      
	 dppuji   = dppuji.split('Rp ').join('');
     dppuji   = dppuji.split('.').join('');
	
	nilaiuji = Math.round(total * diskon / persen); 
    $(".nilaiuji").val(nilaiuji);
    	
	dppuji = Math.round(nilaiuji / koma); 
    $(".dppuji").val(dppuji);

	ppnuji = Math.round(dppuji * nolkoma); 
    $(".ppnuji").val(ppnuji);
	
    pphuji = Math.round(dppuji * noldua); 
    $(".pphuji").val(pphuji);
	
	totaldibayar= (nilaiuji - pphuji);
	 $(".totaldibayar").val(totaldibayar);
	
	}	
</script>
 
<script>
	function uang() {
		  $('#hargabarang').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
						
			$('#total').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
			$('#nilaiuji').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
				$('#dppuji').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
				$('#ppnuji').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
				$('#pphuji').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
				$('#totalbayar').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
	
			
  }
</script>

<script src="jquery-1.10.2.min.js"></script>
  
<!--  JS nya Jquery Price Format  -->
<script type="text/javascript" src="jquery.price_format.2.0.js"></script>
<script>

$("#check").submit(function(e) {
	e.preventDefault();
	var idorder = $("#idorder").val();
	var invuji_off = $("#invuji_off").val();
	var tgluji_off = $("#tgluji_off").val();
	var tarifuji_off = $("#tarifuji_off").val();
	var tglbayaruji_off = $("#tglbayaruji_off").val();
    var kasuji_off = $("#kasuji_off").val();
	var ketuji_off = $("#ketuji_off").val();
	var idprodukuji_off = $("#idprodukuji_off").val();
	var distributoruji_off = $("#distributoruji_off").val();
	

	if(idorder == "" || invuji_off == "" || tgluji_off == "" || kasuji_off == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/tambah/ujifungsioff.php",
			data: "idorder="+idorder+"&invuji_off="+invuji_off+"&tgluji_off="+tgluji_off+"&tarifuji_off="+tarifuji_off+"&tglbayaruji_off="+tglbayaruji_off+"&kasuji_off="+kasuji_off+"&ketuji_off="+ketuji_off+"&idprodukuji_off="+idprodukuji_off+"&distributoruji_off="+distributoruji_off,
         
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