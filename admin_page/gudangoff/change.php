<?php
//$con = mysqli_connect("localhost","root","","kontrol_db");

$idordergdg_off = $_GET['idordergdg_off'];

$data = mysqli_query($con,"SELECT * FROM gudang_off INNER JOIN admjual_off ON gudang_off.idordergdg_off = admjual_off.idorderadm_off 
											   INNER JOIN spa_off ON spa_off.idorder_off = gudang_off.idordergdg_off
											   INNER JOIN distributor ON distributor.iddsb = gudang_off.pabrikgdg_off
											   INNER JOIN produk_master ON produk_master.id_prod = gudang_off.idprodgdg_off where idordergdg_off='$idordergdg_off' ");
while ($gdg_off = mysqli_fetch_array($data)) {

?>
<html>
<head>
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
<p id="success_message" class="font-weight-bold text-success"></p>
</fieldset>

<tr>
<td class="cd" colspan="1">
<fieldset class="field_form">
<legend class="legend_form">Info Produk</legend>

	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">No PO</label>
	<div class="col-sm-4">
	<input type="text" rows="2" class="form-control" id="distributor" value= "<?= $gdg_off["nopo_off"]; ?>" readonly>
	</div>
	</div>
	
	
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >ID Order</label>
	<div class="col-sm-2">
	<div class="input-group-prepend ">
   	<div class="input-group-text" style="height:`28px;">
	OFF-
    </div>
    <input class="form-control " type="text" placeholder="99" id="idorder" name="idorderoff" value= "<?= $gdg_off["idordergdg_off"]; ?>" readonly>
	 <span id="availability"></span>
	</div>
	</div>
	</div> 
	
	<input type="hidden" id="idprodgdg_off" readonly>
	<input type="hidden" id="pabrikgdg_off" readonly>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Tipe Produk</label>
	<div class="col-sm-4">
	<input type="text" rows="2" class="form-control" id="type" value= "<?= $gdg_off["sing_prod"]; ?>" readonly>
	</div>
	</div>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Nama Produk</label>
	<div class="col-sm-4">
	<textarea rows="2" class="form-control" placeholder="Nama Produk" id="nama" readonly><?php echo $gdg_off["nam_prod"]; ?></textarea>
	</div>
	</div>
	
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Jumlah</label>
	<div class="col-sm-1">
	<div class="input-group-prepend">
	<input class="form-control jumlah" id="jumlah"  type="text"  style="height:32px; width:85px;" value= "<?= $gdg_off["jumlah_off"]; ?>" placeholder="Jumlah" readonly>
		 <input  value="<?= $gdg_off["satuan_prod"]; ?>" class="input-group-text " readonly style="height:28px; width:60px;">
	</div>
	</div>
	</div>
	</div>	
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Distributor</label>
	<div class="col-sm-4">
	<textarea rows="2" class="form-control" id="dsb" style="width:300px;" readonly><?php echo $gdg_off["pabrik"]; ?></textarea>
	</div>
	</div>	
	
</fieldset>
</td>

<td class="cd" colspan="1">  
<fieldset class="field_form">
<legend class="legend_form">Data Barang</legend>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">No Surat Jalan</label>
	<div class="col-sm-3">
	<input type="text" class="form-control harga"  id="nosj_off" value= "<?= $gdg_off["nosj_off"]; ?>">
	</div>
	</div>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Tanggal Surat Jalan</label>
	<div class="col-sm-4">
	<input type="date" id="tglsj_off" class="form-control total" value= "<?= $gdg_off["tglsj_off"]; ?>">
	</div>
	</div>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Keterangan </label>
	<div class="col-sm-8">
	<textarea rows="2" class="form-control" placeholder="Keterangan" id="ketgdg_off" style="width:300px;"><?php echo $gdg_off["ketgdg_off"]; ?></textarea>
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
<a href="./index.php?hlm=gudangoff" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
</form>

<script src="jquery-1.10.2.min.js"></script>

<script src="jquery.chained.min.js"></script>

<script>
    $("#idorder").chained("#distributor");
</script>

<script>
$("#check").submit(function(e) {
	e.preventDefault();
	var idorder = $("#idorder").val();
	var nosj_off = $("#nosj_off").val();
	var tglsj_off = $("#tglsj_off").val();
	var ketgdg_off = $("#ketgdg_off").val();
	var pabrikgdg_off = $("#pabrikgdg_off").val();
    var idprodgdg_off = $("#idprodgdg_off").val();
    var ket_log = $("#ket_log").val();
    var username = $("#username").val();
	
	if(idorder == "" || nosj_off == "" || ket_log == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/gudangoff.php",
			data: "idorder="+idorder+"&nosj_off="+nosj_off+"&tglsj_off="+tglsj_off+"&ketgdg_off="+ketgdg_off+"&pabrikgdg_off="+pabrikgdg_off+"&idprodgdg_off="+idprodgdg_off+"&ket_log="+ket_log+"&username="+username,
         
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