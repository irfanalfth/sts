<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Data Sts</h3>


                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <h5>Ada Kesalahan!!</h5>
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <?php echo form_open('sts_reklame/update/' . $sts_reklame['id_sts_r']);
                ?>

                <div class="form-group">
                    <label>Tanggal</label>
                    <input name="tgl" type="date" value="<?= $sts_reklame['tgl']; ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nama Wajib Pajak</label>
                    <input name="nama_wajib" value="<?= $sts_reklame['nama_wajib'] ?>" class="form-control" placeholder="Nama Wajib Pajak" required>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="nama_kategori" class="form-control">
                        <option value="Pajak Reklame" <?= ($sts['nama_kategori'] == 'Pajak Reklame' ? "selected" : ""); ?>>Pajak Reklame</option>
                        <option value="Pajak Restoran" <?= ($sts['nama_kategori'] == 'Pajak Restoran' ? "selected" : ""); ?>>Pajak Restoran</option>
                        <option value="Pajak Hotel" <?= ($sts['nama_kategori'] == 'Pajak Hotel' ? "selected" : ""); ?>>Pajak Hotel</option>
                        <option value="Pajak PPJ" <?= ($sts['nama_kategori'] == 'Pajak PPJ' ? "selected" : ""); ?>>Pajak PPJ</option>
                        <option value="Pajak Parkir" <?= ($sts['nama_kategori'] == 'Pajak Parkir' ? "selected" : ""); ?>>Pajak Parkir</option>
                        <option value="Pajak Air Bawah Tanah" <?= ($sts['nama_kategori'] == 'Pajak Air Bawah Tanah' ? "selected" : ""); ?>>Pajak Air Bawah Tanah</option>
                        <option value="Pajak PBB" <?= ($sts['nama_kategori'] == 'Pajak PBB' ? "selected" : ""); ?>>Pajak PBB</option>
                        <option value="Pajak BPHTB" <?= ($sts['nama_kategori'] == 'Pajak BPHTB' ? "selected" : "") ?>>Pajak BPHTB</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Alamat Tempat</label>
                    <input name="tempat" value="<?= $sts_reklame['tempat'] ?>" class="form-control" placeholder="Alamat Tempat" required>
                </div>

                <div class="form-group">
                    <label>Jumlah Harga Pajak</label>
                    <input name="jumlah" value="<?= $sts_reklame['jumlah'] ?>" class="form-control" placeholder="Jumlah Harga Pajak" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('sts_reklame') ?>" class="btn btn-success">Kembali</a>
                </div>

                <?php echo form_close() ?>
            </div>
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-3">
    </div>
</div>