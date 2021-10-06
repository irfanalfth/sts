<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
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
                        <option value="">Jenis Pajak</option>
                        <?php foreach ($kategori as $row) { ?>
                            <option value="<?php echo $row->nama_kategori ?>"><?php echo $row->nama_kategori ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fa fa-file"></i> Tampilkan Data</button>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Laporon STS Per-Bulan
        </div>
        <div class="card-body">
            <form class="form-inline" action="<?php echo base_url('laporan/filter'); ?>" method="POST" target="_blank">>
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
                    <label for="staticEmail2">Tahun</label>
                    <select name="bulanakhir" id="bulanakhir" class="form-control ml-3" title="Pilih Bulan">
                        <option value="">-PILIH-</option>
                        <option value="1">JANUARI</option>
                        <option value="2">FEBRUARI</option>
                        <option value="3">MARET</option>
                        <option value="4">APRIL</option>
                        <option value="5">MEI</option>
                        <option value="6">JUNI</option>
                        <option value="7">JULI</option>
                        <option value="8">AGUSTUS</option>
                        <option value="9">SEPTEMBER</option>
                        <option value="10">OKTOBER</option>
                        <option value="11">NOVEMBER</option>
                        <option value="12">DESEMBER</option>
                    </select>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Print</button>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Laporan STS Per-Tahun
        </div>
        <div class="card-body">
            <form class="form-inline" action="<?php echo base_url('laporan/filter'); ?>" method="POST" target="_blank">
                <input type="hidden" name="nilaifilter" value="3">

                <input name="valnilai" type="hidden">
                <div class="form-group mb-2">
                    <label for="staticEmail2">Bulan</label>
                    <select name="tahun2" id="tahun2" class="form-control ml-3" title="Pilih Tahun">
                        <option value="">Pilih Tahun</option>
                        <?php
                        foreach ($tahun as $thn) { ?>
                            <option value="<?php echo $thn->tahun ?>"><?php echo $thn->tahun ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-2 ml-5">
                    <label for="staticEmail2">Tahun</label>
                    <select class="form-control ml-3" name="nama_kategori2" id="nama_kategori2">
                        <option value=""> Pilih Jenis Pajak </option>
                        <?php
                        foreach ($kategori as $row) { ?>
                            <option value="<?php echo $row->nama_kategori ?>"><?php echo $row->nama_kategori ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
            </form>
        </div>
    </div>
</div>