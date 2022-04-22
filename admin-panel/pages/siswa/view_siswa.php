<?php include "../lib/inc.session.php"; ?>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Pendaftar <small>Total Formulir Siswa</small></h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-xs-3">
      </div>
      <div class="x_panel">
        <div class="x_content">
          <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No. </th>
                <th>No Pendaftaran</th>
                <th>NIK</th>
                <th>Nama Siswa</th>
                <th>Asal Sekolah</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "../conf/koneksi.php";
              include "../format_tanggal.php";
              $query = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa` WHERE arsip = 'Tidak'");
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
                <td>
                  <?php if($a['keterangan'] == "Sudah Terverifikasi") { ?>
                  <span class="label label-info"><?php echo $a['keterangan'] ?></span>
                <?php }elseif($a['keterangan'] == "Belum Terverifikasi"){ ?>
                  <span class="label label-warning"><?php echo $a['keterangan'] ?></span>
                <?php }else{ ?>
                  <span class="label label-danger"><?php echo $a['keterangan'] ?></span>
                <?php } ?>
                </td>
                <td>
                  <input type="button" class="btn btn-info" name="reset" value="Detail" onclick="window.location='?page=detail-siswa&tid=<?php echo $a['no_daftar']; ?>' ">
                  <input type="button" class="btn btn-warning" name="reset" value="Arsipkan" onclick="window.location='?page=arsipkan&tid=<?php echo $a['no_daftar']; ?>' ">
                </td>
              </tr>
              <?php $no++ ; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
