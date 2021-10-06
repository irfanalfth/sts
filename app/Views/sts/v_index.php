<div class="row">
    <div class="col-md-12">
        <a href="<?= base_url('sts/excel') ?>" target="_blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
        <div class="card">
            <div class="card-header bg-ungu text-white">
                Data STS

                <div class="card-tools pull-right">
                    <a href="<?= base_url('sts/add') ?>" class="btn btn-success btn-sm">
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
            <div class="card-body">
                <small class="pull-right"><?php echo $subtitle ?></small>
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
                        $tot_keseluruhan += $value->jumlah_pajak; ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->tanggal; ?></td>
                            <td><?= $value->nama_wajib; ?></td>
                            <td><?= $value->nama_kategori; ?></td>
                            <td><?= $value->ket_tempat; ?></td>
                            <td><?= $value->jumlah_pajak; ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-flat">Aksi</button>
                                    <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li> <a href="<?= base_url('sts/edit/' . $value->id_sts) ?>">Edit</a></li>
                                        <li><a onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $value->nama_wajib; ?>!!')" href="<?= base_url('sts/delete/' . $value->id_sts) ?>">Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="5">Total Keseluruhan</th>
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
    <div class="modal fade" id="delete<?= $value->id_sts; ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Data Sts </h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Hapus Data <b><?= $value->nama_wajib; ?></b>..?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('sts/delete/' . $value->id_sts) ?>" type="submit" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- end modal delete kategori -->