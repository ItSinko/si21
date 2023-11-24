
<html>
<head>
<title>Tambah Data Produk</title>
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
			width: 45%; 
			border: 1px solid #ddd;
			border-radius: 4px; 
			padding: 5px 5px 5px 10px; 
			background-color: #ffffff;
			text-align: center;
		}
		
		 form-control-inline {
    height: 10%;

}
</style>
</head>

<body onkeyup="rp();">
<div class="container-fluid" >

 <table class="table" >
<form id="check" method="post">
 
<legend>Tambah Data Produk</legend>

<p id="error_message" class="font-weight-bold text-danger"></p>

<p  id="success_message" class="font-weight-bold text-success"></p>



 </fieldset>
 
<tr>


<td colspan="1">
  


<fieldset class="field_form">
<legend class="legend_form">Info Produk Baru</legend>


 <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Kode Produk </label>
    <div class="col-sm-4">
   <input type="text" class="form-control" placeholder="-" id="kode">
    </div>
	</div>
  
	<div class="form-group row">
    <label  class="col-sm-4 col-form-label">Merk *</label>
    <div class="col-sm-4 ">
      <select  class="form-control form-control-inline" style=" height:38px;"   id="merk"   >
	<option value="" >Pilih Merk</option>
	<option value="ELITECH" >ELITECH</option>
	<option value="MENTOR" >MENTOR</option>
	<option value="VANWARD" >VANWARD</option>
	<option value="AEOLUS">AEOLUS</option>
	<option value="OTHER" >OTHER</option>
     </select>
     </div>
	</div>
 
	
	<div class="form-group row">
    <label  class="col-sm-4 col-form-label">Tipe Produk*</label>
    <div class="col-sm-6">
    <input type="text" class="form-control" placeholder="-" id="type" >
   	  <span id="availability"></span>
    </div>
	</div>
	

    <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Nama Produk *</label>
    <div class="col-sm-8">
      <textarea class="form-control" rows="2" placeholder="-" id="namaprd" ></textarea>
    </div>
	</div>
	
	<div class="form-group row">
    <label  class="col-sm-4 col-form-label">Satuan *</label>
    <div class="col-sm-4 ">
      <select  class="form-control form-control-inline" style=" height:38px;"   id="satuan"  >
	<option value="" >-Pilih Satuan-</option>
	<option value="Pcs" >Pcs</option>
	<option value="Unit" >Unit</option>
	<option value="Packs" >Packs</option>
	<option value="Meter" >Meter</option>
	<option value="Roll" >Roll</option>
	<option value="Box" >Box (Per 10 pcs)</option>
     </select>
     </div>
 </div>
	
	
	
	
 <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Kategori Produk *</label>
    <div class="col-sm-4 ">
      <select  class="form-control form-control-inline" style=" height:38px;"   id="kategori"  >
	<option value="" >-Pilih Kategori-</option>
	<option value="Alat Kesehatan" >Alat Kesehatan</option>
	<option value="Water Treatment" >Water Treatment</option>
	<option value="Aksesoris" >Aksesoris</option>
	<option value="Sparepart" >Sparepart</option>
	<option value="Lampu" >Lampu</option>
	<option value="Lain Lain" >Lain Lain</option>
     </select>
     </div>
 </div>
 

   </td>

	
	    <td colspan="1">  
 <fieldset class="field_form">
<legend class="legend_form">Harga Produk Baru</legend>
      <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Nomor AKD </label>
    <div class="col-sm-7">
     <input type="text" class="form-control" placeholder="-" id="noakd">
    </div>
  </div>

  
  
  
    <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Jatuh Tempo AKD</label>
    <div class="col-sm-7">
      <input type="date" class="form-control " placeholder="-" id="jatuhakd" >
    </div>
  </div>
  
  
	
	
<div class="form-group row">
    <label  class="col-sm-4 col-form-label">Harga Produk *</label>
    <div class="col-sm-7">
      <input type="text" class="form-control harga" placeholder="Rp."   id="harga"    onkeyup="rp();count();" >
    </div>
  </div>
  
  
  
  
    <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Dasar Pengenaan Pajak (DPP)</label>
    <div class="col-sm-7">
      <input type="text" class="form-control hargadpp"   placeholder="Rp."    id="hargadpp"   onkeyup="rp();count();"  readonly>
    </div>
  </div>
	
     <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Nama COO *</label>
    <div class="col-sm-7">
      <input type="text" class="form-control "   placeholder="-" id="namacoo" >
    </div>
  </div>
    
	
	<div class="form-group row">
    <label  class="col-sm-4 col-form-label">Catatan</label>
    <div class="col-sm-8">
      <textarea class="form-control" rows="2" placeholder="-" id="ket" ></textarea>
    </div>
	</div>
   </fieldset> 
  </td>

  

 </tr>							
</table>

<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Apakah data sudah benar ?');" id="tambah" name="tambah" >Tambah Data</button>	
  
<a href="./index.php" formnovalidate  onclick="return confirm('Kembali ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>

  </form>

	 <script>
		  function rp() {
		  
		  $('#harga').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
				
			$('#hargadpp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
	  }
	</script>
			
<script>
           function count() {
                var harga 		= $(".harga").val();
				var jumlah		= 1.1;
				var hargadpp 		= $(".hargadpp").val();
		
		

			   harga   = harga.split('Rp ').join('');
			   harga   = harga.split('.').join('');

			   
			   hargadpp   = hargadpp.split('Rp ').join('');
			   hargadpp   = hargadpp.split('.').join('');

					hargadpp = Math.round(harga/jumlah); 
					$(".hargadpp").val(hargadpp);
					
                
                }
            
</script>


<script>
$('#type').keyup(function (){
    $('#namacoo').val($(this).val()); // <-- reverse your selectors here
});
</script>


  <script src="jquery-1.10.2.min.js"></script>
  
	     <!--  JS nya Jquery Price Format  -->
        <script type="text/javascript" src="jquery.price_format.2.0.js"></script>

				 <!--  JS nya Jquery Chained Format  -->
		<script src="jquery.chained.min.js"></script>			

		<script> 

	$(document).ready(function(){  
   $('#type').blur(function(){
     
	 var type = $(this).val();

     $.ajax({
      
	  url:'check_double/tambah/produk.php',
      method:"POST",
      data:{type:type},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability').html('<span class="text-danger">Tipe Produk Sudah Terpakai</span>');
        $('#tambah').attr("disabled", true);
       }
       else
       {
        $('#availability').html('<span class="text-success">Tipe Produk Tersedia</span>');
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
	
	var kode = $("#kode").val();
	var merk = $("#merk").val();
	var type = $("#type").val();
	var namaprd = $("#namaprd").val();
	var kategori = $("#kategori").val();
	var noakd = $("#noakd").val();
    var jatuhakd = $("#jatuhakd").val();
	var harga = $("#harga").val();
	var hargadpp = $("#hargadpp").val();
	var namacoo = $("#namacoo").val();
	var ket = $("#ket").val();
	var satuan = $("#satuan").val();
	

	if(type == "" || namaprd == "" || kategori == "" || harga == "" || hargadpp == ""|| namacoo == "" || satuan == "") {
		$("#error_message").show().html("Wajib mengisi kolom bertanda *");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/tambah/produk.php",
			data: {kode:kode,
			merk:merk,
			type:type,
			namaprd:namaprd,
			kategori:kategori,
			noakd:noakd,
			jatuhakd:jatuhakd,
			harga:harga,
			hargadpp:hargadpp,
			namacoo:namacoo,
			ket:ket,
			satuan:satuan},
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
