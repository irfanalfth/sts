<div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
            <div class="box box-primary box-solid">
                  <div class="box-header with-border">
                        <h3 class="box-title">Add Arsip</h3>


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
                        <?php echo form_open_multipart('arsip/insert');
                        helper('text');

                        $no_arsip = date('ymds') . '-' . random_string('alnum', 4);
                        ?>

                        <div class="form-group">
                              <label>No Arsip</label>
                              <input name="no_arsip" class="form-control" value="<?= $no_arsip ?>" readonly="">
                        </div>

                        <div class="form-group">
                              <label>Nama Arsip</label>
                              <input name="nama_arsip" class="form-control" placeholder="Nama Arsip">
                        </div>

                        <div class="form-group">
                              <label>Deskripsi</label>
                              <textarea name="deskripsi" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                              <label for="status" class=" form-control-label">Status</label>
                              <select name="status" class="form-control">
                                    <option value="">-Pilih Status-</option>
                                    <option value="1">Sudah Verifikasi</option>
                                    <option value="2">Belum Verifikasi</option>
                              </select>
                        </div>

                        <div class="form-group">
                              <label>File Arsip</label>
                              <input type="file" name="file_arsip" class="form-control">
                              <label class="text-danger">File Harus Format .PDF</label>
                        </div>

                        <div class="form-group">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                              <a href="<?= base_url('arsip') ?>" class="btn btn-success">Kembali</a>
                        </div>

                        <?php echo form_close() ?>
                  </div>
            </div>
            <!-- /.box -->
      </div>

      <div class="col-md-3">
      </div>
</div>