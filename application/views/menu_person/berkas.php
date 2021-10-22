<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Berkas</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid mb-3">
        <form id="form_upload">
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-sm btn-danger" onclick="menu_santri()"><i class="fas fa-reply"></i> Kembali Ke Data Santri</a>
                <button type="submit" class="btn btn-sm bg-gradient-primary float-right"> <i class="fa fa-upload"></i> Simpan</button>
            
            </div>

                <input type="hidden" name="idperson" value="<?= $id_person ?>">
            <div class="card-body">
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Foto Santri</label><br>
                                        <img src="<?= site_url() ?>../gambar/foto/<?= $foto_warna_santri ?>" id="gambar_foto" width="300" alt="Preview Gambar"><br><br>
                                        <input type="file" name="foto" id="preview_foto"><br><br>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            // $('#gambar_foto').hide()

                            function bacaGambar(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        $('#gambar_foto').attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $("#preview_foto").change(function() {
                                $('#gambar_foto').show()
                                bacaGambar(this);
                            });

                        })
                    </script>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Foto Scan Akta Kelahiran</label><br>
                                        <img src="<?= site_url() ?>../gambar/akta/<?= $foto_scan_akta ?>" id="gambar_akta" width="300" alt="Preview Gambar"><br><br>
                                        <input type="file" name="akta" id="preview_akta"><br><br>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        // $('#gambar_akta').hide()

                        function bacaGambar(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    $('#gambar_akta').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $("#preview_akta").change(function() {
                            $('#gambar_akta').show()
                            bacaGambar(this);
                        });
                    })
                </script>
                <div class="row mt-2">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Foto Scan Kartu Keluarga</label><br>
                                        <img src="<?= site_url() ?>../gambar/kk/<?= $foto_scan_kk ?>" id="gambar_kk" width="300" alt="Preview Gambar"><br><br>
                                        <input type="file" name="kk" id="preview_kk"><br><br>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            // $('#gambar_kk').hide()

                            function bacaGambar(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        $('#gambar_kk').attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $("#preview_kk").change(function() {
                                $('#gambar_kk').show()
                                bacaGambar(this);
                            });
                        })
                    </script>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Foto Scan SKCK</label><br>
                                        <img src="<?= site_url() ?>../gambar/skck/<?= $foto_scan_skck ?>" id="gambar_skck" width="300" alt="Preview Gambar"><br><br>
                                        <input type="file" name="skck" id="preview_skck"><br><br>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        // $('#gambar_skck').hide()

                        function bacaGambar(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    $('#gambar_skck').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $("#preview_skck").change(function() {
                            $('#gambar_skck').show()
                            bacaGambar(this);
                        });
                    })
                </script>
                <div class="row mt-2">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Foto Wali Santri</label><br>
                                        <img src="<?= site_url() ?>../gambar/wali/<?= $foto_wali_santri_warna ?>" id="gambar_wali" width="300" alt="Preview Gambar"><br><br>
                                        <input type="file" name="wali" id="preview_wali"><br><br>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            // $('#gambar_wali').hide()

                            function bacaGambar(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        $('#gambar_wali').attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $("#preview_wali").change(function() {
                                $('#gambar_wali').show()
                                bacaGambar(this);
                            });
                        })
                    </script>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Foto Scan Keterangan Sehat</label><br>
                                        <img src="<?= site_url() ?>../gambar/sukes/<?= $foto_scan_ket_sehat ?>" id="gambar_sukes" width="300" alt="Preview Gambar"><br><br>
                                        <input type="file" name="ket_sehat" id="preview_sukes"><br><br>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            // $('#gambar_sukes').hide()

                            function bacaGambar(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        $('#gambar_sukes').attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $("#preview_sukes").change(function() {
                                $('#gambar_sukes').show()
                                bacaGambar(this);
                            });
                        })

                    </script>
                </div>
            </div>

            </form>

        </div>
    </div>

</section>
<script>
    $(document).ready(function() {
        $('#form_upload').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url('Cperson/simpan_berkas') ?>',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    swal.fire({
                        title: "PDST NAA",
                        text: "Berkas KK Berhasil Diupload",
                        type: "success"
                    })
                }
            });
        });
    });

</script>