
</html><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Laporan Keuangan</title>
  
    <style>
      
        .dropdown-filter-dropdown {
    position:relative;
    display:inline-block;
}

.dropdown-filter-icon {
    margin-left:5px;
    line-height:1.3;
    border:1px solid black;
}


.dropdown-filter-icon:hover {
    cursor:pointer;
}

.checkbox-container {
    max-height: 400px;
    overflow-y: scroll;
}
.dropdown-filter-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 200px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    padding-bottom:5px;
    padding-top:5px;
    padding-right:5px;
    padding-left:5px;
	text-align:left;
	}

.dropdown-filter-content div {
    margin-top:5px;
    margin-left:5px;
    margin-right:5px;
    margin-bottom:5px;
}

.dropdown-filter-content div.dropdown-filter-search {
    margin-bottom:10px;
    margin-top:10px;
}


.dropdown-filter-content div.dropdown-filter-sort {
    padding-top:5px;
    padding-bottom:5px;
}

.dropdown-filter-content div.dropdown-filter-sort:hover {
    background-color:#e1e5e7;
    cursor:pointer;
}

.dropdown-filter-content div.dropdown-filter-sort span {
    margin-right:5px;
    margin-left:5px;
    margin-top:5px;
    margin-bottom:5px;
    color:#000000;
}

.arrow-down {
    border: solid black;
    border-width: 0 3px 3px 0;
    display: inline-block;
    padding: 3px;
    margin-right:5px;
    margin-left:5px;
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
}
 

	  
	  
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
	font-family:'Lucida Fax','Calibri',sans-serif;
	font-size:12px;
	

	}

table th {
  padding: 0;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  text-align: center; 


 }
	table td {
 text-align: center; 
}


th, td {
    text-align: center;
    padding: 0;
  vertical-align: middle;
	}
 
