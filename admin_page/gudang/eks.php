<?php

//$con = mysqli_connect("localhost", "root", "", "kontrol_db");

$nolkppgdg_on=$_GET['nolkppgdg_on'];


if( isset( $_REQUEST['aksikirim'] )){
		$aksikirim = $_REQUEST['aksikirim'];
		switch($aksikirim){
			
			case 'tambah':
				include 'gudang/kirim.php';
				break;
				
			case 'edit':
				include 'gudang/kirim_ubah.php';
				break;
				
			case 'delete':
				include 'gudang/hapus_kirim.php';
				break;
		}
		
	} else {
		
		



?>

<html>


<head>

<style>

.success {
    background: #70fff3;
    border: #70fff3 1px solid;
}
</style>
	<p class="h5">Pengiriman</p>
	<hr class="my-2">

</head>

<body>  

		
   
    <div class="container-fluid">
       
 <a class="btn btn-primary"  href="?hlm=gudangon&aksi=eks&nolkppgdg_on=<?php echo $nolkppgdg_on?>&aksikirim=tambah">Tambah Data</a>

            <table id='userTable' class="table">
            <thead>
                <tr>	
                    <th>No</th>
                    <th>No LKPP</th>
					 <th>Ekspedisi</th>
					 <th>Tgl Realisasi</th>
					 <th>Jumlah Terkirim</th>
					 <th>No Resi</th>
					 <th>Nilai</th>
					 <th>Ket</th>
					 <th>Tombol</th> 
                </tr>
            </thead>

               <?php
			$sqlSelect = "SELECT * FROM  gudang_on 			   INNER JOIN ekspedisi2_on ON gudang_on.nolkppgdg_on=ekspedisi2_on.nolkppeksfk_on 
																   INNER JOIN jasaeks ON ekspedisi2_on.jasafk_on=jasaeks.id_eks  WHERE nolkppeksfk_on='$nolkppgdg_on' ";
																   
            $result = mysqli_query($con, $sqlSelect);		
$a=1;
            if (mysqli_num_rows($result) > 0) {
                ?>
				
				
			
			<?php		
                while ($row = mysqli_fetch_array($result)) {
                   
				
echo'				
                <tbody>
                <tr>	
                    <td width=1%">'. $a++ .'</td>
                    <td>'.$row['nolkppeksfk_on'].'</td>				
                    <td>'.$row['nama_eks'].'</td>				
                    <td>'.$row['tglkirim_on'].'</td>				
                    <td>'.$row['jumlaheks_on'].' Unit</td>				                   			
                    <td>'.$row['noresi_on'].'</td>				
                    <td>'.number_format($row['nilai_on']).' </td>				
                    <td>'.$row['keteks2_on'].'</td>			
					<td><a href="?hlm=gudangon&aksi=eks&nolkppgdg_on='.$row["nolkppgdg_on"].'&aksikirim=edit&ideks_on='.$row["ideks_on"].'" class="cus-application_form_edit"></a>
					<a href="?hlm=gudangon&aksi=eks&nolkppgdg_on='.$row["nolkppgdg_on"].'&aksikirim=delete&ideks_on='.$row["ideks_on"].'" onclick="return confirm(\'Yakin Hapus Data ?\');" class="cus-cross"></a></td> ';             
                }
                ?>		
                </tbody>
			</table>
        <?php } 
		else  
				
echo '<td colspan="8"><p align=left >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				 Maaf, Belum ada data yang di input !
				 </u> </p></center></td></tr>';
	}
	?>
     </div>
</body>
</html>