<html>
<head>
<title>Tambah</title>
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

	</style>



<body>


<div class="container-fluid" >
<table class="table" >
<form>
<fieldset >
<legend>Tambah Data</legend>
<p id="error_message" class="font-weight-bold text-danger"></p>
<p  id="success_message" class="font-weight-bold text-success"></p>
</fieldset>
<tr>
<td colspan="1" class="cd">  
<fieldset class="field_form">
<legend class="legend_form">Info Produk</legend>

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">No AKS</label>
		<div class="col-sm-1 ">
		<select id='noaks' class="selectpicker" type="text"  name="noaksadm"  data-live-search="true" title="Pilih AKS"  > 
	      	<option value="disabled">Pilih No AKS</option>
            <?php
			$con= mysqli_connect("localhost","root","","kontrol_db");
            $query = mysqli_query($con,"SELECT * FROM spa_on GROUP by noaks_on");
            while ($row = mysqli_fetch_array($query)) {
            ?>
            <option value="<?php echo $row['noaks_on']; ?>"><?php echo $row['noaks_on']; ?></option>
            <?php
            }
            ?>	
		</select>
		</div>
	</div>



	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">No LKPP</label>
		<div class="col-sm-3 ">
		<select id="nolkpp" class="form-control"  onchange="changeValue(this.value)" >
			<option value=0>-Pilih LKPP-</option>
			<?php 
			$con = mysqli_connect("localhost","root","","kontrol_db");
			$result = mysqli_query($con,"SELECT * FROM spa_on INNER JOIN distributor ON spa_on.pabrik_on = distributor.iddsb 
													INNER JOIN produk_master ON spa_on.idprod_on = produk_master.id_prod
													");	
			$jsArray = "var dtMhs = new Array();\n";        
			while ($row = mysqli_fetch_array($result)) {    
			echo '<option  class="'.$row['noaks_on'].'" value="' . $row['nolkpp_on'] . '">' . $row['nolkpp_on'] . '</option>';    
			$jsArray .= "dtMhs['" . $row['nolkpp_on'] . "'] = {
														distributor:'" . addslashes($row['pabrik']) . "',
														instansi:'" . addslashes($row['instansi_on']) . "',
														type:'" . addslashes($row['sing_prod']) . "',	
														nama:'" . addslashes($row['nam_prod']) . "',	
														jumlah:'" . addslashes($row['jumlah_on']) . "',	
														idprodgdg_off:'" .addslashes($row['id_prod'])."',
														pabrikgdg_off:'" .addslashes($row['iddsb'])."',		
														};\n";
			}   
			?>
		</select>
		</div>
	</div>
	<input type="hidden" class="form-control" id="idprodgdg_off" placeholder="Nama Distributor"readonly>
	<input type="hidden" class="form-control" id="pabrikgdg_off" placeholder="Nama Distributor"readonly>
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Distributor</label>
		<div class="col-sm-5">
		<textarea class="form-control" rows="1" placeholder="Nama Distributor" id="distributor"readonly></textarea>
		</div>
	</div>
  
 
  
    
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Instansi</label>
		<div class="col-sm-8">
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
			<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"  id="jumlah"placeholder="99" readonly>
			<div class="input-group-text" style="height:28px;">
			Unit
			</div>
		</div>
		</div>
	</div> 
</td>
 
<td colspan="1" class="cd">  

<fieldset class="field_form">
<legend class="legend_form">Data Barang</legend>

	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">No Surat Jalan</label>
		<div class="col-sm-6">
		<input type="text" class="form-control"  id="nosj_off" placeholder="SPA-XXXX">
		</div>
	</div>

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tanggal SJ</label>
		<div class="col-sm-4">
		<input type="date" class="form-control"  id="tglsj_off"  >
		</div>
	</div> 
	
	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Keterangan</label>
		<div class="col-sm-6">
		<textarea type="text" class="form-control"  id="ketgdg_off" placeholder="Keterangan"></textarea>
		</div>
	</div>
	
</fieldset> 

</td>
</tr>	
</table>

<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="tambah" >Tambah Data</button>	

</form>
</div>
<script type="text/javascript">    
    <?php echo $jsArray; 
	
	?>  
    function changeValue(nolkpp){  
 
	document.getElementById('distributor').value = dtMhs[nolkpp].distributor;  
	document.getElementById('instansi').value = dtMhs[nolkpp].instansi;
	document.getElementById('type').value = dtMhs[nolkpp].type;
	document.getElementById('nama').value = dtMhs[nolkpp].nama;
	document.getElementById('jumlah').value = dtMhs[nolkpp].jumlah;		
	document.getElementById('idprodgdg_off').value = dtMhs[nolkpp].idprodgdg_off;	
	document.getElementById('pabrikgdg_off').value = dtMhs[nolkpp].pabrikgdg_off;			
		
	};

</script>
<script src="jquery-1.10.2.min.js"></script>
<script src="jquery.chained.min.js"></script>
<script>
	$("#nolkpp").chained("#noaks");
</script>
<script>

$("#check").submit(function(e) {
	e.preventDefault();
	
	var idorder = $("#idorder").val();
	var nosj_off = $("#nosj_off").val();
	var tglsj_off = $("#tglsj_off").val();
	var ketgdg_off = $("#ketgdg_off").val();
	var iddsb = $("#iddsb").val();
    var id_prod = $("#id_prod").val();
	
	

	if(idorder == "" || nopo_off == "" || tglpo_off == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/tambah/penjualanoff.php",
			data: "idorder="+idorder+"&nopo_off="+nopo_off+"&tglpo_off="+tglpo_off+"&nodo_off="+nodo_off+"&tgldo_off="+tgldo_off+"&ketadm_off="+ketadm_off+"&iddsb="+iddsb+"&id_prod="+id_prod,
         
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