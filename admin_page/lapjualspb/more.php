<head>
<title>
Nomer Seri
</title>


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
</style>

<?php


$a=1;
 
 
		echo '
				<table>
			
					 <tr>
					 <th>No</th>
					 <th width="80%">No Seri</th>
				
					 </tr>';
			
	

			//skrip untuk menampilkan data dari database noseri berapa yang sudah didinput ?
		 	
			$nolkpp=$_GET['nolkppgdg'];

			$con= mysqli_connect("localhost","root","","tutorial");
			
			
			$sql = mysqli_query($con, "SELECT * FROM tabel_gudang 
							INNER JOIN noseri
							ON
							noseri.lkppfk=tabel_gudang.nolkppgdg 
							WHERE nolkppgdg='$nolkpp'");
		 
		 //skrip untuk menampilkan data dari database noseri berapa yang sudah didinput ?
			$jumlahinput = mysqli_num_rows($sql);
							
							
							
							
		 
		 //pembatas, panggil dari tabel spa berapa yang dipesan ?
		 
		  $result2= mysqli_query($con,"SELECT * FROM tabel_gudang INNER JOIN tabel_spa 
				 ON tabel_gudang.nolkppgdg=tabel_spa.nolkpp WHERE nolkppgdg='$nolkpp' ");

			
		 while($row = mysqli_fetch_array($result2)){
			 
			$jumlahdipesan =  $row['jumlahspa'];  
		 
													}
		 
		 //if untuk tambah, jika jumlah yang dipesan sama dengan jumlah no seri yang diinput maka tidak akan muncul
		 //begitu sebaliknya
		 
		 

 
		echo'<a href="gudang.php" >Home</a>';
							
					if(mysqli_num_rows($sql) > 0){
		 		

				 while($row = mysqli_fetch_array($sql)){
	 			
	 			echo '
					<tr>
				   <td>'.$a++.'</td>
					<td>'.$row['noseri'].'</td>
					
					 ';
					}
					} else {
			
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

