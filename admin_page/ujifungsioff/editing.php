<?php 

$idorderuji_off = $_GET['idorderuji_off'];
$data = mysqli_query($con,"SELECT * ,harga_off * jumlah_off as total
								    ,(harga_off * jumlah_off) * tarifuji_off / 100 as nilaiuji
									,((harga_off * jumlah_off) * tarifuji_off / 100) / 1.1  as dppuji
									,(((harga_off * jumlah_off) * tarifuji_off / 100) / 1.1) * 0.1 as ppnuji
									,(((harga_off * jumlah_off) * tarifuji_off / 100) / 1.1) * 0.02 as pphuji
									,((harga_off * jumlah_off) * tarifuji_off / 100 ) - ((((harga_off * jumlah_off) * tarifuji_off / 100) / 1.1) * 0.02) as totaluji
												FROM piutang_off 
												INNER JOIN spa_off ON spa_off.idorder_off = piutang_off.idorderuji_off
												INNER JOIN acc_off ON acc_off.idorderacc_off = piutang_off.idorderuji_off
												INNER JOIN distributor ON distributor.iddsb = piutang_off.idpabrikuji_off
												INNER JOIN produk_master ON produk_master.id_prod = piutang_off.idproduji_off  WHERE idorderuji_off = '$idorderuji_off' ");
while ($uji_off = mysqli_fetch_array($data)) {

?>
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
<body onload="uang();"  onchange="uang();">
<div class="container-fluid" >
<table class="table" >

<form id="check" method="post" onchange="uang();" >
<fieldset > 
<legend>Ubah Data</legend>
<p id="error_message" class="font-weight-bold text-danger"></p>
<p id="success_message" class="font-weight-bold text-success"></p>
</fieldset>
<tr>
 
<td class="cd" colspan="1">  
<fieldset class="field_form">
<legend class="legend_form">Info Produk</legend>
  
	
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >ID Order</label>
	<div class="col-sm-4">
	<div class="input-group-prepend ">
   	<div class="input-group-text" style="height:`28px;">
	OFF-
    </div>
    <input class="form-control " type="text" placeholder="99" id="idorder" name="idordereks" value= "<?= $uji_off["idorderuji_off"]; ?>"readonly>
	 <span id="availability"></span>
	</div>
	</div>
	</div> 
	
	<input type="hidden" class="form-control" id="idprodukuji_off"readonly>
	<input type="hidden" class="form-control" id="distributoruji_off"readonly>
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">No E-Faktur</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control " placeholder="SPA-111" id="noefaktur" readonly>
		</div>
	</div> 
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tanggal Lunas</label>
		<div class="col-sm-6">
		  <input type="dae" class="form-control " id="tgllunas" value= "<?= $uji_off["tgllunas_off"]; ?>" readonly>
		</div>
	</div> 
  
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Nama Produk </label>
		<div class="col-sm-8">
		<textarea class="form-control" rows="2" placeholder="Nama Produk" id="namabarang" readonly><?php echo $uji_off["nam_prod"]; ?></textarea>
		</div>
	</div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Harga</label>
		<div class="col-sm-6">
		<input type="text" class="form-control" id="hargabarang" readonly value= "<?= $uji_off["harga_off"]; ?>" onfocus="uang();">
		</div>
    </div> 

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Total</label>
		<div class="col-sm-6">
		<input type="text" class="form-control total" id="total"  value= "<?= $uji_off["total"]; ?>"  onkeyup="hitung();" readonly>
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
		<input class="form-control diskon"  type="text"  style="height:28px; width:70px;" onkeyup="uang();hitung();" id="tarifuji_off" value= "<?= $uji_off["tarifuji_off"]; ?>">
			<div class="input-group-text" style="height:28px;">
			 %
			</div>
		</div>
		</div>
    </div> 
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Nilai Uji</label>
		<div class="col-sm-6">
		<input type="text" class="form-control nilaiuji" value= "<?= number_format($uji_off["nilaiuji"]); ?>" id="nilaiuji"  onclick="uang();" readonly>
		</div>
    </div>

	 <div class="form-group row">
    <label  class="col-sm-3 col-form-label">DPP Uji</label>
		<div class="col-sm-6">
		<input type="text" class="form-control dppuji" value= "<?= number_format($uji_off["dppuji"]); ?>" id="dppuji" readonly>
		</div>
    </div>
  
  	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">PPN Uji</label>
		<div class="col-sm-6">
		<input type="text" class="form-control ppnuji" value= "<?= number_format($uji_off["ppnuji"]); ?>" id="ppnuji" readonly>
		</div>
    </div>
	 
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">PPH Uji</label>
		<div class="col-sm-6">
		<input type="text" class="form-control pphuji" value= "<?= number_format($uji_off["pphuji"]); ?>" id="pphuji" readonly>
		</div>
    </div>
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Total Bayar</label>
		<div class="col-sm-6">
		<input type="text" class="form-control totaldibayar" value= "<?= number_format($uji_off["totaluji"]); ?>" id="totalbayar" readonly>
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
		<textarea class="form-control" rows="1" placeholder="Distributor"  id="distributor" readonly><?php echo $uji_off["pabrik"]; ?></textarea>
		</div>
    </div>
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">No Invoice *</label>
		<div class="col-sm-6">
		<input type="text" id="invuji_off" class="form-control" value= "<?= $uji_off["invuji_off"]; ?>">
		</div>
    </div>
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tgl Uji *</label>
		<div class="col-sm-6">
		<input type="date" class="form-control" id="tgluji_off" value= "<?= $uji_off["tgluji_off"]; ?>">
		</div>
    </div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tgl Bayar</label>
		<div class="col-sm-6">
		<input type="date" class="form-control" id="tglbayaruji_off" value= "<?= $uji_off["tglbayaruji_off"]; ?>">
		</div>
	</div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Kas / Bank *</label>
		<div class="col-sm-6 ">
		<select  class="form-control form-control-inline" style=" height:38px;" id="kasuji_off">
		<option value= "<?= $uji_off["kasuji_off"]; ?>"><?php echo $uji_off["kasuji_off"]; ?></option>
			<option value="BCA">BCA</option>
			<option value="OCBC">OCBC</option>
			<option value="Kas">Kas</option>
		</select>
		</div>
    </div>

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Keterangan </label>
		<div class="col-sm-8">
		<textarea class="form-control" rows="2"  id="ketuji_off"><?php echo $uji_off["ketuji_off"]; ?></textarea>
		</div>
    </div>
	
	
	  <div class="form-group row">
    <label  class="col-sm-3 col-form-label"><span style=" color: Red;"><i class="fa fa-exclamation-circle" ></i></span> Alasan data diubah </label>
    <div class="col-sm-6">

    <textarea class="form-control" rows="1" minlength="5" placeholder="Minimal isi 5 karakter..." id="ket_log" ></textarea>
    </div>
    </div>	
</fieldset>
</td>
</tr>	
</table> 

 <input type="hidden" value="<?php echo $_SESSION['username'] ?>"  id="username" >
<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Ubah Data ?');" id="tambah" name="tambah" >Ubah Data</button>	
<a href="./index.php?hlm=piuoff" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
</div>

</form>
 
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
	var ket_log = $("#ket_log").val();
	var username = $("#username").val();
	

	if(idorder == "" || invuji_off == "" || tgluji_off == "" || kasuji_off == "" || ket_log == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/ujifungsioff.php",
			data: "idorder="+idorder+"&invuji_off="+invuji_off+"&tgluji_off="+tgluji_off+"&tarifuji_off="+tarifuji_off+"&tglbayaruji_off="+tglbayaruji_off+"&kasuji_off="+kasuji_off+"&ketuji_off="+ketuji_off+"&idprodukuji_off="+idprodukuji_off+"&distributoruji_off="+distributoruji_off+"&ket_log="+ket_log+"&username="+username,
         
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
<?php
}
?>
</html>