<?php 
$con = mysqli_connect("localhost","root","","kontrol_db");

$nocoo_on = $_GET['nocoo_on'];
$data = mysqli_query($con,"SELECT * FROM detailcoo_on
													INNER JOIN spa_on ON detailcoo_on.nolkppcoo_on=spa_on.nolkpp_on
													INNER JOIN gudang_on ON gudang_on.nolkppgdg_on=detailcoo_on.nolkppcoo_on
													INNER JOIN distributor ON distributor.iddsb=spa_on.pabrik_on
													INNER JOIN produk_master ON produk_master.id_prod=spa_on.idprod_on
													INNER JOIN seri_on ON seri_on.idseri_on=detailcoo_on.idserifk_on 
													WHERE  nocoo_on='$nocoo_on' ");
while ($coo = mysqli_fetch_array($data)) {
?>
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

input[id=nocoo]{
display: none;
	               }
				   
				   input[id=nolkpp]{
display: none;
	               }
				   
				   

</style>

<body>

<div class="container-fluid" >

<table class="table" >
<form  id="check"  method="post">
 <fieldset >
 
<legend>Update Data</legend>
<p id="error_message" class="font-weight-bold text-danger"></p>
<p id="success_message" class="font-weight-bold text-success"></p>
 
 </fieldset>
 
<tr>


	 <input type="text" id="nocoo" value="<?= $coo["nocoo_on"]; ?>">
	 <input type="text" id="nolkpp" value="<?= $coo["nolkppcoo_on"]; ?>">
  
     <td class="cd" colspan="1">  
     	 
	 <fieldset class="field_form">
     <legend class="legend_form">Info COO</legend>

	   
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Tgl Kirim</label>
     <div class="col-sm-6">
     <input type="date" class="form-control "  id="tglkirim"  placeholder="Tgl Kirim"  value="<?= $coo["tglkirimcooon"]; ?>">
     </div>
     </div> 
	 
	  <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Tanda Terimaa</label>
     <div class="col-sm-6">
     <input type="text" class="form-control "  id="tandacoo"  placeholder="Tgl Kirim"  value="<?= $coo["tandacooon"]; ?>">
     </div>
     </div> 
	</fieldset>
	</td>
     </tr>	
	 
     </table>
	
	<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Data ?');" id="register" name="tambah" >Update Data</button>


<a href="./index.php?hlm=deton&aksi=more&nolkppcoo_on=<?php echo $coo["nolkppcoo_on"];  ?>" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
	</div>
	</form>	



<?php 
}

?>	
   
   <script>
	 $("#check").submit(function(e) {
	 e.preventDefault();
 
	 var tandacoo = $("#tandacoo").val();
	 var tglkirim = $("#tglkirim").val();
	 var nocoo = $("#nocoo").val();
	 var nolkpp = $("#nolkpp").val();
	 
	if(tandacoo == "" ) {
		$("#error_message").show().html(" Harap Mengisi, Field yang wajib di isi! (*) ");
	 } else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/detailcooon.php",
			data: "nocoo="+nocoo+"&tandacoo="+tandacoo+"&tglkirim="+tglkirim+"&nolkpp="+nolkpp,
         
			
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