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
<form  method="post"  action="check_form/tambah/gudangoff.php">
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
	<select id="distributor" class="selectpicker" type="text" data-live-search="true" title="Pilih No PO" required> 
		<option value="disabled">Pilih No Purchasing Order</option>
		<?php
		$con= mysqli_connect("localhost","root","","kontrol_db");
		$query = mysqli_query($con,"SELECT * FROM admjual_off INNER JOIN spa_off ON spa_off.idorder_off = admjual_off.idorderadm_off
									INNER JOIN distributor ON distributor.iddsb= admjual_off.pabrikadm_off
									INNER JOIN produk_master ON produk_master.id_prod= admjual_off.idprodadm_off 
									WHERE NOT EXISTS (SELECT 1 FROM gudang_off WHERE gudang_off.idordergdg_off = admjual_off.idorderadm_off ) GROUP by nopo_off");
		
		
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
	<select id="idorder" class="form-control"  onchange="changeValue(this.value)" required multiple name="idorder[]">
		<option value=0>-Pilih LKPP-</option>
		<?php 
		$result = mysqli_query($con,"SELECT * FROM admjual_off INNER JOIN spa_off ON spa_off.idorder_off = admjual_off.idorderadm_off
									INNER JOIN distributor ON distributor.iddsb= admjual_off.pabrikadm_off
									INNER JOIN produk_master ON produk_master.id_prod= admjual_off.idprodadm_off 
									WHERE NOT EXISTS (SELECT 1 FROM gudang_off WHERE gudang_off.idordergdg_off = admjual_off.idorderadm_off )");
									
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
												satuan_prod:'" .addslashes($row['satuan_prod'])."',	
												};\n";
		}   
		?>
		
	</select>
	</div>
	</div>
	
	<input type="hidden" class="form-control" id="idprodgdg_off" placeholder="Nama Distributor"readonly name="idprodgdg_off">
	<input type="hidden" class="form-control" id="pabrikgdg_off" placeholder="Nama Distributor"readonly name="pabrikgdg_off">
	
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
	<input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;">
	</div>
	</div>
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
<legend class="legend_form">Data Barang</legend>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">No Surat Jalan *</label>
	<div class="input-group-prepend col-sm-6 " >
   	 <div class="input-group-text  " style="height:`28px;">SPA-</div>
	<input type="text" class="form-control harga"  id="nosj_off" placeholder="Masukkan No. SJ" name="nosj_off" required>
	</div>
	</div>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Tanggal Surat Jalan *</label>
	<div class="col-sm-4">
	<input type="date" id="tglsj_off" class="form-control total" name="tglsj_off" required >
	</div>
	</div>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Keterangan </label>
	<div class="col-sm-8">
	<textarea rows="2" class="form-control" placeholder="Keterangan" id="ketgdg_off" style="width:300px;" name="ketgdg_off"></textarea>
	</div>
	</div>
	
</fieldset>
</td>
</tr>
</table>

<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="tambah" >Tambah Data</button>	
<a href="./index.php?hlm=gudangoff" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
</form>

<script type="text/javascript">    
    <?php echo $jsArray; 
	?>  
	function changeValue(nolkpp){  
	document.getElementById('dsb').value = dtMhs[nolkpp].distributor;  
	document.getElementById('type').value = dtMhs[nolkpp].type;
	document.getElementById('nama').value = dtMhs[nolkpp].nama;
	document.getElementById('jumlah').value = dtMhs[nolkpp].jumlah;	
	document.getElementById('idprodgdg_off').value = dtMhs[nolkpp].idprodgdg_off;	
	document.getElementById('pabrikgdg_off').value = dtMhs[nolkpp].pabrikgdg_off;	
	document.getElementById('satuan_prod').value = dtMhs[nolkpp].satuan_prod;
	
	};
</script>

<script src="jquery-1.10.2.min.js"></script>

<script src="jquery.chained.min.js"></script>

<script>
    $("#idorder").chained("#distributor");
</script>


  
</body>
</html>