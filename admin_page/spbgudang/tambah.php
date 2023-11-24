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
<form  method="post"  action="check_form/tambah/gudangspb.php">


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
	<label  class="col-sm-3 col-form-label">No PO *</label>
	<div class="col-sm-1">
	<select id="distributor" class="selectpicker" type="text" data-live-search="true" title="Pilih No PO" required> 
		 <option value="s">Pilih No Purchasing Order</option>
			 
			 <?php
				
                $query = mysqli_query($con,"SELECT nopo_spb FROM admjual_spb  WHERE NOT EXISTS ( SELECT 1 FROM gudang_spb WHERE gudang_spb.nogdg_spb = admjual_spb.noadm_spb ) GROUP by nopo_spb");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['nopo_spb']; ?>"><?php echo $row['nopo_spb']; ?></option>
                <?php
                }
                ?>
	</select>
	</div>
	</div>
	
	
	

	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">ID Order *</label>
	<div class="col-sm-3">
	<select id="nomorgudang_spb" class="form-control"  onchange="changeValue(this.value)" required multiple selected name="nomorgudang_spb[]">
		<option value=0 >-Pilih ID-</option>
    <?php 
	
	
									
    $result = mysqli_query($con,"							SELECT * FROM admjual_spb JOIN spb ON spb.nospb = admjual_spb.noadm_spb  
											               JOIN produk_master ON produk_master.id_prod = admjual_spb.idprodadm_spb 
														    WHERE NOT EXISTS ( SELECT 1 FROM gudang_spb WHERE gudang_spb.nogdg_spb = admjual_spb.noadm_spb ) 
														   
														   
														   ");    
								 											
								
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysqli_fetch_array($result)) {    
        echo '<option class="'.$row['nopo_spb'].'" value="' . $row['nospb'] . '">' . $row['nospb'] . '</option>';    
		$jsArray .= "dtMhs['" . $row['nospb'] . "'] = {
													nama:'" . addslashes($row['nam_prod']) . "',
													plg:'" . addslashes($row['pelanggan_spb']) . "',
													hrg:'" . addslashes($row['harga_spb']) . "',
													jmlh:'" . addslashes($row['jumlah_spb']) . "',
													utk:'" . addslashes($row['untuk_spb']) . "',
													idprodqc_spb:'" .addslashes($row['id_prod'])."',
													satuan_prod:'" .addslashes($row['satuan_prod'])."',
												    
													};\n";
	}
    ?> 
	</select>
	</div>
	</div>
  
	<input type="hidden" class="form-control" id="idprodgdg_spb" name="idprodgdg_spb" placeholder="Nama Distributor"readonly>
	
    <div class="form-group row">
	<label  class="col-sm-3 col-form-label">Nama Produk </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="2" placeholder="Nama Produk" id="nmprd"  readonly ></textarea>
	</div>
	</div>

    <div class="form-group row">
	<label  class="col-sm-3 col-form-label">Pelanggan </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="1" placeholder="Pelanggan" id="pelanggan"  readonly ></textarea>
	</div>
	</div>
  
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Untuk </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="1" placeholder="Untuk" id="untuk"  readonly ></textarea>
	</div>
	</div>
 
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Jumlah</label>
	<div class="col-sm-2">
	<div class="input-group-prepend">
	<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"  id="jumlah"placeholder="99" readonly>
	<input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;">

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
      <div class="input-group-prepend col-sm-6 " >
   	 <div class="input-group-text  " style="height:`28px;">B.</div>
     <input type="text" class="form-control harga"  id="nosjgdg_spb" placeholder="Masukkan No. SJ"  required name="nosjgdg_spb">
     </div>
     </div> 
	 
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tanggal Surat Jalan *</label>
    <div class="col-sm-6">
	<input type="date" class="form-control"  id="tglsjgdg_spb" name="tglsjgdg_spb" required>
	</div>
	</div>
  
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Keterangan </label>
	<div class="col-sm-8">
	<textarea class="form-control" id="ketgdg_spb" rows="2" placeholder="Keterangan" name="ketgdg_spb"></textarea>
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
	document.getElementById('satuan_prod').value = dtMhs[no].satuan_prod;
	document.getElementById('idprodgdg_spb').value = dtMhs[no].idprodqc_spb;
	};
</script>

<script src="jquery-1.10.2.min.js"></script>
  




 <script src="jquery.chained.min.js"></script>
 


<script>
    $("#nomorgudang_spb").chained("#distributor");
</script>
</body>
</html>