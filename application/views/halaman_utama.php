<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col-lg-6">
        <h3>Dashboard</h3>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 col-xl-3 col-lg-6">
      <div class="card o-hidden">
        <div class="bg-primary b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center"><i data-feather="users"></i></div>
            <div class="media-body"><span class="m-0">Santri</span>
              <h4 class="mb-0 counter"><?= $santri ?></h4><i class="icon-bg" data-feather="users"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3 col-lg-6">
      <div class="card o-hidden">
        <div class="bg-primary b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
            <div class="media-body"><span class="m-0">Santri Putra</span>
              <h4 class="mb-0 counter"><?= $putra ?></h4><i class="icon-bg" data-feather="message-circle"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3 col-lg-6">
      <div class="card o-hidden">
        <div class="bg-primary b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
            <div class="media-body"><span class="m-0">Santri Putri</span>
              <h4 class="mb-0 counter"><?= $putri ?></h4><i class="icon-bg" data-feather="shopping-bag"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3 col-lg-6">
      <div class="card o-hidden">
        <div class="bg-primary b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
            <div class="media-body"><span class="m-0">Pengurus</span>
              <h4 class="mb-0 counter"><?= $pengurus ?></h4><i class="icon-bg" data-feather="user-plus"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-sm-12 col-xl-6 box-col-12">
      <div class="card">
        <div class="card-body">
          <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-xl-6 box-col-12">
      <div class="card">
        <div class="card-body">
          <div class="chart">
            <canvas id="bar-chart" ></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
foreach ($kamar as $jc) {
  $nama[] = $jc->nama_wilayah;
  $jmlsantri[] = $jc->jml;
}
?>
<script>
  $(function() {
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData = {
      labels: [
      'Pengurus',
      'Karyawan',
      'Pengajar'
      ],
      datasets: [{
        data: [<?= $pengurus ?>, <?= $karyawan ?>, <?= $pengajar ?>],
        backgroundColor: ['rgb(162, 153, 255, 0.8)', 'rgb(115, 102, 255, 0.8)', 'rgb(68, 51, 255, 0.8)'],
        borderColor: ['rgb(162, 153, 255)', 'rgb(115, 102, 255)', 'rgb(68, 51, 255)'],
        borderWidth: 2
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
    var barChartCanvas = $('#bar-chart').get(0).getContext('2d');
    var areaChartData = {
      labels: <?php echo json_encode($nama); ?>,
      datasets: [{
        label: 'Santri',
        backgroundColor: 'rgb(115,102,255, 0.5)',
        borderColor: 'rgb(115,102,255)',
        pointRadius: true,
        borderWidth: 2,
        pointStrokeColor: 'rgb(0, 153, 255)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgb(0, 153, 255)',
        data: <?php echo json_encode($jmlsantri); ?>
      }]
    }

    var barChartData = jQuery.extend(true, {}, areaChartData);
    var temp0 = areaChartData.datasets[0];
    barChartData.datasets[0] = temp0;
    var barChartOptions = {
      responsive: true,
      maintainAspectRatio: true,
      datasetFill: true,
      display: false
    };
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    });
  });
</script>
<script src="<?= site_url() ?>assets/js/counter/jquery.waypoints.min.js"></script>
<script src="<?= site_url() ?>assets/js/counter/jquery.counterup.min.js"></script>
<script src="<?= site_url() ?>assets/js/counter/counter-custom.js"></script>
<script src="<?= site_url() ?>assets/js/icons/feather-icon/feather.min.js"></script>
<script src="<?= site_url() ?>assets/js/icons/feather-icon/feather-icon.js"></script>