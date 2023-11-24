
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

 
<form  id="check" method="post"> 
 <fieldset >
 
<legend>Tambah Data Distributor</legend>


<p id="error_message" class="font-weight-bold text-danger"></p>

<p  id="success_message" class="font-weight-bold text-success"></p>


 </fieldset>
 
<tr>

     <td class="cd" colspan="1">
     <fieldset class="field_form">
	 <legend class="legend_form">Info Distributor</legend>

     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">ID Distributor *</label>
     <div class="col-sm-2">
     <input class="form-control" rows="3" placeholder="-" id="iddsb"  >
     </div>
	 <span id="availability"></span>
     </div>
  
  
  <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nama Distributor *</label>
     <div class="col-sm-6">
    
	<textarea class="form-control" rows="1" placeholder="-" id="distributor" ></textarea>
     </div>
     </div>
	 
	 
	  <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Alamat </label>
     <div class="col-sm-5">
     <textarea class="form-control" rows="1" placeholder="-" id="alamat" ></textarea>
     </div>
     </div>
	 
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">E-mail </label>
     <div class="col-sm-5">
     <textarea class="form-control" rows="1" placeholder="distributor@email.com" id="alamat_email"></textarea>
     </div>
     </div>

 
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Telepon</label>
    <div class="col-sm-3">
	  <input class="form-control" rows="2" placeholder="-" id="telepon"  >
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
	<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"  id="diskonnota"   placeholder="-" >
	<div class="input-group-text" style="height:28px;"> % 
	</div>
	</div>
	</div>
	</div> 

	
	
	
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Tarif Uji Fungsi *</label>
	<div class="col-sm-2">
	<div class="input-group-prepend">
	<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"   id="diskonuji"   placeholder="-" >
	<div class="input-group-text" style="height:28px;"> % 
	</div>
	</div>
	</div>
	</div> 
	
	
	
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Jatuh Tempo *</label>
	<div class="col-sm-2">
	<div class="input-group-prepend">
	<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"  id="temp"   placeholder="-" >
	<div class="input-group-text" style="height:28px;">Hari
	</div>
	</div>
	</div>
	</div> 

	<div class="form-group row">
	<label  class="col-sm-3 col-form-label">Catatan</label>
	<div class="col-sm-6">
	<textarea class="form-control" rows="1" placeholder="-"  id="ket"></textarea>
	</div>
	</div>
     </td>
   
      
     </tr>	
     </table>


	 
<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="tambah" name="tambah" >Tambah Data</button>	

 
 <a href="./index.php?hlm=dsb" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
 </div>
 

 </form>	

 

  

<script> 
 $(document).ready(function(){  
   $('#iddsb').blur(function(){
     
	 var iddsb = $(this).val();

     $.ajax({
      
	  url:'check_double/tambah/distributor.php',
      method:"POST",
      data:{iddsb:iddsb},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability').html('<span class="text-danger">ID Distributor Sudah Terpakai</span>');
        $('#tambah').attr("disabled", true);
       }
       else
       {
        $('#availability').html('<span class="text-success">ID Distributor Tersedia</span>');
        $('#tambah').attr("disabled", false);
       }
      }
     })

  });
 });  
</script>

  
<script>
$("#check").submit(function(e) {
	e.preventDefault();
	
	var iddsb = $("#iddsb").val();
	var distributor = $("#distributor").val();
	var alamat = $("#alamat").val();
	var alamat_email = $("#alamat_email").val();
	var telepon = $("#telepon").val();
	var diskonnota = $("#diskonnota").val();
	var diskonuji = $("#diskonuji").val();
	var temp = $("#temp").val();
	var ket = $("#ket").val();
	
	

	if(iddsb == "" || distributor == "" || diskonnota == "" || diskonuji == ""|| temp == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/tambah/distributor.php",
			data: "iddsb="+iddsb+"&distributor="+distributor+"&alamat="+alamat+"&telepon="+telepon+"&ket="+ket+"&diskonnota="+diskonnota+"&diskonuji="+diskonuji+"&temp="+temp+"&alamat_email="+alamat_email,
         
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