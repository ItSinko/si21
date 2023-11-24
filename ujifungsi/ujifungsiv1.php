<?php 
require 'functions.php';


//produksi
$perpage = 10;
if(isset($_GET['page']) & !empty($_GET['page'])){
	$curpage = $_GET['page'];
}else{
	$curpage = 1;
}
$start = ($curpage * $perpage) - $perpage;
$PageSql = "SELECT * FROM ujifungsi INNER JOIN accspa ON accspa.nolkppacc=ujifungsi.lkppuji";
$pageres = mysqli_query($con, $PageSql);
$totalres = mysqli_num_rows($pageres);

$endpage = ceil($totalres/$perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;

$ReadSql = query("SELECT * FROM ujifungsi INNER JOIN accspa ON accspa.nolkppacc=ujifungsi.lkppuji LIMIT $start, $perpage");



//tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$tab_prod = cari($_POST["keyword"]);
	
}


?>


<!DOCTYPE html>
<head>
<title>Piutang Usaha </title>
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
 background: #ededed;

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



/*UNTUK TAB PENCARIAN*/
input[type=text] {
    width: 50px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
/* When the input field gets focus, change its width to 100% */
input[type=text]:focus {
    width: 40%;
}


/*UNTUK TOMBOL TAMBAH */
.button {
  background-color: #191970;
  border: none;
  color: white;
  padding: 8px 12px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 1s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}

.button:hover {opacity: 1}


/*UNTUK TOMBOL TAMBAH */
.home {
  background-color: #ff0000;
  border: none;
  color: white;
  padding: 8px 12px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 1s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}

.home:hover {opacity: 1}

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




.horizon {
  width: 2900px;
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
</style>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



</head>
<body>



	<h3 style="margin-bottom: -20px;">Piutang Usaha (Online)</h3>					
				<br/><hr/>

<!-- tombol insert-->
<br>
<button class="button" onclick="location.href='add.php'" type="button" target="">
    <span class="tooltips2" >Menambah form baru !</span><i class="cus-add"></i> Tambah</button> 
</br>
<button class="home" onclick="location.href='../index.php'" type="button" target="">
     <span class="tooltips1">Kembali ke halaman utama !</span><i class="cus-house"></i>Home </button> 
<br>

<!--form untuk mencari-->
<form action="" method="post">

	<input type="text" name="keyword" size="10" autofocus 
	placeholder="Apa yang anda cari.. ?" autocomplete="off">
	<button type="submit" name="cari">
	<i class="cus-zoom"></i> Cari</button>

</form>
<br>

<div class="horizon">
<table id='customers'>
	<tr>
	
	<th width=3% class="text-center">No</th>
	<th width=7% class="text-center">No Invoice</th>
	<th width=10%>Distributor</th>
	<th width=15%>Nama Barang</th>
	<th width=5%>Total Harga</th>
	<th width=7%>Nilai Uji</th>
	<th width=7%>Tgl Uji</th>
	<th width=7%>DPP Uji</th>
	<th width=7%>PPN Uji</th>
	<th width=7%>PPH Uji</th>
	<th width=7%>Total Uji</th>
	<th width=7%>Tgl Bayar</th>
	<th width=7%>Kas Uji</th>
					
	<th width=5%>Tombol</th>
	</tr>

<!-- rumus nomer -->
<?php $a=$start+1; ?>
<!-- rumus import data --> 
<?php foreach( $ReadSql as $row ):?>


<!--kolom isi-->
<tr>
<td ><?= $a++; ?></td>
<td><?= $row["noinv"]; ?></td>
<td><?= $row["distributor"]; ?></td>
<td><?= $row["namaprodukacc"]; ?></td>
<td><?= $row["totalacc"]; ?></td>
<td><?= $row["nilaiuji"]; ?></td>
<td><?= $row["tgluji"]; ?></td>
<td><?= $row["dppuji"]; ?></td>
<td><?= $row["ppnuji"]; ?></td>
<td><?= $row["pphuji"]; ?></td>
<td><?= $row["totaluji"]; ?></td>
<td><?= $row["tglbayar"]; ?></td>
<td><?= $row["kasuji"]; ?></td>
<td>
<a href="hapus.php?lkppuji=<?= $row["lkppuji"]; ?>
"onclick="return confirm('Apakah Yakin Akan Dihapus ?');" class="cus-cross"> <span class="tooltips3">Hapus Data Ini !</span>
</a>  |
<a href="change.php?lkppuji=<?= $row["lkppuji"]; ?>" class="cus-application_form_edit">
						  <span class="tooltips4">Ubah Data Ini !</span></a>
</td>
</tr>

<?php endforeach; ?>
</table>

</div>



<div class="center">
  <div class="pagination">
  <?php if($curpage != $startpage){ ?>

      <a class="#" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">First</span>
      </a>
    
    <?php } ?>
    
	<?php if($curpage >= 2){ ?>
    
 <a class="#" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
    <?php } ?>
	
 <a class="active" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
    
	<?php if($curpage != $endpage){ ?>
   <a class="#" href="?page=<?php echo $nextpage ?>">
	<?php echo $nextpage ?></a>
    
	
	
      <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Last</span>
      </a>
    
    <?php } ?>
  </div>
</div>


<script>
$(document).ready(function () {

  $("#customers).freezeHeader({

    'height': '300px'

  });

})
</script>
</body>
</html>