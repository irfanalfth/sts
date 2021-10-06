<div class="container-fluid">
    <div class="row">
        <!-- Styles -->
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header bg-ungu text-white">
                    Total Semua Jumlah Pajak
                </div>
                <div class="card-body">
                    <?php foreach ($rekapbulan as $value) {
                        $bulan[] = $value->nama_bulan;
                        $total[] = $value->total;
                    }
                    ?>
                    <div id="chart-tasks-overview" style="height: 80px; width:100%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-tasks-overview'), {
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