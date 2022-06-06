<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Upload Berkas</h3>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <form id="form_upload">
            <input type="hidden" name="idperson" value="<?= $id_person ?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php 
                            if ($foto_warna_santri == "") {
                                $class = "preview";
                            }else{
                                $class = "";
                            }

                            if ($foto_scan_kk == "") {
                                $class1 = "preview";
                            }else{
                                $class1 = "";
                            }

                            if ($foto_scan_akta == "") {
                                $class2 = "preview";
                            }else{
                                $class2 = "";
                            }

                            if ($foto_wali_santri_warna == "") {
                                $class3 = "preview";
                            }else{
                                $class3 = "";
                            }

                            if ($foto_scan_ket_sehat == "") {
                                $class4 = "preview";
                            }else{
                                $class4 = "";
                            }

                            if ($foto_scan_skck == "") {
                                $class5 = "preview";
                            }else{
                                $class5 = "";
                            }
                            ?>
                            <label for="" class="col-form-label">Foto Santri</label><br>
                            <img class="<?= $class ?>" src="<?= site_url() ?>../gambar/foto/<?= $foto_warna_santri ?>" id="gambar_foto" width="300" alt="Preview Gambar"><br><br>
                            <input type="file" name="foto" id="preview_foto">
                            <script>
                                $(document).ready(function () {
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
                                        if (this.files[0].size >= 1000000) {
                                            swal.fire({
                                                title: "PDST NAA",
                                                text: "Maaf , Foto Santri Tidak Boleh Lebih Dari 1 MB",
                                                type: "warning"
                                            }).then(okay => {
                                                if (okay) {
                                                    $(this).val("");
                                                    $('#gambar_foto').attr('src', "");

                                                }
                                            });
                                        } else {
                                            bacaGambar(this);
                                        }
                                    });
                                })
                            </script>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Foto Scan Kartu Keluarga</label><br>
                            <img class="<?= $class1 ?>" src="<?= site_url() ?>../gambar/kk/<?= $foto_scan_kk ?>" id="gambar_kk" width="300" alt="Preview Gambar"><br><br>
                            <input type="file" name="kk" id="preview_kk">
                            <script>
                                $(document).ready(function () {
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
                                        if (this.files[0].size >= 1000000) {
                                            swal.fire({
                                                title: "PDST NAA",
                                                text: "Maaf , Foto Scan KK Tidak Boleh Lebih Dari 1 MB",
                                                type: "warning"
                                            }).then(okay => {
                                                if (okay) {
                                                    $(this).val("");
                                                    $('#gambar_kk').attr('src', "");

                                                }
                                            });
                                        } else {
                                            bacaGambar(this);
                                        }
                                    });
                                })
                            </script>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Foto Scan Akta Kelahiran</label><br>
                            <img class="<?= $class2 ?>" src="<?= site_url() ?>../gambar/akta/<?= $foto_scan_akta ?>" id="gambar_akta" width="300" alt="Preview Gambar"><br><br>
                            <input type="file" name="akta" id="preview_akta">
                            <script>
                                $(document).ready(function () {
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
                                        if (this.files[0].size >= 1000000) {
                                            swal.fire({
                                                title: "PDST NAA",
                                                text: "Maaf , Foto Wali Santri Tidak Boleh Lebih Dari 1 MB",
                                                type: "warning"
                                            }).then(okay => {
                                                if (okay) {
                                                    $(this).val("");
                                                    $('#gambar_akta').attr('src', "");

                                                }
                                            });
                                        } else {
                                            bacaGambar(this);
                                        }
                                    });
                                })
                            </script>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Foto Wali Santri</label><br>
                            <img class="<?= $class3 ?>" src="<?= site_url() ?>../gambar/wali/<?= $foto_wali_santri_warna ?>" id="walinya" width="300" alt="Preview Gambar"><br><br>
                            <input type="file" name="wali" id="preview_wali">
                            <script>
                                $(document).ready(function () {
                                    function bacaGambar(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function(e) {
                                                $('#walinya').attr('src', e.target.result);
                                            }

                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                    $("#preview_wali").change(function() {
                                        $('#walinya').show()
                                        if (this.files[0].size >= 1000000) {
                                            swal.fire({
                                                title: "PDST NAA",
                                                text: "Maaf , Foto Wali Santri Tidak Boleh Lebih Dari 1 MB",
                                                type: "warning"
                                            }).then(okay => {
                                                if (okay) {
                                                    $(this).val("");
                                                    $('#walinya').attr('src', "");

                                                }
                                            });
                                        } else {
                                            bacaGambar(this);
                                        }
                                    });
                                })
                            </script>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Foto Scan Keterangan Sehat</label><br>
                            <img class="<?= $class4 ?>" src="<?= site_url() ?>../gambar/sukes/<?= $foto_scan_ket_sehat ?>" id="gambar_sukes" width="300" alt="Preview Gambar"><br><br>
                            <input type="file" name="ket_sehat" id="preview_sukes">
                            <script>
                                $(document).ready(function () {
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
                                        if (this.files[0].size >= 1000000) {
                                            swal.fire({
                                                title: "PDST NAA",
                                                text: "Maaf , Foto Scan SKCK Tidak Boleh Lebih Dari 1 MB",
                                                type: "warning"
                                            }).then(okay => {
                                                if (okay) {
                                                    $(this).val("");
                                                    $('#gambar_sukes').attr('src', "");

                                                }
                                            });
                                        } else {
                                            bacaGambar(this);
                                        }
                                    });
                                })
                            </script>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Foto Scan SKCK</label><br>
                            <img class="<?= $class5 ?>" src="<?= site_url() ?>../gambar/skck/<?= $foto_scan_skck ?>" id="gambar_skck" width="300" alt="Preview Gambar"><br><br>
                            <input type="file" name="skck" id="preview_skck">
                            <script>
                                $(document).ready(function () {
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
                                        if (this.files[0].size >= 1000000) {
                                            swal.fire({
                                                title: "PDST NAA",
                                                text: "Maaf , Foto Scan SKCK Tidak Boleh Lebih Dari 1 MB",
                                                type: "warning"
                                            }).then(okay => {
                                                if (okay) {
                                                    $(this).val("");
                                                    $('#gambar_skck').attr('src', "");

                                                }
                                            });
                                        } else {
                                            bacaGambar(this);
                                        }
                                    });
                                })
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-sm btn-danger" onclick="menu_santri()"><i class="fas fa-reply"></i> Kembali Ke Data Santri</a>
                <button type="submit" class="btn btn-sm bg-primary float-right"> <i class="fa fa-upload"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.preview').hide()
        $('#form_upload').submit(function(e) {
            e.preventDefault();
            var diri = $("#preview_foto").val();
            if (diri === "") {
                swal.fire({
                    title: "PDST NAA",
                    text: "Harap Isi Foto Santri Terlebih Dahulu",
                    type: "error"
                }).then(okay => {
                    if (okay) {
                        // menu_santri();
                    }
                });
            } else {
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
                            text: "Berkas Berhasil Diupload",
                            type: "success"
                        }).then(okay => {
                            if (okay) {
                                menu_santri();
                            }
                        });
                    }
                });
            }
        });
    });
</script>