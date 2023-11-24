
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
 
<legend>Tambah Data E-Faktur</legend>


<p id="error_message" class="font-weight-bold text-danger"></p>

<p  id="success_message" class="font-weight-bold text-success"></p>


 </fieldset>
 
<tr>
  <td class="cd" colspan="1">
 <fieldset class="field_form">
<legend class="legend_form">Info E-Faktur</legend>

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Nomor Referensi *</label>
    <div class="col-sm-3">
      <input class="form-control" type="number" rows="2" placeholder="-" id="noref"  >
    </div>
	<span id="availability"></span>
  </div>
  
  
  <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nomor e-Faktur *</label>
     <div class="col-sm-3">
    <input type="number"class="form-control" rows="2"  placeholder="Nomor urut pertama"  id="nofak1" >
	<br><p>Hingga</p>
	 <input  type="number" class="form-control" rows="2" placeholder="Nomor urut terakhir"  id="nofak2" >
     </div>
     </div>
	 
	 	  
 	   <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Tanggal Buat </label>
     <div class="col-sm-3">
    <input class="form-control" type="date" rows="2" placeholder="ID" id="tglbuat"  >
     </div>
     </div>

     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Catatan </label>
     <div class="col-sm-2">
     <textarea class="form-control" rows="1" placeholder="-"  id="ket"></textarea>
     </div>
     </div>


	 <fieldset class="field_form">


<blockquote class="blockquote">
  <p class="text-left text-info"  >Mohon diperiksa kembali <b>Nomor Urut</b> E-Faktur sebelum didaftarkan ke dalam Database</p>
 
</blockquote>
  </fieldset>
     </td>
	 
	</tr>
     </table>
	 
<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Harap tunggu, proses membutuhkan waktu < 5 menit.');" id="tambah" name="tambah" >Tambah Data</button>	
 
 <a href="./index.php?hlm=efaktur" formnovalidate  onclick="return confirm('Kembali ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
 </div>
 
 <div class="pb"></div>
 <div class="percent"></div>

 </form>	

 
<script>
$('#tambah').click(function(){
	var val= 0;
	var interval = setInterval(function(){
	}, 50);
});
</script>
  
  <script>
var interval = setInterval(function(){
	val = val + 1;
	$('.pb').progressbar({ value : val });
	$('.percent').text(val + '%');
	if(val == 100) {
		clearInterval(interval);
	}
},50)
</script>

<script> 
 $(document).ready(function(){  
   $(noref).blur(function(){
     
	 var noref = $(this).val();

     $.ajax({
      
	  url:'check_double/tambah/e-faktur.php',
      method:"POST",
      data:{noref:noref},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability').html('<span class="text-danger">Nomor Referensi Sudah Terpakai</span>');
        $('#tambah').attr("disabled", true);
       }
       else
       {
        $('#availability').html('<span class="text-success">Nomor Referensi Tersedia</span>');
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
	
	var noref = $("#noref").val();
	var nofak1 = $("#nofak1").val();
	var nofak2 = $("#nofak2").val();
	var tglbuat = $("#tglbuat").val();
	var ket = $("#ket").val();
	
	if(noref == "" || nofak1 == "" ||nofak2 == "") {
		$("#error_message").show().html("Wajib mengisi kolom bertanda *");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/tambah/e-faktur.php",
			data: "noref="+noref+"&nofak1="+nofak1+"&nofak2="+nofak2+"&tglbuat="+tglbuat+"&ket="+ket,
         
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