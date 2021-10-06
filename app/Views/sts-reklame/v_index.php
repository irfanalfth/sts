<div class="row">
    <div class="col-md-12">
        <a href="<?= base_url('sts_reklame/printpdf') ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
        <a href="<?= base_url('sts_reklame/excel') ?>" target="_blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data STS</h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('sts_reklame/add') ?>" class="btn btn-primary btn-sm btn-flat">
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
                        <th>Tanggal</th>
                        <th>Nama Wajib Pajak</th>
                        <th>Jenis Pajak</th>
                        <th>Tempat</th>
                        <th>Jumlah</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tot_keseluruhan = 0;
                    $no = 1;
                    foreach ($sts as $key => $value) {
                        // total bayar adalah penjumlahan dari keseluruhan total
                        $tot_keseluruhan += $value['jumlah']; ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['tgl']; ?></td>
                            <td><?= $value['nama_wajib']; ?></td>
                            <td><?= $value['nama_kategori']; ?></td>
                            <td><?= $value['tempat']; ?></td>
                            <td><?= $value['jumlah']; ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-flat">Aksi</button>
                                    <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li> <a href="<?= base_url('sts_reklame/edit/' . $value['id_sts_r']) ?>">Edit</a></li>
                                        <li><a onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $value['nama_wajib']; ?>!!')" href="<?= base_url('sts_reklame/delete/' . $value['id_sts_r']) ?>">Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="4">Total Keseluruhan</th>
                        <th><?= $tot_keseluruhan ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- /.modal delete kategori -->
<?php foreach ($sts as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_sts_r']; ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Data Sts </h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Hapus Data <b><?= $value['nama_wajib']; ?></b>..?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('sts_reklame/delete/' . $value['id_sts_r']) ?>" type="submit" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- end modal delete kategori -->