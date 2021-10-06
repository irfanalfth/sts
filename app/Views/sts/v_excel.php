<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition:attachment; filename=Laporan Pajak.xls");
?>

<html>

<head>

</head>

<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Wajib</th>
                <th>Jenis Pajak</th>
                <th>Tempat</th>
                <th>Jumlah Pajak</th>
            </tr>
        </thead>
        <?php
        $tot_keseluruhan = 0;
        $no = 1;
        foreach ($datafilter as $value) {
            $tot_keseluruhan += $value->jumlah_pajak; ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->tanggal; ?></td>
                <td><?= $value->nama_wajib; ?></td>
                <td><?= $value->nama_kategori; ?></td>
                <td><?= $value->ket_tempat; ?></td>
                <td><?= $value->jumlah_pajak; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <th colspan="5">Total Keseluruhan</th>
            <th><?= $tot_keseluruhan ?></th>
        </tr>
        </tbody>
    </table>
</body>

</html>