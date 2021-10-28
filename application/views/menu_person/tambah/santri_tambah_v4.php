<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1>PILIH WILAYAH, BLOCK DAN KAMAR UNTUK <span class="text-danger"><?= $santri->nama ?></span></h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form id="form_tambah_santri_v4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">WILAYAH</label>
                                        <select class="form-control select2" name="wilayah" id="wilayah">
                                            <option value="default">-Pilih Wilayah-</option>
                                            <?php foreach ($wilayah as $value) { ?>
                                                <option value="<?= $value->id_wilayah ?>"><?= $value->nama_wilayah ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BLOCK</label>
                                        <select name="blok" id="blok" class="form-control select2">
                                            <option value="default">-Pilih Block-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">KAMAR</label>
                                        <select name="kamar" id="kamar" class="form-control select2">
                                            <option value="default">-Pilih Kamar-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">TANGGAL PENEMPATAN</label>
                                        <input type="date" name="tgl_penetapan" class="form-control">
                                    </div>
                                </div>
                                <input type="hidden" name="o" value="<?= $santri->id_person ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-danger" onclick="di_batalkan('<?= $santri->id_person ?>')"><i class="fas fa-times"></i> Batal</button>
                            <div class="float-right">
                                <button type="button" onclick="kembali_cuk('<?= $santri->id_person ?>')" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</button>
                                <button class="btn btn-info">Simpan dan Lanjut <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function kembali_cuk(id) {
        $.post('<?= site_url('Cperson/tambah_santri_3') ?>', {
            o: id
        }, function(Res) {
            $('#ini_isinya').html(Res);
        })

    }

    $(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    });

    $(document).ready(function() {
        $('#wilayah').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Cperson/get_blok'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    html += '<option value=' + 'default' + '>' + '-Pilih Block-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_blok + '>' + data[i].nama_blok + '</option>';
                    }
                    $('#blok').html(html);

                }
            });
            return false;
        });

        $('#blok').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Cperson/get_kamar'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    html += '<option value=' + 'default' + '>' + '-Pilih Kamar-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_kamar + '>' + data[i].nama_kamar + '</option>';
                    }
                    $('#kamar').html(html);

                }
            });
            return false;
        });
    });

    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        return arg !== value;
    }, "Value must not equal arg.");
    $("select").on("select2:close", function(e) {
        $(this).valid();
    });
    $('#form_tambah_santri_v4').validate({
        rules: {
            tgl_penetapan: {
                required: true
            },
            kamar: {
                valueNotEquals: "default"
            },
            blok: {
                valueNotEquals: "default"
            },
            wilayah: {
                valueNotEquals: "default"
            }
        },
        messages: {
            tgl_penetapan: {
                required: "Tidak Boleh Kosong"
            },
            kamar: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            blok: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            wilayah: {
                valueNotEquals: "Tidak Boleh Kosong"
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        // highlight: function(element, errorClass, validClass) {
        //     $(element).addClass('is-invalid');
        // },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function() {
            $.ajax({
                url: "<?= site_url('Cperson/simpan_santri_v4') ?>",
                data: $('#form_tambah_santri_v4').serialize(),
                type: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    if (data.pesan === "ya") {
                        swal.fire({
                            title: "PDST NAA",
                            text: data.sukses,
                            type: "success"
                        }).then(okay => {
                            if (okay) {
                                form_tambah_mahrom('<?= $santri->id_person ?>')
                            }
                        })
                    }
                }
            });
        }
    })

    function di_batalkan(id) {
        swal.fire({
            title: 'PDST NAA',
            text: "Anda Yakin Untuk Membatalkan ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'YA',
            cancelButtonText: 'TIDAK',
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            url: 'Cperson/batal',
                            type: 'POST',
                            data: {
                                id: id
                            },
                            dataType: 'json'
                        })
                        .fail(function() {
                            swal.fire({
                                title: "PDST NAA",
                                text: "Berhasil Dibatalkan",
                                type: "success"
                            }).then(okay => {
                                if (okay) {
                                    menu_santri();
                                }
                            });
                        });
                });
            }
        });
    }
</script>