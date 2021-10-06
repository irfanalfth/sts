<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Wajib</h3>


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
                <?php echo form_open_multipart('wajib/update/' . $wajib['id_wajib']);
                ?>

                <div class="form-group">
                    <label>NPWPD</label>
                    <input name="npwpd" class="form-control" value="<?= $wajib['npwpd']; ?>" readonly="">
                </div>

                <div class="form-group">
                    <label>Tanggal Pendaftaran</label>
                    <input name="tgl_pendaftaran" type="date" value="<?= $wajib['tgl_pendaftaran']; ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nama Usaha</label>
                    <input name="nama_usaha" value="<?= $wajib['nama_usaha'] ?>" class="form-control" placeholder="Nama Usaha" required>
                </div>
                <div class="form-group">
                    <label>Nama Pemilik</label>
                    <input name="nama_pemilik" value="<?= $wajib['nama_pemilik'] ?>" class="form-control" placeholder="Nama Pemilik" required>
                </div>

                <div class="form-group">
                    <label>Alamat Pemilik</label>
                    <input name="alamat_pemilik" value="<?= $wajib['alamat_pemilik'] ?>" class="form-control" placeholder="Alamat Pemilik" required>
                </div>

                <div class="form-group">
                    <label>Alamat Objek</label>
                    <input name="alamat_objek" value="<?= $wajib['alamat_objek'] ?>" class="form-control" placeholder="Alamat Objek" required>
                </div>

                <div class="form-group">
                    <label>Pendapatan Perbulan</label>
                    <input name="pen_bulan" value="<?= $wajib['pen_bulan'] ?>" class="form-control" placeholder="Pendapatan Perbulan" onkeypress="return hanyaAngka(event)" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="id_kategori" class="form-control">
                        <option value="<?= $wajib['id_kategori'] ?>"><?= $wajib['nama_kategori'] ?></option>
                        <?php foreach ($kategori as $key => $value) { ?>
                            <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>}
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Jumlah Harga Pajak</label>
                    <input name="jumlah" value="<?= $wajib['jumlah'] ?>" class="form-control" placeholder="Jumlah Harga Pajak" onkeypress="return hanyaAngka(event)" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('wajib') ?>" class="btn btn-success">Kembali</a>
                </div>

                <?php echo form_close() ?>
            </div>
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-3">
    </div>
</div>