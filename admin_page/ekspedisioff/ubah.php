<?php 
//$con = mysqli_connect("localhost","root","","kontrol_db");
$idordereks_off = $_GET['idordereks_off'];
$data = mysqli_query($con,"SELECT * FROM ekspedisi_off 
														INNER JOIN gudang_off ON ekspedisi_off.idordereks_off = gudang_off.idordergdg_off
														INNER JOIN admjual_off ON ekspedisi_off.idordereks_off = admjual_off.idorderadm_off
														INNER JOIN spa_off ON ekspedisi_off.idordereks_off = spa_off.idorder_off
														INNER JOIN produk_master ON ekspedisi_off.idprodeks_off = produk_master.id_prod
														INNER JOIN distributor ON ekspedisi_off.pabrikeks_off = distributor.iddsb WHERE idordereks_off='$idordereks_off' ");
while ($eks_off = mysqli_fetch_array($data)) {


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
<form form id="check" method="post">
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
    <label  class="col-sm-3 col-form-label">No PO</label>
	<div class="col-sm-5">
	<input class="form-control" rows="1" id="nopo" value= "<?= $eks_off["nopo_off"]; ?>" readonly>
	</div>
	</div>
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">ID Order</label>
	<div class="col-sm-3">
	<input class="form-control" rows="1" placeholder="Nama Distributor" id="idorder"  value= "<?= $eks_off["idordereks_off"]; ?>" readonly>
	</div>
	</div>
	
	<input type="hidden" class="form-control" id="idprodeks_off" placeholder="Nama Distributor"readonly>
	<input type="hidden" class="form-control" id="pabrikeks_off" placeholder="Nama Distributor"readonly>
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Distributor</label>
	<div class="col-sm-5">
	<textarea class="form-control" rows="1" id="distributor" readonly><?php echo $eks_off["pabrik"]; ?></textarea>
	</div>
	</div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Instansi</label>
	<div class="col-sm-4">
	<input class="form-control" rows="2" id="instansi" value= "<?= $eks_off["pemesan_off"]; ?>" readonly>
	</div>
	</div>

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Type </label>
	<div class="col-sm-4">
	<input class="form-control" rows="2" id="type" value= "<?= $eks_off["sing_prod"]; ?>" readonly>
	</div>
	</div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Nama Produk</label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="2" id="nama" readonly><?php echo $eks_off["nam_prod"]; ?></textarea>
	</div>
    </div>

	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Jumlah</label>
	<div class="col-sm-2">
	<div class="input-group-prepend">
	<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;" onkeyup="rp();count();" value= "<?= $eks_off["jumlah_off"]; ?>" id="jumlah" readonly>
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
    <label  class="col-sm-3 col-form-label">Keterangan </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="2" id="keteks_off" value= "<?= $eks_off["keteks_off"]; ?>"></textarea>
	</div>
    </div>
	
</fieldset> 
</td>

</tr>	
</table>

<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Data ?');" id="tambah" name="tambah" >Update Data</button>	
<a href="./index.php?hlm=eksoff" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
</div>
</form>	

<script src="jquery-1.10.2.min.js"></script>
<!--  JS nya Jquery Chained Format  -->
<script src="jquery.chained.min.js"></script>

<script>
$("#idorder").chained("#nopo");
</script>


<script>
$("#check").submit(function(e) {
	e.preventDefault();
	var idorder = $("#idorder").val();
	var keteks_off = $("#keteks_off").val();
	var pabrikeks_off = $("#pabrikeks_off").val();
    var idprodeks_off = $("#idprodeks_off").val();
	if(idorder == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/ekspedisioff.php",
			data: "idorder="+idorder+"&keteks_off="+keteks_off+"&pabrikeks_off="+pabrikeks_off+"&idprodeks_off="+idprodeks_off,
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