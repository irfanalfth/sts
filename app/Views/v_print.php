<html>

<head>
    <title>Print</title>
</head>

<body onload="window.print()">

    <section class="invoice">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <img src="<?= base_url() ?>/gambar/metro.png" width="50px" height="50px" alt="Logo"> <?php echo $judul ?>
                    <small class="pull-right"></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-12">

                <address>
                    <strong><?php echo $subjudul ?></strong><br>
                    <?php echo $subtitle ?><br>

                </address>
            </div>
            <!-- /.col -->

            <!-- /.col -->

            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jenis Pajak</th>
                            <th>Jumlah Pajak</th>
                        </tr>
                    </thead>
                    <?php
                    $tot_keseluruhan = 0;
                    $no = 1;
                    foreach ($datafilter as $value) {
                        $tot_keseluruhan += $value->jumlah_pajak; ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->tanggal; ?></td>
                            <td><?= $value->nama_kategori; ?></td>
                            <td><?= $value->jumlah_pajak; ?></td>
                        </tr>
                    <?php
                    } ?>
                    <tr>
                        <th colspan="3">Total Keseluruhan</th>
                        <th><?= $tot_keseluruhan ?></th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row" style="padding-left: 4em;">
            <!-- accepted payments column -->
            <div class="col-xs-7">

            </div>
            <!-- /.col -->
            <div class="col-xs-5">
                <p class="lead">Metro, <?php echo date('d M Y') ?></p>

                <div class="table-responsive">
                    <table>
                        <tr>
                            <th style="width:20%"></th>
                            <td>Kepala BPPRD<br><br><br><br><small><b><u> Ir. ARIF JOKO ARWOKO</u></b></small><br><b><small> NIP. 1962090 199603 1 001</small></b></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-download"></i> Generate PDF
                </button>
            </div>
        </div>
    </section>
</body>

</html>