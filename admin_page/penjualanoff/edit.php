 
<?php 

$idorderadm_off = $_GET['idorderadm_off'];

$data = mysqli_query($con,"SELECT * FROM admjual_off INNER JOIN spa_off ON spa_off.idorder_off = admjual_off.idorderadm_off
							INNER JOIN distributor ON distributor.iddsb= admjual_off.pabrikadm_off
							INNER JOIN produk_master ON produk_master.id_prod= admjual_off.idprodadm_off WHERE idorderadm_off='$idorderadm_off'");
while ($adm = mysqli_fetch_array($data)) {

?>
<html>
<head>
<title>Ubah Data</title>
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

<body>
<div class="container-fluid">
<table class="table">
<form id="check" method="post">
<fieldset>
	<legend>Ubah Data</legend>
	
	
<p id="error_message" class="font-weight-bold text-danger"></p>

<p  id="success_message" class="font-weight-bold text-success"></p>


	
</fieldset>
<tr>
<td class="cd" colspan="1">
	<fieldset class="field_form">
<legend class="legend_form">Info Produk</legend>


<div class="form-group row">
	<label class="col-sm-3 col-form-label" >ID Order *</label>
	<div class="col-sm-2">
	<div class="input-group-prepend ">
   	<div class="input-group-text" style="height:`28px;">
	OFF-
    </div>
    <input class="form-control " type="text" placeholder="99" id="idorder" name="idorderoff" value= "<?= $adm["idorderadm_off"]; ?>" readonly>
	 <span id="availability"></span>
	</div>
	</div>
	</div> 


	
	<input type="hidden" class="form-control" id="id_prod" readonly>
	<input type="hidden" class="form-control" id="iddsb" readonly>
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Distributor</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="distributor" value= "<?= $adm["pabrik"]; ?>" readonly>
		</div>
	</div>
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Pemesan</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="instansi" value= "<?= $adm["pemesan_off"]; ?>" placeholder="Nama Distributor"readonly>
		</div>
	</div>	
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Tipe Produk</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="type" value= "<?= $adm["sing_prod"]; ?>" placeholder="Tipe Produk"readonly>
		</div>
	</div>
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Nama Produk </label>
		<div class="col-sm-4">
			<textarea rows="2" class="form-control" placeholder="Nama Produk" style="width:300px;" id="nama" readonly><?php echo $adm["nam_prod"]; ?></textarea>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-3 col-form-label" >Jumlah</label>
		<div class="col-sm-1">
			<div class="input-group-prepend">
				<input class="form-control jumlah" id="jumlah"  type="text" value= "<?= $adm["jumlah_off"]; ?>" style="height:32px; width:85px;" placeholder="Jumlah" readonly>
			<input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;" value="<?= $adm["satuan_prod"]; ?>">
   
			</div>
		</div>
	</div>		
	</fieldset>
</td>

<td class="cd" colspan="1">  
	<fieldset class="field_form">
	<legend class="legend_form">Info PO</legend>
		<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Nomor PO *</label>
		<div class="col-sm-8">
			<input type="text" id="nopo_off" class="form-control" value= "<?= $adm["nopo_off"]; ?>" placeholder="Masukkan No PO" >
		</div>
	</div>
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Tanggal *</label>
		<div class="col-sm-8">
			<input type="date" id="tglpo_off" value= "<?= $adm["tglpo_off"]; ?>" class="form-control total">
		</div>
	</div>
	</fieldset>


	<fieldset class="field_form">
	<legend class="legend_form">Info DO/SPK</legend>
	
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Nomor DO/SPK</label>
		<div class="col-sm-8">
			<input type="text" id="nodo_off" class="form-control" value= "<?= $adm["nodo_off"]; ?>" placeholder="Masukkan No DO/SPK" >
		</div>
	</div>
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Tanggal</label>
		<div class="col-sm-8">
			<input type="date" id="tgldo_off" value= "<?= $adm["tgldo_off"]; ?>" class="form-control total">
		</div>
	</div>
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Keterangan</label>
		<div class="col-sm-8">
			<textarea rows="2" id="ketadm_off"class="form-control" value= "<?= $adm["ket_off"]; ?>" placeholder="Keterangan" id="ket_off"></textarea>
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

<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Data ?');" id="tambah">Update Data</button>
<a href="./index.php?hlm=admoff" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
</form>



<!--hidden input foreign key-->
<input type="hidden" id="idprod_off" value= "<?= $adm["idprod_off"]; ?>">
<input type="hidden" id="pabrik_off" value= "<?= $adm["pabrik_off"]; ?>">
<script src="jquery-3.2.1.min.js"></script>



	
	<script>
           function count() {
                var harga 		= $(".harga").val();
				var jumlah		= $(".jumlah").val();
				var total		= $(".total").val();

		

			   harga   = harga.split('Rp ').join('');
			   harga   = harga.split('.').join('');

					
            
			   
			   total   = total.split('Rp ').join('');
			   total   = total.split('.').join('');

		total = Math.round(jumlah* harga); 
     $(".total").val(total);
					
                
                }
            
</script>
  <script src="jquery-1.10.2.min.js"></script>
        <script src="jquery.chained.min.js"></script>
	
        


  
	<!-- Select2 CSS -->
	<link rel="stylesheet" type="text/css" href="select2/dist/css/select2.min.css">


	<!-- Select2 JS -->
	<script src="select2/dist/js/select2.min.js" type="text/javascript"></script>
	
	
<script>
	  
	  function rp() {
		  
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
	  }
</script>

<script>

$("#check").submit(function(e) {
	e.preventDefault();
	
	var idorder = $("#idorder").val();
	var nopo_off = $("#nopo_off").val();
	var tglpo_off = $("#tglpo_off").val();
	var nodo_off = $("#nodo_off").val();
	var tgldo_off = $("#tgldo_off").val();
	var ketadm_off = $("#ketadm_off").val();
	var idprod_off = $("#idprod_off").val();
	var pabrik_off = $("#pabrik_off").val();
	var ket_log = $("#ket_log").val();
	var username = $("#username").val();
	

	if(nopo_off == "" || tglpo_off == ""|| ket_log == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/penjualanoff.php",
			data: "idorder="+idorder+"&nopo_off="+nopo_off+"&tglpo_off="+tglpo_off+"&nodo_off="+nodo_off+"&tgldo_off="+tgldo_off+"&ketadm_off="+ketadm_off+"&idprod_off="+idprod_off+"&pabrik_off="+pabrik_off+"&ket_log="+ket_log+"&username="+username,
         
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

		<!-- JS nya Jquery -->
       <script src="jquery-1.10.2.min.js"></script>

        <!--  JS nya Jquery Price Format  -->
        <script type="text/javascript" src="jquery.price_format.2.0.js"></script>
	
	
	</div>
	</body>
	<?php
}
	?>
</html>