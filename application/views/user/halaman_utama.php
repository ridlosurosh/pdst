<div class="content-header">
    <div class="container">
        <div class="row mt-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> Dashboard
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-graduate"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Santri Aktif</span>
                        <span class="info-box-number">
                            <?= $santri ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-male"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Santri Putra</span>
                        <span class="info-box-number"><?= $putra ?></span>
                    </div>
                </div>
            </div>
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-female"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Santri Putri</span>
                        <span class="info-box-number"><?= $putri ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pendaftar Online</span>
                        <span class="info-box-number"><?= $psb ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card card-teal">
                    <div class="card-header">
                        <h3 class="card-title">Jenis Kelamin</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card card-teal">
                    <div class="card-header">
                        <h3 class="card-title">Santri Sesuai Kamar</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
foreach ($kamar as $jc) {
    $nama[] = $jc->nama_blok;
    $jmlkunjungan[] = $jc->jml;
}
?>
<script type="text/javascript">
    $(function() {
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                'Santri Laki-Laki',
                'Santri Perempuan',
            ],
            datasets: [{
                data: [<?= $putra ?>, <?= $putri ?>],
                backgroundColor: ['#00ffbf', '#1a8cff'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })
    })

    $(function() {
        var barChartCanvas = $('#barChart').get(0).getContext('2d');
        var areaChartData = {
            labels: <?php echo json_encode($nama); ?>,
            datasets: [{
                label: 'Orang',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: <?php echo json_encode($jmlkunjungan); ?>
            }]
        }

        var barChartData = jQuery.extend(true, {}, areaChartData);
        var temp0 = areaChartData.datasets[0];
        barChartData.datasets[0] = temp0;
        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        };
        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        });
    });
</script>