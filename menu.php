<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Navbar Dropdown Login and Signup Form with Social Buttons</title>


     <!-- Bootstrap -->
	 		<link rel="stylesheet" href="bootstrap.min.css" >
			<script src="bootstrap.bundle.min.js"></script>
			<script src="jquery-3.2.1.slim.min.js"></script>
			<script src="jquery.chained.min.js"></script>
            <script src="popper.min.js" ></script>
            <script src="bootstrap.min.js" ></script>
			<link rel="stylesheet" href="bootstrap-select.css">
			<link rel="stylesheet" href="all.css" >
			<link href="jquerysctipttop.css" rel="stylesheet" type="text/css">
			<link href="bootstrap-4-navbar.css" rel="stylesheet">
			<script src="js/bootstrap-4-navbar.js"></script>
			<script src="js/bootstrap-select.js"></script>
			<script type="text/javascript" src="jquery.price_format.2.0.js"></script>
			<script src="jquery-1.10.2.min.js"></script>
			<script src="jquery-1.10.2.min.js"></script>
			<link href="css/font-awesome/font-awesome.css" rel="stylesheet" />

	
		

<style type="text/css">
	body{
		font-family: 'Varela Round', sans-serif;
	}
	.form-control {
		box-shadow: none;		
		font-weight: normal;
		font-size: 13px;
	}
	.form-control:focus {
		border-color: #33cabb;
		box-shadow: 0 0 8px rgba(0,0,0,0.1);
	}
	.navbar-header.col {
		padding: 0 !important;
	}	
	.navbar {
		background: #fff;
		padding-left: 16px;
		padding-right: 16px;
		border-bottom: 1px solid #dfe3e8;
		border-radius: 0;
	}
	.nav-link img {
		border-radius: 50%;
		width: 36px;
		height: 36px;
		margin: -8px 0;
		float: left;
		margin-right: 10px;
	}
	.navbar .navbar-brand, .navbar .navbar-brand:hover, .navbar .navbar-brand:focus {
		padding-left: 0;
		font-size: 20px;
		padding-right: 50px;
	}
	.navbar .navbar-brand b {
		font-weight: bold;
		color: #33cabb;		
	}
	.navbar .form-inline {
        display: inline-block;
    }
	.navbar .nav li {
		position: relative;
	}
	.navbar .nav li a {
		color: #888;
	}
	.search-box {
        position: relative;
    }	
    .search-box input {
        padding-right: 35px;
		border-color: #dfe3e8;
        border-radius: 4px !important;
		box-shadow: none
    }
	.search-box .input-group-addon {
        min-width: 35px;
        border: none;
        background: transparent;
        position: absolute;
        right: 0;
        z-index: 9;
        padding: 7px;
		height: 100%;
    }
    .search-box i {
        color: #a0a5b1;
		font-size: 19px;
    }
	.navbar .nav .btn-primary, .navbar .nav .btn-primary:active {
		color: #fff;
		background: #33cabb;
		padding-top: 8px;
		padding-bottom: 6px;
		vertical-align: middle;
		border: none;
	}	
	.navbar .nav .btn-primary:hover, .navbar .nav .btn-primary:focus {		
		color: #fff;
		outline: none;
		background: #31bfb1;
	}
	.navbar .navbar-right li:first-child a {
		padding-right: 30px;
	}
	.navbar .nav-item i {
		font-size: 18px;
	}
	.navbar .dropdown-item i {
		font-size: 16px;
		min-width: 22px;
	}
	.navbar ul.nav li.active a, .navbar ul.nav li.open > a {
		background: transparent !important;
	}	
	.navbar .nav .get-started-btn {
		min-width: 120px;
		margin-top: 8px;
		margin-bottom: 8px;
	}
	.navbar ul.nav li.open > a.get-started-btn {
		color: #fff;
		background: #31bfb1 !important;
	}
	.navbar .dropdown-menu {
		border-radius: 1px;
		border-color: #e5e5e5;
		box-shadow: 0 2px 8px rgba(0,0,0,.05);
	}
	.navbar .nav .dropdown-menu li {
		color: #999;
		font-weight: normal;
	}
	.navbar .nav .dropdown-menu li a, .navbar .nav .dropdown-menu li a:hover, .navbar .nav .dropdown-menu li a:focus {
		padding: 8px 20px;
		line-height: normal;
	}
	.navbar .navbar-form {
		border: none;
	}
	.navbar .dropdown-menu.form-wrapper {
		width: 280px;
		padding: 20px;
		left: auto;
		right: 0;
        font-size: 14px;
	}
	.navbar .dropdown-menu.form-wrapper a {		
		color: #33cabb;
		padding: 0 !important;
	}
	.navbar .dropdown-menu.form-wrapper a:hover{
		text-decoration: underline;
	}
	.navbar .form-wrapper .hint-text {
		text-align: center;
		margin-bottom: 15px;
		font-size: 13px;
	}
	.navbar .form-wrapper .social-btn .btn, .navbar .form-wrapper .social-btn .btn:hover {
		color: #fff;
        margin: 0;
		padding: 0 !important;
		font-size: 13px;
		border: none;
		transition: all 0.4s;
		text-align: center;
		line-height: 34px;
		width: 47%;
		text-decoration: none;
    }	
	.navbar .social-btn .btn-primary {
		background: #507cc0;
	}
	.navbar .social-btn .btn-primary:hover {
		background: #4676bd;
	}
	.navbar .social-btn .btn-info {
		background: #64ccf1;
	}
	.navbar .social-btn .btn-info:hover {
		background: #4ec7ef;
	}
	.navbar .social-btn .btn i {
		margin-right: 5px;
		font-size: 16px;
		position: relative;
		top: 2px;
	}
	.navbar .form-wrapper .form-footer {
		text-align: center;
		padding-top: 10px;
		font-size: 13px;
	}
	.navbar .form-wrapper .form-footer a:hover{
		text-decoration: underline;
	}
	.navbar .form-wrapper .checkbox-inline input {
		margin-top: 3px;
	}
	.or-seperator {
        margin-top: 32px;
		text-align: center;
		border-top: 1px solid #e0e0e0;
    }
    .or-seperator b {
		color: #666;
        padding: 0 8px;
		width: 30px;
		height: 30px;
		font-size: 13px;
		text-align: center;
		line-height: 26px;
		background: #fff;
		display: inline-block;
		border: 1px solid #e0e0e0;
		border-radius: 50%;
		position: relative;
		top: -15px;
		z-index: 1;
    }
    .navbar .checkbox-inline {
		font-size: 13px;
	}
	.navbar .navbar-right .dropdown-toggle::after {
		display: none;
	}
	@media (min-width: 1200px){
		.form-inline .input-group {
			width: 300px;
			margin-left: 30px;
		}
	}
	@media (max-width: 768px){
		.navbar .dropdown-menu.form-wrapper {
			width: 100%;
			padding: 10px 15px;
			background: transparent;
			border: none;
		}
		.navbar .form-inline {
			display: block;
		}
		.navbar .input-group {
			width: 100%;
		}
		.navbar .nav .btn-primary, .navbar .nav .btn-primary:active {
			display: block;
		}
	}
