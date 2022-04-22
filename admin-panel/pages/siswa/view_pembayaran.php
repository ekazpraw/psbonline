<?php include "../lib/inc.session.php"; ?>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Pembayaran <small>Total Pembayaran Siswa</small></h3>
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
                <th>NIK</th>
                <th>Status Bayar</th>
                <th>Bukti Struk</th>
                <th>Tanggal Bayar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "../conf/koneksi.php";
              include "../format_tanggal.php";
              $query = mysqli_query($connect, "SELECT * FROM `buktitransfer`");
              $no = 1;
              while ($a = mysqli_fetch_array($query)) {
              ?>
              <tr>
                <td><?php echo $no ;?></td>
                <td><?php echo $a['nik'] ?></td>
                <td>
                  <?php if($a['status_bayar'] == "Sudah Membayar") { ?>
                  <span class="label label-info"><?php echo $a['status_bayar'] ?></span>
                <?php }elseif($a['status_bayar'] == "Menunggu Verifikasi"){ ?>
                  <span class="label label-warning"><?php echo $a['status_bayar'] ?></span>
                <?php }else{ ?>
                  <span class="label label-danger"><?php echo $a['status_bayar'] ?></span>
                <?php } ?>
                </td>
                <td><a class="fancybox" href="../uploads/struk/<?php echo $a['struk'];?>" data-fancybox-group="gallery" title="Gambar Struk" width="100%"><img src="../uploads/struk/<?php echo $a['struk'];?>" width="200px" alt="Thumbnail Image" class="img-thumbnail img-responsive"></a>
                </td>
                <td><?php echo indonesian_date($a['tgl_bayar']) ?></td>
                <td>
                  <?php if ($a['status_bayar'] == "Sudah Membayar") { ?>
                  <input type="button" class="btn btn-success" name="nik" value="Sudah Membayar" onclick="window.location='?page=tolakpembayaran&nik=<?php echo $a['nik']; ?>' ">
                  <?php }else{ ?>
                  <form enctype="multipart/form-data" action="?page=terimapembayaran" method="post">
                  <input type="button" class="btn btn-info" name="nik" value="Setujui Pembayaran" onclick="window.location='?page=terimapembayaran&nik=<?php echo $a['nik']; ?>' ">
                  </form>
                  <form enctype="multipart/form-data" action="?page=tolakpembayaran" method="post">
                  <input type="button" class="btn btn-danger" name="nik" value="Tolak Pembayaran" onclick="window.location='?page=tolakpembayaran&nik=<?php echo $a['nik']; ?>' ">
                  <?php } ?>
                  </form>
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
