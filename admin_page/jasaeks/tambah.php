
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

<body >

<div class="container" >




 <table class="table" >
<form id="check" method="post">
 <fieldset >
 
<legend>Tambah Data Ekspedisi</legend>



<p id="error_message" class="font-weight-bold text-danger"></p>

<p  id="success_message" class="font-weight-bold text-success"></p>

 </fieldset>
 
<tr>

  <td class="cd" colspan="1">
  
 
 <fieldset class="field_form">
<legend class="legend_form">Info Ekspedisi</legend>


    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Nama Ekspedisi *</label>
    <div class="col-sm-3">
    <input type="text" class="form-control" placeholder="-"  id="ekspedisi"  >
	  <span id="availability"></span>
    </div>
	</div>
  
  

     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nomor Telepon </label>
    
	 <div class="col-sm-2">
	
     <input type="text" class="form-control"  placeholder="-" name="nolkpp" id="telp" >
     </div>
	 <span id="availability"></span>
     </div>

  
	  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Alamat Ekspedisi</label>
    <div class="col-sm-3">
      <textarea class="form-control" rows="2" placeholder="-" id="alamat" ></textarea>
    </div>
	</div> 

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Jalur Pengiriman *</label>
    <div class="col-sm-5">
    <select class="form-control" id="via"   style=" height:28px; width:310px;"  >
   <option value="">- Pilih Jalur Pengiriman-</option>
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
	
     <input type="text" class="form-control"  placeholder="Jurusan Daerah Ekspedisi" name="nolkpp" id="jurusan" >
     </div>
	 <span id="availability"></span>
     </div>
	 
	 
	 
	 
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Catatan</label>
    <div class="col-sm-4">
      <textarea class="form-control" rows="2" placeholder="-" id="ket" ></textarea>
    </div>
	</div>               
   </td>

   
   
  
 </tr>							
</table>


<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');" id="register" name="tambah" >Tambah Data</button>	

 
 <a href="./index.php?hlm=jasaeks" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
 </div>
   </form>	


  
  

  
<script>
$("#check").submit(function(e) {
	e.preventDefault();
	
	var ekspedisi = $("#ekspedisi").val();
	var telp = $("#telp").val();
	var alamat = $("#alamat").val();
	var via = $("#via").val();
	var jurusan = $("#jurusan").val();
	var ket = $("#ket").val();
	

	if(ekspedisi == "" || via == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/tambah/ekspedisi.php",
			data: "ekspedisi="+ekspedisi+"&telp="+telp+"&alamat="+alamat+"&via="+via+"&jurusan="+jurusan+"&ket="+ket,
         
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

 $(document).ready(function(){  
   $('#ekspedisi').blur(function(){
     
	 var ekspedisi = $(this).val();

     $.ajax({
      
	  url:'check_double/tambah/ekspedisi.php',
      method:"POST",
      data:{ekspedisi:ekspedisi},
      success:function(data)
      {
       if(data != '0')
       {
     $('#availability').html('<span class="text-danger">Nama ekspedisi terpakai !</span>');
        $('#register').attr("disabled", true);
       }
       else
       {
      $('#availability').html('<span class="text-success">Nama ekspedisi bisa digunakan</span>');
        $('#register').attr("disabled", false);
       }
      }
     })

  });
 });  
</script>

</div>
</body>
</html>