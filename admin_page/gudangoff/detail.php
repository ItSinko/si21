<?php
    
	require 'tryfunctions.php';
	
	$idseri = $_REQUEST['idseri'];





$query = query("SELECT noseri
							FROM tbl_seri
							WHERE idseri=$idseri");








  





	

?>

<html>

<head>
<title>No Seri </title>
</head>
<style>
</style>
<body>
	<table >
	<tr>
	<th width="10%">No e-Faktur</th>
	</tr>
	

	<tr>
	<td> 
	<?php  foreach( $query as $row )  
	
	echo ''.$row['noseri'].'' ?> <td>
	</tr>
	

	
	
	</table>
</html>






















