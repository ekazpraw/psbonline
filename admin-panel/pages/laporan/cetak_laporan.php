<?php
$ed = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa`,pendaftaran WHERE pendaftar_siswa.id_daftar = pendaftaran.id_pendaftaran AND pendaftaran.id_pendaftaran = '$_POST[tid]'");
$r = mysqli_fetch_array($ed);

/*-------- menghitung total jumlah peserta -----------*/
$sql1 = mysqli_query($connect, "select *, count(pengguna.nik) as jml_peserta from pengguna where hak_akses = 'Siswa' ");
$a = mysqli_fetch_array($sql1);
$jml_pendaftar = $a['jml_peserta'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql3 = mysqli_query($connect, "select *, count(pendaftar_siswa.nik) as jml_daftar from pendaftar_siswa");
$c = mysqli_fetch_array($sql3);
$jml_formulir = $c['jml_daftar'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql4 = mysqli_query($connect, "select *, count(pendaftar_siswa.nik) as jml_cewe from pendaftar_siswa where jk = 'Perempuan'");
$d = mysqli_fetch_array($sql4);
$jml_cewe = $d['jml_cewe'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql5 = mysqli_query($connect, "select *, count(pendaftar_siswa.nik) as jml_cowo from pendaftar_siswa where jk = 'Laki - laki'");
$e = mysqli_fetch_array($sql5);
$jml_cowo = $e['jml_cowo'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql6 = mysqli_query($connect, "select *, count(pendaftar_siswa.nik) as verif from pendaftar_siswa where keterangan = 'Sudah Terverifikasi'");
$f = mysqli_fetch_array($sql6);
$jml_terverifikasi = $f['verif'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql7 = mysqli_query($connect, "select *, count(pendaftar_siswa.nik) as blmverif from pendaftar_siswa where keterangan = 'Belum Terverifikasi'");
$g = mysqli_fetch_array($sql7);
$jml_blmterverifikasi = $g['blmverif'];
$html = '

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="row">
	<div class="col-md-3">
	</div>
	<div class="col-md-9">
	<div align="center"><img src="../../../images/icon.png" width="90px"></div>
<h4 align="center">PENERIMAAN CALON SISWA / SISWI BARU <?php echo date("Y"); ?><br>SEKOLAH DASAR ISLAM TERPADU - AL-FATIH<br>Jl. Kav. Rawageni, Ratu Jaya, Kec. Cipayung, Kota Depok. Jawa Barat, 16439.</h4>
	</div>
</div>
<p align="center">======================================================================================</p>
<p align="center"><b>LAPORAN PENDAFTARAN PENERIMAAN SISWA BARU (PSB)</b><br>SEKOLAH DASAR ISLAM TERPADU - AL-FATIH</p>

	<table class="table table-condensed">
		<tr>
			<th width="250px">Periode Pendaftaran</th>
			<td>'. $r['periode'] .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Tanggal Mulai Pendaftaran</th>
			<td>'. indonesian_date($r['tgl_mulai']) .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Tanggal Berakhir Pendaftaran</th>
			<td>'. indonesian_date($r['tgl_selesai']) .'</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Kuota Yang Ada</th>
			<td>'. $r['kuota'] .' Siswa/i</td>
			<td></td>
		</tr>
		<tr>
			<th width="300px">Jumlah Akun Calon Siswa/i Yang Terdaftar</th>
			<td>'. $jml_pendaftar.' Siswa/i</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Jumlah Formulir Yang Terkumpul</th>
			<td>'. $jml_formulir .' Siswa/i</td>
			<td></td>
		</tr>
		<tr>
			<th>Calon Siswa/i</th>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th></th>
			<td>'. $jml_cowo .' Laki - laki</td>
			<td></td>
		</tr>
		<tr>
			<th></th>
			<td>'. $jml_cewe .' Perempuan</td>
			<td></td>
		</tr>
		<tr>
			<th>Siswa/i Sudah Terverifikasi</th>
			<td>'. $jml_terverifikasi .' Siswa/i</td>
			<td></td>
		</tr>
		<tr>
			<th>Siswa/i Belum Terverifikasi</th>
			<td>'. $jml_blmterverifikasi .' Siswa/i</td>
			<td></td>
		</tr>
	</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div class="col-md-6">
			<h3>Lampiran:</h3>
		</div>

	<h3>Daftar Seluruh Pendaftar</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No. </th>
				<th>No Pendaftaran</th>
				<th>NIK</th>
				<th>Nama Siswa</th>
				<th>Asal Sekolah</th>
				<th>Tanggal Daftar</th>
			</tr>
		</thead>
		<tbody>';

			$query = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa` WHERE id_daftar = '$_POST[tid]'");
			$no = 1;
			while ($a = mysqli_fetch_array($query)) {

			$html .= '<tr>
				<td>'.$no .'</td>
				<td>'.$a['no_daftar'] .'</td>
				<td>'.$a['nik'] .'</td>
				<td>'.$a['nama'] .'</td>
				<td>'.$a['nama_sekolah'] .'</td>
				<td>'.indonesian_date($a['tgl_daftar']) .'</td>
			</tr>';
			 $no++ ; }
		$html .= '</tbody>
	</table>
	<h3>Daftar Siswa Sudah Terverifikasi</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No. </th>
				<th>No Pendaftaran</th>
				<th>NIK</th>
				<th>Nama Siswa</th>
				<th>Asal Sekolah</th>
				<th>Tanggal Daftar</th>
			</tr>
		</thead>
		<tbody>';

			$query = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa` WHERE keterangan = 'Sudah Terverifikasi' AND id_daftar = '$_POST[tid]'");
			$no = 1;
			while ($a = mysqli_fetch_array($query)) {

			$html .= '<tr>
				<td>'.$no .'</td>
				<td>'.$a['no_daftar'] .'</td>
				<td>'.$a['nik'] .'</td>
				<td>'.$a['nama'] .'</td>
				<td>'.$a['nama_sekolah'] .'</td>
				<td>'.indonesian_date($a['tgl_daftar']) .'</td>
			</tr>';
			$no++ ; }
		$html .= '</tbody>
	</table>
	<h3>Daftar Siswa Belum Terverifikasi</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No. </th>
				<th>No Pendaftaran</th>
				<th>NIK</th>
				<th>Nama Siswa</th>
				<th>Asal Sekolah</th>
				<th>Tanggal Daftar</th>
			</tr>
		</thead>
		<tbody>';

			$query = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa` WHERE keterangan = 'Belum Terverifikasi' AND id_daftar = '$_POST[tid]'");
			$no = 1;
			while ($a = mysqli_fetch_array($query)) {

			$html .='	<tr>
				<td>'.$no.'</td>
				<td>'.$a['no_daftar'] .'</td>
				<td>'.$a['nik'] .'</td>
				<td>'.$a['nama'] .'</td>
				<td>'.$a['nama_sekolah'] .'</td>
				<td>'.indonesian_date($a['tgl_daftar']) .'</td>
			</tr>';
			$no++ ; }
		$html .= '</tbody>
	</table>

';
$dompdf->loadHtml($html);
$dompdf->render();
ob_end_clean();
$dompdf->stream('Laporan PSB_'.$r['periode'].'.pdf');

?>