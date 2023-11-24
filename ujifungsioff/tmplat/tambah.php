






<!DOCTYPE html>
<html>
<head>
<title> Tambah Data </title>
<style>

/*Untuk form harga */
input[id=nolkpp]{
    width: 20%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 87px;
    left: 320px;
	}
/*Untuk form harga */
input[id=totalharga]{
    width: 20%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	position: absolute;
	top: 135px;
    left: 320px;
	}


/*Untuk label 1 */
.nolkpp{


 	position: absolute;
	top: 108px;
    left: 160px;  
}




/*Untuk label 1 */
.totalharga{


 	position: absolute;
	top: 158px;
    left: 160px;  
}






/*Untuk tombol Submit */
button[type=submit] {
    width: 9%;
    background-color: #191970;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    position: absolute;
	top: 580px;
   left: 480px;
	
	}




/*Untuk tombol Batal */
button[type=batal] {
    width: 8%;
    background-color: #FF0000;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    position: absolute;
	top: 580px;
   left: 680px;
	}




</style>




<!--Script Untuk Format Rupiah-->
<script type="text/javascript" src="my.js">
</script>




</head>
<body>
<h1><center>Tambah data</center> </h1>


<div class="container">
<form action="" method="post">
	
	<div class="form-group">
	<label for="sing_prod" class="nolkpp" >NO LKPP</label>
	<input type="text" name="sing_prod" id="nolkpp"  maxlength="80" onkeyup="this.value = this.value.toUpperCase()"  placeholder="ABPM50" autocomplete="off" >
	</div>	
	
	<div class="form-group">
	<label for="sing_prod" class="totalharga" >Total Harga</label>
	<input type="text" name="sing_prod" id="totalharga"  maxlength="80" onkeyup="this.value = this.value.toUpperCase()"  placeholder="ABPM50" autocomplete="off" >
	</div>	
	
		<div class="form-group">
	<label for="sing_prod" class="noinv" >No INV Uji Fungsi</label>
	<input type="text" name="sing_prod" id="noinv"  maxlength="80" onkeyup="this.value = this.value.toUpperCase()"  placeholder="ABPM50" autocomplete="off" >
	</div>	
	
	
		<button type="submit" name="submit">Tambah data </button>
<br>  <button type="batal" name="batal" onclick="location.href='index.php'" target="">Batal </button>


</form>
</div>

<br>


<script src="my.js"></script>
<script src="jquery-3.2.1.min.js"></script>
<script>
function hitung() {
    var a = $(".a").val();
    var b = 1.1;
    c = Math.round(a / b); //a dibagi b
    $(".c").val(c);
}

</script>
</body>
</html>