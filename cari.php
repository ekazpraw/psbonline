<?php 
include"header.php";
?>

<?php
include "conf/koneksi.php";

			/*---------------------------- ANTI XSS & SQL INJECTION ----------------------*/
			function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
			}
			/*-------------------------------------------------------------------*/
			// baca current date

      $cari = antiinjection($_POST['cari']);
			
      if (isset($cari)) {
      	
      	// $cari=preg_replace("#[^a-z0-9]#i"," ", $cari);//fungsi ini untuk menghindari karakter selain dari huruf dan angka dengan mengubahnya menjadi spasi, misalkan karakter ' maka akan berubah menjadi space

      	$sql = mysqli_query($connect, "SELECT * FROM pendaftar_siswa WHERE nis like '%".$cari."%'");
      	
?>
<!-- echo "<script>alert('Data Pendaftaran sudah tersimpan. Silakan Login');</script>";
								echo "<meta http-equiv='refresh' content='0; url=beranda'>"; -->
     <!-- Modal1 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<div class="signin-form profile">

						<div class="login-m_page_img">

							<img src="images/logo_modal.png" alt=" " class="img-responsive" />

						</div>
						<div class="login-m_page">
							<h3 class="sign">Sign In</h3>
							<div class="login-form-wthree-agile">
								<form action="log_validate.php" method="post">
									<input type="text" name="nis" placeholder="Masukan nis" required="">
									<input type="password" name="pass" placeholder="Password" required="">
									<div class="tp">
										<input type="submit" value="Sign In">
									</div>
								</form>
							</div>
							<div class="login-social-grids">
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-rss"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal1 -->
	<div class="header inner_banner" id="home">
		<!--/top-bar-->
		<div class="top-bar">
			<div class="header-nav-agileits">

				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
						<h1><a class="navbar-brand" href="index.php"><img src="images/logo-panjang.png" width="200"></a></h1>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<nav>
							<ul class="top_nav">
								<?php if (isset($_SESSION['nik'])) { ?>
								<li><a href="dashboard-siswa">Dasbor</a></li>
								<?php } ?>
				                <li><a href="persyaratan.html">Persyaratan</a></li>
				                <li><a href="terdaftar.html">Terdaftar</a></li>
				                <li><a href="pengumuman.html">Pengumuman</a></li>
				                <li><a href="pembayaran.html">Pembayaran</a></li>
							</ul>
						</nav>
					</div>
				</nav>

			</div>
		</div>
		<!--//top-bar-->
		<!--/ banner-text -->
		<!--// banner-text -->
	</div>
	
	<!--/banner_bottom-->
	<div class="banner_bottom">
		<div class="banner_bottom_in">
			<h3 class="headerw3">Hasil Pencarian Siswa/i Terdaftar PSB:</h3>
			<hr>
			<h4>Data yang Telah Anda Cari: <i><?= $cari; ?></i> </h4> <br>
			<div class="about-sub-gd">
				<table class="table" style="text-align: left;">
					<tr>
						<th>nis:</th>
						<th>Nama Siswa:</th>
						<th>Asal Sekolah:</th>
						<th>Alamat Lengkap:</th>
					</tr>
					<?php while ($find = mysqli_fetch_array($sql)) { ?>
					<tr>
						<td> <?= $find['nik'] ?> </td>
						<td> <?= $find['nama_siswa'] ?> </td>
						<td> <?= $find['asal_sekolah'] ?> </td>
						<td> <?= $find['alamat'] ?> </td>
					</tr>
					<?php } } ?>
				</table>		
              
                  
			</div>

			<!-- <div class="edu_button">
				<a class="btn btn-primary btn-lg" href="about.html" role="button">Pengumuman</a>
			</div> -->
		</div>
	</div>
	<!--//banner_bottom-->

	<!--footer-->
	<div class="contact-footer-w3layouts-agile">
		<?php include "media.php" ?>