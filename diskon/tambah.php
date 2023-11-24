
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
 
<legend>Tambah Data</legend>


<p id="error_message" class="font-weight-bold text-danger"></p>

<p  id="success_message" class="font-weight-bold text-success"></p>


 </fieldset>
 
<tr>




  <td class="cd" colspan="1">
  
  
  
  
 <fieldset class="field_form">
<legend class="legend_form">Info Distributor</legend>

  
 
  
       <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nama Distributor *</label>
     <div class="col-sm-1">
     <select  class="selectpicker"   id="dsb" data-live-search="true" title="Pilih Distributor" data-width="500px" onchange="changeValue(this.value)">
      
               
	  
        <?php 
	$con = mysqli_connect("localhost","root","","kontrol_db");
    $result = mysqli_query($con,"SELECT  * from distributor ORDER BY pabrik ASC");    
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="' . $row['pabrik'] . '">' . $row['pabrik'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['pabrik'] . "'] = {iddsb:'" . addslashes($row['iddsb']) . "',
                                                                               };\n";
	}  
	?>
     </select>
     </div>
     </div>
  

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">ID Distributor</label>
    <div class="col-sm-1">
      <input class="form-control" rows="2" placeholder="ID Distributor"     id="iddsb" readonly>
    </div>
  </div>

	 
	        <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Kategori Produk *</label>
     <div class="col-sm-2">	
	<select id="kategori" name="kategori" class="form-control form-control-inline ">
		 <?php 
	
    $results = mysqli_query($con,"SELECT  kategori from produk_master GROUP BY kategori ASC");        
    while ($row = mysqli_fetch_array($results)) {    
        echo '<option value="' . $row['kategori'] . '">' . $row['kategori'] . '</option>';    
       
                                                                               
	}  
	?>
		
	</select>
	</div>
	</div>
	
	
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Disko Nota *</label>
	<div class="col-sm-2">
	<div class="input-group-prepend">
	<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"  id="diskonnota"   placeholder="99" >
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
	<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"   id="diskonuji"   placeholder="99" >
	<div class="input-group-text" style="height:28px;">
	%
	</div>
	</div>
	</div>
	</div> 
	
	
	
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Temp</label>
	<div class="col-sm-2">
	<div class="input-group-prepend">
	<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"  id="temp"   placeholder="99" >
	<div class="input-group-text" style="height:28px;">
	Hari
	</div>
	</div>
	</div>
	</div> 

	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Keterangan </label>
	<div class="col-sm-6">
	<textarea class="form-control" rows="1" placeholder="Keterangan"  id="ket"></textarea>
	</div>
	</div>

</td>
</tr>	
</table>

<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="tambah" >Tambah Data</button>	
<a href="./index.php?hlm=diskon" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
</div>

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
	
	var iddsb = $("#iddsb").val();
	var kategori = $("#kategori").val();
	var diskonnota = $("#diskonnota").val();
	var diskonuji = $("#diskonuji").val();
	var temp = $("#temp").val();
	var ket = $("#ket").val();
	
	if(iddsb == "" || kategori == "" || diskonnota == "" ||   diskonuji == "" ) {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/tambah/diskonproduk.php",
			data: "iddsb="+iddsb+"&kategori="+kategori+"&diskonnota="+diskonnota+"&diskonuji="+diskonuji+"&temp="+temp+"&ket="+ket,
         
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