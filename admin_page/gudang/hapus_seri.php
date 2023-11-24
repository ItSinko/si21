<?php

require "fun_hapus_seri.php";



$idseri_on= $_GET["idseri_on"];
$nolkppgdg_on= $_GET["nolkppgdg_on"];

if ( hapus($idseri_on) > 0 ) {
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = './index.php?hlm=gudangon&aksi=more&nolkppgdg_on=$nolkppgdg_on';
		</script>
	";
	} else {
		echo "
			<script>
				alert('data gagal');
				document.location.href = './index.php?hlm=gudangon&aksi=more&nolkppgdg_on=$nolkppgdg_on';
			</script>
		";

	}
?>