
<?php 
$con = mysqli_connect("localhost","root","","kontrol_db");

$nolkppgdg_on = $_GET['nolkppgdg_on'];

$data = mysqli_query($con,"SELECT * FROM gudang_on INNER JOIN admjual_on ON gudang_on.nolkppgdg_on=admjual_on.nolkppadm_on 
												   INNER JOIN spa_on ON spa_on.nolkpp_on = admjual_on.nolkppadm_on
												   INNER JOIN produk_master ON produk_master.id_prod=idprodgdg_on
												   INNER JOIN distributor ON distributor.iddsb = pabrikgdg_on
WHERE nolkppgdg_on='$nolkppgdg_on' ");

				 while ($gdg_on = mysqli_fetch_array($data)) {

?>

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




 <table class="table" >
<form method="post" id="check" >
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
    <div class="col-sm-8">
      <input class="form-control" rows="2" placeholder="Nama Instansi"    value= "<?= $gdg_on["nopo_on"]; ?>"readonly>
    </div>
  </div>
   


    
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No LKPP</label>
    <div class="col-sm-3">
      <input class="form-control" rows="2" placeholder="Nama Instansi"  id="nolkpp" readonly   value= "<?= $gdg_on["nolkppgdg_on"]; ?>">
    </div>
  </div>
  
  
  
   <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Distributor</label>
    <div class="col-sm-5">
      <textarea class="form-control" rows="1" placeholder="Nama Distributor" id="distributor"readonly> <?php echo $gdg_on["pabrik"]; ?></textarea>
    </div>
  </div>
  
 
  
    
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Instansi</label>
    <div class="col-sm-8">
      <input class="form-control" rows="2" placeholder="Nama Instansi" id="instansi"  value= "<?= $gdg_on["instansi_on"]; ?>"readonly>
    </div>
  </div>
 
  
  
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Type </label>
     <div class="col-sm-4">
     <input class="form-control" rows="2" placeholder="Type Produk" id="type"  value= "<?= $gdg_on["sing_prod"]; ?>" readonly>
     </div>
     </div>
 
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nama Produk</label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="2" placeholder="Nama Produk"  id="nama" readonly><?php echo $gdg_on["nam_prod"]; ?></textarea>
     </div>
     </div>



     <div class="form-group row">
     <label class="col-sm-3 col-form-label" >Jumlah</label>
     <div class="col-sm-2">
     <div class="input-group-prepend">
     <input class="form-control jumlah"  type="text"  style="height:28px; width:70px;" onkeyup="rp();count();"  id="jumlah"placeholder="99"   value= "<?= $gdg_on["jumlah_on"]; ?>" readonly>
	 <div class="input-group-text" style="height:28px;">
	 Unit
     </div>
     </div>
     </div>
	 </div> 
	 </td>

   
     <td class="cd" colspan="1">  
     <fieldset class="field_form">
     <legend class="legend_form">Data Gudang</legend>
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">No Surat Jalan *</label>
     <div class="col-sm-6">
     <input type="text" class="form-control harga"  id="nosj" placeholder="SPA-123"   value= "<?= $gdg_on["nosj_on"]; ?>"  >
     </div>
     </div>
  
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Tanggal Surat Jalan *</label>
     <div class="col-sm-6">
     <input type="date" class="form-control harga"  id="tglsj" placeholder="XXXX/XX/XXXX/2019"   value= "<?= $gdg_on["tglsj_on"]; ?>" >
     </div>
     </div>
  
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Keterangan </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="2" placeholder="Keterangan"  id="ket"><?php echo $gdg_on["ketgdg_on"]; ?> </textarea>
     </div>
     </div>
     </fieldset>

     </td>
     </tr>	
     </table>


	 <input type="hidden" id="idprod_on" value= "<?= $gdg_on["idprodgdg_on"]; ?>" >
	 <input type="hidden" id="pabrik_on" value= "<?= $gdg_on["pabrikgdg_on"]; ?>" >



<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Data ?');" id="tambah" name="tambah" >Update Data</button>	

 <a href="./index.php?hlm=gudangon" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
 
 
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
	 document.getElementById('idprod_on').value = dtMhs[nolkpp].idprod_on;	
	 document.getElementById('pabrik_on').value = dtMhs[nolkpp].pabrik_on;		
	 document.getElementById('jumlah').value = dtMhs[nolkpp].jumlah;			
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
	 var nosj   = $("#nosj").val();
	 var tglsj  = $("#tglsj").val();
	 var pabrik_on  = $("#pabrik_on ").val();
	 var idprod_on  = $("#idprod_on ").val();
	 var ket =    $("#ket").val();
	
	
	if(nolkpp == "" || nosj == ""|| tglsj == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/gudang.php",
			data: "nolkpp="+nolkpp+"&nosj="+nosj+"&tglsj="+tglsj+"&pabrik_on="+pabrik_on+"&idprod_on="+idprod_on+"&ket="+ket,
         
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