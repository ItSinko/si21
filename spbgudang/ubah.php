<?php 
$con = mysqli_connect("localhost","root","","kontrol_db");

$nogdg_spb = $_GET['nogdg_spb'];

$data = mysqli_query($con,"SELECT * FROM gudang_spb INNER JOIN spb ON spb.nospb=gudang_spb.nogdg_spb 
													INNER JOIN produk_master ON produk_master.id_prod=gudang_spb.idprodgdg_spb WHERE nogdg_spb='$nogdg_spb' ");

while ($gdgspb = mysqli_fetch_array($data)) {

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

<body>
<div class="container-fluid" >
<table class="table" >
<form id="check" method="post">
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
	<label  class="col-sm-3 col-form-label">No ID</label>
	<div class="col-sm-3">
	<input type="text" class="form-control" rows="2" id="nomorgudang_spb" value="<?= $gdgspb["nogdg_spb"]; ?>" readonly >
	</div>
	</div>
  
	<input type="hidden" class="form-control" id="idprodgdg_spb" value="<?= $gdgspb["idprodgdg_spb"]; ?>" readonly>
	
    <div class="form-group row">
	<label  class="col-sm-3 col-form-label">Nama Produk </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="2" placeholder="Nama Produk" id="nmprd"  readonly ><?= $gdgspb["nam_prod"]; ?></textarea>
	</div>
	</div>

    <div class="form-group row">
	<label  class="col-sm-3 col-form-label">Pelanggan </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="1" placeholder="Pelanggan" id="pelanggan"  readonly ><?= $gdgspb["pelanggan_spb"]; ?></textarea>
	</div>
	</div>
  
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Untuk </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="1" placeholder="Untuk" id="untuk"  readonly ><?= $gdgspb["untuk_spb"]; ?></textarea>
	</div>
	</div>
  
 
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Jumlah</label>

	<div class="col-sm-2">
	<div class="input-group-prepend">
	<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;" value="<?= $gdgspb["jumlah_spb"]; ?>" id="jumlah" readonly>
	<input  value="<?= $gdgspb["satuan_prod"]; ?>" class="input-group-text " readonly style="height:28px; width:60px;">
 
	</div>
	</div>
	</div>
	</div> 

</td>

</td>   
<td class="cd" colspan="1">  
<fieldset class="field_form">
<legend class="legend_form">Data Gudang</legend>

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No Surat Jalan *</label>
    <div class="col-sm-6">
	<input type="text" class="form-control"  id="nosjgdg_spb" value="<?= $gdgspb["nosjgdg_spb"]; ?>">
    </div>
	</div>
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tanggal Surat Jalan *</label>
    <div class="col-sm-6">
	<input type="date" class="form-control"  id="tglsjgdg_spb" value="<?= $gdgspb["tglsjgdg_spb"]; ?>">
	</div>
	</div>
  
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Keterangan </label>
	<div class="col-sm-8">
	<textarea class="form-control" id="ketgdg_spb" rows="2"><?= $gdgspb["ketgdg_spb"]; ?></textarea>
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

<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="tambah" >Tambah Data</button>	
<a href="./index.php?hlm=gudangspb" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
</div>

</form>	

<script type="text/javascript">    
    <?php echo $jsArray; ?>  
	function changeValue(no){  
	document.getElementById('nmprd').value = dtMhs[no].nama;
	document.getElementById('pelanggan').value = dtMhs[no].plg;
	document.getElementById('untuk').value = dtMhs[no].utk;
	document.getElementById('jumlah').value = dtMhs[no].jmlh;
	document.getElementById('idprodgdg_spb').value = dtMhs[no].idprodgdg_spb;
	};
</script>

<script src="jquery-1.10.2.min.js"></script>
  
<script>
$("#check").submit(function(e) {
	e.preventDefault();
	var nomorgudang_spb = $("#nomorgudang_spb").val();
	var nosjgdg_spb = $("#nosjgdg_spb").val();
	var tglsjgdg_spb = $("#tglsjgdg_spb").val();
	var ketgdg_spb = $("#ketgdg_spb").val();
	var idprodgdg_spb = $("#idprodgdg_spb").val();
	var ket_log = $("#ket_log").val();
	if(nomorgudang_spb == "" || ket_log == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/gudangspb.php",
			data: "nomorgudang_spb="+nomorgudang_spb+"&nosjgdg_spb="+nosjgdg_spb+"&tglsjgdg_spb="+tglsjgdg_spb+"&ketgdg_spb="+ketgdg_spb+"&idprodgdg_spb="+idprodgdg_spb+"&ket_log="+ket_log,
         
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