<?php 

$nolkppqc_on = $_GET['nolkppqc_on'];
$data = mysqli_query($con,"SELECT * FROM qc_on INNER JOIN admjual_on ON qc_on.nolkppqc_on = admjual_on.nolkppadm_on 
											   INNER JOIN spa_on ON spa_on.nolkpp_on = qc_on.nolkppqc_on
											   INNER JOIN distributor ON distributor.iddsb = qc_on.pabrikqc_on
											   INNER JOIN produk_master ON produk_master.id_prod =  qc_on.idprodqc_on where nolkppqc_on='$nolkppqc_on' ");
while ($qc_on = mysqli_fetch_array($data)) {
?>


<html>
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


 .cd:hover { background: #0000; color: #000; }  
/* Hover cell effect! */

</style>

<body >

<div class="container-fluid" >




 <table  >
<form id="check" method="post" >

<fieldset >
<legend>Ubah Data</legend>

<p id="error_message" class="font-weight-bold text-danger"></p>
<p  id="success_message" class="font-weight-bold text-success"></p>
 </fieldset>

 <tr>

  <td class="cd" colspan="1">
<fieldset class="field_form">
<legend class="legend_form">Info Produk</legend>

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No PO</label>
    <div class="col-sm-5">
    <input class="form-control" rows="2" placeholder="No PO"  value= "<?= $qc_on["nopo_on"]; ?>"  readonly>
    </div>
	</div>
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">No LKPP</label>
    <div class="col-sm-3">
    <input class="form-control" rows="2" placeholder="No LKPP" id="nolkpp" value= "<?= $qc_on["nolkppqc_on"]; ?>"  readonly>
    </div>
	</div>

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Distributor</label>
    <div class="col-sm-5">
      <textarea class="form-control" rows="1" placeholder="Nama Distributor" id="distributor"readonly><?php echo $qc_on["pabrik"]; ?></textarea>
    </div>
	</div>
  
   <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Instansi</label>
    <div class="col-sm-8">
    <input class="form-control" rows="2" placeholder="Nama Instansi" id="instansi"  value="<?= $qc_on["instansi_on"]; ?>" readonly>
    </div>
	</div>
 
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Type </label>
    <div class="col-sm-4">
      <input class="form-control" rows="2" placeholder="Type Produk"  value="<?= $qc_on["sing_prod"]; ?>"readonly>
    </div>
	</div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Nama Produk</label>
    <div class="col-sm-8">
    <textarea class="form-control" rows="2" placeholder="Nama Produk"  readonly><?php echo $qc_on["nam_prod"]; ?></textarea>
    </div>
	</div>

	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Jumlah</label>
    <div class="col-sm-2">
	<div class="input-group-prepend">
    <input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"   value="<?= $qc_on["jumlah_on"]; ?>" id="jumlah" placeholder="99" readonly>
	<input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;"  value="<?= $qc_on["satuan_prod"]; ?>">
	</div>
	</div>
	</div> 
	</td>
  
     <td class="cd" colspan="1">  
	 <fieldset class="field_form">
	 <legend class="legend_form">Terima dari Gudang</legend>
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Tanggal Terima *</label>
     <div class="col-sm-6">
     <input type="date" class="form-control harga"  id="tglterima" placeholder="XXXX/XX/XXXX/2019"   value="<?= $qc_on["tglterima_on"]; ?>"  >
     </div>
	 </div>
     </fieldset>
  
	 <fieldset class="field_form">
	 <legend class="legend_form">Penyerahan ke Gudang</legend>
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Tanggal Serah *</label>
     <div class="col-sm-6">
     <input type="date" class="form-control harga"  id="tglserah" placeholder="XXXX/XX/XXXX/2019"    value="<?= $qc_on["tglserah_on"]; ?>"  >
     </div>
	 </div>
	 </fieldset> 
  
  
     <fieldset class="field_form">
     <legend class="legend_form">Lain Lain</legend>
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Keterangan </label>
     <div class="col-sm-8">
	 
     <textarea class="form-control" rows="2" placeholder="Keterangan" id="ket" ><?= $qc_on["ketqc_on"]; ?></textarea>
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
	 
	 <input type="hidden" id="idprod_on" value="<?= $qc_on["idprodqc_on"]; ?>">
	 <input type="hidden" id="idpabrik_on" value="<?= $qc_on["pabrikqc_on"]; ?>">
	  <input type="hidden" value="<?php echo $_SESSION['username'] ?>"  id="username" >
	  
	<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Ubah Data ?');" id="tambah" name="tambah" >Ubah</button>	
	 
     <a href="./index.php?hlm=qcon" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a> 
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
	document.getElementById('idprod_on').value = dtMhs[nolkpp].idprod_on;	
	document.getElementById('idpabrik_on').value = dtMhs[nolkpp].pabrik_on;			
	};
    </script>
  
	 <script src="jquery-1.10.2.min.js"></script>
	 	 
	 <script src="jquery.chained.min.js"></script>
	 
	 <script>
     $("#nolkpp").chained("#nopo");
     </script>
		
		
 	<script>
	$("#check").submit(function(e) {
	e.preventDefault();
	
	var nolkpp = $("#nolkpp").val();
	var tglserah = $("#tglserah").val();
	var tglterima = $("#tglterima").val();
	var idprod_on = $("#idprod_on").val();
	var idpabrik_on = $("#idpabrik_on").val();
	var ket = $("#ket").val();
	var ket_log = $("#ket_log").val();
	var username = $("#username").val();

	if(tglserah == "" ||tglterima == "" ||ket_log == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
		} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/qc.php",
			data: "nolkpp="+nolkpp+"&tglserah="+tglserah+"&tglterima="+tglterima+"&idprod_on="+idprod_on+"&idpabrik_on="+idpabrik_on+"&ket="+ket+"&ket_log="+ket_log+"&username="+username,
		
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

  
<?php  
}
?> 
</body>
</html>













