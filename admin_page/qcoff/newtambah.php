<html>
<head>
<title>Gudang Tambah</title>
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
<legend>Tambah Data</legend>
<p id="error_message" class="font-weight-bold text-danger"></p>
<p id="success_message" class="font-weight-bold text-success"></p>
</fieldset>

<tr>
<td class="cd" colspan="1">
<fieldset class="field_form">
<legend class="legend_form">Info Produk</legend>

	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">No PO *</label>
	<div class="col-sm-1">
	<select id="distributor" class="selectpicker" type="text" data-live-search="true" title="Pilih No PO" > 
		<option value="disabled">Pilih No Purchasing Order</option>
		<?php
		$query = mysqli_query($con,"SELECT * FROM admjual_off 
									WHERE NOT EXISTS (SELECT 1 FROM qc_off WHERE qc_off.idorderqc_off = admjual_off.idorderadm_off
									GROUP by nopo_off )");
		while ($row = mysqli_fetch_array($query)) {
		?>
		<option value="<?php echo $row['nopo_off']; ?>"><?php echo $row['nopo_off']; ?></option>
		<?php
		}
		?>
	</select>
	</div>
	</div>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">ID Order *</label>
	<div class="col-sm-3">
	<select id="idorder" class="form-control"  onchange="changeValue(this.value)" required >
		<option value=0>-Pilih LKPP-</option>
		<?php 
		$result = mysqli_query($con,"SELECT * FROM admjual_off INNER JOIN spa_off ON spa_off.idorder_off = admjual_off.idorderadm_off
									INNER JOIN distributor ON distributor.iddsb= admjual_off.pabrikadm_off
									INNER JOIN produk_master ON produk_master.id_prod= admjual_off.idprodadm_off
									WHERE NOT EXISTS (SELECT 1 FROM qc_off WHERE qc_off.idorderqc_off = admjual_off.idorderadm_off )
									ORDER BY idorderadm_off + 0 DESC



									");    
		$jsArray = "var dtMhs = new Array();\n";        
		while ($row = mysqli_fetch_array($result)) {    
			echo '<option  class="'.$row['nopo_off'].'" value="' . $row['idorderadm_off'] . '">OFF-' . $row['idorderadm_off'] . '</option>';    
			$jsArray .= "dtMhs['" . $row['idorderadm_off'] . "'] = {
												distributor:'" . addslashes($row['pabrik']) . "',
												instansi:'" . addslashes($row['pemesan_off']) . "',
												nama:'" . addslashes($row['nam_prod']) . "',	
												jumlah:'" . addslashes($row['jumlah_off']) . "',	
												type:'". addslashes($row['sing_prod']). "',
												idprodgdg_off:'" .addslashes($row['id_prod'])."',
												pabrikgdg_off:'" .addslashes($row['iddsb'])."',	
												};\n";
		}   
		?>
	</select>
	</div>
	</div>
	
	<input type="hidden" class="form-control" id="id_prodqc" placeholder="Nama Distributor"readonly>
	<input type="hidden" class="form-control" id="iddsbqc" placeholder="Nama Distributor"readonly>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Type Produk</label>
	<div class="col-sm-4">
	<input type="text" rows="2" class="form-control" placeholder="Tipe Produk" id="type" style="width:150px;" readonly>
	</div>
	</div>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Nama Produk</label>
	<div class="col-sm-4">
	<textarea rows="2" class="form-control" placeholder="Nama Produk" id="nama" style="width:300px;" readonly></textarea>
	</div>
	</div>
	
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Jumlah</label>
	<div class="col-sm-1">
	<div class="input-group-prepend">
	<input class="form-control jumlah" id="jumlah"  type="text"  style="height:32px; width:85px;" placeholder="Jumlah" readonly>
	<div class="input-group-text" style="height:32px;">
	Unit
	</div>
	</div>
	</div>
	</div>	
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Pemesan</label>
	<div class="col-sm-5">
	<input type="text" class="form-control" id="instansi" placeholder="Pemesan"readonly>
	</div>
	</div>
	
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Distributor</label>
	<div class="col-sm-4">
	<textarea rows="2" class="form-control" placeholder="Nama Distributor" id="dsb" style="width:300px;" readonly></textarea>
	</div>
	</div>	
	
</fieldset>
</td>

<td class="cd" colspan="1">    
<fieldset class="field_form">
<legend class="legend_form">Dari Gudang</legend>

	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Tanggal Terima *</label>
	<div class="col-sm-8">
	<input type="date" id="tglterima_off" class="form-control" style="width:180px;" >
	</div>
	</div>
	
</fieldset>

<fieldset class="field_form">
<legend class="legend_form">Ke Gudang</legend>

	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Tanggal Serah</label>
	<div class="col-sm-8">
	<input type="date" id="tglserah_off" class="form-control"style="width:180px;" >
	</div>
	</div>	
	
</fieldset>

<fieldset class="field_form">
<legend class="legend_form">Lain-Lain</legend>	

	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Keterangan</label>
	<div class="col-sm-6">
	<textarea rows="2" id="ketqc_off"class="form-control" placeholder="Keterangan"></textarea>
	</div>
	</div>
	
</fieldset>
</td>

</tr>
</table>

<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="tambah" >Tambah Data</button>	
<a href="./index.php?hlm=qcoff" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
</form>

<script type="text/javascript">    
    <?php echo $jsArray; 
	?>  
	function changeValue(nolkpp){  
	document.getElementById('dsb').value = dtMhs[nolkpp].distributor; 
document.getElementById('instansi').value = dtMhs[nolkpp].instansi;	
	document.getElementById('type').value = dtMhs[nolkpp].type;
	document.getElementById('nama').value = dtMhs[nolkpp].nama;
	document.getElementById('jumlah').value = dtMhs[nolkpp].jumlah;	
	document.getElementById('id_prodqc').value = dtMhs[nolkpp].idprodgdg_off;	
	document.getElementById('iddsbqc').value = dtMhs[nolkpp].pabrikgdg_off;	
	};
</script>

<script src="jquery-1.10.2.min.js"></script>

<script src="jquery.chained.min.js"></script>

<script>
    $("#idorder").chained("#distributor");
</script>


<script>
$("#check").submit(function(e) {
	e.preventDefault();
	var idorder = $("#idorder").val();
	var tglterima_off = $("#tglterima_off").val();
	var tglserah_off = $("#tglserah_off").val();
	var ketqc_off = $("#ketqc_off").val();
	var id_prodqc = $("#id_prodqc").val();
	var iddsbqc = $("#iddsbqc").val();
	
	
	
	if(idorder == "" || tglterima_off == ""){
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/tambah/qcoff.php",
			data: "idorder="+idorder+"&tglterima_off="+tglterima_off+"&tglserah_off="+tglserah_off+"&ketqc_off="+ketqc_off+"&id_prodqc="+id_prodqc+"&iddsbqc="+iddsbqc,
         
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