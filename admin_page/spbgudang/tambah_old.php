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

<body onchange="rp();">
<div class="container-fluid" >
<table class="table" >
<form id="check" method="post" onchange="rp();">
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
    <label  class="col-sm-3 col-form-label">No ID *</label>
    <div class="col-sm-4 ">
    <select id="nomorgudang_spb" class="selectpicker" onchange="changeValue(this.value)">
	<option value="" >-Pilih ID-</option>
    <?php 
	$con=mysqli_connect("localhost","root","","kontrol_db");
    $result = mysqli_query($con,"SELECT * FROM spb INNER JOIN produk_master ON spb.idprod_spb = produk_master.id_prod
												   INNER JOIN admjual_spb ON spb.nospb = admjual_spb.noadm_spb ORDER BY nospb + 0 DESC");    
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="' . $row['nospb'] . '">' . $row['nospb'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['nospb'] . "'] = {
													nama:'" . addslashes($row['nam_prod']) . "',
													plg:'" . addslashes($row['pelanggan_spb']) . "',
													hrg:'" . addslashes($row['harga_spb']) . "',
													jmlh:'" . addslashes($row['jumlah_spb']) . "',
													utk:'" . addslashes($row['untuk_spb']) . "',
													idprodgdg_spb:'" .addslashes($row['id_prod'])."',
												    };\n";
	}
    ?> 
	
    </select>
    </div>
	</div>
  
	<input type="hidden" class="form-control" id="idprodgdg_spb" placeholder="Nama Distributor"readonly>
	
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
	<div class="input-group-text" style="height:28px;">
	Unit
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
	<input type="text" class="form-control"  id="nosjgdg_spb" placeholder="SPA-XXXX">
    </div>
	</div>
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tanggal Surat Jalan *</label>
    <div class="col-sm-6">
	<input type="date" class="form-control"  id="tglsjgdg_spb">
	</div>
	</div>
  
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Keterangan </label>
	<div class="col-sm-8">
	<textarea class="form-control" id="ketgdg_spb" rows="2" placeholder="Keterangan"></textarea>
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
	if(nomorgudang_spb == "" || nosjgdg_spb == "" || tglsjgdg_spb == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/tambah/gudangspb.php",
			data: "nomorgudang_spb="+nomorgudang_spb+"&nosjgdg_spb="+nosjgdg_spb+"&tglsjgdg_spb="+tglsjgdg_spb+"&ketgdg_spb="+ketgdg_spb+"&idprodgdg_spb="+idprodgdg_spb,
         
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