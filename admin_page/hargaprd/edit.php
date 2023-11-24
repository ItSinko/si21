<?php 
//$con = mysqli_connect("localhost","root","","kontrol_db");

$id_prod = $_GET['id_prod'];
$data = mysqli_query($con,"select * from produk_master where id_prod='$id_prod' ");
while ($prd = mysqli_fetch_array($data)) {

?>

<html>
<head>

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
		padding-left:10px!important;
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

<body onload="rp();" onchange="rp();">

<div class="container" >

<table class="table" >
<form id="check" method="post">
<fieldset > 
<legend>Ubah Data Produk</legend>
<p id="error_message" class="font-weight-bold text-danger"></p>
<p  id="success_message" class="font-weight-bold text-success"></p>
</fieldset>
 <tr>


  <td colspan="1">

 <fieldset class="field_form">
<legend class="legend_form">Data Produk</legend>
  
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">ID Produk *</label>
    <div class="col-sm-1">
    <input type="text" class="form-control"   value="<?php echo $prd['id_prod']; ?>" placeholder="ID" id="id_prod" readonly>
    </div>
    </div>
  
   <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tipe Produk *</label>
    <div class="col-sm-2">
    <input type="text" class="form-control"  placeholder="-" value="<?php echo $prd['sing_prod']; ?>"  id="type" readonly>
    </div>
    </div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Nama Produk *</label>
    <div class="col-sm-3">
    <textarea class="form-control" rows="1" placeholder="-" id="nmprd" ><?php echo $prd['nam_prod']; ?></textarea>
    </div>
    </div>
 
	
		<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Merk Produk *</label>
    <div class="col-sm-2 ">
      <select  class="form-control form-control-inline"   id="merk"   >
	<option value="<?php echo $prd['merk']; ?>" ><?php echo $prd['merk']; ?></option>
	<option value="ELITECH" >ELITECH</option>
	<option value="MENTOR" >MENTOR</option>
	<option value="VANWARD" >VANWARD</option>
	<option value="AEOLUS">AEOLUS</option>
	<option value="OTHER" >OTHER</option>
     </select>
     </div>
	</div>
	
	
	   <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Harga Produk</label>
    <div class="col-sm-3">
    <input type="text" class="form-control hargae"  placeholder="-" value="<?php echo $prd['harga']; ?>" id="hargae" onkeyup="rp();count();">
    </div>
    </div>

		   <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Dasar Pengenaan Pajak (DPP)</label>
    <div class="col-sm-3">
    <input type="text" class="form-control hargadpp"  placeholder="Harga DPP" value="<?php echo $prd['hargadpp']; ?>" id="hargadpp" readonly onkeyup="rp();count();" >
    </div> 
    </div>
  
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Catatan</label>
    <div class="col-sm-3">
    <textarea class="form-control" rows="1" placeholder="-" id="ket"><?php echo $prd['ket']; ?></textarea>
    </div>
    </div>


	    <div class="form-group row">
    <label  class="col-sm-3 col-form-label"><span style=" color: Red;"><i class="fa fa-exclamation-circle" ></i></span> Alasan data diubah </label>
    <div class="col-sm-3">
    <textarea class="form-control" rows="1" minlength="5" placeholder="Minimal isi 5 karakter..." id="ket_log" ></textarea>
    </div>
    </div>
  

	</fieldset> 
	</td>
	</tr>							
	</table>


 <input type="hidden" value="<?php echo $_SESSION['username'] ?>"  id="username" >
	<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Apakah data sudah benar ?');" id="tambah" name="tambah" >Update Data</button>	
	<a href="./index.php?hlm=harprd" formnovalidate  onclick="return confirm('Kembali ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a> 
	</div>
	</form>	

 <?php 
}
?>

  <script>
$("#check").submit(function(e) {
	e.preventDefault();
	
	var id_prod = $("#id_prod").val();
	var type = $("#type").val();
	var nmprd = $("#nmprd").val();
	var merk = $("#merk").val();
	var hargae = $("#hargae").val();
	var hargadpp = $("#hargadpp").val();
	var ket = $("#ket").val();
	var ket_log = $("#ket_log").val();
	var username = $("#username").val();
	
	

	if(id_prod == "" || type == ""|| nmprd == ""|| merk == "" || ket_log == "") {
		$("#error_message").show().html("Wajib mengisi kolom bertanda *");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/hargaprd.php",
			data: {id_prod:id_prod,
			type:type,
			nmprd:nmprd,
			merk:merk,
			hargae:hargae,
			hargadpp:hargadpp,
			ket:ket,
			ket_log:ket_log,
			username:username},
         
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


     <script src="jquery-1.10.2.min.js"></script>
  
     <script type="text/javascript" src="jquery.price_format.2.0.js"></script>


	 <script>
		  function rp() {
		  
		  $('#hargae').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
				
			$('#hargadpp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
	  }
	</script>
	
	
	<script>
           function count() {
                var hargae 		= $(".hargae").val();
				var jumlah		= 1.1;
				var hargadpp 		= $(".hargadpp").val();
		
		

			   hargae   = hargae.split('Rp ').join('');
			   hargae   = hargae.split('.').join('');

			   
			   hargadpp   = hargadpp.split('Rp ').join('');
			   hargadpp   = hargadpp.split('.').join('');

					hargadpp = Math.round(hargae/jumlah); 
					$(".hargadpp").val(hargadpp);
					
                
                }
            
</script>

	
</div>
</body>
</html>