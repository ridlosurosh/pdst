<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Santri Perkamar</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <input type="hidden" value="<?= $data->id_wilayah ?>">
                <h3 class="card-title">Silakan Pilih Block Pada Wilayah <?= $data->nama_wilayah ?></h3>
            </div>
            <div class="card-body col-12">
                <div class="row">
                    <?php foreach ($blok as $value) { ?>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box" onclick="data_kamar('<?= $value->id_blok ?>')">
                                <span class="info-box-icon bg-teal"><i class="fas fa-cubes"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><b>Block<br> <?= $value->nama_blok ?></b></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function data_kamar(id) {
        $.post('<?= site_url('Claporan/data_kamar') ?>', {
            idblok: id
        }, function(Res) {
            $('#ini_isinya').html(Res);
        });
    }
</script>