tr:nth-child(even){background-color: #f2f2f2}


tr td:hover { background: #666; color: #FFF; }  
/* Hover cell effect! */







hover {opacity: 1}

/* STYLE UNTUK HURUF */


th, td {
    text-align: left;
    padding: 8px;
}

[class^="cus-"],
[class*=" cus-"] {
  display: inline-block;
  width: 17px;
  height: 16px;
  *margin-right: .3em;
  line-height: 14px;
  vertical-align: text-top;
  background-image: url("spritesheet.png");
  background-position: 14px 14px;
  background-repeat: no-repeat;
}
[class^="cus-"]:last-child,
[class*=" cus-"]:last-child {
  *margin-left: 0;
}

.cus-date_add {
    width: 16px;
    height: 16px;
    background-position: -395px -265px;
}


.cus-date_edit {
    width: 16px;
    height: 16px;
    background-position: -447px -265px;
}

.cus-flag_blue {
    width: 16px;
    height: 16px;
    background-position: -317px -343px;
}


.cus-cross {
    width: 16px;
    height: 16px;
    background-position: -369px -239px;
}

.cus-application_form_edit {
    width: 16px;
    height: 16px;
    background-position: -343px -5px;
}


.cus-add {
    width: 16px;
    height: 16px;
    background-position: -31px -5px;
}


.cus-house {
    width: 16px;
    height: 16px;
    background-position: -187px -395px;
}
.cus-zoom {
    width: 16px;
    height: 16px;
    background-position: -135px -811px;
}

.cus-exclamation {
    width: 16px;
    height: 16px;
    background-position: -525px -317px;
}

 .cus-arrow_right {
    width: 16px;
    height: 16px;
    background-position: -551px -31px;
}
.cus-accept {
    width: 16px;
    height: 16px;
    background-position: -5px -5px;
}

.cus-error {
    width: 16px;
    height: 16px;
    background-position: -421px -317px;
}

.cus-cancel {
    width: 16px;
    height: 16px;
    background-position: -577px -135px;
}

.cus-page {
    width: 16px;
    height: 16px;
    background-position: -473px -499px;
}


.center {
    text-align: center;
}

.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

.pagination a.active {
    background-color: #000000;
    color: white;
    border-radius: 5px;
}

.pagination a:hover:not(.active) {
    background-color: #ddd;
    border-radius: 5px;
}


	/*STYLE UNTUK HORIZONTAL ! */
.horizon {
  width: 5000px;
  height: 550px;
  overflow-y: auto;
  overflow-x: auto;
}



.home {
    position: relative;
    display: inline-block;
    
}

.home .tooltips1 {
    visibility: hidden;
    width: 180px;
    background-color: #FEF9FD;
    color: #010101;
    
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the home */
    position: absolute;
    z-index: 1;
}

.home:hover .tooltips1 {
    visibility: visible;
}

.tooltips1 {
	
	left:89px;
font-size: 12px
	
	}

	
	
		
	
	/*PEMBATAS TOOLTIPS ! */
	

.cus-cancel{
    position: relative;
    display: inline-block;
    
}

.cus-cancel .tooltips6 {
    visibility: hidden;
    width: 50px;
    background-color: #FEF9FD;
    color: #010101;
 
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the button */
    position: absolute;
    z-index: 1;
}

.cus-cancel:hover .tooltips6 {
    visibility: visible;
}

.tooltips6 {
	position: absolute;
	left:20px;
	top :20px;
font-size: 13px
	
	}
	
	
	
	
		/*PEMBATAS TOOLTIPS ! */
	

.cus-accept{
    position: relative;
    display: inline-block;
    
}

.cus-accept .tooltips7 {
    visibility: hidden;
    width: 90px;
    background-color: #FEF9FD;
    color: #010101;
 
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the button */
    position: absolute;
    z-index: 1;
}

.cus-accept:hover .tooltips7 {
    visibility: visible;
}

.tooltips7 {
	position: absolute;
	left:20px;
	top :20px;
font-size: 13px;
	
	}
		
	
		/*PEMBATAS TOOLTIPS ! */
	

.cus-error{
    position: relative;
    display: inline-block;
    
}

.cus-error .tooltips8 {
    visibility: hidden;
    width: 90px;
    background-color: #FEF9FD;
    color: #010101;
 
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the button */
    position: absolute;
    z-index: 1;
}

.cus-error:hover .tooltips8 {
    visibility: visible;
}

.tooltips8 {
	position: absolute;
	left:20px;
	top :20px;
font-size: 13px;
}


	/*PEMBATAS TOOLTIPS ! */
	

.cus-application_form_edit {
    position: relative;
    display: inline-block;
    
}

.cus-application_form_edit .tooltips4 {
    visibility: hidden;
    width: 180px;
    background-color: #FEF9FD;
    color: #010101;
 
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the button */
    position: absolute;
    z-index: 1;
}

.cus-application_form_edit:hover .tooltips4 {
    visibility: visible;
}

.tooltips4 {
	position: absolute;
	right:1px;
		top: 20px;
font-size: 10px
	
	}
	
	
	
		/*PEMBATAS TOOLTIPS ! */
	

.cus-cross {
    position: relative;
    display: inline-block;
    
}

.cus-cross .tooltips3 {
    visibility: hidden;
    width: 180px;
    background-color: purple;
    color: white;
 
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the button */
    position: absolute;
    z-index: 1;
}

.cus-cross:hover .tooltips3 {
    visibility: visible;
}

.tooltips3 {
	position: absolute;
	right:1px;
		top: 20px;
font-size: 10px
	
	}	
	

	
	
	.button {
    position: relative;
    display: inline-block;
    
}

.button .tooltips2 {
    visibility: hidden;
    width: 180px;
    background-color: #FEF9FD;
    color: #010101;
    
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the button */
    position: absolute;
    z-index: 1;
}

.button:hover .tooltips2 {
    visibility: visible;
}

.tooltips2 {
	
	left:102px;
font-size: 12px
	
	}
	
	
	
		

.cus-arrow_right{
    position: relative;
    display: inline-block;
    
}

.cus-arrow_right .tooltips5 {
    visibility: hidden;
    width: 180px;
    background-color: #FEF9FD;
    color: #010101;
 
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the button */
    position: absolute;
    z-index: 1;
}

.cus-arrow_right:hover .tooltips5 {
    visibility: visible;
}

.tooltips5 {
	position: absolute;
	right:1px;
	top :20px;
font-size: 10px
	
	}
	

		/*PEMBATAS TOOLTIPS ! */
.cus-date_add{
    position: relative;
    display: inline-block;
    
}

.cus-date_add .tglbuat {
    visibility: hidden;
    width: 90px;
    background-color: #FEF9FD;
    color: #010101;
 
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the button */
    position: absolute;
    z-index: 1;
}

.cus-date_add:hover .tglbuat {
    visibility: visible;
}

.tglbuat {
	position: absolute;
	left:10px;
	top :20px;
font-size: 13px;
}



		/*PEMBATAS TOOLTIPS ! */
.cus-date_edit{
    position: relative;
    display: inline-block;
    
}

.cus-date_edit .tgledit {
    visibility: hidden;
    width: 90px;
    background-color: #FEF9FD;
    color: #010101;
 
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the button */
    position: absolute;
    z-index: 1;
}

.cus-date_edit:hover .tgledit {
    visibility: visible;
}

.tgledit {
	position: absolute;
	left:10px;
	top :20px;
font-size: 13px;
}




		/*PEMBATAS TOOLTIPS ! */
.cus-flag_blue{
    position: relative;
    display: inline-block;
    
}

.cus-flag_blue .ket {
    visibility: hidden;
    width: 90px;
    background-color: #FEF9FD;
    color: #010101;
 
    text-align: center;
    
    padding: 5px 0;
border:solid 1px black;
    /* Position the button */
    position: absolute;
    z-index: 1;
}

.cus-flag_blue:hover .ket {
    visibility: visible;
}

.ket {
	position: absolute;
	left:10px;
	top :20px;
font-size: 13px;
}




select[id=nama]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 95px;
    left: 390px;

	}

	select[id=dsb]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 95px;
    left: 760px;

	}

		select[id=nego]{
    width: 15%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 95px;
    left: 1160px;

	}


	
	          	/*Untuk label samping */
    .nama{
	font-size:14px;
   		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	position: absolute;
	top: 116px;
    left: 260px;
   }
   	 
	 
	          	/*Untuk label samping */
    .dsb{
	font-size:14px;
   		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	position: absolute;
	top: 116px;
    left: 650px;
   }
   	          	/*Untuk label samping */
    .nego{
	font-size:14px;
   		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	position: absolute;
	top: 116px;
    left: 1050px;
   }
   
   
   /*Untuk tombol Submit */
