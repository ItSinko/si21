<html>
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
</style>
<body onchange="rp();">

<div class="container-fluid">
<table class="table">

<form id="check" method="post" onchange="rp();">
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
    <label  class="col-sm-3 col-form-label">No ID</label>
    <div class="col-sm-4 ">
    <select id="nomorspb" class="selectpicker" onchange="changeValue(this.value)" >
	<option value="" >-Pilih ID-</option>
    <?php 
	$con=mysqli_connect("localhost","root","","kontrol_db");
    $result = mysqli_query($con,"SELECT * FROM spb INNER JOIN produk_master ON spb.idprod_spb = produk_master.id_prod ORDER BY nospb + 0 DESC");    
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="' . $row['nospb'] . '">' . $row['nospb'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['nospb'] . "'] = {
													nama:'" . addslashes($row['nam_prod']) . "',
													plg:'" . addslashes($row['pelanggan_spb']) . "',
													hrg:'" . addslashes($row['harga_spb']) . "',
													jmlh:'" . addslashes($row['jumlah_spb']) . "',
													utk:'" . addslashes($row['untuk_spb']) . "',
													satuan_prod:'" . addslashes($row['satuan_prod']) . "',
													idprodadm_spb:'" .addslashes($row['id_prod'])."',
												    };\n";
	}
    ?> 
    </select>
    </div>
	</div>
  
	<input type="hidden" class="form-control" id="idprodadm_spb" placeholder="Nama Distributor"readonly>
   
    <div class="form-group row">
	<label  class="col-sm-3 col-form-label">Nama Produk </label>
    <div class="col-sm-8">
    <textarea class="form-control" rows="2" placeholder="Nama Produk" id="nmprd"  readonly></textarea>
    </div>
    </div>

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Pelanggan </label>
    <div class="col-sm-8">
    <textarea class="form-control" rows="1" placeholder="Pelanggan" id="pelanggan"  readonly></textarea>
    </div>
    </div>
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Untuk </label>
    <div class="col-sm-8">
    <textarea class="form-control" rows="1" placeholder="Untuk" id="untuk"  readonly></textarea>
    </div>
    </div>
  
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Jumlah</label>
    <div class="col-sm-2">
	<div class="input-group-prepend">
    <input class="form-control"  type="text"  style="height:28px; width:70px;"  id="jumlah" placeholder="99" readonly>
	<input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;">
  
	</div>
	</div>
	</div>
	</fieldset>
	</td>

	<td class="cd" colspan="1">  
	<fieldset class="field_form">
	<legend class="legend_form">PO ( Purchasing Order )</legend>

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">PO *</label>
    <div class="col-sm-6">
    <input type="text" class="form-control"  id="nopo_spb" placeholder="No PO">
    </div>
	</div>

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tanggal PO</label>
    <div class="col-sm-6">
	<input type="date" class="form-control"  id="tglpo_spb">
    </div>
	</div> 
	</fieldset>
  
	<fieldset class="field_form">
	<legend class="legend_form">DO ( Delivery Order ) / SPK</legend>

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">DO / SPK *</label>
    <div class="col-sm-6">
	
	<input type="text" class="form-control" id="nodo_spb" placeholder="No DO">
    </div>
	</div>

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tanggal DO</label>
    <div class="col-sm-6">
	<input type="date" class="form-control"  id="tgldo_spb">
    </div>
	</div> 
	
</fieldset> 
</td>

<td class="cd">
<fieldset class="field_form">
<legend class="legend_form">Lain Lain</legend>

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Telphone</label>
    <div class="col-sm-6">
	<input type="text" class="form-control"  id="telp_spb" placeholder="No Telp">
    </div>
	</div>

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">SMS / WhatsApp</label>
    <div class="col-sm-6">
	<input type="text" class="form-control"  id="sms_spb" placeholder="No HP / WA">
    </div>
	</div>
  
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Keterangan </label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="2" id="ket_admspb" placeholder="Keterangan"></textarea>
	</div>
	</div>
	
</fieldset>
</td>
</tr>	
</table>

<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="tambah" >Tambah Data</button>	
<a href="./index.php?hlm=admspb" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
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
	document.getElementById('idprodadm_spb').value = dtMhs[no].idprodadm_spb;
	};
	</script>

<script>

$("#check").submit(function(e) {
	e.preventDefault();
	var nomorspb = $("#nomorspb").val();
	var telp_spb = $("#telp_spb").val();
	var sms_spb = $("#sms_spb").val();
	var nopo_spb = $("#nopo_spb").val();
	var tglpo_spb = $("#tglpo_spb").val();
    var nodo_spb = $("#nodo_spb").val();
	var tgldo_spb = $("#tgldo_spb").val();
	var ket_admspb = $("#ket_admspb").val();
	var idprodadm_spb = $("#idprodadm_spb").val();

	if(nomorspb == "" || nopo_spb == "" || tglpo_spb == "" || nodo_spb == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/tambah/admspb.php",
			data: "nomorspb="+nomorspb+"&telp_spb="+telp_spb+"&sms_spb="+sms_spb+"&nopo_spb="+nopo_spb+"&tglpo_spb="+tglpo_spb+"&nodo_spb="+nodo_spb+"&tgldo_spb="+tgldo_spb+"&ket_admspb="+ket_admspb+"&idprodadm_spb="+idprodadm_spb,
         
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