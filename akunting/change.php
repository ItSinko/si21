<?php 
$con = mysqli_connect("localhost","root","","kontrol_db");

$nolkppacc_on = $_GET['nolkppacc_on'];

$data = mysqli_query($con,"SELECT   * ,harga_on * jumlah_on as total
		
								   ,(harga_on * jumlah_on) * diskonacc_on / 100 as disfakturbeli							   
								   ,(harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100)  as totaljual
								   	  
								   
								   
								   ,((harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100)) / 1.1 as dppfaktur
								   ,(((harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100)) / 1.1) * 0.1 as ppnfaktur
								   
								   	,IF(iddsb='SPA',
									  (SUM(nilai)/ 1.1),
									  ((((harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100)) / 1.1) * 0.1)*1)AS ppn
									  
									  ,IF(iddsb='SPA',
									  (SUM(nilai)/ 1.1)*0.015,
									  ((((harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100)) / 1.1) * 0.1)*0)AS pph
								   
								    ,SUM(nilai) as kirim
								   
								   ,((harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100)) + SUM(nilai)  as totpiu
									
	
									,IF(iddsb='SPA',
									  ((((harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100)) + SUM( DISTINCT nilai))/1.1) * 0.985,
									  (harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100) + SUM( DISTINCT nilai) ) AS nilaiterima,
									  
									  IF(iddsb='SPA',
									  (((((harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100)) + SUM(DISTINCT nilai))/1.1) * 0.985) - SUM(DISTINCT nilai_lunas)  ,
									  ((harga_on * jumlah_on) - ((harga_on * jumlah_on) * diskonacc_on / 100) + SUM(DISTINCT nilai)) - SUM(DISTINCT nilai_lunas) ) AS selisihharga
									
									  FROM acc_on
									  
      											INNER JOIN gudang_on ON gudang_on.nolkppgdg_on = acc_on.nolkppacc_on
												INNER JOIN spa_on ON spa_on.nolkpp_on = acc_on.nolkppacc_on
												INNER JOIN ongkirdb_on ON ongkirdb_on.nolkppkirfk_on = acc_on.nolkppacc_on
												INNER JOIN distributor ON distributor.iddsb = acc_on.pabrikacc_on
												INNER JOIN history_lunas_on ON history_lunas_on.nolkppahs_fk = acc_on.nolkppacc_on
												INNER JOIN produk_master ON produk_master.id_prod = acc_on.idprodacc_on           
											            					
             									WHERE nolkppacc_on='$nolkppacc_on' ");
												
												
												
while ($accspa = mysqli_fetch_array($data)) {

?>


<!DOCTYPE html>
<html>
<head>
<title> Tambah Data </title>
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
	
	
	
	input[id=pabrik_on]{
display: none;
	               }
				   
input[id=idprod_on]{
display: none;
	               }
				   
input[id=diskonuji]{
display: none;
}
</style>

<body onload="uang();" onchange="uang();">

<div class="container-fluid" >
<table class="table" >


<form id="check" method="post" >
<fieldset>
 
<p id="error_message" class="font-weight-bold text-danger"></p>
<p  id="success_message" class="font-weight-bold text-success"></p>
<legend>Ubah Data</legend>
</fieldset>
 
<tr> 
 <td class="cd" colspan="1">  
 <fieldset class="field_form">
 <legend class="legend_form">Info Produk</legend>


	     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">No SJ</label>
     <div class="col-sm-6">
     <input type="text" class="form-control harga"  id="nosjgdg" placeholder="SPA-111"  value="<?php echo $accspa['nosj_on']; ?>" readonly>
     </div>
     </div> 




	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">No LKPP</label>
     <div class="col-sm-3">
     <input type="text" class="form-control"  id="nolkpp"  placeholder="No LKPP" value="<?php echo $accspa['nolkppacc_on']; ?>" readonly>
     </div>
     </div> 


     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">No AKN</label>
     <div class="col-sm-6">
     <input type="text" class="form-control harga"  id="noaks"  placeholder="AKN-999-999" value="<?php echo $accspa['noaks_on']; ?>" readonly>
     </div>
     </div> 
	 
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Distributor </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="1" placeholder="Distributor" id="dsb" readonly><?php echo $accspa['pabrik']; ?></textarea>
     </div>
     </div>


     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Nama Produk </label>
     <div class="col-sm-8">
     <textarea class="form-control" rows="2" placeholder="Nama Produk" id="nama"  readonly ><?php echo $accspa['nam_prod']; ?></textarea>
     </div>
     </div>


     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Harga</label>
     <div class="col-sm-6">
     <input type="text" class="form-control hargaprd"  id="harga" onkeyup="uang();hitung();"   placeholder="Harga Produk" readonly value="<?php echo $accspa['harga_on']; ?>">
     </div>
     </div> 
	 
	 
	 <div class="form-group row">
     <label class="col-sm-3 col-form-label" >Jumlah</label>
     <div class="col-sm-2">
     <div class="input-group-prepend">
     <input class="form-control jumlahprd"  type="text"  style="height:28px; width:70px;" onkeyup="hitung();" id="jumlah"placeholder="99" value="<?php echo $accspa['jumlah_on']; ?>"readonly>
	 
		 <input  value="<?= $accspa["satuan_prod"]; ?>" class="input-group-text " readonly style="height:28px; width:60px;">
     </div>
     </div>
     </div>
     </div> 
 
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Total</label>
     <div class="col-sm-6">
     <input type="text" class="form-control totalprd"  id="total"  value="<?php echo $accspa['total']; ?>"  onclick="uang();hitung();"  placeholder="Total Harga" readonly >
     </div>
     </div>
	 
	 </fieldset>
     </td>
	
     <td class="cd" colspan="1">  
     <fieldset class="field_form">
     <legend class="legend_form">Penghitungan Harga</legend> 
	 <div class="form-group row">
     <label class="col-sm-3 col-form-label" >Diskon *</label>
     <div class="col-sm-2">
     <div class="input-group-prepend">
     <input class="form-control tarifdiskon"  type="text"  style="height:28px; width:70px;"  id="tarif" onkeyup="hitung();" value="<?php echo $accspa['diskonacc_on']; ?>"  placeholder="99" >
	 <div class="input-group-text" style="height:28px;">
	 %
     </div>
     </div>
     </div>
     </div> 
	 
	 
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Diskon FP</label>
     <div class="col-sm-6">
      <input type="text" class="form-control diskonfaktur"  id="diskon" onkeyup="uang();"  placeholder="Diskon Faktur Penjualan"  value="<?php echo number_format($accspa['disfakturbeli']); ?>"  readonly >
     </div>
     </div>

     <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Total Jual Barang</label>
     <div class="col-sm-6">
      <input type="text" class="form-control totaljual"  id="totaljual"  onkeyup="uang();"  placeholder="Total Jual Barang" value="<?php echo number_format($accspa['totaljual']); ?>"readonly>
     </div>
     </div>
	 
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">DPP FP</label>
     <div class="col-sm-6">
      <input type="text" class="form-control dppfaktur"  id="dppfp" onkeyup="uang();"  placeholder="DPP Faktur Penjualan"  readonly value="<?php echo number_format($accspa['dppfaktur']); ?>">
     </div>
     </div>

	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">PPN FP</label>
     <div class="col-sm-6">
     <input type="text" class="form-control ppnfaktur"  id="ppnfp" onkeyup="uang();"  placeholder="PPN Faktur Penjualan" readonly value="<?php echo number_format($accspa['ppnfaktur']); ?>" >
     </div>
     </div>



	 
	 <div class="form-group row">
     <label  class="col-sm-3 col-form-label">Total Faktur Jual</label>
     <div class="col-sm-6">
      <input type="text" class="form-control totalfaktur" id="totalfp" onkeyup="uang();" placeholder="Total Faktur Penjualan" readonly value="<?php echo number_format($accspa['totpiu']); ?>">
     </div>
     </div>
	 </fieldset>
     </td>

	  <td  class="cd" colspan="1">  
 <fieldset class="field_form">
<legend class="legend_form">Info Faktur</legend>
	  <div class="form-group row">
     <label  class="col-sm-3 col-form-label">No Referensi</label>
     <div class="col-sm-6">
     <input type="text" class="form-control"  id="noref"  placeholder="No Referensi" value="<?php echo $accspa['noref_on']; ?>" readonly>
     </div>
     </div> 
  
	<div class="form-group row">
     <label  class="col-sm-3 col-form-label">E-Faktur</label>
     <div class="col-sm-6">
     <input type="text" class="form-control" value="<?php echo $accspa['noefak_on']; ?>"   placeholder="E-Faktur" readonly>
     </div>
     </div> 
	</fieldset>
  
    <fieldset class="field_form">
    <legend class="legend_form">Lain Lain</legend>
	<div class="form-group row">
    <label class="col-sm-3 col-form-label" >Batas</label>
    <div class="col-sm-2">
    <div class="input-group-prepend">
    <input class="form-control jumlah"  type="text"  style="height:28px; width:70px;"  id="term"  value="<?php echo $accspa['temphariacc_on']; ?>"   placeholder="99" readonly>
	<div class="input-group-text" style="height:28px;">Hari
     </div>
     </div>
     </div>
     </div> 
	
	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Realisasi *</label>
    <div class="col-sm-6">
    <input type="text" class="form-control realisasiacc"  id="realisasiacc" onkeyup="uang();hitung();" value="<?php echo $accspa['realisasiaccon']; ?>" placeholder="Biaya Realisasi" readonly  >
    </div>
    </div>

	<div class="form-group row">
    <label  class="col-sm-3 col-form-label">Selisih Bayar</label>
    <div class="col-sm-6">
    <input type="text" class="form-control selisihbayar"  id="selisihbayar" placeholder="Selisih Pembayaran"  onclick="uang();" readonly value="<?php echo number_format($accspa['selisihharga']); ?>"> 
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Kas / Bank *</label>
    <div class="col-sm-6 ">
    <select  class="form-control form-control-inline" style=" height:38px;"   id="kas" >
	<option value="<?php echo $accspa['kas_on']; ?>"><?php echo $accspa['kas_on']; ?></option>
	<option value="BCA SPA">BCA SPA</option>
	<option value="OCBC SPA">OCBC SPA</option>
	<option value="Tunai / Cash">Tunai / Cash</option>
	</select>
    </div>
    </div>
  
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Keterangan *</label>
    <div class="col-sm-6 ">
   <textarea rows="2" id="ket"class="form-control" placeholder="Keterangan"><?php echo $accspa["ketaccon"]; ?></textarea>
    </div>
  </div>
  
   
	    <div class="form-group row">
    <label  class="col-sm-3 col-form-label"><span style=" color: Red;"><i class="fa fa-exclamation-circle" ></i></span> Alasan data diubah </label>
    <div class="col-sm-6">
    <textarea class="form-control" rows="1" minlength="5" placeholder="Minimal isi 5 karakter..." id="ket_log" ></textarea>
    </div>
    </div>	
   </fieldset>

   
    <input type="ext" class="form-control "  id="idprod_on" placeholder="Selisih Pembayaran" value="<?php echo $accspa['id_prod']; ?>">
	  <input type="text" class="form-control "  id="pabrik_on" placeholder="Selisih Pembayaran" value="<?php echo $accspa['iddsb']; ?>">
	  <input type="text" class="form-control "  id="diskonuji" placeholder="Selisih Pembayaran" value="<?php echo $accspa['diskonujiacc_on']; ?>">
	 
</td>
</tr>
</table>


<button type="submit" class="btn btn-success" style="position: absolute; right:55%;"  onclick="return confirm('Yakin Update Data ?');" id="tambah" name="tambah" >Update Data  </button>	
     <a href="./index.php?hlm=accon" formnovalidate  onclick="return confirm('Yakin Batal ?');"  style="position: absolute; right:45%;"  class="btn btn-danger">Batal</a> 
</form>


<script type="text/javascript">    
    
	
	<?php echo $jsArray; ?>  
	function changeValue(nolkpp){  
	document.getElementById('nosjgdg').value = dtMhs[nolkpp].nosj;
	document.getElementById('idprod_on').value = dtMhs[nolkpp].idprod_on;	
	document.getElementById('pabrik_on').value = dtMhs[nolkpp].pabrik_on;	
	document.getElementById('diskonuji').value = dtMhs[nolkpp].diskonuji;	
	document.getElementById('noaks').value = dtMhs[nolkpp].noaks;  
	document.getElementById('nama').value = dtMhs[nolkpp].nama;
	document.getElementById('harga').value = dtMhs[nolkpp].harga;
	document.getElementById('jumlah').value = dtMhs[nolkpp].jumlah;	
	document.getElementById('dsb').value = dtMhs[nolkpp].distributor;
	document.getElementById('tarif').value = dtMhs[nolkpp].diskon;
	document.getElementById('term').value = dtMhs[nolkpp].expdate;
	document.getElementById('tglsj').value = dtMhs[nolkpp].tglsj;
  
	};
	</script>

	<script type="text/javascript" src="jquery.price_format.2.0.js"></script>

<script>
  function uang() {
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
						
			  $('#diskon').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
			
			 $('#totaljual').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
				
			 $('#dppfp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });
						
			 $('#ppnfp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });

			 $('#ekspedisi').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
			});
			
			$('#totalfp').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });

			
			$('#realisasiacc').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });

			$('#selisihbayar').priceFormat({
                prefix: 'Rp  ',
                thousandsSeparator:'.',
                centsLimit: 0
            });			
  }
