<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";
	include "../format_tanggal.php";

	$ed = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa`,pendaftaran WHERE pendaftar_siswa.id_daftar = pendaftaran.id_pendaftaran AND pendaftaran.id_pendaftaran = '$_GET[tid]'");
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
?>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Laporan Pendaftaran <small></small></h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-xs-3">
      </div>
      <div class="x_panel">
        <div class="x_content">
          <table class="table table-hover">
          	<tr>
							<th width="250px">Periode Pendaftaran</th>
          		<td><?= $r['periode'] ?></td>
							<td></td>
          	</tr>
						<tr>
							<th width="250px">Tanggal Mulai Pendaftaran</th>
          		<td><?= indonesian_date($r['tgl_mulai']) ?></td>
							<td></td>
          	</tr>
						<tr>
							<th width="250px">Tanggal Berakhir Pendaftaran</th>
          		<td><?= indonesian_date($r['tgl_selesai']) ?></td>
							<td></td>
          	</tr>
						<tr>
							<th width="250px">Kuota Yang Ada</th>
          		<td><?= $r['kuota'] ?> Siswa/i</td>
							<td></td>
          	</tr>
						<tr>
							<th width="300px">Jumlah Akun Calon Siswa/i Yang Terdaftar</th>
          		<td><?= $jml_pendaftar ?> Siswa/i</td>
							<td></td>
          	</tr>
						<tr>
							<th width="250px">Jumlah Formulir Yang Terkumpul</th>
          		<td><?= $jml_formulir ?> Siswa/i</td>
							<td></td>
          	</tr>
						<tr>
							<tr>
								<th rowspan="2">Data Calon Siswa/i</th>
								<td> <?= $jml_cowo ?> Laki - laki</td>
								<td></td>
							</tr>
							<tr>
								<td><?= $jml_cewe ?> Perempuan</td>
								<td></td>
							</tr>
						</tr>
						<tr>
							<tr>
								<th rowspan="2">Calon Siswa</th>
								<td width="100px">Sudah Terverifikasi</td>
								<td><?= $jml_terverifikasi; ?> Siswa/i</td>
							</tr>
							<tr>
								<td>Belum Terverifikasi</td>
								<td><?= $jml_blmterverifikasi; ?> Siswa/i</td>
							</tr>
						</tr>
          </table>
					<div class="profile_title">
						<div class="col-md-6">
							<h2>Lampiran</h2>
						</div>
					</div>
					<h2>Daftar Seluruh Pendaftar</h2>
					<table class="table table-hover dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No. </th>
                <th>No Pendaftaran</th>
                <th>NIK</th>
                <th>Nama Siswa/i</th>
                <th>Asal Sekolah</th>
                <th>Tanggal Daftar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa` WHERE id_daftar = '$_GET[tid]'");
              $no = 1;
              while ($a = mysqli_fetch_array($query)) {
              ?>
              <tr>
                <td><?php echo $no ;?></td>
                <td><?php echo $a['no_daftar'] ?></td>
                <td><?php echo $a['nik'] ?></td>
                <td><?php echo $a['nama'] ?></td>
                <td><?php echo $a['nama_sekolah'] ?></td>
                <td><?php echo indonesian_date($a['tgl_daftar']) ?></td>
              </tr>
              <?php $no++ ; } ?>
            </tbody>
          </table>
					<h2>Daftar Siswa/i Sudah Terverifikasi</h2>
					<table class="table table-hover dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No. </th>
                <th>No Pendaftaran</th>
                <th>NIK</th>
                <th>Nama Siswa/i</th>
                <th>Asal Sekolah</th>
                <th>Tanggal Daftar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa` WHERE keterangan = 'Sudah Terverifikasi' AND id_daftar = '$_GET[tid]'");
              $no = 1;
              while ($a = mysqli_fetch_array($query)) {
              ?>
              <tr>
                <td><?php echo $no ;?></td>
                <td><?php echo $a['no_daftar'] ?></td>
                <td><?php echo $a['nik'] ?></td>
                <td><?php echo $a['nama'] ?></td>
                <td><?php echo $a['nama_sekolah'] ?></td>
                <td><?php echo indonesian_date($a['tgl_daftar']) ?></td>
              </tr>
              <?php $no++ ; } ?>
            </tbody>
          </table>
					<h2>Daftar Siswa/i Belum Terverifikasi</h2>
					<table class="table table-hover dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No. </th>
                <th>No Pendaftaran</th>
                <th>NIK</th>
                <th>Nama Siswa/i</th>
                <th>Asal Sekolah</th>
                <th>Tanggal Daftar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa` WHERE keterangan = 'Belum Terverifikasi' AND id_daftar = '$_GET[tid]'");
              $no = 1;
              while ($a = mysqli_fetch_array($query)) {
              ?>
              <tr>
                <td><?php echo $no ;?></td>
                <td><?php echo $a['no_daftar'] ?></td>
                <td><?php echo $a['nik'] ?></td>
                <td><?php echo $a['nama'] ?></td>
                <td><?php echo $a['nama_sekolah'] ?></td>
                <td><?php echo indonesian_date($a['tgl_daftar']) ?></td>
              </tr>
              <?php $no++ ; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
