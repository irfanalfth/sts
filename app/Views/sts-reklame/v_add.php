<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Add Data STS</h3>


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
                <?php echo form_open('sts_reklame/insert');
                helper('text');
                ?>

                <div class="form-group">
                    <label>Tanggal</label>
                    <input name="tgl" type="date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nama Wajib Pajak</label>
                    <input name="nama_wajib" class="form-control" placeholder="Nama Wajib Pajak" required>
                </div>

                <div class="form-group">
                    <label for="nama_kategori" class=" form-control-label">Kategori</label>
                    <select name="nama_kategori" class="form-control">
                        <option value="">-PILIH-</option>
                        <option value="Pajak Reklame">Pajak Reklame</option>
                        <option value="Pajak Restoran">Pajak Restoran</option>
                        <option value="Pajak Hotel">Pajak Hotel</option>
                        <option value="Pajak Hiburan">Pajak Hiburan</option>
                        <option value="Pajak PPJ">Pajak PPJ</option>
                        <option value="Pajak Parkir">Pajak Parkir</option>
                        <option value="Pajak Air Bawah Tanah">Pajak Air Bawah Tanah</option>
                        <option value="Pajak PBB">Pajak PBB</option>
                        <option value="Pajak BPHTB">Pajak BPHTB</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Alamat Tempat</label>
                    <input name="tempat" class="form-control" placeholder="Alamat Tempat" required>
                </div>

                <div class="form-group">
                    <label>Jumlah Harga Pajak</label>
                    <input name="jumlah" class="form-control" placeholder="Jumlah Harga Pajak" required>
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