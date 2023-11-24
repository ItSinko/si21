<?php
require '../../koneksi.php';


$nolkppgdg_on= $_REQUEST["nolkppgdg_on"];

$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM seri_on WHERE lkppfk_on='$nolkppgdg_on'"));

$hapus_a = "DELETE gudang_on, seri_on  FROM gudang_on INNER JOIN seri_on ON gudang_on.nolkppgdg_on = seri_on.lkppfk_on WHERE nolkppgdg_on='$nolkppgdg_on'";
$hapus_b = "DELETE  FROM gudang_on  WHERE nolkppgdg_on='$nolkppgdg_on'";



if ($cek > 0) {

 mysqli_query($con, $hapus_a);

}

else
{
	
 mysqli_query($con, $hapus_b);

	
}





		
	echo" 
		<script>
			alert('Data berhasil hapus!');
			document.location.href = './index.php?hlm=gudangon';
		</script>
	
	";

?>