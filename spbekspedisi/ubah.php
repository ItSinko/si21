<?php 
$con = mysqli_connect("localhost","root","","kontrol_db");

$noeks_spb = $_GET['noeks_spb'];
$data = mysqli_query($con,"SELECT * FROM ekspedisi_spb INNER JOIN gudang_spb ON gudang_spb.nogdg_spb=ekspedisi_spb.noeks_spb
													   INNER JOIN admjual_spb ON admjual_spb.noadm_spb=ekspedisi_spb.noeks_spb
													   INNER JOIN spb ON spb.nospb=ekspedisi_spb.noeks_spb
													   INNER JOIN produk_master ON produk_master.id_prod=ekspedisi_spb.idprodeks_spb WHERE noeks_spb='$noeks_spb' ");
while ($spbeks = mysqli_fetch_array($data)) {


?>
<html>
<head>
</head>
<style>
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
	
	.legend_form{
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

 .cd:hover { background: #0000; color: #000; }  
/* Hover cell effect! */
</style>

<body >
<div class="container-fluid" >
<table class="table" >
<form id="check" method="post">
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
    <label  class="col-sm-3 col-form-label">No PO</label>
	<div class="col-sm-8">
	<input type="text" class="form-control" id="nopo" value="<?= $spbeks["nopo_spb"]; ?>" readonly>
	</div>
    </div>
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">No ID</label>
	<div class="col-sm-8">
	<input type="text" class="form-control" id="nomorekspedisi_spb" value="<?= $spbeks["noeks_spb"]; ?>" readonly>
	</div>
    </div>
  
	<input type="hidden" id="idprodeks_spb">
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tipe Produk </label>
	<div class="col-sm-8">
	<textarea class="form-control" placeholder="Tipe Produk" id="type"  readonly><?= $spbeks["sing_prod"]; ?></textarea>
	</div>
    </div>
	
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Nama Produk </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="2" placeholder="Nama Produk" id="nama"  readonly><?= $spbeks["nam_prod"]; ?></textarea>
	</div>
    </div>
 
    <div class="form-group row">
    <label class="col-sm-3 col-form-label" >Jumlah</label>
	<div class="col-sm-2">
	<div class="input-group-prepend">
	<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;" value="<?= $spbeks["jumlah_spb"]; ?>" id="jumlah" readonly>
	<div class="input-group-text" style="height:28px;">
	Unit
	</div>
	</div>
	</div>
    </div> 

</td>

<td class="cd" colspan="1">  
<fieldset class="field_form">
<legend class="legend_form">Lain Lain</legend>

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No SJ</label>
    <div class="col-sm-5">
	<input type="text" class="form-control" rows="2" value="<?= $spbeks["nosjgdg_spb"]; ?>" id="nosj" readonly>
    </div>
	</div>
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Pelanggan</label>
    <div class="col-sm-5">
	<textarea class="form-control" rows="1" placeholder="Pelanggan" id="dsb" readonly><?= $spbeks["pelanggan_spb"]; ?></textarea>
    </div>
	</div>

 
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Keterangan </label>
	<div class="col-sm-8">
	<textarea id="keteks_spb" class="form-control" rows="2" placeholder="Keterangan"><?= $spbeks["keteks_spb"]; ?></textarea>
	</div>
	</div>
    </fieldset>

</td>

</tr>	
</table>

<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Data ?');" id="tambah" name="tambah" >Update Data</button>	
<a href="./index.php?hlm=eksspb" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
</div>

</form>	

<script type="text/javascript">    
    <?php echo $jsArray;
	?>  
	function changeValue(nolkppadm){  
	document.getElementById('dsb').value = dtMhs[nolkppadm].distributor;  
	document.getElementById('type').value = dtMhs[nolkppadm].type;
	document.getElementById('nama').value = dtMhs[nolkppadm].nama;
	document.getElementById('jumlah').value = dtMhs[nolkppadm].jumlah;	
	document.getElementById('idprodeks_spb').value = dtMhs[nolkppadm].idprodeks_spb;	
	document.getElementById('nosj').value = dtMhs[nolkppadm].nosj;	
	};
</script>

<script src="jquery-1.10.2.min.js"></script>
<!--  JS nya Jquery Chained Format  -->
<script src="jquery.chained.min.js"></script>

<script>
	$("#nomorekspedisi_spb").chained("#nopo");
</script>

<script>
$("#check").submit(function(e) {
	e.preventDefault();
	var nomorekspedisi_spb = $("#nomorekspedisi_spb").val();
	var keteks_spb = $("#keteks_spb").val();
	var idprodeks_spb = $("#idprodeks_spb").val();
	var nopo = $("#nopo").val();
	if(nomorekspedisi_spb == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/spbekspedisi.php",
			data: "nomorekspedisi_spb="+nomorekspedisi_spb+"&keteks_spb="+keteks_spb+"&idprodeks_spb="+idprodeks_spb,
         
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
<?php
}
?>