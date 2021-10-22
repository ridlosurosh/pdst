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
        <div class="card">
            <div class="card-header">
                <button class="btn btn-sm btn-danger" onclick="menu_santri()"><i class="fas fa-reply"></i> Kembali Ke Data Santri</button>
            </div>
            <div class="card-body">
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <form id="form_upload">
                                    <input type="hidden" name="idperson" value="<?= $id_person ?>">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Foto Santri</label><br>
                                        <img src="#" id="gambar_foto" width="300" alt="Preview Gambar"><br>
                                        <input type="file" name="foto" id="preview_foto"><br><br>
                                        <button class="btn btn-xs btn-primary" type="submit" id="btn-upload">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#gambar_foto').hide()

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
                                            text: "Foto Berhasil Diupload",
                                            type: "success"
                                        })
                                    }
                                });
                            });
                        })
                    </script>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <form id="form_upload4">
                                    <input type="hidden" name="idperson" value="<?= $id_person ?>">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Foto Scan Akta Kelahiran</label><br>
                                        <img src="#" id="gambar_akta" width="300" alt="Preview Gambar"><br>
                                        <input type="file" name="akta" id="preview_akta"><br><br>
                                        <button class="btn btn-xs btn-primary" type="submit" id="btn-upload">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#gambar_akta').hide()

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
                                <form id="form_upload2">
                                    <input type="hidden" name="idperson" value="<?= $id_person ?>">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Foto Scan Kartu Keluarga</label><br>
                                        <img src="#" id="gambar_kk" width="300" alt="Preview Gambar"><br>
                                        <input type="file" name="kk" id="preview_kk"><br><br>
                                        <button class="btn btn-xs btn-primary" type="submit" id="btn-upload">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#gambar_kk').hide()

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
                                <form id="form_upload5">
                                    <input type="hidden" name="idperson" value="<?= $id_person ?>">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Foto Scan SKCK</label><br>
                                        <img src="#" id="gambar_skck" width="300" alt="Preview Gambar"><br>
                                        <input type="file" name="skck" id="preview_skck"><br><br>
                                        <button class="btn btn-xs btn-primary" type="submit" id="btn-upload">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#gambar_skck').hide()

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
                                <form id="form_upload7">
                                    <input type="hidden" name="idperson" value="<?= $id_person ?>">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Foto Wali Santri</label><br>
                                        <img src="#" id="gambar_wali" width="300" alt="Preview Gambar"><br>
                                        <input type="file" name="wali" id="preview_wali"><br><br>
                                        <button class="btn btn-xs btn-primary" type="submit" id="btn-upload">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#gambar_wali').hide()

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
                                <form id="form_upload6">
                                    <input type="hidden" name="idperson" value="<?= $id_person ?>">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Foto Scan Keterangan Sehat</label><br>
                                        <img src="#" id="gambar_sukes" width="300" alt="Preview Gambar"><br>
                                        <input type="file" name="ket_sehat" id="preview_sukes"><br><br>
                                        <button class="btn btn-xs btn-primary" type="submit" id="btn-upload">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#gambar_sukes').hide()

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
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#form_upload2').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url('Cperson/simpan_berkas_kk') ?>',
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

    $(document).ready(function() {
        $('#form_upload3').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url('Cperson/simpan_berkas_ijz') ?>',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    alert("upload berhasil");
                }
            });
        });
    });

    $(document).ready(function() {
        $('#form_upload4').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url('Cperson/simpan_berkas_akta') ?>',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    swal.fire({
                        title: "PDST NAA",
                        text: "Berkas Akta Berhasil Diupload",
                        type: "success"
                    })
                }
            });
        });
    });

    $(document).ready(function() {
        $('#form_upload5').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url('Cperson/simpan_berkas_skck') ?>',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    swal.fire({
                        title: "PDST NAA",
                        text: "Berkas SKCK Berhasil Diupload",
                        type: "success"
                    })
                }
            });
        });
    });

    $(document).ready(function() {
        $('#form_upload6').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url('Cperson/simpan_berkas_ket_sehat') ?>',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    swal.fire({
                        title: "PDST NAA",
                        text: "Berkas Keterangan Sehat Berhasil Diupload",
                        type: "success"
                    })
                }
            });
        });
    });

    $(document).ready(function() {
        $('#form_upload7').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url('Cperson/simpan_berkas_foto_wl') ?>',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    swal.fire({
                        title: "PDST NAA",
                        text: "Berkas Wali Berhasil Diupload",
                        type: "success"
                    })
                }
            });
        });
    });

    // $(Document).ready(function() {
    //     $('#foto').on('change', function() {
    //         var foto = (this).files[0];
    //         viewImages(foto);
    //     })

    //     $('#kk').on('change', function() {
    //         var kk = (this).files[0];
    //         viewImages(kk);
    //     })

    // })

    // function viewImages(file) {
    //     var reader = new FileReader();
    //     reader.onload = function() {
    //         $('#fotos').attr('src', reader.result);
    //         $('#kaka').attr('src', reader.result);
    //     }
    //     reader.readAsDataURL(file);
    // }
</script>