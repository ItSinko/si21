<?php 
//$con = mysqli_connect("localhost","root","","kontrol_db");

$idrate2 = $_GET['idrate2'];
$data = mysqli_query($con,"SELECT * FROM produk_master INNER JOIN diskon_master ON produk_master.id_prod = diskon_master.idprodfk 
												       INNER JOIN  distributor ON diskon_master.pabrikfk=distributor.iddsb WHERE idrate2='$idrate2' ");
while ($diskon_mas = mysqli_fetch_array($data)) {
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


input[id=idrate2]{
display: none;
}
</style>

<body onload="rp()">



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
    <label  class="col-sm-3 col-form-label"> Distributor</label>
    <div class="col-sm-4">
      <input class="form-control" rows="2" placeholder="ID Distributor"     id="iddsb" value="<?= $diskon_mas["pabrik"]; ?>" readonly>
    </div>
  </div>
  
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nama Produk</label>
     <div class="col-sm-3">
      <textarea class="form-control" rows="1" placeholder="Nama Produk"  readonly><?php echo $diskon_mas["nam_prod"]; ?></textarea>
     </div>
     </div>

	  <div class="form-group row">
     <label  class="col-sm-3 col-form-label"> Harga *</label>
     <div class="col-sm-3">
     <input class="form-control" rows="2" placeholder="Harga Produk"  id="harga" onkeyup="rp()" value="<?= $diskon_mas["harga"]; ?>" readonly> 
     </div>
	 </div>
	 
     <div class="form-group row">
     <label class="col-sm-3 col-form-label" >Diskon Nota *</label>
     <div class="col-sm-2">
     <div class="input-group-prepend">
     <input class="form-control "  type="text"  style="height:28px; width:70px;"    id="diskonnota"  value="<?= $diskon_mas["diskonnota"]; ?>"  placeholder="99" >
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
     <input class="form-control "  type="text"  style="height:28px; width:70px;" name="tarifuji"   id="tarifuji" value="<?= $diskon_mas["diskonuji"]; ?>"  placeholder="99" >
	 <div class="input-group-text" style="height:28px;">
	 %
     </div>
     </div>
     </div>
     </div> 

	 <div class="form-group row">
     <label class="col-sm-3 col-form-label" >Temp *</label>
     <div class="col-sm-2">
     <div class="input-group-prepend">
     <input class="form-control jumlah"  type="text"  style="height:28px; width:70px;" name="temp"  id="temp"  value="<?= $diskon_mas["temphari"]; ?>" placeholder="99" >
	 <div class="input-group-text" style="height:28px;">
	 Hari
     </div>
     </div>
     </div>
     </div> 

	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Keterangan </label>
     <div class="col-sm-6">
     <textarea class="form-control" rows="1" placeholder="Keterangan"  id="ket"><?php echo $diskon_mas["ket"]; ?></textarea>
     </div>
     </div>
	 </td>
     </tr>	
	 </table>

	 <button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Data ?');" id="tambah" name="tambah" >Update Data</button>	
	<a href="./index.php?hlm=diskon" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger" >Batal</a>
	 </div>
	 <input type="text"  id="idrate2" value="<?= $diskon_mas["idrate2"]; ?>" >
	
</form>


<script type="text/javascript">    
    <?php echo $jsArray; 
	?>  
    function changeValue(pabrik){  
    document.getElementById('iddsb').value = dtMhs[pabrik].iddsb; 
    
	};  
    </script> 

	
	<script>
$("#check").submit(function(e) {
	e.preventDefault();
	
	var idrate2 = $("#idrate2").val();
	var iddsb = $("#iddsb").val();
	var diskonnota = $("#diskonnota").val();
	var tarifuji = $("#tarifuji").val();
	var temp = $("#temp").val();
	var ket = $("#ket").val();

	if(iddsb == "" || diskonnota == "" ||  tarifuji == ""  ||  temp == "" ) {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/diskonproduk.php",
			data: "iddsb="+iddsb+"&diskonnota="+diskonnota+"&tarifuji="+tarifuji+"&temp="+temp+"&ket="+ket+"&idrate2="+idrate2,

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

	<script>
		  function rp() {
		  
		  $('#harga').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
								}
		</script>
	
		<script src="jquery-1.10.2.min.js"></script>    
        <script type="text/javascript" src="jquery.price_format.2.0.js"></script>
		
</body>
</html>

<?php
}
?>