button[type=submit] {
    width: 8%;
   	background:#556B2F;
    box-shadow: inset -1px -1px 3px #FF62A7;
	-moz-box-shadow: inset -1px -1px 3px #FF62A7;
	-webkit-box-shadow: inset -1px -1px 3px #FF62A7;
		border-radius: 3px;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	position: absolute;
	top: 150px;
    left: 800px;
	}
	
	
	   /*Untuk tombol Submit */
button[type=button] {
    width: 7%;
   	background:#ff8080;
    box-shadow: inset -1px -1px 3px #FF62A7;
	-moz-box-shadow: inset -1px -1px 3px #FF62A7;
	-webkit-box-shadow: inset -1px -1px 3px #FF62A7;
		border-radius: 3px;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	position: absolute;
	top: 35px;
    left: 30px;
	}
		
	   /*Untuk tombol Submit */
button[type=home] {
    width: 6%;
   	background:#cc3333;
    box-shadow: inset -1px -1px 3px #FF62A7;
	-moz-box-shadow: inset -1px -1px 3px #FF62A7;
	-webkit-box-shadow: inset -1px -1px 3px #FF62A7;
		border-radius: 3px;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	position: absolute;
	top: 35px;
    left: 10px;
	}
	
	
		   /*Untuk tombol Submit */
button[type=cari] {
    width: 3.5%;
   	background:#330000;
    box-shadow: inset -1px -1px 3px #FF62A7;
	-moz-box-shadow: inset -1px -1px 3px #FF62A7;
	-webkit-box-shadow: inset -1px -1px 3px #FF62A7;
		border-radius: 3px;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	position: absolute;
	top: 155px;
    left: 290px;
	}
				input[id=cari]{
    width: 20%;
    padding: 4px 6px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
		position: absolute;
	top: 155px;
    left: 10px;

	}

	
	.hrg { text-align: left; }	
	.dsbr { text-align: left; }	
    
    .hrg { text-align: right; }	
    .totacc { text-align: right; }
	.disfp { text-align: right; }	
    .totfak { text-align: right; }
	.dppfk { text-align: right; }
	.ppnfk { text-align: right; }
	.biayak { text-align: right; }
	.biayap { text-align: right; }
	.totp { text-align: right; }
	.nilaiu { text-align: right; }
	.dppu { text-align: right; }
	.ppu { text-align: right; }
	.pph { text-align: right; }
	
	

	
	


	</style>
</head>
<body>



