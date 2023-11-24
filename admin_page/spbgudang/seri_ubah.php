<?php 
$con = mysqli_connect("localhost","root","","kontrol_db");

$idseri_spb = $_GET['idseri_spb'];

$data = mysqli_query($con,"SELECT * FROM seri_spb WHERE idseri_spb='$idseri_spb' ");

while ($noseri = mysqli_fetch_array($data)) {

?> 
<?php 
$nogdg_spb=$_GET['nogdg_spb']; 
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



	input[id=idserifk]{
display: none;
	               }
</style>

<body>

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
     <legend class="legend_form">Nomer Seri</legend>
  
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">ID *</label>
     <div class="col-sm-2">
     <input class="form-control" rows="2" placeholder="ID" id="idseri"  value="<?php echo $nogdg_spb; ?>" readonly >
     </div>
     </div>
  
  
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nomer Seri *</label>
     <div class="col-sm-3">
	 <input class="form-control" rows="2" placeholder="Nomer Seri" id="noseri"  value="<?= $noseri["noseri_spb"]; ?>">
	 <span id="availability"></span>
     </div>
     </div>

	 </td>      
     </tr>	
     </table>

	 <input type="text" value="<?= $noseri["idseri_spb"]?>" id="idserifk">
	 
	 <button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Nomer Seri ?');" id="tambah" name="tambah" >Update Data</button>	

	 <a href="./index.php?hlm=gudangspb&aksi=more&nogdg_spb=<?php echo $nogdg_spb; ?>" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style=	 "position: absolute; right:45%;"  class="btn btn-danger">Batal</a></div>

</form>	


<script> 
 $(document).ready(function(){  
   $('#noseri').blur(function(){
     
	 var noseri = $(this).val();

     $.ajax({
      
	  url:'check_double/edit/noserispb.php',
      method:"POST",
      data:{noseri:noseri},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability').html('<span class="text-danger">Nomer Seri Sudah Terpakai</span>');
        $('#tambah').attr("disabled", true);        
       }
       else
       {
        $('#availability').html('<span class="text-success">Nomer Seri Tersedia</span>');
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
	
	var idseri = $("#idseri").val();
	var noseri = $("#noseri").val();
	var idserifk = $("#idserifk").val();
	

	if(noseri == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/noserispb.php",
			data: "idseri="+idseri+"&noseri="+noseri+"&idserifk="+idserifk,
         
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
   
<?php
}

?>