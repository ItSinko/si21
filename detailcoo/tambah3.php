
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
<p id="error_message" class="font-weight-bold text-danger"></p>
<p id="success_message" class="font-weight-bold text-success"></p>
 
<form method="post" id="check">
	<input type="text" id="idprod_on">
	<input type="text"id="tes" >
	<input type="text" id="pabrik_on">
<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Tambah Data ?');"  name="tambah" >Tambah Data</button>


<a href="./index.php?hlm=spa" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>
	</div>
	</form>	

	
	     <script>
	 $("#check").submit(function(e) {
		 
	 e.preventDefault();
	 
	 var pabrik_on  = $("#pabrik_on ").val();
	 var idprod_on  = $("#idprod_on ").val();
	 var tes  = $("#tes ").val();
	
	if(idprod_on == "" || pabrik_on == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/tambah/detailcoo.php",
			data: "pabrik_on="+pabrik_on+"&idprod_on="+idprod_on+"&tes="+tes,
         
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
	 <script src="jquery.chained.min.js"></script>
	
	 </body>
	 </html>