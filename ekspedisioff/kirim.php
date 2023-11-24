<?php 
$idordereks_off=$_GET['idordereks_off']; 
?>
<html>
<head>
<title>SPA Tambah</title>
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
</style>

<body>

<div class="container" >




 <table class="table" >
<form method="post" id="check">
	 <fieldset >
<legend>Pengiriman Data</legend>
	
	
	
<p id="error_message" class="font-weight-bold text-danger"></p>

<p id="success_message" class="font-weight-bold text-success"></p>

	</fieldset>
 
<tr>
 
 <td class="cd" colspan="1">  
 <fieldset class="field_form">
 <legend class="legend_form">Pengiriman Barang</legend>
 
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">ID Order </label>
     <div class="col-sm-2">
      <input type="text" class="form-control" value="<?php echo $idordereks_off; ?>" id="idordereks" readonly  >
     </div>
     </div>
 
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Ekspedisi *</label>
     <div class="col-sm-1 ">
      <select  class="selectpicker" style=" height:28px;"   id="nama_eksoff" data-live-search="true" onchange="changeValue(this.value)"   >
	 <option value="">Pilih Jasa Pengiriman</option>
        <?php 
		$con=mysqli_connect("localhost","root","","kontrol_db");
     $result = mysqli_query($con,"SELECT * FROM jasaeks ORDER by nama_eks");    
     $jsArray = "var dtMhs = new Array();\n";        
     while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="' . $row['nama_eks'] . '">' . $row['nama_eks'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['nama_eks'] . "'] = {jasafk_off:'" . addslashes($row['id_eks']) . "',                                                        
														  																							
														};\n";
	 } ?>
     </select>
     </div>
     </div>
	  
	  
	  <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Tgl Realisasi *</label>
     <div class="col-sm-3">
     <input type="date" class="form-control "  id="tglrealisasioff"  >
     </div>
     </div> 

	 <div class="form-group row">
     <label class="col-sm-3 col-form-label" >Jumlah Yang akan dikirim *</label>
     <div class="col-sm-2">
     <div class="input-group-prepend">
     <input class="form-control "  type="text"  style="height:28px; width:70px;"  min="1"  id="jumlahkirimoff" placeholder="99" >
	 <div class="input-group-text" style="height:28px;">
	 Unit
     </div>
     </div>
     </div>
     </div> 
	 


	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">No Resi </label>
     <div class="col-sm-3">
     <input type="text" class="form-control "  id="noresioff"  placeholder="No Resi" >
     </div>
     </div> 
	 
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nilai *</label>
     <div class="col-sm-3">
     <input type="text" class="form-control "  id="nilaioff"  placeholder="Nilai" onkeyup="rp();" >
     </div>
     </div> 
	  
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Keterangan</label>
     <div class="col-sm-4">
     <textarea class="form-control" rows="1" placeholder="Keterangan" id="keteksoff" ></textarea>
     </div>
     </div>
 
     </fieldset>
     </td>
	 </tr>	
     </table>

	 <button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="tambah" >Tambah Data</button>	

	 <a href="./index.php?hlm=eksoff&aksi=more&idordereks_off=<?php echo $idordereks_off; ?>" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a></div>
	 </div>
	 
	 <input type="hidden" id="jasafk_off"  >
	 
	 </form>	
     
	 <script>
		  function rp() {	  
		  $('#nilaioff').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
		
	  }
	 </script>


	     <!--  JS nya Jquery Price Format  -->
        <script type="text/javascript" src="jquery.price_format.2.0.js"></script>

				 <!--  JS nya Jquery Chained Format  -->
		<script src="jquery.chained.min.js"></script>			


<script>
	$("#check").submit(function(e) {
	e.preventDefault();
	
	var idordereks = $("#idordereks").val();
	var tglrealisasioff = $("#tglrealisasioff").val();
	var jumlahkirimoff = $("#jumlahkirimoff").val();
	var noresioff = $("#noresioff").val();
	var keteksoff = $("#keteksoff").val();
	var nilaioff = $("#nilaioff").val();
	var jasafk_off = $("#jasafk_off").val();
	
    if(nama_eksoff == "" || tglrealisasioff == "" ||  jumlahkirimoff == "" || nilaioff == "") {

		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else 						
								{
									
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/tambah/pengiriman_detail_off.php",
			data: "idordereks="+idordereks+"&tglrealisasioff="+tglrealisasioff+"&jumlahkirimoff="+jumlahkirimoff+"&noresioff="+noresioff+"&keteksoff="+keteksoff+"&nilaioff="+nilaioff+"&jasafk_off="+jasafk_off,
         
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
	<?php echo $jsArray; 
	?>  
 
	function changeValue(nama_eks){  
    document.getElementById('jasafk_off').value = dtMhs[nama_eks].jasafk_off;    

	
	};  
    </script> 


</body>
</html>