</script>

<script>
function hitung() {
  	var jumlahprd 		= $(".jumlahprd").val();
	var hargaprd 		= $(".hargaprd").val();
    var totalprd 		= $(".totalprd").val();
	var tarifdiskon		= $(".tarifdiskon").val();
	var totaljual 	    = $(".totaljual").val();
	var dppfaktur 	    = $(".dppfaktur").val();
	var ppnfaktur 	    = $(".ppnfaktur").val();
	var totalfaktur 	    = $(".totalfaktur").val();
	var selisihbayar 	    = $(".selisihbayar").val();
	var diskon 			= 100;
	var koma 			= 1.1;
	var nolkoma 		= 0.1;
	
//split label rp
	 hargaprd   = hargaprd.split('Rp ').join('');
     hargaprd   = hargaprd.split('.').join('');
      
	 totalprd   = totalprd.split('Rp ').join('');
     totalprd   = totalprd.split('.').join('');
	 
	 totaljual   = totaljual.split('Rp ').join('');
     totaljual   = totaljual.split('.').join(''); 
	  
	  
	 dppfaktur   = dppfaktur.split('Rp ').join('');
     dppfaktur   = dppfaktur.split('.').join('');
	 
	  ppnfaktur   = ppnfaktur.split('Rp ').join('');
     ppnfaktur   = ppnfaktur.split('.').join('');
	 
	   totalfaktur   = totalfaktur.split('Rp ').join('');
     totalfaktur   = totalfaktur.split('.').join('');
	 
	
	 
 	 	 
	
	 
	  selisihbayar   = selisihbayar.split('Rp ').join('');
     selisihbayar   = selisihbayar.split('.').join('');

	 
	 //fungsi penjumlahan	  
     totalprd = Math.round(jumlahprd * hargaprd); 
     $(".totalprd").val(totalprd);
	 
	 diskonfaktur = Math.round(totalprd * tarifdiskon / diskon); 
    $(".diskonfaktur").val(diskonfaktur);
	
	totaljual = Math.round(totalprd - diskonfaktur); 
    $(".totaljual").val(totaljual);	
	
	dppfaktur = Math.round(totaljual / koma);
	$(".dppfaktur").val(dppfaktur);

	ppnfaktur = Math.round(dppfaktur * nolkoma);
	$(".ppnfaktur").val(ppnfaktur);
	
	totalfaktur = (totaljual*1 + 0); 
    $(".totalfaktur").val(totalfaktur);	
	
		
}
</script>
	
	<script src="jquery.chained.min.js"></script> 
	 <script>
     $("#efaktur").chained("#noref");
     </script>
