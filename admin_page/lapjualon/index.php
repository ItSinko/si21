
</html><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Table SPA</title>
  
    <style>
      
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
  width: 1500px;
  height: 420px;
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
    left: 150px;
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

    </style>
</head>
<body>



<h3 style="margin-bottom: -20px;">Laporan Penjualan (Online)</h3>					
				<br/><hr/><br><br><br>
	
	<div class="container">
	<table id="mytable" class="w3-table-all">
            <thead>
			
		          	<tr>
					<th width=2% class="text-center" bgcolor="#ff9696">Status</th>
					<th width=4% class="text-center"  bgcolor="#ff9696" >No</th>
					<th width=5%  bgcolor="#ff9696">No LKPP</th>
					<th width=12%  bgcolor="#ff9696">Distributor</th>
					<th width=10%  bgcolor="#ff9696">No AKS</th>
					<th width=10%  bgcolor="#ff9696">Jumlah Unit</th>
					<th width=10%  bgcolor="#ff9696">Nama Produk</th>
					<th width=10%  bgcolor="#ff9696">Alias</th>
					<th width=10%  bgcolor="#ff9696">Harga Produk</th>
					<th width=10%  bgcolor="#ff9696">Ongkir Produk</th>
					<th width=10%  bgcolor="#ff9696">Total</th>				
					<th width=20%  bgcolor="#ff9696">Deskripsi Paket</th>
					<th width=15%  bgcolor="#ff9696">Instansi</th>
					<th width=20%  bgcolor="#ff9696">Satuan</th>
					<th width=6%  bgcolor="#ff9696">Lain Lain</th>	
					<th width=12%  bgcolor="#ff9696">No PO</th>
					<th width=10%   bgcolor="#96ffe1">Tgl PO</th>
					<th width=12% bgcolor="#96ffe1">No SPK</th>
					<th width=10% bgcolor="#96ffe1">Tgl SPK</th>
					<th width=10% bgcolor="#96ffe1">Keterangan</th>
					<th width=4% class="text-center"  bgcolor="#a696ff">Tgl Terima</th>
					<th width=4% class="text-center"  bgcolor="#a696ff">Tgl Serah</th>
		
		</tr>
		</thead>
		<tbody>
		
                <?php
        	$con=mysqli_connect("localhost","root","","tutorial");
			
			$que1 = "SELECT * FROM tabel_spa INNER JOIN adminpenjualan ON tabel_spa.nolkpp=adminpenjualan.nolkppadm
											 INNER JOIN qc ON adminpenjualan.nolkppadm=qc.nolkppqc";
			
			$query=mysqli_query($con,$que1);	
	$a= 1;
	while($row=mysqli_fetch_array($query)) {	
               

			   ?>
                
		<tr>                    
<td>		 

<?php
					
//pengkondisian simbol
$angka = $row['statnego'];
switch ($angka) {
	case "Masih Negosiasi":
		echo '<td><i class="cus-error"><span class="tooltips8">Masih Proses</span></i></td>';
		break;
	
	case "Batal":
		echo '<td><i class="cus-cancel"><span class="tooltips6">Batal</span></i></td>';
		break;
	
	case"Sepakat":
		echo '<td><i class="cus-accept"><span class="tooltips7">Sepakat</span></i></td>';
		break;
	
	default:
		echo "<td>-</td>";
		break;

		}	 ?>

		</td>
					<td><?php echo $a++; ?></td>
                    <td><?php echo $row['nolkpp'] ?><br><a href="detail.php?nolkpp=<?= $row["nolkpp"]; ?>" class="cus-arrow_right"></a></td>
                    <td><?php echo $row['distributor'] ?></td>
					<td><?php echo $row['noaks'] ?></td>
					<td><?php echo $row['jumlahspa'] ?></td>
					<td><?php echo $row['namprod'] ?></td>
					<td><?php echo $row['alias'] ?></td>
					<td><?php echo $row['hargaspa'] ?></td>
					<td><?php echo $row['ongkosspa'] ?></td>
					<td><?php echo $row['totalspa'] ?></td>
					<td><?php echo $row['despaket'] ?></td>
					<td><?php echo $row['instansi'] ?></td>
					<td><?php echo $row['satuan'] ?></td>
					<td><?php echo $row['ket'] ?></td>
					<td><?= $row["nopo"]; ?></td>
					<td><?= $row["tglpo"]; ?></td>
					<td><?= $row["nodo"]; ?></td>
					<td><?= $row["tgldo"]; ?></td>
					<td><?= $row["ket"]; ?></td>
					<td><?= $row["tglterima"]; ?></td>
					<td><?= $row["tglserah"]; ?></td>
		</tr>
		
		
    
		<?php
                }
                ?>
           
	</tbody>
	</table>
	</div>
	<script src="jquery.min.js"></script>

</body>
</html>