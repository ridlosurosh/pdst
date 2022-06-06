<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Grafik</h3>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="float-right">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-sm active" onclick="grafik_pertahun()" style="width: 100%;">Grafik Pertahun</button>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <button id="btn_print" onclick="printCanvas()" class="btn btn-primary active float-right" style="width: 100%;">
                            <i class="fas fa-print"></i>
                        </button>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <select name="" id="tahun" class="form-control  col-12" style="width: 100%;">
                            <?php
                            for ($i = 2021; $i <= date("Y") + 10; $i++) { 

                            if ($i == date('Y')) {
                                $tahun = "selected";
                            }else{
                                $tahun = "";
                            }

                            ?>
                                <option <?= $tahun ?> value="<?= $i ?>"><?= $i ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row float-right">
                                <div class="row">
                                    <div class="col-8">

                                    </div>
                                    <div class="col-4">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6> <span class="offset-4 text-bold span" style="color:dimgrey"> </span> </h6>
                            <div class="chart" id="graph-container">
                                <canvas id="barChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {
        filter();
        $('#tahun').change(function() {
            filter();
        });


    })

    function grafik_pertahun() {
        $.post('<?= site_url('Cgrafik/menu_grafik') ?>', function(Res) {
            $('#ini_isinya').html(Res);
        });
    }


    function filter() {
        $('#barChart').remove();
        $('#graph-container').append('<canvas id="barChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"><canvas>')
        var tahun = $('#tahun').val();
        $.ajax({
            url: "<?= site_url('Cgrafik/grafik_perwilayah') ?>",
            data: {
                tahun: tahun
            },
            type: "post",
            dataType: "json",
            success: function(data) {
                if (data.wilayah == "kosong" && data.jml == "harap") {
                    alert('data kosong');
                } else {
                    grafik(data.wilayah, data.jml);
                    $(".span").html('Grafik Santri Perwilayah Pada Tahun  ' + tahun);
                }
            }
        })
    }

    function grafik(wilayah, jml) {
        var areaChartData = {
            labels: wilayah,
            datasets: [{
                label: 'santri',
                backgroundColor: 'rgb(115,102,255, 0.5)',
                borderColor: 'rgb(115,102,255)',
                pointRadius: false,
                borderWidth: 2,
                pointColor: 'rgb(115,102,255)',
                pointStrokeColor: 'rgb(115,102,255)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgb(115,102,255)',
                data: jml
            }]
        };
        var barChartCanvas = $('#barChart').get(0).getContext('2d');
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
    };


    function printCanvas() {
        var dataUrl = document.getElementById('barChart').toDataURL(); //attempt to save base64 string to server using this var  
        var windowContent = '<!DOCTYPE html>';
        windowContent += '<html>'
        windowContent += '<head><title>Print </title></head>';
        windowContent += '<body>'
        windowContent += '<img src="' + dataUrl + '">';
        windowContent += '</body>';
        windowContent += '</html>';
        var printWin = window.open('_blank', 'width=340,height=260');
        printWin.document.open();
        printWin.document.write(windowContent);
        printWin.document.close();
        printWin.focus();
        printWin.print();
        printWin.close();
    }
</script>