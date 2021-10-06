<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Wajib Pajak</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row margin-bottom">
            <div class="col-lg-2">Tanggal Pendaftaran</div>
            <div class="col-lg-8">= <?= $wajib['tgl_pendaftaran']; ?></div>
        </div>
        <div class="row margin-bottom">
            <div class="col-lg-2">Nama Usaha</div>
            <div class="col-lg-8">= <?= $wajib['nama_usaha']; ?></div>
        </div>
        <div class="row margin-bottom">
            <div class="col-lg-2">NPWPD</div>
            <div class="col-lg-8">= <?= $wajib['npwpd']; ?></div>
        </div>
        <div class="row margin-bottom">
            <div class="col-lg-2">Nama Pemilik</div>
            <div class="col-lg-8">= <?= $wajib['nama_pemilik']; ?></div>
        </div>
        <div class="row margin-bottom">
            <div class="col-lg-2">Alamat Pemilik</div>
            <div class="col-lg-8">= <?= $wajib['alamat_pemilik']; ?></div>
        </div>
        <div class="row margin-bottom">
            <div class="col-lg-2">Alamat Objek</div>
            <div class="col-lg-8">= <?= $wajib['alamat_objek']; ?></div>
        </div>
        <div class="row margin-bottom">
            <div class="col-lg-2">Pendapatan Perbulan</div>
            <div class="col-lg-8">= <?= $wajib['pen_bulan']; ?></div>
        </div>
        <div class="row margin-bottom">
            <div class="col-lg-2">Jenis Pajak</div>
            <div class="col-lg-8">= <?= $wajib['nama_kategori']; ?></div>
        </div>
        <div class="row margin-bottom">
            <div class="col-lg-2">Jenis Harga Pajak </div>
            <div class="col-lg-8">= <?= $wajib['jumlah']; ?></div>
        </div>
    </div>
    <!-- /.box-body -->
</div>