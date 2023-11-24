<?php 
$con = mysqli_connect("localhost","root","","kontrol_db");

$nolkppadm_on = $_GET['nolkppadm_on'];
$data = mysqli_query($con,"SELECT * FROM admjual_on INNER JOIN spa_on ON spa_on.nolkpp_on = admjual_on.nolkppadm_on
							INNER JOIN distributor ON distributor.iddsb= admjual_on.pabrikadm_on
							INNER JOIN produk_master ON produk_master.id_prod= admjual_on.idprodadm_on WHERE nolkppadm_on='$nolkppadm_on' ");
while ($adm = mysqli_fetch_array($data)) {

?>

  
<html>
<head>
<title>Tambah</title>
</head>
<style>

 td:hover { background: #0000; color: #000; }  
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
<form id="check" method="post">
 <fieldset >
 
<legend>Ubah Data</legend>


<p id="error_message" class="font-weight-bold text-danger"></p>

<p  id="success_message" class="font-weight-bold text-success"></p>


 </fieldset>
 
<tr>




  <td colspan="1">  
 <fieldset class="field_form">
<legend class="legend_form">Info Produk</legend>




  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No AKN</label>
    <div class="col-sm-3">
      <input class="form-control" rows="2" placeholder="No AKS" id="instansi"  readonly  value= "<?= $adm["noaks_on"]; ?>" >
    </div>
  </div>




  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No LKPP</label>
    <div class="col-sm-3">
      <input class="form-control" rows="2" placeholder="No LKPP" id="nolkpp" value="<?= $adm["nolkppadm_on"]; ?>" readonly>
    </div>
  </div>

  

  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Distributor</label>
    <div class="col-sm-5">
      <textarea class="form-control" rows="1" placeholder="Nama Distributor" id="distributor"readonly><?php echo $adm["pabrik"]; ?></textarea>
    </div>
  </div>
  
  

  
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Instansi</label>
    <div class="col-sm-8">
      <input class="form-control" rows="2" placeholder="Nama Instansi" id="instansi" value="<?= $adm["instansi_on"]; ?>"  readonly>
    </div>
  </div>
 
  
  
   <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Type </label>
    <div class="col-sm-4">
      <input class="form-control" rows="2" placeholder="Type Produk" id="type"  value="<?= $adm["sing_prod"]; ?>" readonly>
    </div>
  </div>


    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Nama Produk</label>
    <div class="col-sm-8">
      <textarea class="form-control" rows="2" placeholder="Nama Produk"  id="nama" readonly><?php echo $adm["nam_prod"]; ?></textarea>
    </div>
  </div>


   <div class="form-group row">
  <label class="col-sm-3 col-form-label" >Jumlah</label>
    <div class="col-sm-2">
   <div class="input-group-prepend">
    <input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"   value="<?= $adm["jumlah_on"]; ?>"  id="jumlah"placeholder="99" readonly>
	<div class="input-group-text" style="height:28px;">
	Unit
    </div>
  </div>
   </div>
</div> 
</td>
 
 
    <td colspan="1">  
	<fieldset class="field_form">
	<legend class="legend_form">PO ( Purchasing Order )</legend>
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">PO *</label>
    <div class="col-sm-6">
    <input type="text" class="form-control harga"  id="nopo" placeholder="XXXX/XX/XXXX/2019"   value= "<?= $adm["nopo_on"]; ?>" >
    </div>
	</div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tanggal *</label>
    <div class="col-sm-4">
    <input type="date" class="form-control harga"  id="tglpo"  value= "<?= $adm["tglpo_on"]; ?>" >
    </div>
    </div> 
    </fieldset>

    <fieldset class="field_form">
	<legend class="legend_form">DO ( Delivery Order ) / SPK</legend>
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">DO / SPK</label>
    <div class="col-sm-6">
    <input type="text" class="form-control harga"  id="nodo" placeholder="XXXX/XX/XXXX/2019"  value= "<?= $adm["nodo_on"]; ?>"  >
    </div>
    </div>
  
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tanggal</label>
    <div class="col-sm-4">
	<input type="date" class="form-control harga"  id="tgldo"  value= "<?= $adm["tgldo_on"]; ?>" >
    </div>
	</div> 
	</fieldset> 
  
     <fieldset class="field_form">
     <legend class="legend_form">Lain Lain</legend>
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Keterangan </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="2" placeholder="Keterangan" id="ket" > <?php echo $adm["ketadm_on"]; ?>"</textarea>
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
	 
	<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Data ?');" id="tambah" name="tambah" >Update Data</button>	
	<a href="./index.php?hlm=admon" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
 
	<input type="hidden" id="idprod_on" value= "<?= $adm["idprodadm_on"]; ?>"  >
	<input type="hidden" id="pabrik_on" value= "<?= $adm["pabrikadm_on"]; ?>" >
  <?php }


?>
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
	document.getElementById('idprod_on').value = dtMhs[nolkpp].idprod_on;	
	document.getElementById('pabrik_on').value = dtMhs[nolkpp].pabrik_on;			
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
	
	var nolkpp = $("#nolkpp").val();
	var nopo = $("#nopo").val();
	var tglpo = $("#tglpo").val();
	var nodo = $("#nodo").val();
	var tgldo = $("#tgldo").val();
	var idprod_on = $("#idprod_on").val();
	var pabrik_on = $("#pabrik_on").val();
	var ket = $("#ket").val();
	var ket_log = $("#ket_log").val();

	
	if( nolkpp == "" || nopo == ""|| tglpo == "" || ket_log == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/penjualan.php",
			data: "nolkpp="+nolkpp+"&nopo="+nopo+"&tglpo="+tglpo+"&nodo="+nodo+"&tgldo="+tgldo+"&idprod_on="+idprod_on+"&pabrik_on="+pabrik_on+"&ket="+ket+"&ket_log="+ket_log,
         
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





