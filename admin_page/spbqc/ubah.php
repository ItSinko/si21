<?php 

$noqc_spb = $_GET['noqc_spb'];

$data = mysqli_query($con,"SELECT * FROM qc_spb INNER JOIN spb ON spb.nospb=qc_spb.noqc_spb 
												INNER JOIN produk_master ON produk_master.id_prod=qc_spb.idprodqc_spb WHERE noqc_spb='$noqc_spb' ");

while ($spbqc = mysqli_fetch_array($data)) {

?>
<html>
<head>
<title>SPA Tambah</title>
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

<body onchange="rp();">
<div class="container-fluid">
<table class="table">
<form id="check" method="post" onchange="rp();">
<fieldset>
<legend>Ubah Data</legend>
<p id="error_message" class="font-weight-bold text-danger"></p>
<p id="success_message" class="font-weight-bold text-success"></p>
</fieldset>

<tr>
<td class="cd" colspan="1">
<fieldset class="field_form">
<legend class="legend_form">Info Produk</legend>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">No ID</label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="2"id="nomorqc_spb" readonly><?= $spbqc["nospb"]; ?></textarea>
	</div>
	</div>
  
	<input type="hidden" class="form-control" id="idprodqc_spb" value="<?= $spbqc["idprodqc_spb"]; ?>">
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Nama Produk </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="2" placeholder="Nama Produk" id="nmprd" readonly><?= $spbqc["nam_prod"]; ?></textarea>
	</div>
	</div>

	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Pelanggan </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="1" placeholder="Pelanggan" id="pelanggan"  readonly ><?= $spbqc["pelanggan_spb"]; ?></textarea>
	</div>
	</div>
  
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Untuk </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="1" placeholder="Untuk" id="untuk"  readonly ><?= $spbqc["untuk_spb"]; ?></textarea>
	</div>
	</div>
  
 
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Jumlah</label>
    <div class="col-sm-2">
	<div class="input-group-prepend">
    <input class="form-control jumlah"  type="text"  style="height:28px; width:70px;" value="<?= $spbqc["jumlah_spb"]; ?>" id="jumlah"placeholder="99" readonly>
	<input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;" value="<?= $spbqc["satuan_prod"]; ?>">
  
	</div>
	</div>
	</div> 

</td>

<td class="cd" colspan="1">  
<fieldset class="field_form">
<legend class="legend_form">Terima dari Gudang</legend>

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tanggal Terima</label>
    <div class="col-sm-6">
	<input type="date" class="form-control"  id="tglterimaqc_spb" value="<?= $spbqc["tglterimaqc_spb"]; ?>" placeholder="XXXX/XX/XXXX/2019">
    </div>
	</div>

</fieldset>
  
<fieldset class="field_form">
<legend class="legend_form">Penyerahan ke Gudang</legend>

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tanggal Serah</label>
    <div class="col-sm-6">
	<input type="date" class="form-control"  id="tglserahqc_spb" value="<?= $spbqc["tglserahqc_spb"]; ?>" placeholder="XXXX/XX/XXXX/2019">
    </div>
	</div>

</fieldset> 
  
<fieldset class="field_form">
<legend class="legend_form">Lain Lain</legend>

	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Keterangan </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="2" id="ketqc_spb" placeholder="Keterangan"><?= $spbqc["ketqc_spb"]; ?></textarea>
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
<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Data ?');" id="tambah" name="tambah" >Update Data</button>	
<a href="./index.php?hlm=qcspb" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
</div>

</form>	

<script type="text/javascript">    
    <?php echo $jsArray; ?>  
	function changeValue(no){  
	document.getElementById('nmprd').value = dtMhs[no].nama;
	document.getElementById('pelanggan').value = dtMhs[no].plg;
	document.getElementById('untuk').value = dtMhs[no].utk;
	document.getElementById('jumlah').value = dtMhs[no].jmlh;
	document.getElementById('idprodqc_spb').value = dtMhs[no].idprodqc_spb;
	};
</script>

<script>
$("#check").submit(function(e) {
	e.preventDefault();
	var nomorqc_spb = $("#nomorqc_spb").val();
	var tglterimaqc_spb = $("#tglterimaqc_spb").val();
	var tglserahqc_spb = $("#tglserahqc_spb").val();
	var ketqc_spb = $("#ketqc_spb").val();
	var idprodqc_spb = $("#idprodqc_spb").val();
	var ket_log = $("#ket_log").val();
	var username = $("#username").val();
	
	if(nomorqc_spb == "" || ket_log == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/qcspb.php",
			data: "nomorqc_spb="+nomorqc_spb+"&tglterimaqc_spb="+tglterimaqc_spb+"&tglserahqc_spb="+tglserahqc_spb+"&ketqc_spb="+ketqc_spb+"&idprodqc_spb="+idprodqc_spb+"&ket_log="+ket_log+"&username="+username,
         
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