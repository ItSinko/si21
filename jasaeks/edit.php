<html>
<head>
<title>SPA Tambah</title>
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


.cd:hover { background: #0000; color: #000; }  
/* Hover cell effect! */

</style>

<?php 
$con = mysqli_connect("localhost","root","","kontrol_db");

$id_eks = $_GET['id_eks'];

$result = mysqli_query($con,"SELECT * FROM jasaeks WHERE id_eks='$id_eks' ");
											 
while ($jasaeks = mysqli_fetch_array($result)) {

?>

<div class="container" >

 <table class="table" >
<form id="check" method="post">
 <fieldset >
 
<legend>Ubah Data Ekspedisi</legend>

<p id="error_message" class="font-weight-bold text-danger"></p>

<p  id="success_message" class="font-weight-bold text-success"></p>

 </fieldset>
 
    <tr>
    <td class="cd" colspan="1">

 <fieldset class="field_form">
<legend class="legend_form">Data Ekspedisi</legend>


    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Nama Ekspedisi *</label>
    <div class="col-sm-3">
    <input type="text" class="form-control" placeholder="-" value= "<?= $jasaeks["nama_eks"]; ?>" id="ekspedisi"  >
	  <span id="availability"></span>
    </div>
	</div>
  
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nomor Telepon </label>
	 <div class="col-sm-2">
     <input type="text" class="form-control"  placeholder="-" name="nolkpp" id="telp"  value= "<?= $jasaeks["nomer_eks"]; ?>" >
     </div>
	 <span id="availability"></span>
     </div>

  	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Alamat</label>
    <div class="col-sm-3">
    <textarea class="form-control" rows="2" placeholder="-" id="alamat"><?php echo $jasaeks["alamat_eks"]; ?></textarea>
    </div>
	</div> 

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Jalur Pengiriman *</label>
    <div class="col-sm-5">
    <select class="form-control" id="via"   style=" height:28px; width:310px;"  >
   <option value= "<?= $jasaeks["via"]; ?>"><?php echo $jasaeks["via"]; ?></option>
   <option value="Via Laut">Udara</option>
   <option value="Via Udara">Darat</option>
   <option value="Via Darat">Laut</option>
   <option value="Lain Lain">Lain-lain</option>
   
   </select>
	</div>
  </div>
 
      <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Jurusan </label>
	 <div class="col-sm-4">
	  <input type="text" class="form-control"  placeholder="Jurusan Daerah Ekspedisi"  id="jurusan" value= "<?= $jasaeks["jurusan"]; ?>" >
     </div>
	 <span id="availability"></span>
     </div>
	 
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Catatan</label>
    <div class="col-sm-4">
    <textarea class="form-control" rows="2" placeholder="-" id="ket" ><?php echo $jasaeks["ket_eks"]; ?></textarea>
    </div>
	</div> 

	    <div class="form-group row">
    <label  class="col-sm-3 col-form-label"><span style=" color: Red;"><i class="fa fa-exclamation-circle" ></i></span> Alasan data diubah </label>
    <div class="col-sm-3">
    <textarea class="form-control" rows="1" minlength="5" placeholder="Minimal isi 5 karakter..." id="ket_log" ></textarea>
    </div>
    </div>	
   </td>






 </tr>							
</table>

<input type="hidden" value= "<?= $jasaeks["id_eks"]; ?>"  id="ideks" >

<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Apakah data sudah benar ?');" id="register" name="tambah" >Update Data</button>	

<a href="./index.php?hlm=jasaeks" formnovalidate  onclick="return confirm('Kembali ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>

</div>
</form>	


<?php

}  
?>
<script>
$("#check").submit(function(e) {
	e.preventDefault();
	
	var ideks = $("#ideks").val();
	var ekspedisi = $("#ekspedisi").val();
	var telp = $("#telp").val();
	var alamat = $("#alamat").val();
	var via = $("#via").val();
	var jurusan = $("#jurusan").val();
	var ket = $("#ket").val();
	var ket_log = $("#ket_log").val();
	
	if(ekspedisi == "" || via == "" || ket_log == "") {
		$("#error_message").show().html("Wajib mengisi kolom bertanda *");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/ekspedisi.php",
			data: "ekspedisi="+ekspedisi+"&telp="+telp+"&alamat="+alamat+"&via="+via+"&jurusan="+jurusan+"&ket="+ket+"&ideks="+ideks+"&ket_log="+ket_log,
			
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