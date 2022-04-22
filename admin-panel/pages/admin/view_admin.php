<?php include "../lib/inc.session.php"; ?>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Users</h3>
    </div>
  </div>

  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
          <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No. </th>
                <th>No Induk</th>
                <th>Nama Pengguna</th>
                <th>Email</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php

              include "../conf/koneksi.php";
              include "../format_tanggal.php";

              $query = mysqli_query($connect, "SELECT * FROM `pengguna` WHERE hak_akses='Super Admin'");
              $no = 1;
              while ($a = mysqli_fetch_array($query)) {
              ?>
              <tr>
                <td><?php echo $no ;?></td>
                <td><?php echo $a['nik'] ?></td>
                <td><?php echo $a['nama_pengguna'] ?></td>
                <?php if($a['email']==""){ ?>
                <td>Data Belum diisi</td>
                <?php }else{ ?>
                <td><?php echo $a['email'] ?></td>
              <?php } ?>
                <td><?php echo indonesian_date($a['tgl_daftar']) ?></td>
                <td><?php echo $a['hak_akses'] ?></td>
              </tr>
              <?php $no++ ; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
