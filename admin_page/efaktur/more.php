<title>
More
</title>
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


.cus-error {
    width: 16px;
    height: 16px;
    background-position: -421px -317px;
}	


.cus-accept {
    width: 16px;
    height: 16px;
    background-position: -5px -5px;
}
</style>

<?php
		echo '
				<table>
			
					 <tr>
					  <th width="5%">Nomor</th>
					 <th width="20%">Nomor E-Faktur</th>
					 <th width="20%">Status</th>
					 <th width="20%">SPA (Online)</th>
					 <th width="20%">SPA (Offline)</th>
					 
					 
					 </tr>';
			
	

			//skrip untuk menampilkan data dari database
		 	
			$norefinfo=$_GET['norefinfo'];

			//$con= mysqli_connect("localhost","root","","kontrol_db");
			
	
			$sql = mysqli_query($con, "SELECT * FROM infofaktur 
							INNER JOIN efaktur
							ON
							efaktur.noref=infofaktur.norefinfo 
							WHERE norefinfo='$norefinfo'");
		 
		$a=1;
							
							if(mysqli_num_rows($sql) > 0){
		 		

				 while($row = mysqli_fetch_array($sql)){
	 			
					$angka = $row['stok'];
				
	 			echo '

				   <tr>
				   <td> '.$a++.'</td>
					<td>'.$row['noefak'].'</td>';
					
					
					
					switch ($angka) {
						case 1:
						echo'<td><i class="cus-error"></i> Belum Terpakai</td>';
						break;
						
						case 0:
						echo'<td><i class="cus-accept"></i>Sudah Terpakai</td>';
						break;
						
													}
					echo '<td><ul>'; 
					
					
					$res=mysqli_query($con,"
											SELECT nolkppacc_on,nosj_on FROM acc_on INNER JOIN gudang_on ON acc_on.nolkppacc_on = gudang_on.nolkppgdg_on
											WHERE noefak_on = '".$row["noefak"]."' GROUP BY nolkppacc_on");
					
						while($tes = mysqli_fetch_array($res)){	
								
					echo'						
					                <li>'.$tes["nosj_on"].'</li>
					  ';

						}


					echo'						
							  </ul>
					      </td>	';


								
					echo'
					      <td><ul>';
						  
						 
					$res2=mysqli_query($con,"
											SELECT idorderacc_off,nosj_off FROM acc_off INNER JOIN gudang_off ON acc_off.idorderacc_off = gudang_off.idordergdg_off
											WHERE noefak_off = '".$row["noefak"]."' GROUP BY idorderacc_off");

					
					while($tes2 = mysqli_fetch_array($res2)){	 
						 
						echo'	
						  
					                 <li>'.$tes2["nosj_off"].'</li>
							';		
							

					}							
						echo'
							  </ul>
					      </td>	';								
													
		                            }
					
				} else {
			
				 echo '<td colspan="8"><p align=left >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 Maaf, Nomer E-Faktur belum di input ! <u>
				 
						
				 
				 </u> </p></center></td></tr>';
			}
			
			
			echo '
			
			</table>';
							
?>

























