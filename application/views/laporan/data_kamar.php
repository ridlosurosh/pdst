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
                <input type="hidden" value="<?= $data->id_blok ?>">
                <h3 class="card-title">Silakan Pilih Kamar Pada Block <?= $data->nama_blok ?></h3>
            </div>
            <div class="card-body col-12">
                <div class="row">
                    <?php foreach ($kamar as $value) { ?>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box" onclick="data_santri('<?= $value->id_kamar ?>')">
                                <span class="info-box-icon bg-gray"><i class="fas fa-person-booth"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><b>Kamar <br> <?= $value->nama_kamar ?></b></span>
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
    function data_santri(id) {
        $.post('<?= site_url('Claporan/data_santri') ?>', {
            idkamar: id
        }, function(Res) {
            $('#ini_isinya').html(Res);
        });
    }
</script>