<?php 
$con = mysqli_connect("localhost","root","","kontrol_db");

$nolkppeks_on = $_GET['nolkppeks_on'];
$data = mysqli_query($con,"SELECT * FROM ekspedisi_on 
														INNER JOIN gudang_on ON ekspedisi_on.nolkppeks_on = gudang_on.nolkppgdg_on
														INNER JOIN admjual_on ON ekspedisi_on.nolkppeks_on = admjual_on.nolkppadm_on
														INNER JOIN spa_on ON ekspedisi_on.nolkppeks_on = spa_on.nolkpp_on
														INNER JOIN produk_master ON ekspedisi_on.idprodeks_on = produk_master.id_prod
														INNER JOIN distributor ON ekspedisi_on.pabrikeks_on = distributor.iddsb WHERE nolkppeks_on='$nolkppeks_on' ");
while ($eks_on = mysqli_fetch_array($data)) {
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

<body>

<div class="container-fluid" >

<table class="table" >
<form method="post" id="check" >
 <fieldset >
 
<legend>Tambah Data</legend>


<p id="error_message" class="font-weight-bold text-danger"></p>

<p  id="success_message" class="font-weight-bold text-success"></p>


</fieldset>
 
<tr>

<td class="cd" colspan="1">

 <fieldset class="field_form">
<legend class="legend_form">Info Produk</legend>

     <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No PO</label>
    <div class="col-sm-4">
      <input class="form-control" rows="2" placeholder="No PO"  id="nopo"    value="<?php echo $eks_on['nopo_on']; ?>" readonly>
    </div>
  </div>


     <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No LKPP</label>
    <div class="col-sm-2">
      <input class="form-control" rows="2" placeholder="No LKPP" id="nolkpp"    value="<?php echo $eks_on['nolkppeks_on']; ?>" readonly>
    </div>
  </div>
  
 
   <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Distributor</label>
    <div class="col-sm-5">
      <textarea class="form-control" rows="1" placeholder="Nama Distributor" id="distributor"readonly><?php echo $eks_on['pabrik']; ?>"</textarea>
    </div>
  </div>
  
 
  
    
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Instansi</label>
    <div class="col-sm-8">
      <input class="form-control" rows="2" placeholder="Nama Instansi" id="instansi"    value="<?php echo $eks_on['instansi_on']; ?>" readonly>
    </div>
  </div>
 
  
  
   <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Type </label>
    <div class="col-sm-4">
      <input class="form-control" rows="2" placeholder="Type Produk" id="type"   value="<?php echo $eks_on['sing_prod']; ?>" readonly>
    </div>
  </div>
  
  
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Nama Produk</label>
    <div class="col-sm-8">
    <textarea class="form-control" rows="2" placeholder="Nama Produk"  id="nama" readonly><?php echo $eks_on['nam_prod']; ?></textarea>
    </div>
    </div>

    <div class="form-group row">
  <label class="col-sm-3 col-form-label" >Jumlah</label>
    <div class="col-sm-2">
   <div class="input-group-prepend">
    <input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"   value="<?php echo $eks_on['jumlah_on']; ?>"  id="jumlah"placeholder="99" readonly>
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
     <textarea class="form-control" rows="2" placeholder="Keterangan" id="ket" ><?php echo $eks_on['keteks_on']; ?></textarea>
     </div>
     </div>
     </fieldset> 
     </td>
     </tr>	
     </table>


	 <input  type="hidden" id="idprod_on" value="<?php echo $eks_on['idprodeks_on']; ?>" >
	 <input  type="hidden" id="pabrik_on" value="<?php echo $eks_on['pabrikeks_on']; ?>">


<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Data ?');" id="tambah" name="tambah" >Update Data</button>	

 
 <a href="./index.php?hlm=ekson" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
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
	document.getElementById('pabrik_on').value = dtMhs[nolkpp].pabrik_on;			
		
	};

</script>
  


  <script src="jquery-1.10.2.min.js"></script>
  

				 <!--  JS nya Jquery Chained Format  -->
		<script src="jquery.chained.min.js"></script>
	
		
	  <script>
            $("#nolkpp").chained("#nopo");
         
        </script>
  

  <script>
$("#check").submit(function(e) {
	e.preventDefault();
	

	var nolkpp = $("#nolkpp").val();
	var ket = $("#ket").val();
	var idprod_on = $("#idprod_on").val();
	var pabrik_on = $("#pabrik_on").val();

	
	if(idprod_on == "" || nolkpp == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/pengiriman.php",
			data: "nolkpp="+nolkpp+"&ket="+ket+"&idprod_on="+idprod_on+"&pabrik_on="+pabrik_on,
         
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








	
<?php 
}
?>	
</body>
</html>