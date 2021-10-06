<div class="container-fluid">

    <div class="card mb-3">
        <div class="card-header bg-ungu text-white">
            Filter Laporan STS Per Tanggal
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('laporan/filter'); ?>" method="POST" target="_blank" class="form-inline">
                <input type="hidden" name="nilaifilter" value="1">

                <input name="valnilai" type="hidden">

                <div class="form-group mb-2">
                    <label for="staticEmail2">Awal</label>
                    <input name="tanggalawal" value="" type="date" class="form-control" placeholder="Inputkan Jenis Bayar" id="tanggalawal" required="">
                </div>
                <div class="form-group mb-2 ml-5">
                    <label for="staticEmail2">Akhir</label>
                    <input name="tanggalakhir" value="" type="date" class="form-control" placeholder="Inputkan Jenis Bayar" id="tanggalakhir" required="">
                </div>
                <div class="form-group mb-2 ml-5">
                    <label for="staticEmail2">Pajak</label>
                    <select class="form-control" name="nama_kategori" id="nama_kategori">
                        <option value="">Pilih Jenis Pajak</option>
                        <?php foreach ($kategori as $row) { ?>
                            <option value="<?php echo $row->nama_kategori ?>"><?php echo $row->nama_kategori ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success mb-2 ml-auto"><i class="fa fa-file"></i> Cetak Data</button>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header bg-ungu text-white">
            Filter Laporon STS Per-Bulan
        </div>
        <div class="card-body">
            <form class="form-inline" action="<?php echo base_url('laporan/filter'); ?>" method="POST" target="_blank">
                <input type="hidden" name="nilaifilter" value="2">
                <input name="valnilai" type="hidden">
                <div class="form-group mb-2">
                    <label for="staticEmail2">Tahun</label>
                    <select name="tahun1" id="tahun1" class="form-control ml-3" title="Pilih Tahun">
                        <option value="">Pilih Tahun</option>
                        <?php
                        foreach ($tahun as $key => $value) { ?>
                            <option value="<?php echo $value->tahun ?>"><?php echo $value->tahun ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-2 ml-5">
                    <label for="staticEmail2">Bulan</label>
                    <select name="bulan" id="bulan" class="form-control ml-3" title="Pilih Bulan">
                        <option value="">Pilih Bulan</option>
                        <option value="01">JANUARI</option>
                        <option value="02">FEBRUARI</option>
                        <option value="03">MARET</option>
                        <option value="04">APRIL</option>
                        <option value="05">MEI</option>
                        <option value="06">JUNI</option>
                        <option value="07">JULI</option>
                        <option value="08">AGUSTUS</option>
                        <option value="09">SEPTEMBER</option>
                        <option value="10">OKTOBER</option>
                        <option value="11">NOVEMBER</option>
                        <option value="12">DESEMBER</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success mb-2 ml-auto"><i class="fa fa-file"></i> Cetak Data</button>
            </form>
        </div>
    </div>
</div>