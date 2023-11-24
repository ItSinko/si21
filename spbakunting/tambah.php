
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

input[id=idprod]{
display: none;
	               }
	</style>

<body onchange="hitung();" onclick="uang();"

<div class="container-fluid">
<table class="table">

<form id="check" method="post"  onchange="uang();">

<fieldset>
<legend>Tambah Data</legend>

<p id="error_message" class="font-weight-bold text-danger"></p>
<p id="success_message" class="font-weight-bold text-success"></p>
</fieldset> 

<tr>
<td class="cd" colspan="1">  
<fieldset class="field_form">
<legend class="legend_form">Info Produk</legend>
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">No ID *</label>
    <div class="col-sm-4 ">
    <select class="selectpicker"  data-live-search="true"    onchange="changeValue(this.value)"  onclick="uang();hitung();"  id="idorder" required >
	<option value="">-Pilih-</option>
        <?php 
		$con=mysqli_connect("localhost","root","","kontrol_db");
    $result = mysqli_query($con,"SELECT *,SUM(nilai_spb) as kirim FROM spb 
												INNER JOIN gudang_spb ON spb.nospb = gudang_spb.nogdg_spb
												INNER JOIN ekspedisi2_spb ON spb.nospb = ekspedisi2_spb.noeksfk_spb
												INNER JOIN produk_master ON spb.idprod_spb = produk_master.id_prod
												GROUP BY noeksfk_spb ORDER BY nospb + 0  DESC ");
												
    $jsArray = "var dtMhs = new Array();\n";        
    
	while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="' . $row['noeksfk_spb'] . '">' . $row['noeksfk_spb'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['noeksfk_spb'] . "'] = {nosj:'" . addslashes($row['nosjgdg_spb']) . "',
                                                    tglsj:'" . addslashes($row['tglsjgdg_spb']) . "', 
													jmlh:'" . addslashes($row['jumlah_spb']) . "', 
													nama:'" . addslashes($row['nam_prod']) . "', 
													harga:'" . addslashes($row['harga_spb']) . "', 	
													 ekspedisi:'" . addslashes($row['kirim']) . "', 	
													idprod_on:'" .addslashes($row['id_prod'])."',
													satuan_prod:'" .addslashes($row['satuan_prod'])."',
													
													
														};\n";
	} 
    ?>
    </select>
    </div>
	</div>
	
	
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">No Faktur Jual</label>
    <div class="col-sm-3">
    <input class="form-control noefaktur" rows="2" placeholder="nofakju" id="nofakju" readonly>
    </div>
    </div>
	

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tanggal SJ</label>
    <div class="col-sm-4">
    <input type="date" class="form-control" rows="1" placeholder="Pelanggan" id="tglsj" readonly>
    </div>
    </div>
	
	<div class="form-group row">
    <label class="col-sm-3 col-form-label" >Jumlah</label>
    <div class="col-sm-2">
	<div class="input-group-prepend">
    <input class="form-control unit" type="text" style="height:28px; width:70px;" placeholder="99" id="jumlah" onkeyup="hitung();" readonly>
	<input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;">
  
	</div>
	</div>
	</div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Nama Produk</label>
    <div class="col-sm-8">
    <textarea class="form-control" rows="1" placeholder="Nama Produk" id="namaprd" readonly></textarea >
    </div>
    </div>
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Harga Produk</label>
    <div class="col-sm-6">
    <input type="text" class="form-control harga" placeholder="Total Harga" id="hargaprd" onkeyup="uang();hitung();" readonly>
	
    </div>
    </div> 
  
</fieldset>
</td>
  
<td class="cd" colspan="1">  
<fieldset class="field_form">
<legend class="legend_form">Penghitungan Harga</legend>

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Total Harga</label>
    <div class="col-sm-6">
    <input type="text" class="form-control total"  placeholder="Total Harga" id="total" onkeyup="uang();" readonly>
    </div>
    </div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Diskon FP *</label>
    <div class="col-sm-6">
    <input type="text" class="form-control diskonfp" placeholder="Diskon FP" id="diskonfp" onkeyup="uang();hitung();">
    </div>
    </div>
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Total FP</label>
    <div class="col-sm-6">
    <input type="text" class="form-control totalfp"  placeholder="Total FP" id="totalfp" onkeyup="uang();hitung();" readonly >
    </div>
    </div>
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Biaya Ekspedisi</label>
    <div class="col-sm-6">
	<input type="text" class="form-control ekspedisi" placeholder="Biaya Ekspedisi" id="biayaeks" onkeyup="uang();" readonly >
    </div>
    </div>
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Total Piutang</label>
    <div class="col-sm-6">
    <input type="text" class="form-control totalpiu"  placeholder="Total Piutang"  id="totalpiu" onkeyup="uang();hitung();" readonly>
    </div>
    </div>
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tanggal Lunas</label>
    <div class="col-sm-6">
    <input type="date" class="form-control" id="tgllunas">
    </div>
    </div>
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Kas / Bank *</label>
    <div class="col-sm-3 ">
    <select  class="selectpicker" id="kas">
	<option value="">-Pilih Bank-</option>
	<option value="BCA SPA">BCA SPA</option>
	<option value="OCBC SPA">OCBC SPA</option>	  
    <option value="Kas">Kas</option>	    
	</select>
    </div>
	</div>
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Keterangan </label>
    <div class="col-sm-8">
    <textarea class="form-control" rows="2" placeholder="Keterangan" id="ket" ></textarea>
    </div>
    </div>

