<div class="row">
    <div class="col-md-12">
        <!-- <a href="" target="_blank" class="btn btn-primary">PDF</a> -->
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Wajib Pajak</h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('wajib/add') ?>" class="btn btn-primary btn-sm btn-flat">
                        <i class="fa fa-plus"></i> Add </a>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->

            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success! - ';
                echo session()->getFlashdata('pesan');
                echo '</h4></div>';
            }
            ?>
            <div class="box-body">

            </div>
            <!-- /.box-body -->
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NPWPD</th>
                        <th>Tanggal Pendaftaran</th>
                        <th>Nama</th>
                        <th>Jenis Pajak</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($wajib as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['npwpd']; ?></td>
                            <td><?= $value['tgl_pendaftaran']; ?></td>
                            <td><?= $value['nama_pemilik']; ?></td>
                            <td><?= $value['nama_kategori']; ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-flat">Aksi</button>
                                    <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= base_url('wajib/viewwajib/' . $value['id_wajib']) ?>">Detail</a></li>
                                        <li> <a href="<?= base_url('wajib/edit/' . $value['id_wajib']) ?>">Edit</a></li>
                                        <li><a onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $value['nama_pemilik']; ?>!!')" href="<?= base_url('wajib/delete/' . $value['id_wajib']) ?>">Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- /.modal delete kategori -->
<?php foreach ($wajib as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_wajib']; ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Wajib Pajak</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Hapus Data <b><?= $value['nama_pemilik']; ?></b>..?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('wajib/delete/' . $value['id_wajib']) ?>" type="submit" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- end modal delete kategori -->