</style>
<script type="text/javascript">
	// Prevent dropdown menu from closing when click inside the form
	$(document).on("click", ".navbar-right .dropdown-menu", function(e){
		e.stopPropagation();
	});
</script>
</head> 
<body>
<nav class="navbar navbar-default navbar-expand-lg ">
	<div class="navbar-header d-flex col">
	 <img src="img/icon_header20.png" width="80" height="auto" class="d-inline-block align-top" alt="" title="PT. SINKO PRIMA ALLOY">	
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler ml-auto">
			<span class="navbar-toggler-icon"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<ul class="nav navbar-nav">
				<a class="nav-link"  href="./index.php"><i class="fa fa-home"></i> Beranda</a>
			
										<li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle text-dark"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Produk
									    </a>
                            
										<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
											<a class="dropdown-item text-dark" href="./index.php?hlm=dafprd" >Daftar Produk</a>
											<a class="dropdown-item text-dark" href="./index.php?hlm=harprd">Daftar Harga Produk</a>
											<a class="dropdown-item text-dark"  href="./index.php?hlm=namcoo">Nama COO Produk</a>
											<a class="dropdown-item text-dark" href="./index.php?hlm=ijinprd">Daftar Ijin Edar Produk</a>   
										</ul>
										</li>

									<li class="nav-item">
											<a class="nav-link text-dark" href="./index.php?hlm=dsb">Distributor</a>
									</li>
									
									
									
									<li class="nav-item">
											<a class="nav-link text-dark" href="./index.php?hlm=jasaeks">Ekspedisi</a>
									</li>
			
			
									<li class="nav-item">
											<a class="nav-link text-dark" href="./index.php?hlm=efaktur">E-Faktur</a>
									</li>
									
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle text-success"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        SPA (ONline)
											</a>
										<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        
											<a class="dropdown-item text-dark" href="./index.php?hlm=spa">LKPP / AKN</a>
											<a class="dropdown-item text-dark" href="./index.php?hlm=admon">PO / DO</a>
												<hr class="my-1">
											<a class="dropdown-item text-dark" href="./index.php?hlm=qcon">QC Inprocess</a>
												<hr class="my-1">
											<a class="dropdown-item text-dark" href="./index.php?hlm=noserion">Nomer Seri</a>
											<hr class="my-1">
											<a class="dropdown-item text-dark" href="./index.php?hlm=gudangon">Logistik</a>
												<hr class="my-1">
											<a class="dropdown-item text-dark" href="./index.php?hlm=accon">Piutang</a>
											<a class="dropdown-item text-dark" href="./index.php?hlm=piuon">Uji Fungsi</a>
												<hr class="my-1">
											<a class="dropdown-item text-dark" href="./index.php?hlm=deton">Certificate of Origin</a>                             
											</ul>
									</li>
			
			
								       <li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle text-info"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SPA (OFFline)</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									
										      <a class="dropdown-item text-dark" href="./index.php?hlm=spaoff">Order</a>
											<a class="dropdown-item text-dark" href="./index.php?hlm=admoff">PO / DO</a>
												<hr class="my-1">
											  <a class="dropdown-item text-dark" href="./index.php?hlm=qcoff">QC Inprocess</a>
												<hr class="my-1">
											
											<a class="dropdown-item text-dark" href="./index.php?hlm=noserioff">Nomer Seri</a>
											<hr class="my-1">
											<a class="dropdown-item text-dark" href="./index.php?hlm=gudangoff">Logistik</a>
												<hr class="my-1">
											<a class="dropdown-item text-dark" href="./index.php?hlm=accoff">Piutang</a>
											  <a class="dropdown-item text-dark" href="./index.php?hlm=piuoff">Uji Fungsi</a>
												<hr class="my-1">
											<a class="dropdown-item text-dark" href="./index.php?hlm=detoff">Certificate of Origin</a>
   
                                    </ul>
                                </li>
			
			
										<li class="nav-item dropdown">
											 <a class="nav-link dropdown-toggle text-danger"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        SPB
											 </a>
										<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        
											<a class="dropdown-item text-dark" href="./index.php?hlm=spb">Order</a>
											<a class="dropdown-item text-dark"  href="./index.php?hlm=admspb">PO / DO</a>
											<a class="dropdown-item text-dark" href="./index.php?hlm=qcspb">QC Inprocess</a>
											<hr class="my-1">
											<a class="dropdown-item text-dark" href="./index.php?hlm=noserispb">Nomer Seri</a>
											<hr class="my-1">
											<a class="dropdown-item text-dark" href="./index.php?hlm=gudangspb">Logistik</a>
											<a class="dropdown-item text-dark" href="./index.php?hlm=keuanganspb">Piutang</a>											
										</ul>
									</li>
									
									
									
									  <li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle text-dark"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Laporan
											</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item dropdown-toggle text-dark" >Laporan SPA (Online)</a>
                                     <ul class="dropdown-menu">
									
						
                                        <li><a class="dropdown-item text-dark" href="./index.php?hlm=lapjualon">Laporan Penjualan + Seri</a></li>
								        <li><a class="dropdown-item text-dark"href="./index.php?hlm=lapkirimon">Laporan Pengiriman</a></li>
								        <li><a class="dropdown-item text-dark"href="./index.php?hlm=datajualon">Laporan Keuangan + Faktur</a></li>
                                     </ul>
                                </li>
								
                                <li><a class="dropdown-item dropdown-toggle text-dark" >Laporan SPA (Offline)</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item text-dark" href="./index.php?hlm=lapjualoff">Laporan Penjualan + Seri</a></li>
										<li><a class="dropdown-item text-dark"href="./index.php?hlm=lapkirimoff">Laporan Pengiriman</a></li>
										<li><a class="dropdown-item text-dark" href="./index.php?hlm=datajualoff">Laporan Keuangan + Faktur</a></li>
                                    </ul>
                                </li>
								
                                 <li><a class="dropdown-item dropdown-toggle text-dark" >Laporan SPB</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item text-dark" href="./index.php?hlm=lapjualspb">Laporan Penjualan + Seri</a></li>
										<li><a class="dropdown-item text-dark"href="./index.php?hlm=datajualspb">Laporan Keuangan + Faktur</a></li>
                                    </ul>
                                </li>
								
								
                                <li><a class="dropdown-item dropdown-toggle text-dark" >Laporan Order</a>
                                     <ul class="dropdown-menu">
                                        <li><a class="dropdown-item text-dark"href="./index.php?hlm=laporderon">SPA (Online)</a></li>
										<li><a class="dropdown-item text-dark" href="./index.php?hlm=laporderoff">SPA (Offline)</a></li>
										<li><a class="dropdown-item text-dark" href="./index.php?hlm=laporderspb">SPB</a></li>	
                                     </ul>
                                </li>
								
								
								
                                </ul>
                                </li>
			
			
				
										<li class="nav-item dropdown">
											 <a class="nav-link dropdown-toggle text-danger"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Lacak
											 </a>
										<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        
											<a class="dropdown-item text-dark" href="./index.php?hlm=lacak">Lacak No PO</a>
											<a class="dropdown-item text-dark" href="./index.php?hlm=lacak_seri">Lacak No Seri</a>
																		
										</ul>
									</li>
									
			
		</ul>
		
		<ul class="nav navbar-nav navbar-right ml-auto">
