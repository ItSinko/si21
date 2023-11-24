<?php 
//$con = mysqli_connect("localhost","root","","kontrol_db");

$idlunas_on = $_GET['idlunas_on'];

$data = mysqli_query($con,"SELECT * FROM history_lunas_on WHERE idlunas_on='$idlunas_on' ");

while ($row = mysqli_fetch_array($data)) {

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

<body onload="rp();">

<div class="container" >




 <table class="table" >

 
<form  id="check" method="post"> 
 <fieldset >
 
<legend>Tambah Pelunasan</legend>

<p id="error_message" class="font-weight-bold text-danger"></p>
<p  id="success_message" class="font-weight-bold text-success"></p>
</fieldset>
 
<tr>

	 <td class="cd" colspan="1">
     <fieldset class="field_form">
     <legend class="legend_form"> Pelunasan Piutang</legend>

	 <input class="form-control" rows="2" id="idlunas" value="<?= $row["idlunas_on"]; ?>" readonly  type="hidden"> 
  
  
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">No LKPP </label>
     <div class="col-sm-2">
     <input class="form-control" rows="2" placeholder="No lkpp" id="nolkpp" value="<?= $row["nolkppahs_fk"]; ?>" readonly >
     </div>
     </div>
	 
  
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nilai Pelunasan *</label>
     <div class="col-sm-3">
	 <input class="form-control nilai" rows="2" placeholder="Nilai Pelunasan" id="nilai"  onkeyup="rp();"  value="<?= $row["nilai_lunas"]; ?>"> 
     </div>
     </div>
	 
	 
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Tgl Pelunasan *</label>
     <div class="col-sm-3">
	 <input class="form-control" rows="2" placeholder="Tgl Pelunasan" id="tgllunas" type="date"  value="<?= $row["tgl_pelunasan"]; ?>" >
     </div>
     </div>
	 
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Ket </label>
    <div class="col-sm-3 ">
   <textarea rows="1" id="ket"class="form-control" placeholder="Keterangan"><?php echo $row["ket_hs"];?></textarea>
    </div>
  </div>

</td>

   
      
     </tr>	
     </table>


	 
<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Pelunasan ?');" id="tambah" name="tambah" >Update Data</button>	

<a href="./index.php?hlm=accon&aksi=history&nolkppacc_on=<?php echo $nolkppacc_on; ?>" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a></div>
 

 </form>	


  
<script>
$("#check").submit(function(e) {
	e.preventDefault();
	
	
	var nolkpp = $("#nolkpp").val();
	var nilai = $("#nilai").val();
	var idlunas = $("#idlunas").val();
	var tgllunas = $("#tgllunas").val();
	var ket = $("#ket").val();
	

	if(nilai == "" || tgllunas == "" || nolkpp == "" ) {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/historylunason.php",
         	data: "nolkpp="+nolkpp+"&nilai="+nilai+"&tgllunas="+tgllunas+"&ket="+ket+"&idlunas="+idlunas,
			

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
		  
		  $('#nilai').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
				
		  }
			
	</script>


    <!--  JS nya Jquery Price Format  -->
        <script type="text/javascript" src="jquery.price_format.2.0.js"></script>
		
		<?php
		
        }
		
		?>
		

</body>
</html>