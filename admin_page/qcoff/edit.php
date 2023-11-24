<?php 

$idorderqc_off = $_GET['idorderqc_off'];
$data = mysqli_query($con,"SELECT * FROM qc_off INNER JOIN admjual_off ON qc_off.idorderqc_off = admjual_off.idorderadm_off 
											   INNER JOIN spa_off ON spa_off.idorder_off = qc_off.idorderqc_off
											   INNER JOIN distributor ON distributor.iddsb = qc_off.pabrikqc_off
											   INNER JOIN produk_master ON produk_master.id_prod = qc_off.idprodqc_off where idorderqc_off='$idorderqc_off' ");
while ($qc_off = mysqli_fetch_array($data)) {
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
	<div class="col-sm-3">
	<div class="input-group-prepend ">
   	<div class="input-group-text" style="height:`28px;">
	OFF-
    </div>
    <input class="form-control " type="text" placeholder="99"id="idorder"  name="idorderoff" value= "<?= $qc_off["idorderqc_off"]; ?>" readonly> 
	
	</div>
	</div>
	</div> 
	

	
	<input type="hidden" class="form-control" id="id_prodqc"readonly>
	<input type="hidden" class="form-control" id="iddsbqc"readonly>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Distributor</label>
	<div class="col-sm-5">
	<input type="text" class="form-control" id="distributor" value= "<?= $qc_off["pabrik"]; ?>" readonly>
	</div>
	</div>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Pemesan</label>
	<div class="col-sm-5">
	<input type="text" class="form-control" id="instansi" value= "<?= $qc_off["pemesan_off"]; ?>" readonly>
	</div>
	</div>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Type Produk</label>
	<div class="col-sm-4">
	<input type="text" class="form-control" id="type" value= "<?= $qc_off["sing_prod"]; ?>" readonly>
	</div>
	</div>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Nama Produk </label>
	<div class="col-sm-4">
	<textarea rows="2" class="form-control" style="width:300px;" id="nama" readonly><?php echo $qc_off["nam_prod"]; ?></textarea>
	</div>
	</div>
	
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Jumlah</label>
	<div class="col-sm-1">
	<div class="input-group-prepend">
	<input class="form-control jumlah" id="jumlah" type="text" style="height:32px; width:85px;" value= "<?= $qc_off["jumlah_off"]; ?>" readonly>
	<div class="input-group-text" style="height:32px;">
	Unit
	</div>
	</div>
	</div>
	</div>	
	
</fieldset>
</td>

<td class="cd" colspan="1">  
<fieldset class="field_form">
<legend class="legend_form">Dari Gudang</legend>

	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Tanggal Terima</label>
	<div class="col-sm-8">
	<input type="date" id="tglterima_off" class="form-control" style="width:180px;" value= "<?= $qc_off["tglterima_off"]; ?>">
	</div>
	</div>
	
</fieldset>

<fieldset class="field_form">
<legend class="legend_form">Ke Gudang</legend>

	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Tanggal Serah</label>
	<div class="col-sm-8">
	<input type="date" id="tglserah_off" class="form-control"style="width:180px;" value= "<?= $qc_off["tglserah_off"]; ?>">
	</div>
	</div>	
	
</fieldset>

<fieldset class="field_form">
<legend class="legend_form">Lain-Lain</legend>	

	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Keterangan</label>
	<div class="col-sm-6">
	<textarea rows="2" id="ketqc_off"class="form-control" placeholder="Keterangan"><?php echo $qc_off["ketqc_off"]; ?></textarea>
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
<a href="./index.php?hlm=qcoff" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
</form>



<!--hidden input foreign key-->
<script src="jquery-3.2.1.min.js"></script> 
<script src="jquery-1.10.2.min.js"></script>
<script src="jquery.chained.min.js"></script>
<!-- Select2 CSS -->
<link rel="stylesheet" type="text/css" href="select2/dist/css/select2.min.css">
<!-- Select2 JS -->
<script src="select2/dist/js/select2.min.js" type="text/javascript"></script>
<script>

$("#check").submit(function(e) {
	e.preventDefault();
	
	var idorder = $("#idorder").val();
	var tglterima_off = $("#tglterima_off").val();
	var tglserah_off = $("#tglserah_off").val();
	var ketqc_off = $("#ketqc_off").val();
	var id_prodqc = $("#id_prodqc").val();
    var iddsbqc = $("#iddsbqc").val();
    var ket_log = $("#ket_log").val();
    var username = $("#username").val();
	
	

	if(idorder == "" || ket_log == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/qcoff.php",
			data: "idorder="+idorder+"&tglterima_off="+tglterima_off+"&tglserah_off="+tglserah_off+"&ketqc_off="+ketqc_off+"&id_prodqc="+id_prodqc+"&iddsbqc="+iddsbqc+"&ket_log="+ket_log+"&username="+username,
         
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
	
	</div>
	</body>
<?php
}
?>
</html>