<?php
}
?>
 	 	<script>
$("#check").submit(function(e) {
	e.preventDefault();
	var nolkpp = $("#nolkpp").val();	
	var noref = $("#noref").val();	
	var efaktur = $("#efaktur").val();	
	var tarif = $("#tarif").val();	
	var term = $("#term").val();	
	var kas = $("#kas").val();	
	var ket = $("#ket").val();	
	var idprod_on = $("#idprod_on").val();	
	var pabrik_on = $("#pabrik_on").val();	
	var diskonuji = $("#diskonuji").val();	
	var nosjgdg = $("#nosjgdg").val();	
	var ket_log = $("#ket_log").val();	
	
	
	
	
	if(nolkpp== "" || tarif== "" || efaktur== "" || kas== "" || ket== "" || ket_log== ""  ) {
		$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
		} else {
		$("#error_message").html("").hide();
		$.ajax({
			type: "POST",
			url: "check_form/edit/akuntingon.php",
			data: "nolkpp="+nolkpp+"&noref="+noref+"&efaktur="+efaktur+"&tarif="+tarif+"&term="+term+"&kas="+kas+"&ket="+ket+"&idprod_on="+idprod_on+"&pabrik_on="+pabrik_on+"&diskonuji="+diskonuji+"&nosjgdg="+nosjgdg+"&ket_log="+ket_log,
         
		 
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