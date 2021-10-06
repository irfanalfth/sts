<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header bg-ungu text-white">
        Data Arsip

        <div class="card-tools pull-right">
          <a href="<?= base_url('arsip/add') ?>" class="btn btn-primary btn-sm btn-flat">
            <i class="fa fa-plus"></i> Add </a>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->

      <?php
      if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success! - ';
        echo session()->getFlashdata('pesan');
        echo '</h4></div>';
      }
      ?>
      <div class="card-body">

      </div>
      <!-- /.card-body -->
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>No Arsip</th>
            <th>Nama Arsip</th>
            <th>Upload</th>
            <th>Update</th>
            <th>Status</th>
            <th>File</th>
            <th width="100px">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($arsip as $key => $value) {
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $value['no_arsip']; ?></td>
              <td><?= $value['nama_arsip']; ?></td>
              <td><?= $value['tgl_upload']; ?></td>
              <td><?= $value['tgl_update']; ?></td>
              <td><?= ($value['status'] == 1) ? '<label class="label label-success">Sudah Verifikasi</label>' : '<label class="label label-danger">Belum Verifikasi</label>' ?>
              <td class="text-center">
                <a href="<?= base_url('arsip/viewpdf/' . $value['id_arsip']) ?>">
                  <i class="fa fa-file-pdf-o fa-2x label-danger"></i></a><br>
                <?= number_format($value['ukuran_file'], 0) ?> Byte
              </td>
              <td class="text-center">

                <a href="<?= base_url('arsip/edit/' . $value['id_arsip']) ?>" class="btn btn-xs btn-warning">Edit</a>
                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_arsip']; ?>">Delete</button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.card -->
  </div>
</div>

<!-- /.modal delete kategori -->
<?php foreach ($arsip as $key => $value) { ?>
  <div class="modal fade" id="delete<?= $value['id_arsip']; ?>">
    <div class="modal-dialog modal-sm modal-danger">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus User</h4>
        </div>
        <div class="modal-body">
          Apakah Anda Yakin Ingin Hapus Data <b><?= $value['nama_arsip']; ?></b>..?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
          <a href="<?= base_url('arsip/delete/' . $value['id_arsip']) ?>" type="submit" class="btn btn-primary">Ya</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>
<!-- end modal delete kategori -->