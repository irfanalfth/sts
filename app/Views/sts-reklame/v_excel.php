<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition:attachment; filename=Laporan Pajak Reklame.xls");
?>

<html>

<head>

</head>

<body>
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
</body>

</html>