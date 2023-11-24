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

<body>
<div class="container-fluid" >
<table class="table" >
<form form id="check" method="post">
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
	<div class="col-sm-1 ">
	<select type="text"  class="selectpicker"  data-live-search="true" style="width: 213px;" id="nopo" required> 
		<option value="disabled">Pilih No Purchasing Order</option>
		<?php
		$con= mysqli_connect("localhost","root","","kontrol_db");
		$query = mysqli_query($con,"SELECT nopo_off FROM admjual_off GROUP by nopo_off");
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
    <label  class="col-sm-3 col-form-label">No LKPP</label>
	<div class="col-sm-3">
	<select  class="form-control " style=" height:32px;" onchange="changeValue(this.value)" id="idorder" required >
		<option value=0>-Pilih LKPP-</option>
		<?php 		
		$result = mysqli_query($con,"SELECT * FROM admjual_off INNER JOIN spa_off ON spa_off.idorder_off = admjual_off.idorderadm_off
								INNER JOIN gudang_off ON gudang_off.idordergdg_off= admjual_off.idorderadm_off
								INNER JOIN distributor ON distributor.iddsb= admjual_off.pabrikadm_off
								INNER JOIN produk_master ON produk_master.id_prod= admjual_off.idprodadm_off  ");
		$jsArray = "var dtMhs = new Array();\n";        
		while ($row = mysqli_fetch_array($result)) {    
		echo '<option  class="'.$row['nopo_off'].'" value="' . $row['idorderadm_off'] . '">' . $row['idorderadm_off'] . '</option>';    
		$jsArray .= "dtMhs['" . $row['idorderadm_off'] . "'] = {
																distributor:'" . addslashes($row['pabrik']) . "',
																instansi:'" . addslashes($row['pemesan_off']) . "',
																type:'" . addslashes($row['sing_prod']) . "',	
																nama:'" . addslashes($row['nam_prod']) . "',	
																jumlah:'" . addslashes($row['jumlah_off']) . "',	
																nosj:'" . addslashes($row['nosj_off']) . "',	
																idprodeks_off:'" .addslashes($row['id_prod'])."',
																pabrikeks_off:'" .addslashes($row['iddsb'])."',	
																};\n";
				}   
			?>
	</select>
	</div>
	</div>
	
	<input type="hidden" class="form-control" id="idprodeks_off" placeholder="Nama Distributor"readonly>
	<input type="hidden" class="form-control" id="pabrikeks_off" placeholder="Nama Distributor"readonly>
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Distributor</label>
	<div class="col-sm-5">
	<textarea class="form-control" rows="1" placeholder="Nama Distributor" id="distributor"readonly></textarea>
	</div>
	</div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Instansi</label>
	<div class="col-sm-4">
	<input class="form-control" rows="2" placeholder="Nama Instansi" id="instansi"  readonly>
	</div>
	</div>

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Type </label>
	<div class="col-sm-4">
	<input class="form-control" rows="2" placeholder="Type Produk" id="type" readonly>
	</div>
	</div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Nama Produk</label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="2" placeholder="Nama Produk"  id="nama" readonly></textarea>
	</div>
    </div>

	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Jumlah</label>
	<div class="col-sm-2">
	<div class="input-group-prepend">
	<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;" onkeyup="rp();count();"  id="jumlah"placeholder="99" readonly >
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
	<textarea class="form-control" rows="2" placeholder="Keterangan" id="keteks_off" ></textarea>
	</div>
    </div>
	
</fieldset> 
</td>

</tr>	
</table>

<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="tambah" >Tambah Data</button>	
<a href="./index.php?hlm=eksoff" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
</div>
</form>	
 
<script type="text/javascript">    
    <?php echo $jsArray; 
	?>  
    function changeValue(nolkpp){  
	document.getElementById('distributor').value = dtMhs[nolkpp].distributor;  
	document.getElementById('instansi').value = dtMhs[nolkpp].instansi;
	document.getElementById('type').value = dtMhs[nolkpp].type;
	document.getElementById('nama').value = dtMhs[nolkpp].nama;
	document.getElementById('jumlah').value = dtMhs[nolkpp].jumlah;		
	document.getElementById('idprodeks_off').value = dtMhs[nolkpp].idprodeks_off;	
	document.getElementById('pabrikeks_off').value = dtMhs[nolkpp].pabrikeks_off;			
	};
</script>

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
			url: "check_form/tambah/ekspedisioff.php",
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
</html>