<li class="nav-item">
				<a  data-toggle="modal" href="#Users" class="nav-link dropdown-toggle text-dark" href="#"><i class="fa fa-users"></i> Users</a>			
			</li>		

		
			<li class="nav-item">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle text-dark" href="#"><i class="fa fa-sign-in"></i> Login</a>
				<ul class="dropdown-menu form-wrapper">					
					<li>
						
					
						<form action="cek_login.php" method="post" >
					
						
						<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo '<div class="alert alert-danger" role="alert"><i class="fa fa-ban"></i> Username atau Password Salah<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button> </div>
			';
		}else if($_GET['pesan'] == "logout"){
			echo '<div class="alert alert-primary" role="alert"><i class="fa fa-check"></i> Anda berhasil Logout !! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button> </div>';
		}
	}
	?>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Username" required="required" id="username" name="username" >				
							</div>
							
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Password" required="required" id="password" name="password">
							</div>
							
							
							<input type="submit" value="Login" class="btn btn-primary btn-block ">
						</form> 
					</li>
				</ul>
			</li>
			
		</ul>
	</div>
</nav>

<div class="modal fade bd-example-modal-lg" id="Users">
<div class="modal-dialog modal-lg ">
  <div class="modal-content">
    <div class="modal-header">
	 <h4 class="modal-title"><i class="fa fa-users"></i> Online User</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     
    </div>
	
    <div class="modal-body  log" >
	 <h6 class="modal-title"><i class="fa fa-info-circle"></i> Daftar User yang Online</h6>
     <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Bagian</th>
     
    </tr>
  </thead>
  
  <?php
		require 'koneksi.php';
		$a= 1;
		$result=mysqli_query($con, "SELECT *  FROM user WHERE status ='1' ");		
		
		 while($row = mysqli_fetch_array($result)){
			 
	echo '
     <tbody>
     <tr>
      <th scope="row">'.$a++.'</th>
      <td><img src="admin_page/user_img/'.$row['gambar'].'" width="30px" height="30px"> '.$row['nama'].'</td>
      <td>'.$row['posisi'].'</td>
     
    </tr> ';
	
		  } 
		  
		  
		  
		  ?>
		  
  </tbody>
</table>
    </div>
	
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
    </div>
	
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->	
				
</body>
</html>     