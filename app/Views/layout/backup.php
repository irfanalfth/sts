<script>
    var sts_kategori = document.getElementById('sts_kategori');
    var data_sts_kategori = [];
    var label_sts_kategori = [];

    <?php foreach ($data_kategori as $key => $value) : ?>
        data_sts_kategori.push(<?= $value->jumlah ?>);
        label_sts_kategori.push('<?= $value->nama_kategori ?>');
    <?php endforeach ?>

    var data_sts_per_kategori = {
        datasets: [{
            data: data_sts_kategori,
            backgroundColor: [
                'rgba(255,99,132,0.8)',
                'rgba(54,162,235,0.8)',
                'rgba(255,206,86,0.8)',
            ],
        }],
        labels: label_sts_kategori,
    }

    var chart_sts_kategori = new Chart(sts_kategori, {
        type: 'doughnut',
        data: data_sts_per_kategori
    });
</script>
<script>
    var bulan_sts = document.getElementById('bulan_sts');
    var data_bulan_sts = [];
    var label_bulan_sts = [];

    <?php foreach ($data_kategori as $key => $value) : ?>
        data_bulan_sts.push(<?= $value->jumlah ?>);
        label_bulan_sts.push('<?= $value->nama_kategori ?>');
    <?php endforeach ?>

    var data_kategori_per_bulan_sts = {
        datasets: [{
            label: 'Jumlah',
            data: data_bulan_sts,
            backgroundColor: 'rgba(255, 99, 132, 0.8)',
        }],
        labels: label_bulan_sts,
    }

    var chart_bulan_sts = new Chart(bulan_sts, {
        type: 'bar',
        data: data_kategori_per_bulan_sts
    });
</script>