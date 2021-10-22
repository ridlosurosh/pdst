<section class="content-header mt-3">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Berkas</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-sm btn-danger text-white float-right" onclick="menu_santri()">Kembali</a>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container mb-3">
        <div class="">
            <div class="row mt-4">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form id="form_upload">
                                <input type="hidden" name="idperson" value="<?= $id_person ?>">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Foto Santri</label><br>
                                    <input type="file" name="foto"><br><br>
                                    <button class="btn btn-xs btn-primary" type="submit" id="btn-upload">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form id="form_upload4">
                                <input type="hidden" name="idperson" value="<?= $id_person ?>">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Foto Scan Akta Kelahiran</label><br>
                                    <input type="file" name="akta"><br><br>
                                    <button class="btn btn-xs btn-primary" type="submit" id="btn-upload">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form id="form_upload2">
                                <input type="hidden" name="idperson" value="<?= $id_person ?>">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Foto Scan Kartu Keluarga</label><br>
                                    <input type="file" name="kk"><br><br>
                                    <button class="btn btn-xs btn-primary" type="submit" id="btn-upload">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form id="form_upload5">
                                <input type="hidden" name="idperson" value="<?= $id_person ?>">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Foto Scan SKCK</label><br>
                                    <input type="file" name="skck"><br><br>
                                    <button class="btn btn-xs btn-primary" type="submit" id="btn-upload">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form id="form_upload7">
                                <input type="hidden" name="idperson" value="<?= $id_person ?>">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Foto Wali Santri</label><br>
                                    <input type="file" name="wali"><br><br>
                                    <button class="btn btn-xs btn-primary" type="submit" id="btn-upload">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form id="form_upload6">
                                <input type="hidden" name="idperson" value="<?= $id_person ?>">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Foto Scan Keterangan Sehat</label><br>
                                    <input type="file" name="ket_sehat"><br><br>
                                    <button class="btn btn-xs btn-primary" type="submit" id="btn-upload">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#form_upload').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url('Csantri/simpan_berkas') ?>',
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
    });

    $(document).ready(function() {
        $('#form_upload2').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url('Csantri/simpan_berkas_kk') ?>',
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
                url: '<?php echo site_url('Csantri/simpan_berkas_ijz') ?>',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    swal.fire({
                        title: "PDST NAA",
                        text: "Berkas Ijazah Berhasil Diupload",
                        type: "success"
                    })
                }
            });
        });
    });

    $(document).ready(function() {
        $('#form_upload4').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url('Csantri/simpan_berkas_akta') ?>',
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
                url: '<?php echo site_url('Csantri/simpan_berkas_skck') ?>',
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
                url: '<?php echo site_url('Csantri/simpan_berkas_ket_sehat') ?>',
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
                url: '<?php echo site_url('Csantri/simpan_berkas_foto_wl') ?>',
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
