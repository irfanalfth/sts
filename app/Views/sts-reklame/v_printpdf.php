<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <style type="text/css">
        table {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        table tr .text2 {
            text-align: right;
            font-size: 13px;
        }

        table tr .text {
            text-align: center;
            font-size: 13px;
        }

        table tr td {
            font-size: 13px;
        }

        footer.ex1 {
            top: 100%;
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body>
    <!-- Main content -->
    <!-- title row -->
    <div class="container">
        <table>
            <tr>
                <td><img width="90" height="90" src="<?= base_url('gambar/metro.png') ?>" alt="Logo Kabupaten"></td>
                <td colspan="4">
                    <font size="18"><b>Laporan Pajak Daerah BPPRD Kota Metro</b></font><br>
                    <font size="12"><i>Jl. AH Nasution, Imopuro, Kec. Metro Pusat, Kota Metro, Lampung 34124</i></font><br>
                </td>
            </tr>
        </table>
        <hr>
    </div>

    <div class="col-12">
        <h2 class="text-center">Laporan Pajak Reklame</h2>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th width="120px">Tanggal</th>
                    <th width="170px">Nama</th>
                    <th>Jumlah Pajak</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tot_keseluruhan = 0;
                $no = 1;
                foreach ($sts as $key => $value) {
                    // total bayar adalah penjumlahan dari keseluruhan total
                    $tot_keseluruhan += $value['jumlah']; ?>
                    <tr>
                        <td width="50px"><?= $no++; ?></td>
                        <td width="120px"><?= $value['tgl']; ?></td>
                        <td width="170px"><?= $value['nama_wajib']; ?></td>
                        <td><?= $value['jumlah']; ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <th colspan="3">Total Keseluruhan</th>
                    <th><?= $tot_keseluruhan ?></th>
                </tr>
            </tbody>
        </table>
    </div>
    <footer>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <div class="ex1">
            <table width="300">
                <tr>
                    <td width="380"></td>
                    <td>Kepala BPPRD<br><br><br><br><small><b><u> Ir. ARIF JOKO ARWOKO</u></b></small><br><b><small> NIP. 1962090 199603 1 001</small></b></td>
                </tr>
            </table>
        </div>
    </footer>

</body>

</html>