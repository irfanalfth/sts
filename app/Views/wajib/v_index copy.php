<div class="row">
    <div class="col-md-12">
        <a href="<?= base_url('wajib/printpdf') ?>" target="_blank" class="btn btn-primary">PDF</a>
        <br>
        <form method="get" action="">
            <label>Filter Berdasarkan</label><br>
            <select name="filter" id="filter">
                <option value="">Pilih</option>
                <option value="1">Per Tanggal</option>
                <option value="2">Per Bulan</option>
                <option value="3">Per Tahun</option>
            </select>
            <br /><br />
            <div id="form-tanggal">
                <label>Tanggal</label><br>
                <input type="text" name="tanggal" class="input-tanggal" />
                <br /><br />
            </div>
            <div id="form-bulan">
                <label>Bulan</label><br>
                <select name="bulan">
                    <option value="">Pilih</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <br /><br />
            </div>
            <div id="form-tahun">
                <label>Tahun</label><br>
                <select name="tahun">
                    <option value="">Pilih</option>
                    <?php
                    // Create database connection using config file
                    include("connection/DB.php");
                    $query = "SELECT YEAR(tgl_pendaftaran) AS tahun FROM tbl_wajib GROUP BY YEAR(tgl_pendaftaran)"; // Tampilkan tahun sesuai di tabel transaksi
                    $sql = mysqli_query($mysqli, $query); // Eksekusi/Jalankan query dari variabel $query
                    while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                        echo '<option value="' . $data['tahun'] . '">' . $data['tahun'] . '</option>';
                    }
                    ?>
                </select>
                <br /><br />
            </div>
            <button type="submit">Tampilkan</button>
            <a href="index.php">Reset Filter</a>
        </form>
        <hr />
        <?php
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl_pendaftaran = date('Y-m-d', strtotime($_GET['tanggal']));
                echo '<b>Data Pembayaran Tanggal ' . $tgl_pendaftaran . '</b><br /><br />';
                echo '<a href="wajib/printpdf?filter=1&tanggal=' . $_GET['tanggal'] . '">Cetak PDF</a><br /><br />';
                $query = "SELECT * FROM tbl_wajib WHERE DATE(tgl_pendaftaran)='" . $_GET['tanggal'] . "'"; // Tampilkan data tbl_wajib sesuai tanggal yang diinput oleh user pada filter
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                echo '<b>Data Pembayaran Bulan ' . $nama_bulan[$_GET['bulan']] . ' ' . $_GET['tahun'] . '</b><br /><br />';
                echo '<a href="wajib/printpdf?filter=2&bulan=' . $_GET['bulan'] . '&tahun=' . $_GET['tahun'] . '">Cetak PDF</a><br /><br />';
                $query = "SELECT * FROM tbl_wajib WHERE MONTH(tgl_pendaftaran)='" . $_GET['bulan'] . "' AND YEAR(tgl_pendaftaran)='" . $_GET['tahun'] . "'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
            } else { // Jika filter nya 3 (per tahun)
                echo '<b>Data Pembayaran Tahun ' . $_GET['tahun'] . '</b><br /><br />';
                echo '<a href="wajib/printpdf?filter=3&tahun=' . $_GET['tahun'] . '">Cetak PDF</a><br /><br />';
                $query = "SELECT * FROM tbl_wajib WHERE YEAR(tgl_pendaftaran)='" . $_GET['tahun'] . "'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            echo '<b>Semua Data Pembayaran</b><br /><br />';
            echo '<a href="wajib/printpdf">Cetak PDF</a><br /><br />';
            $query = "SELECT * FROM tbl_wajib ORDER BY tgl_pendaftaran"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
        }
        ?>
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Wajib Pajak</h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('wajib/add') ?>" class="btn btn-primary btn-sm btn-flat">
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
                        <th>NPWPD</th>
                        <th>Tanggal Pendaftaran</th>
                        <th>Nama</th>
                        <th>Jenis Pajak</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($mysqli, $query); // Eksekusi/Jalankan query dari variabel $query
                    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                    if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                        while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                            $tgl_pendaftaran = date('Y-m-d', strtotime($data['tgl_pendaftaran'])); // Ubah format tanggal jadi dd-mm-yyyy
                            $no = 1;
                            foreach ($wajib as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value['npwpd']; ?></td>
                                    <td><?= $value['tgl_pendaftaran']; ?></td>
                                    <td><?= $value['nama_pemilik']; ?></td>
                                    <td><?= $value['nama_kategori']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-flat">Aksi</button>
                                            <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="<?= base_url('wajib/viewwajib/' . $value['id_wajib']) ?>">Detail</a></li>
                                                <li> <a href="<?= base_url('wajib/edit/' . $value['id_wajib']) ?>">Edit</a></li>
                                                <li><a onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $value['nama_pemilik']; ?>!!')" href="<?= base_url('wajib/delete/' . $value['id_wajib']) ?>">Hapus</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- /.modal delete kategori -->
<?php foreach ($wajib as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_wajib']; ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Wajib Pajak</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Hapus Data <b><?= $value['nama_pemilik']; ?></b>..?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('wajib/delete/' . $value['id_wajib']) ?>" type="submit" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- end modal delete kategori -->