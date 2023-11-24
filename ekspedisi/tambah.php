

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
    <label  class="col-sm-3 col-form-label">No PO *</label>
<div class="col-sm-1 ">
	<select type="text"  class="selectpicker"  data-live-search="true" style="width: 213px;"  id="nopo" > 
	         <option value="disabled">Pilih No Purchasing Order</option>
			<?php
				$con= mysqli_connect("localhost","root","","kontrol_db");
                $query = mysqli_query($con,"SELECT nopo_on FROM admjual_on GROUP by nopo_on");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['nopo_on']; ?>"><?php echo $row['nopo_on']; ?></option>
                <?php
                }
                ?>
	</select>
</div>
</div>
  
   


  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No LKPP *</label>
    <div class="col-sm-3 ">
      <select  class="form-control " style=" height:32px;" onchange="changeValue(this.value)" id="nolkpp" required>
		 <option value=0>-Pilih LKPP-</option>
       <?php 

    $result = mysqli_query($con,"SELECT * FROM admjual_on INNER JOIN spa_on ON spa_on.nolkpp_on = admjual_on.nolkppadm_on
							INNER JOIN distributor ON distributor.iddsb= admjual_on.pabrikadm_on
							INNER JOIN produk_master ON produk_master.id_prod= admjual_on.idprodadm_on  ");    
	
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysqli_fetch_array($result)) {    
        echo '<option  class="'.$row['nopo_on'].'" value="' . $row['nolkppadm_on'] . '">' . $row['nolkppadm_on'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['nolkppadm_on'] . "'] = {
														 distributor:'" . addslashes($row['pabrik']) . "',
														instansi:'" . addslashes($row['instansi_on']) . "',
														type:'" . addslashes($row['sing_prod']) . "',	
														nama:'" . addslashes($row['nam_prod']) . "',	
														jumlah:'" . addslashes($row['jumlah_on']) . "',	
														noaks:'" . addslashes($row['noaks_on']) . "',	
														idprod_on:'" .addslashes($row['id_prod'])."',
														pabrik_on:'" .addslashes($row['iddsb'])."',	
															};\n";
	}   
    ?>
	
      </select>
    </div>
  </div>
  
  

   <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Distributor</label>
    <div class="col-sm-5">
      <textarea class="form-control" rows="1" placeholder="Nama Distributor" id="distributor"readonly></textarea>
    </div>
  </div>
  
 
  
    
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Instansi</label>
    <div class="col-sm-8">
      <input class="form-control" rows="2" placeholder="Nama Instansi" id="instansi"  readonly>
    </div>
  </div>
 
  
  
   <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Type </label>
    <div class="col-sm-4">
      <input class="form-control" rows="2" placeholder="Type Produk" id="type" readonly>
    </div>
  </div>
  
  
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Nama Produk</label>
    <div class="col-sm-8">
    <textarea class="form-control" rows="2" placeholder="Nama Produk"  id="nama" readonly></textarea>
    </div>
    </div>

    <div class="form-group row">
  <label class="col-sm-3 col-form-label" >Jumlah</label>
    <div class="col-sm-2">
   <div class="input-group-prepend">
    <input class="form-control jumlah"  type="text"  style="height:28px; width:70px;" onkeyup="rp();count();"  id="jumlah"placeholder="99" readonly>
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
     <textarea class="form-control" rows="2" placeholder="Keterangan" id="ket" ></textarea>
     </div>
     </div>
     </fieldset> 
     </td>
     </tr>	
     </table>

	 <input  type="hidden" id="idprod_on" >
	 <input  type="hidden" id="pabrik_on" >

	<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="tambah" >Tambah Data</button>	

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
			url: "check_form/tambah/pengiriman.php",
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