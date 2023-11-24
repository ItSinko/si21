<html>
<head>
<title>Tambah Data</title>
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
<div class="container-fluid">
<table class="table">
<form id="check" method="post">
<fieldset>
	<legend>Tambah Data</legend>
	
	
<p id="error_message" class="font-weight-bold text-danger"></p>

<p  id="success_message" class="font-weight-bold text-success"></p>


	
</fieldset>
<tr>
<td class="cd" colspan="1">
	<fieldset class="field_form">
<legend class="legend_form">Info Produk</legend>


	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">ID Order</label>
		
		<div class="col-sm-2">
			<select type="text" id="idorder" class="form-control form-control-inline selectpicker" data-live-search="true" name="idorderadm_off" style=" height:28px; width:310px;" placeholder="Pilih ID"  onchange="changeValue(this.value);rp();count();"required>
			<option value=0>Pilih ID</option>
                <?php 
				$result = mysqli_query($con,"SELECT * FROM spa_off INNER JOIN distributor ON spa_off.pabrik_off = distributor.iddsb 
																  INNER JOIN produk_master ON spa_off.idprod_off = produk_master.id_prod
																  
																     WHERE NOT EXISTS (SELECT 1 FROM admjual_off WHERE admjual_off.idorderadm_off = spa_off.idorder_off )	
																	 ORDER BY idorder_off + 0 DESC
																	
																	");    
				$jsArray = "var dtMhs = new Array();\n";        
				while ($row = mysqli_fetch_array($result)) {    
					echo '<option value="' . $row['idorder_off'] . '">OFF-' . $row['idorder_off'] . '</option>';    
					$jsArray .= "dtMhs['" . $row['idorder_off'] . "'] = {
																	distributor:'" . addslashes($row['pabrik']) . "',
																	instansi:'" . addslashes($row['pemesan_off']) . "',
																	type:'" . addslashes($row['sing_prod']) . "',	
																	nama:'" . addslashes($row['nam_prod']) . "',
idprod_off:'" .addslashes($row['id_prod'])."',																	
																	jumlah:'" . addslashes($row['jumlah_off']) . "',	
																	
																	pabrik_off:'" .addslashes($row['iddsb'])."',	
																	satuan_prod:'" .addslashes($row['satuan_prod'])."',	
																		};\n";
				}   
				?>
			
			</select>
		</div>
	</div>
	<input type="hidden" class="form-control" id="id_prod" placeholder="Nama Distributor"readonly>
	<input type="hidden" class="form-control" id="iddsb" placeholder="Nama Distributor"readonly>
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Distributor</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="distributor" placeholder="Nama Distributor"readonly>
		</div>
	</div>
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Pemesan</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="instansi" placeholder="Nama Distributor"readonly>
		</div>
	</div>	
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Tipe Produk</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="type" placeholder="Tipe Produk"readonly>
		</div>
	</div>
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Nama Produk </label>
		<div class="col-sm-4">
			<textarea rows="2" class="form-control" placeholder="Nama Produk" style="width:300px;" id="nama" readonly></textarea>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-3 col-form-label" >Jumlah</label>
		<div class="col-sm-1">
			<div class="input-group-prepend">
				<input class="form-control jumlah" id="jumlah"  type="text"  style="height:32px; width:85px;" placeholder="Jumlah" readonly>
				<input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;" >
   
			</div>
		</div>
	</div>		
	</fieldset>
</td>

<td class="cd" colspan="1">  
	<fieldset class="field_form">
	<legend class="legend_form">Info PO</legend>
		<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Nomor PO *</label>
		<div class="col-sm-8">
			<input type="text" id="nopo_off" class="form-control" placeholder="Masukkan No PO" >
		</div>
	</div>
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Tanggal *</label>
		<div class="col-sm-8">
			<input type="date" id="tglpo_off"  class="form-control total">
		</div>
	</div>
	</fieldset>


	<fieldset class="field_form">
	<legend class="legend_form">Info DO/SPK</legend>
	
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Nomor DO/SPK</label>
		<div class="col-sm-8">
			<input type="text" id="nodo_off" class="form-control" placeholder="Masukkan No DO/SPK" >
		</div>
	</div>
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Tanggal</label>
		<div class="col-sm-8">
			<input type="date" id="tgldo_off"  class="form-control total">
		</div>
	</div>
	<div class="form-group row">
		<label  class="col-sm-3 col-form-label">Keterangan</label>
		<div class="col-sm-8">
			<textarea rows="2" id="ketadm_off"class="form-control" placeholder="Keterangan" id="ket_off"></textarea>
		</div>
	</div>
	</fieldset>
</td>
</tr>
</table>
<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah">Tambah Data</button>
<a href="./index.php?hlm=admoff" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
</form>



<script src="jquery-3.2.1.min.js"></script>



	
	<script>
           function count() {
                var harga 		= $(".harga").val();
				var jumlah		= $(".jumlah").val();
				var total		= $(".total").val();

		

			   harga   = harga.split('Rp ').join('');
			   harga   = harga.split('.').join('');

					
            
			   
			   total   = total.split('Rp ').join('');
			   total   = total.split('.').join('');

		total = Math.round(jumlah* harga); 
     $(".total").val(total);
					
                
                }
            
</script>
<script type="text/javascript">    
    <?php echo $jsArray; 
	
	?>  
    function changeValue(nolkpp){  
 
	document.getElementById('distributor').value = dtMhs[nolkpp].distributor;  
	document.getElementById('instansi').value = dtMhs[nolkpp].instansi;
	document.getElementById('type').value = dtMhs[nolkpp].type;
	document.getElementById('nama').value = dtMhs[nolkpp].nama;
	document.getElementById('jumlah').value = dtMhs[nolkpp].jumlah;		
	document.getElementById('satuan_prod').value = dtMhs[nolkpp].satuan_prod;	
	document.getElementById('id_prod').value = dtMhs[nolkpp].idprod_off;	
	document.getElementById('iddsb').value = dtMhs[nolkpp].pabrik_off;			
	
	};

</script>
  <script src="jquery-1.10.2.min.js"></script>
        <script src="jquery.chained.min.js"></script>
	
        


  
	<!-- Select2 CSS -->
	<link rel="stylesheet" type="text/css" href="select2/dist/css/select2.min.css">


	<!-- Select2 JS -->
	<script src="select2/dist/js/select2.min.js" type="text/javascript"></script>
	
	
<script>
	  
	  function rp() {
		  
		  $('#harga').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
				
				
				
				
				
			$('#total').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
	  }
</script>

<script>

$("#check").submit(function(e) {
	e.preventDefault();
	
	var idorder = $("#idorder").val();
	var nopo_off = $("#nopo_off").val();
	var tglpo_off = $("#tglpo_off").val();
	var nodo_off = $("#nodo_off").val();
	var tgldo_off = $("#tgldo_off").val();
	var ketadm_off = $("#ketadm_off").val();
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

		<!-- JS nya Jquery -->
       <script src="jquery-1.10.2.min.js"></script>

        <!--  JS nya Jquery Price Format  -->
        <script type="text/javascript" src="jquery.price_format.2.0.js"></script>
	
	
	</div>
	</body>
</html>