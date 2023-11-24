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


				   input[id=idprodcoo_off]{
display: none;
	               }
				   input[id=pabrikcoo_off]{
display: none;
	               }
</style>
<body>

<div class="container-fluid" >
<table class="table">
<form  method="post" action="check_form/tambah/detailcoooff.php">
<fieldset>
<legend>Tambah Data</legend>
</fieldset>

<tr>
<td class="cd" colspan="1">  
<fieldset class="field_form">
<legend class="legend_form">Info Produk</legend>
 
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">ID Order</label>
    <div class="col-sm-4 ">
	<select class="selectpicker"  style=" height:28px;" id="idorders" name="idorders" onchange="changeValue(this.value)"  data-live-search="true" required>
	<option value="">-Pilih ID Order-</option>
	<?php 
	$con = mysqli_connect("localhost","root","","kontrol_db");
    $result = mysqli_query($con, "SELECT * FROM spa_off INNER JOIN gudang_off ON gudang_off.idordergdg_off = spa_off.idorder_off
													    INNER JOIN distributor ON distributor.iddsb= gudang_off.pabrikgdg_off
													    INNER JOIN produk_master ON produk_master.id_prod= spa_off.idprod_off");    
    $jsArray = "var dtMhs = new Array();\n";
	
	
    while ($row = mysqli_fetch_array($result)) {  

	$array_bulan = array(1=>"Januari","Februari","Maret", "Aprril", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
	
   
		
		$date=date_create($row['tglsj_off']);
		$date2 =  date_format($date,"m");
		$bulan = $array_bulan[date(''.$date2.'')];

		
        echo '<option value="' . $row['idorder_off'] . '">' . $row['idorder_off'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['idorder_off'] . "'] = {
														 distributor:'" . addslashes($row['pabrik']) . "',
														 jumlah:'" . addslashes($row['jumlah_off']) . "',
														 alias:'" . addslashes($row['sing_prod']) . "',														 
														 namaprd:'" . addslashes($row['nam_prod']) . "',
														 noakd:'" . addslashes($row['noakd']) . "',												
														 noid:'" . addslashes($row['idorder_off']) . "',
														 bulan:'" . addslashes($bulan) . "',
														 kepada:'" . addslashes($row['pemesan_off']) . "',
														 tglsj:'" . addslashes($row['tglsj_off']) . "',
														 namacoo:'" . addslashes($row['namacoo']) . "',
														 idprodcoo_off:'" .addslashes($row['id_prod'])."',
														 pabrikcoo_off:'" .addslashes($row['iddsb'])."',	
														 satuan_prod:'" .addslashes($row['satuan_prod'])."',	
														 
															};\n";
	}   
    ?>
	</select>
    </div>
	</div>
	
	

	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">No AKD</label>
	<div class="col-sm-6">
	<input type="text" class="form-control harga"  name="noakd"  placeholder="No AKD" id="noakd" readonly>
	</div>
	</div> 
  
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Type Produk</label>
	<div class="col-sm-6">
	<input type="text" class="form-control harga"  name="type"  placeholder="Type Produk" id="type" readonly>
	</div>
	</div> 
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Nama Produk </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="2" placeholder="Nama Produk" name="nmprd" readonly id="nmprd" ></textarea>
	</div>
	</div>
 
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Jumlah</label>
	<div class="col-sm-2">
	<div class="input-group-prepend">
	<input class="form-control tarifdiskon"  type="text"  style="height:28px; width:70px;"  name="jumlah" id="jumlah"  placeholder="99" readonly>
		<input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;">
  
	</div>
	</div>
	</div> 
 

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">No Series</label>
    <div class="col-sm-1 ">
	 <select   id="noseri"  onchange="changeSeri(this.value)" name="noseri[]"  placeholder="tes" size=6 multiple selected required>
	
		<?php 
		$con = mysqli_connect("localhost","root","","kontrol_db");
		$result = mysqli_query($con, "SELECT * FROM spa_off 
											INNER JOIN seri_off ON spa_off.idorder_off=seri_off.idorderfk_off WHERE statusserioff = '1'" );    
		$jsarrays = "var dtseri = new Array();\n";        
		while ($row = mysqli_fetch_array($result)) {    
        echo '<option    class="' . $row['idorder_off'] . '" value="' . $row['idseri_off'] . '">' . $row['noseri_off'] . '</option>';    
        $jsarrays .= "dtseri['" . $row['noseri_off'] . "'] = {
														 pk_seri:'" . addslashes($row['idseri_off']) . "',
														};\n";
	}   
    ?>
	</select>
    </div>
	</div>
</fieldset>
</td>

  
<td class="cd" colspan="1">  
<fieldset class="field_form">
<legend class="legend_form">Info COO</legend>

	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Distributor </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="1" placeholder="Distributor" name="dsb"  id="dsb" readonly ></textarea>
	</div>
	</div>
  
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">No ID</label>
	<div class="col-sm-6">
	<input type="text" class="form-control harga"  name="noaks"  placeholder="No AKS" id="noaks" readonly>
	</div>
	</div> 
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Kepada </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="1" placeholder="Kepada" name="kepada"  id="kepada" readonly ></textarea>
	</div>
	</div>
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Tgl Surat Jalan</label>
	<div class="col-sm-6">
	<input type="text" class="form-control harga"  name="tglsj" id="tglsj" placeholder="No Surat Jalan" readonly>
	</div>
	</div> 


<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Bulan *</label>
   
	<div class="col-sm-4 ">
    <input type="text" class="form-control"  id="bulan"  placeholder="No Surat Jalan" readonly>
    </div>
	</div>
	
</fieldset>
</td>
</tr>	
</table>


<input type="text" name="pabrikcoo_off" id="pabrikcoo_off">
<input type="text" name="idprodcoo_off" id="idprodcoo_off">

<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="submit" >Tambah Data</button>
<a href="./index.php?hlm=detoff" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>

</div>
</form>	

<script type="text/javascript">    
  
	<?php echo $jsArray; ?>  
    function changeValue(nolkpp){  
	document.getElementById('idprodcoo_off').value = dtMhs[nolkpp].idprodcoo_off;	
	document.getElementById('pabrikcoo_off').value = dtMhs[nolkpp].pabrikcoo_off;
	document.getElementById('dsb').value = dtMhs[nolkpp].distributor;
	document.getElementById('jumlah').value = dtMhs[nolkpp].jumlah;
	document.getElementById('satuan_prod').value = dtMhs[nolkpp].satuan_prod;
	document.getElementById('type').value = dtMhs[nolkpp].alias;
	document.getElementById('bulan').value = dtMhs[nolkpp].bulan;
	document.getElementById('nmprd').value = dtMhs[nolkpp].namaprd;
	document.getElementById('noakd').value = dtMhs[nolkpp].noakd;
	document.getElementById('noaks').value = dtMhs[nolkpp].noid;
	document.getElementById('kepada').value = dtMhs[nolkpp].kepada;
	document.getElementById('tglsj').value = dtMhs[nolkpp].tglsj;
	document.getElementById('namacoo').value = dtMhs[nolkpp].namacoo;
	
		
	};  

</script> 
	
<script type="text/javascript">    
	<?php echo $jsarrays; ?>  
	function changeSeri(noseri_off){  
	document.getElementById('pk_seri').value = dtseri[noseri_off].pk_seri;
	};  
</script> 

<script src="jquery-1.10.2.min.js"></script>
<script src="jquery.chained.min.js"></script>
<script>
	$("#noseri").chained("#idorders");
</script>


  


</body>
</html>