<h3 style="margin-bottom: -20px;">Laporan Keuangan</h3>					
				<br/><hr/><br><br><br>
	
	<div class="horizon">
	<table id="table" class="w3-table-all">
            <thead>
			
	<tr>
	<th width=1% class="text-center" bgcolor="#ffe0ad">No</th>
	<th width=3% class="text-center" bgcolor="#ffe0ad">No AKS</th>
	<th width=2% bgcolor="#ffe0ad">No LKPP</th>
	<th width=2% bgcolor="#ffe0ad">No SJ</th>
	<th width=8% bgcolor="#ffe0ad">Nama Barang</th>
	<th width=3% bgcolor="#ffe0ad">Harga</th>
	<th width=2% bgcolor="#ffe0ad">Jumlah</th>
	<th width=3% bgcolor="#ffe0ad">Total</th>
	<th width=3% bgcolor="#ffe0ad">E-Faktur</th>
	<th width=6% bgcolor="#ffe0ad">Distributor</th>
	<th width=3% bgcolor="#ffe0ad">Tarif Diskon</th>
	<th width=3% bgcolor="#ffe0ad">Diskon FP</th>
	<th width=3% bgcolor="#ffe0ad">Total FP</th>
	<th width=3% bgcolor="#ffe0ad">DPP FP</th>
	<th width=3% bgcolor="#ffe0ad">PPN FP</th>
	<th width=3% bgcolor="#ffe0ad">Biaya Ekspedisi</th>
	<th width=3% bgcolor="#ffe0ad">Biaya Peti</th>
	<th width=3% bgcolor="#ffe0ad">Total Piutang</th>
	<th width=3% bgcolor="#ffe0ad">Batas Bayar</th>
	<th width=2% bgcolor="#ffe0ad">Bank</th>
	<th width=3% bgcolor="#ade1ff">No Inv</th>
	<th width=3% bgcolor="#ade1ff">Tgl Inv</th>
	<th width=3% bgcolor="#ade1ff">Tarif Uji Fungsi</th>
	<th width=3% bgcolor="#ade1ff">Nilai Uji Fungsi</th>
	<th width=3% bgcolor="#ade1ff">DPP Uji Fungsi</th>
	<th width=3% bgcolor="#ade1ff">PPN Uji Fungsi</th>
	<th width=3% bgcolor="#ade1ff">PPH Uji Fungsi</th>
	<th width=3% bgcolor="#ade1ff">Total Uji Bayar</th>
	<th width=3% bgcolor="#ade1ff">Tgl Bayar</th>
	<th width=3% bgcolor="#ade1ff">Kas</th>
	</tr>
	</thead>
    <tbody>
	
	
	
	
	
                <?php
        	$con=mysqli_connect("localhost","root","","tutorial");
			$query=mysqli_query($con,"SELECT * FROM accspa INNER JOIN  ujifungsi ON accspa.nolkppacc=ujifungsi.lkppuji ");	
	$a= 1;
	
	while($row=mysqli_fetch_array($query)) {	
                ?>
<tr>
<td ><?= $a++; ?></td>
<td><?= $row["aksacc"]; ?></td>
<td><?= $row["nolkppacc"]; ?></td>
<td><?= $row["nosjacc"]; ?></td>
<td class="namprod"><?= $row["namaprodukacc"]; ?></td>
<td class="hrg"><?= number_format($row["hargaprd"]); ?></td>
<td><?= $row["jumlahprdacc"]; ?> Unit</td>
<td class="totacc"><?= number_format($row["totalacc"]); ?></td>
<td><?= $row["noefak"]; ?></td>
<td  class="dsbr"><?= $row["distributor"]; ?></td>
<td><?= $row["tarifdiskon"]; ?> %</td>
<td class="disfp"><?= number_format($row["diskonfp"]); ?></td>
<td class="totfak"><?= number_format($row["totalfak"]); ?></td>
<td class="dppfk"><?= number_format($row["dppfak"]); ?></td>
<td class="ppnfk"><?= number_format($row["ppnfak"]); ?></td>
<td class="biayak"><?= number_format($row["biayakir"]); ?></td>
<td class="biayp"><?= number_format($row["biayapeti"]); ?></td>
<td class="totp"><?= number_format($row["totalpiu"]); ?></td>
<td>  
<?php
			$tgl1 = $row["tglsjacc"];
			$jumlah = $row["batasbayar"];
	
			$tgl2 = date('m/d/Y', strtotime('+'.($jumlah).'days', strtotime($tgl1))); 
					
			echo $tgl2;
?>
</td>		
<td><?= $row["kas"]; ?></td>
<td><?= $row["noinv"]; ?></td>
<td><?= $row["tgluji"]; ?></td>
<td><?= $row["diskonuji"]; ?> %</td>
<td class="nilaiu"><?= number_format($row["nilaiuji"]); ?></td>
<td class="dppu"><?= number_format($row["dppuji"]); ?></td>
<td class="ppu"><?= number_format($row["ppnuji"]); ?></td>
<td class="pph"><?= number_format($row["pphuji"]); ?></td>
<td class="totuji"><?= number_format($row["totaluji"]); ?></td>
<td><?= $row["tglbayar"]; ?></td>
<td><?= $row["kasuji"]; ?></td>
</tr>         				





<?php



                }
				
?>



 	</tbody>
	</table>
	</div>
	<script src="jquery.min.js"></script>

		
	    <script src="filterexcel.js"></script>

    <script>
        	$('table').excelTableFilter();

    </script>
	
	
	<!-- tombol insert-->
<button class="home" type="home" target=""  onclick="location.href='../index.php'">
<span class="tooltips1">Kembali ke halaman utama !</span><i class="cus-house"></i>Home </button> 	
</body>
</html>