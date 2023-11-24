
<head>
<title>Nomer Seri</title>
</head>
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
  padding: 5px 35px;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background: #ededed;
}
	
th, td {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}


tr td:hover { background: #666; color: #FFF; }  
/* Hover cell effect! */





   
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
  
.cus-page {
    width: 16px;
    height: 16px;
    background-position: -473px -499px;
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
font-size: 10px
	
	}	
	
		/*PEMBATAS TOOLTIPS ! */
	

.cus-page{
    position: relative;
    display: inline-block;
    
}

.cus-page .tooltips5 {
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

.cus-page:hover .tooltips5 {
    visibility: visible;
}

.tooltips5 {
	position: absolute;
	right:1px;
font-size: 10px
	
	}

a.hidden{

   cursor: not-allowed;
}	

.upload{
  
 	position: absolute;
	top: 25px;
    left: 845px;
  
}
		   /*Untuk tombol Submit */
button[type=file] {

	position: absolute;
	top: 23px;
    left: 1030px;
	}
	
.outer-scontainer {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	width:35%;
	padding: 20px;
	border-radius: 2px;
		position: absolute;
	top: 10px;
    left: 830px;
}

.btn-import {
	background: #333;
	border: #1d1d1d 1px solid;
	color: #f0f0f0;
	
	width: 100px;
	border-radius: 2px;
	cursor: pointer;
	 	position: absolute;
	top: 22px;
    left: 1240px;
}





																		/*Untuk form 9 */
input[id=file]{
  
	position: absolute;
	top:  22px;
    left: 950px;
	}
	

</style>

<div class="outer-scontainer">
</div>

<label class="upload">Upload No Seri</label>

<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("import", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>

<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>

<form  name="frmCSVImport" id="frmCSVImport" action="" method="post" enctype="multipart/form-data">
 
<input type="file" id="file"  name="file" accept=".csv">
<button type="import" id="import" class="btn-import" name="import" title="import nomer seri">Import </button>
</form>

<?php
$conn = mysqli_connect("localhost", "root", "", "kontrol_db");

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into seri_on (idseri_on,noseri_on,lkppfk_on)
                   values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "')";
            $result = mysqli_query($conn, $sqlInsert);
            
            if (! empty($result)) {
                $type = "success";
                $message = "Nomer Seri Berhasil Di Import";
            } else {
                $type = "error";
                $message = "Import Data Gagal";
            }
        }
    }
}
?>



<?php


$a=1;
		echo '
			<table>
			
					 <tr>
					 
					 <th>No</th>
					 <th width="80%">No Seri</th>
					 <th>Tombol</th>
					 </tr> ';
	     //skrip untuk menampilkan data dari database noseri berapa yang sudah didinput ?
			$nolkppgdg_on=$_GET['nolkppgdg_on'];
			$con= mysqli_connect("localhost","root","","kontrol_db");
			$sql = mysqli_query($con, "SELECT * FROM gudang_on 
							INNER JOIN seri_on
							ON
							seri_on.lkppfk_on=gudang_on.nolkppgdg_on 
							WHERE nolkppgdg_on='$nolkppgdg_on'");
		 
		 //skrip untuk menampilkan data dari database noseri berapa yang sudah didinput ?
			$jumlahinput = mysqli_num_rows($sql);
							
							
								 //pembatas, panggil dari tabel spa berapa yang dipesan ?
		 
		  $result2= mysqli_query($con,"SELECT * FROM gudang_on INNER JOIN spa_on 
				 ON gudang_on.nolkppgdg_on=spa_on.nolkpp_on WHERE nolkppgdg_on=$nolkppgdg_on");

			
		 while($row = mysqli_fetch_array($result2)){	 
			$jumlahdipesan =  $row['jumlah_on'];  
		 												}
		 
		 //if untuk tambah, jika jumlah yang dipesan sama dengan jumlah no seri yang diinput maka tidak akan muncul
		 //begitu sebaliknya 
		 
		 if ($jumlahdipesan == $jumlahinput)  { 
	 echo'<a   class=hidden onclick="return false" href="seri.php?nolkppgdg_on='.$nolkppgdg_on.'" >Tambah</a> <br>'; }  
 
	 else
		 
{ echo'<a href="seri.php?nolkppgdg_on='.$nolkppgdg_on.'" >Tambah</a> <br>'; 

} 
		echo'<a href="gudang.php" >Home</a> 	<br><br>	 ';
							
					if(mysqli_num_rows($sql) > 0){
		 		
				 while($row = mysqli_fetch_array($sql)){
	
	 			echo '
					<tr>
				   <td>'.$a++.'</td>
					<td>'.$row['noseri_on'].'</td>
					<td><a href="hapus_seri.php?idseri_on='.$row['idseri_on'].' " onclick="return confirm(\'Yakin Hapus Data ?\');"> Hapus</a> | <a href="seri_ubah.php?idseri_on='.$row['idseri_on'].'" >Ubah</a> </td>					 
					

					';

					 }
					} 
					
					else {
			
					echo '<td colspan="8"><p align=left >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 Maaf, Nomer Seri belum di input ! <u>
				 
						
				 
				 </u> </p></center></td></tr>';
			}
			
			echo '
			</table>';
?>



<script src="jquery-3.2.1.min.js"></script>