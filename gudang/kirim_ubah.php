<?php 
$con = mysqli_connect("localhost","root","","kontrol_db");

$ideks_on = $_GET['ideks_on'];
$data = mysqli_query($con,"SELECT * FROM ekspedisi2_on 
													 INNER JOIN jasaeks ON ekspedisi2_on.jasafk_on=jasaeks.id_eks 
WHERE ideks_on='$ideks_on' ");
while ($kirim = mysqli_fetch_array($data)) {
?>

<?php 
$nolkppgdg_on=$_GET['nolkppgdg_on']; 
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

<body onload="rp()">

<div class="container" >




 <table class="table" >
<form method="post" id="check">
	 <fieldset >
<legend>Pengiriman Data</legend>
	
	
	
	<p id="error_message" class="font-weight-bold text-danger"></p>

<p  id="success_message" class="font-weight-bold text-success"></p>

	</fieldset>
 
<tr>
 
 <td class="cd" colspan="1">  
 <fieldset class="field_form">
 <legend class="legend_form">Pengiriman Barang</legend>
 
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">No LKPP </label>
     <div class="col-sm-2">
      <input type="text" class="form-control" value="<?php echo $nolkppgdg_on; ?>" placeholder="No LKPP" id="nolkpp" readonly  >
     </div>
     </div>
 
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Ekspedisi *</label>
     <div class="col-sm-1 ">
      <select  class="selectpicker" style=" height:28px;"   id="nama_eks" data-live-search="true" onchange="changeValue(this.value)"   >
	 <option  value= "<?= $kirim["nama_eks"]; ?>" ><?php echo  $kirim["nama_eks"]; ?></option>
        <?php 
		$con=mysqli_connect("localhost","root","","kontrol_db");
     $result = mysqli_query($con,"SELECT * FROM jasaeks ORDER by nama_eks");    
     $jsArray = "var dtMhs = new Array();\n";        
     while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="' . $row['nama_eks'] . '">' . $row['nama_eks'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['nama_eks'] . "'] = {jasafk_on:'" . addslashes($row['id_eks']) . "',                                                        
														  																							
														};\n";
	 } ?>
     </select>
     </div>
     </div>
	  
	  
	  <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Tgl Realisasi *</label>
     <div class="col-sm-3">
     <input type="date" class="form-control "  id="tglreal"   value= "<?= $kirim["tglkirim_on"]; ?>"  >
     </div>
     </div> 

	 <div class="form-group row">
     <label class="col-sm-3 col-form-label" >Jumlah Yang akan dikirim *</label>
     <div class="col-sm-2">
     <div class="input-group-prepend">
     <input class="form-control "  type="text"  style="height:28px; width:70px;"  min="1"  id="dikirim" placeholder="99"  value="<?= $kirim["jumlaheks_on"]; ?>" >
	 <div class="input-group-text" style="height:28px;">
	 Unit
     </div>
     </div>
     </div>
     </div> 

	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">No Resi </label>
     <div class="col-sm-3">
     <input type="text" class="form-control "  id="noresi"  placeholder="No Resi" value="<?= $kirim["noresi_on"]; ?>">
     </div>
     </div> 
	 
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nilai *</label>
     <div class="col-sm-3">
     <input type="text" class="form-control "  id="nilai"  placeholder="Nilai" onkeyup="rp();" value="<?= $kirim["nilai_on"]; ?>">
     </div>
     </div> 
	  
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Keterangan</label>
     <div class="col-sm-5">
     <textarea class="form-control" rows="1" placeholder="Keterangan" id="ket" ><?php echo $kirim["keteks2_on"]; ?></textarea>
     </div>
     </div>
 
     </fieldset>
     </td>
	 </tr>	
     </table>

	 <button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Data ?');" id="tambah" name="tambah" >Update Data</button>	

	 <a href="./index.php?hlm=gudangon&aksi=eks&nolkppgdg_on=<?php echo $nolkppgdg_on; ?>" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a></div>
	 </div>
	 
	 <input type="hidden" id="jasafk_on" value="<?= $kirim["jasafk_on"]; ?>" >
	 <input type="hidden" id="ideks" value="<?= $kirim["ideks_on"]; ?>" >
	 
	 </form>	
     
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

				 <!--  JS nya Jquery Chained Format  -->
		<script src="jquery.chained.min.js"></script>			


		<script>
	$("#check").submit(function(e) {
	e.preventDefault();
	
		var ideks = $("#ideks").val();
	var nolkpp = $("#nolkpp").val();
	var tglreal = $("#tglreal").val();
	var dikirim = $("#dikirim").val();
	var noresi = $("#noresi").val();
	var ket = $("#ket").val();
	var nilai = $("#nilai").val();
	var jasafk_on = $("#jasafk_on").val();
	
    if(nama_eks == "" || tglreal == "" ||  dikirim == "" || nilai == "") {

		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else 						
								{
									
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/pengiriman_detail.php",
			data: "nolkpp="+nolkpp+"&tglreal="+tglreal+"&dikirim="+dikirim+"&noresi="+noresi+"&ket="+ket+"&nilai="+nilai+"&jasafk_on="+jasafk_on+"&ideks="+ideks,
         
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
    document.getElementById('jasafk_on').value = dtMhs[nama_eks].jasafk_on;    

	
	};  
    </script> 


</body>
</html>











<?php
}
?>
</body>