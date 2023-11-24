<?php 

$nospb = $_GET['nospb'];

$datas = mysqli_query($con,"SELECT * ,harga_spb * jumlah_spb as total FROM spb INNER JOIN produk_master ON spb.idprod_spb = produk_master.id_prod WHERE nospb='$nospb' ");

while ($spb = mysqli_fetch_array($datas)) {


?>
<html>
<head>
<title>Tambah</title>
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
	.legend_form {
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

<body  onload="rp();" onkeyup="rp();" >
<div class="container-fluid">
<table class="table">
<form id="check" method="post">
<fieldset>
<legend>Ubah Data</legend>
<p id="error_message" class="font-weight-bold text-danger"></p>
<p id="success_message" class="font-weight-bold text-success"></p>
</fieldset>
 
<tr>

<?php 
//kode generate nomer otomatis
//$con = mysqli_connect("localhost","root","","kontrol_db");
$que= "SELECT max(nospb + 0) as macoo FROM spb";
$hasilnya = mysqli_query($con,$que);
$data = mysqli_fetch_array($hasilnya);
$nomercoo = $data['macoo'];
//convert to int
$nourut = (int)($nomercoo);
//plus
$nourut++;
//format string
$newID = sprintf("%01s",$nourut);
?>

<td colspan="1" class="cd">  
<fieldset class="field_form">
<legend class="legend_form">Info Produk</legend>

    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">No</label>
    <div class="col-sm-2">
    <input type="text" id="nomorspb" class="form-control" value="<?= $spb["nospb"]; ?>" readonly>
    </div>
	</div>

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Pelanggan</label>
    <div class="col-sm-8">
    <input class="form-control" id="pelanggan_spb" rows="2" value="<?= $spb["pelanggan_spb"]; ?>">
    </div>
	</div>
  
    <div class="form-group row">
	<label class="col-sm-3 col-form-label" >Untuk</label>
    <div class="col-sm-6">
    <input class="form-control" type="text" id="untuk_spb" placeholder="Untuk" value="<?= $spb["untuk_spb"]; ?>">
	</div>
	</div> 
  
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Type Produk</label>
    <div class="col-sm-6">
    <input class="form-control" type="text" id="type" value="<?= $spb["sing_prod"]; ?>" readonly>
	</div>
	</div>
  
	<input type="hidden" class="form-control" id="idproduk_spb" placeholder="Nama Distributor"readonly>
	
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Nama Produk</label>
    <div class="col-sm-8">
	<textarea class="form-control" rows="2" placeholder="Nama Produk" id="nama" readonly><?= $spb["nam_prod"]; ?></textarea>
    </div>
	</div>

</td>
 
<td colspan="1" class="cd">  
<fieldset class="field_form">
<legend class="legend_form">Harga Produk</legend>
   
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Harga/Unit</label>
    <div class="col-sm-4">
	<input type="text" class="form-control harga"  id="harga" value="<?= $spb["harga_spb"]; ?>" onkeyup="rp();count();">
    </div>
	</div>
    
	<div class="form-group row">
	<label class="col-sm-3 col-form-label" >Jumlah</label>
	<div class="col-sm-2">
	<div class="input-group-prepend">
	<input class="form-control jumlah"  type="text"  style="height:28px; width:70px;" onkeyup="rp();count();"  id="jumlah_spb" value="<?= $spb["jumlah_spb"]; ?>">
	<input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;" value="<?= $spb["satuan_prod"]; ?>">
   
	</div>
	</div>
	</div> 
	
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Harga Total</label>
    <div class="col-sm-4">
    <input type="text" class="form-control total"  id="total" placeholder="Rp 1.500"  onkeyup="rp();count();"  value="<?= $spb["total"]; ?>">
    </div>
    </div>

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Keterangan</label>
    <div class="col-sm-7">
    <textarea type="text" class="form-control" placeholder="Keterangan" id="ket_spb"><?= $spb["ket_spb"]; ?></textarea>
    </div>
    </div>


	
	  <div class="form-group row">
    <label  class="col-sm-3 col-form-label"><span style=" color: Red;"><i class="fa fa-exclamation-circle" ></i></span> Alasan data diubah </label>
    <div class="col-sm-6">

    <textarea class="form-control" rows="1" minlength="5" placeholder="Minimal isi 5 karakter..." id="ket_log" ></textarea>
    </div>
    </div>	
</td>
	
</fieldset>
</tr>	
</table>

<input type="hidden" value="<?php echo $_SESSION['username'] ?>"  id="username" >

<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Data ?');" id="tambah" name="tambah">Update Data</button>	
<a href="./index.php?hlm=spb" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a>

</form>
</div>

<script type="text/javascript">    
    <?php echo $jsArray; 
	?>  
	function changeValue(sing_prod){  
    document.getElementById('nama').value = dtMhs[sing_prod].nam_prod;    
	document.getElementById('harga').value = dtMhs[sing_prod].harga;  
	document.getElementById('idproduk_spb').value = dtMhs[sing_prod].idproduk_spb;
	};  
</script> 

<script src="jquery-1.10.2.min.js"></script>

<!--  JS nya Jquery Price Format  -->
<script type="text/javascript" src="jquery.price_format.2.0.js"></script>

<!--  JS nya Jquery Chained Format  -->
<script src="jquery.chained.min.js"></script>

<script>
	$("#type").chained("#distributor");    
</script>

<script>
	function rp() {
		$('#harga').priceFormat({
			prefix: 'Rp  ',
			thousandsSeparator:'.',
			centsLimit: 0
		});
		$('#total').priceFormat({
			prefix: 'Rp  ',
			thousandsSeparator:'.',
			centsLimit: 0
		});
	}
</script>
<script>
	function count() {
		var harga 		= $(".harga").val();
		var jumlah		= $(".jumlah").val();
		var total		= $(".total").val();
		
		harga   = harga.split('Rp ').join('');
		harga   = harga.split('.').join('');
			   
		total   = total.split('Rp ').join('');
		total   = total.split('.').join('');

		total = Math.round(jumlah* harga); 
		$(".total").val(total);
    }   
</script>

<script>
$("#check").submit(function(e) {
	
	e.preventDefault();
	var nomorspb = $("#nomorspb").val();
	var pelanggan_spb = $("#pelanggan_spb").val();
	var untuk_spb = $("#untuk_spb").val();
	var jumlah_spb = $("#jumlah_spb").val();
	var harga = $("#harga").val();
	var harga_spb = $("#harga_spb").val();
    var ket_spb = $("#ket_spb").val();
	var idproduk_spb = $("#idproduk_spb").val();
	var ket_log = $("#ket_log").val();
	var username = $("#username").val();

	if(nomorspb == "" || pelanggan_spb == "" || untuk_spb == "" || ket_log == "") {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
	} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/spb.php",
			data: "nomorspb="+nomorspb+"&pelanggan_spb="+pelanggan_spb+"&untuk_spb="+untuk_spb+"&jumlah_spb="+jumlah_spb+"&harga="+harga+"&harga_spb="+harga_spb+"&ket_spb="+ket_spb+"&idproduk_spb="+idproduk_spb+"&ket_log="+ket_log+"&username="+username,
         
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