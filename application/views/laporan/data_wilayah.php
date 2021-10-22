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
                <h3 class="card-title">Silakan Pilih Wilayah</h3>
            </div>
            <div class="card-body col-12">
                <div class="row">
                    <?php foreach ($wilayah as $value) { ?>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box" onclick="data_blok('<?= $value->id_wilayah ?>')">
                                <span class="info-box-icon bg-info"><i class="fas fa-map-marked-alt"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-number"><?= $value->nama_wilayah ?></span>
                                    <span class="info-box-text"><?= $value->kepala_wilayah ?></span>
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
    function data_blok(id) {
        $.post('<?= site_url('Claporan/data_blok') ?>', {
            idwilayah: id
        }, function(Res) {
            $('#ini_isinya').html(Res);
        });
    }
</script>