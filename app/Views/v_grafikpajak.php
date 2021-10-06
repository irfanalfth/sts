<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-ungu text-white">
                    Pajak Restoran
                </div>
                <div class="card-body">
                    <?php foreach ($rekaprestoran as $value) {
                        $bulan[] = $value->nama_bulan;
                        $total[] = $value->total;
                    }
                    ?>
                    <div id="chart-restoran"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-ungu text-white">
                    Pajak Hotel
                </div>
                <div class="card-body">
                    <?php foreach ($rekaphotel as $value) {
                        $bulanhotel[] = $value->nama_bulan;
                        $totalhotel[] = $value->totalhotel;
                    }
                    ?>
                    <div id="chart-hotel"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-ungu text-white">
                    Pajak Reklame
                </div>
                <div class="card-body">
                    <?php foreach ($rekapreklame as $value) {
                        $bulanreklame[] = $value->nama_bulan;
                        $totalreklame[] = $value->totalreklame;
                    }
                    ?>
                    <div id="chart-reklame"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-ungu text-white">
                    Pajak Hiburan
                </div>
                <div class="card-body">
                    <?php foreach ($rekaphiburan as $value) {
                        $bulanhiburan[] = $value->nama_bulan;
                        $totalhiburan[] = $value->totalhiburan;
                    }
                    ?>
                    <div id="chart-hiburan"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-ungu text-white">
                    Pajak PBB
                </div>
                <div class="card-body">
                    <?php foreach ($rekappbb as $value) {
                        $bulanpbb[] = $value->nama_bulan;
                        $totalpbb[] = $value->totalpbb;
                    }
                    ?>
                    <div id="chart-pbb"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-ungu text-white">
                    Pajak Penerangan Jalan (PPJ-PLN)
                </div>
                <div class="card-body">
                    <?php foreach ($rekapppj as $value) {
                        $bulanppj[] = $value->nama_bulan;
                        $totalppj[] = $value->totalppj;
                    }
                    ?>
                    <div id="chart-ppj"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Grafik Restoran -->
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-restoran'), {
            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 320,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "A",
                data: <?php echo json_encode($total); ?>,
            }],
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                categories: <?php echo json_encode($bulan); ?>,
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            colors: ["#206bc4"],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>
<!-- Grafik Hotel -->
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-hotel'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 320,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "A",
                data: <?php echo json_encode($totalhotel); ?>,
            }],
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                categories: <?php echo json_encode($bulanhotel); ?>,
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            colors: ["#206bc4"],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>
<!-- Grafik Reklame -->
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-reklame'), {
            chart: {
                type: "area",
                fontFamily: 'inherit',
                height: 320,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "A",
                data: <?php echo json_encode($totalreklame); ?>,
            }],
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                categories: <?php echo json_encode($bulanhotel); ?>,
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            colors: ["#206bc4"],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>
<!-- Grafik Hiburan -->
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-hiburan'), {
            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 320,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "A",
                data: <?php echo json_encode($totalhiburan); ?>,
            }],
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                categories: <?php echo json_encode($bulanhiburan); ?>,
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            colors: ["#206bc4"],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>
<!-- Grafik PBB -->
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-pbb'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 320,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "A",
                data: <?php echo json_encode($totalpbb); ?>,
            }],
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                categories: <?php echo json_encode($bulanpbb); ?>,
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            colors: ["#206bc4"],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>
<!-- Grafik PPJ -->
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-ppj'), {
            chart: {
                type: "area",
                fontFamily: 'inherit',
                height: 320,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "A",
                data: <?php echo json_encode($totalppj); ?>,
            }],
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                categories: <?php echo json_encode($bulanppj); ?>,
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            colors: ["#206bc4"],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>