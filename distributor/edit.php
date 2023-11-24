<?php 
$con = mysqli_connect("localhost","root","","kontrol_db");

$iddsb = $_GET['iddsb'];

$result = mysqli_query($con,"SELECT * FROM distributor WHERE iddsb='$iddsb' ");
											 
while ($distributor = mysqli_fetch_array($result)) {

?>

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

<div class="container" >




 <table class="table" >

 
<form  id="check" method="post"> 
 <fieldset >
 
<legend>Ubah Data</legend>


<p id="error_message" class="font-weight-bold text-danger"></p>

<p  id="success_message" class="font-weight-bold text-success"></p>


 </fieldset>
 
<tr>




  <td class="cd" colspan="1">
  
  

 <fieldset class="field_form">
<legend class="legend_form">Info Distributor</legend>

  
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">ID *</label>
    <div class="col-sm-2">
      <input class="form-control" rows="2" placeholder="ID" id="iddsb" value= "<?= $distributor["iddsb"]; ?>" readonly >
    </div>
	
  </div>
  
  
  <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nama Distributor *</label>
     <div class="col-sm-6">
    
	<textarea class="form-control" rows="1" placeholder="Nama Distributor" id="distributor" ><?php echo $distributor["pabrik"]; ?></textarea>
     </div>
     </div>

	   <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Alamat </label>
     <div class="col-sm-5">
     <textarea class="form-control" rows="1" placeholder="Alamat" id="alamat" ><?php echo $distributor["alamat_dsb"]; ?></textarea>
     </div>
     </div>

 
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Telepon</label>
    <div class="col-sm-3">
	  <input class="form-control" rows="2" placeholder="Telepon" id="telepon"  value= "<?= $distributor["telp_dsb"]; ?>" >
	</div>
  </div>

   


   </td>

       <td colspan="1" class="cd">  
	<fieldset class="field_form">
     <legend class="legend_form">Info Diskon</legend>
    
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Disko Nota *</label>
	<div class="col-sm-2">
	<div class="input-group-prepend">
	<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"  id="diskonnota"   placeholder="99"  value= "<?= $distributor["diskonnota"]; ?>" >
	<div class="input-group-text" style="height:28px;">
	%
	</div>
	</div>
	</div>
	</div> 

	
	
	
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Tarif Uji *</label>
	<div class="col-sm-2">
	<div class="input-group-prepend">
	<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"   id="diskonuji"   placeholder="99"   value= "<?= $distributor["diskonuji"]; ?>">
	<div class="input-group-text" style="height:28px;">
	%
	</div>
	</div>
	</div>
	</div> 
	
	
	
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Jatuh Tempo *</label>
	<div class="col-sm-2">
	<div class="input-group-prepend">
	<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"  id="temp"   placeholder="99"  value= "<?= $distributor["temphari"]; ?>" >
	<div class="input-group-text" style="height:28px;">
	Hari
	</div>
	</div>
	</div>
	</div> 

  <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Keterangan </label>
     <div class="col-sm-6">
     <textarea class="form-control" rows="1" placeholder="Keterangan"  id="ket"><?php echo $distributor["ket_dsb"]; ?></textarea>
     </div>
     </div>
      
	    <div class="form-group row">
    <label  class="col-sm-3 col-form-label"><span style=" color: Red;"><i class="fa fa-exclamation-circle" ></i></span> Alasan data diubah </label>
    <div class="col-sm-6">
    <textarea class="form-control" rows="1" minlength="5" placeholder="Minimal isi 5 karakter..." id="ket_log" ></textarea>
    </div>
    </div>

	  
	  
	  
	  
     </tr>	
     </table>



	  



	 
<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Data ?');" id="tambah" name="tambah" >Update Data</button>	
<a href="./index.php?hlm=dsb" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
 </div>
 

 </form>	

 

  
  
<script>
$("#check").submit(function(e) {
	e.preventDefault();
	
	var iddsb = $("#iddsb").val();
	var distributor = $("#distributor").val();
	var alamat = $("#alamat").val();
	var diskonnota = $("#diskonnota").val();
	var diskonuji = $("#diskonuji").val();
	var temp = $("#temp").val();
	var telepon = $("#telepon").val();
	var ket = $("#ket").val();
	var ket_log = $("#ket_log").val();
	
	

	if(iddsb == "" || distributor == "" || diskonnota == "" || diskonuji == ""|| temp == "" || ket_log == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/distributor.php",
			data: "iddsb="+iddsb+"&distributor="+distributor+"&alamat="+alamat+"&telepon="+telepon+"&ket="+ket+"&diskonnota="+diskonnota+"&diskonuji="+diskonuji+"&temp="+temp+"&ket_log="+ket_log,
         
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
</form>
</body>
</html>