</fieldset>
</td>

</tr>	
</table>

<input type="text" id="idprod" >


<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="tambah" >Tambah Data</button>	

<a href="./index.php?hlm=keuanganspb" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
</div>
</form>	
</body>

<script src="jquery.min.js"></script>
<script type="text/javascript" src="my.js"></script>
<script type="text/javascript" src="jquery.price_format.2.0.js"></script>


<script>
	
	function uang() {
		  
		  $('#hargaprd').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
			 $('#total').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
			 $('#diskonfp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
			 $('#totalfp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
			
			 $('#biayaeks').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
			$('#totalpiu').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
			
				}
	
</script>

<script type="text/javascript">    
<?php echo $jsArray; ?>
	function changeValue(nolkppacc){
	document.getElementById('nofakju').value = dtMhs[nolkppacc].nosj;    
	document.getElementById('jumlah').value = dtMhs[nolkppacc].jmlh;
	document.getElementById('namaprd').value = dtMhs[nolkppacc].nama;
	document.getElementById('hargaprd').value = dtMhs[nolkppacc].harga;
	document.getElementById('tglsj').value = dtMhs[nolkppacc].tglsj;
	document.getElementById('biayaeks').value = dtMhs[nolkppacc].ekspedisi;
	document.getElementById('satuan_prod').value = dtMhs[nolkppacc].satuan_prod;
	document.getElementById('idprod').value = dtMhs[nolkppacc].idprod_on;
	};
	
</script>

													

	<script>
function hitung() {
  
	var harga 		= $(".harga").val();
	var unit 		= $(".unit").val();
	var total		= $(".total").val();
	var diskonfp 	= $(".diskonfp").val();
	var totalfp 	= $(".totalfp").val();
	var totalpiu 	= $(".totalpiu").val();
	var ekspedisi 	= $(".ekspedisi").val();
 
	harga   = harga.split('Rp ').join('');    
	harga   = harga.split('.').join('');
      
	total   = total.split('Rp ').join('');
	total   = total.split('.').join('');
			
	totalfp   = totalfp.split('Rp ').join('');     
	totalfp   = totalfp.split('.').join('');
					
	diskonfp   = diskonfp.split('Rp ').join('');     
	diskonfp   = diskonfp.split('.').join('');
					
	totalpiu   = totalpiu.split('Rp ').join('');     
	totalpiu   = totalpiu.split('.').join('');
					
	ekspedisi   = ekspedisi.split('Rp ').join('');     
	ekspedisi   = ekspedisi.split('.').join('');
									
    total = Math.round(unit * harga); 
    $(".total").val(total);
	
	totalfp = Math.round(total - diskonfp); 
    $(".totalfp").val(totalfp);	
				
	totalpiu= ((totalfp*1) + (ekspedisi*1)  ); 
    $(".totalpiu").val(totalpiu);	
	
		
}
	</script>
	
	 	<script>
		
$("#check").submit(function(e) {
	e.preventDefault();
	var idorder = $("#idorder").val();	
	var diskonfp = $("#diskonfp").val();
	var tgllunas = $("#tgllunas").val();
	var kas = $("#kas").val();
	var ket = $("#ket").val();
	var idprod = $("#idprod").val();

	
	if(idorder== "" || diskonfp== "" || kas== ""  ) {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
		} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/tambah/akuntingspb.php",
			data: "idorder="+idorder+"&diskonfp="+diskonfp+"&tgllunas="+tgllunas+"&kas="+kas+"&ket="+ket+"&idprod="+idprod,
         
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

	
	
	
	
	
	
	
	
	
	
</html>