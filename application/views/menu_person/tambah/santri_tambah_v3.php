<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Identitas Wali dari <span class="text-danger"><?= $santri->nama ?></span></h1>
            </div>
        </div>
    </div>
</section>

<section class="content mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form id="form_tambah_santri_v3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">NIK WALI</label>
                                        <input type="number" class="form-control" name="nik_w" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">NAMA WALI</label>
                                        <input type="text" class="form-control" name="nm_w" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">PENDIDIKAN WALI</label>
                                        <select class="form-control" name="pndkn_w" id="">
                                            <option hidden value="default">-Pilih Pendidikan-</option>
                                            <option value="SD">SD</option>
                                            <option value="SLTP">SLTP</option>
                                            <option value="SLTA">SLTA</option>
                                            <option value="SARJANA">SARJANA</option>
                                            <option value="DLL">DLL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PEKERJAAN WALI</label>
                                        <select class="form-control" name="pkrjn_w" id="">
                                            <option hidden value="default">-Pilih Pekerjaan-</option>
                                            <option value="Petani">Petani</option>
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="Nelayan">Nelayan</option>
                                            <option value="Guru">Guru</option>
                                            <option value="PNS">PNS</option>
                                            <option value="TNI">TNI</option>
                                            <option value="Polisi">Polisi</option>
                                            <option value="Dokter">Dokter</option>
                                            <option value="Buruh">Buruh</option>
                                            <option value="Karyawan">Karyawan</option>
                                            <option value="Pedagang">Pedagang</option>
                                            <option value="DLL">DLL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">NO HP WALI</label>
                                        <input type="number" class="form-control" name="hp_w" id="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">NO TELP WALI</label>
                                        <input type="number" class="form-control" name="telp_w" id="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PENDAPATAN WALI</label>
                                        <select class="form-control" name="pndptn_w" id="">
                                            <option hidden value="default">-Pilih Pendapatan-</option>
                                            <option value="tinggi">Tinggi</option>
                                            <option value="sedang">Sedang</option>
                                            <option value="rendah">Rendah</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">ALAMAT LENGKAP WALI SESUAI KTP</label>
                                        <textarea name="almt_w" id="" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">KODE POS</label>
                                        <input type="number" class="form-control" name="pos_w" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">PROVINSI</label>
                                        <select class="form-control select2" name="prov_w" id="provinsi">
                                            <option selected hidden value="default">-Pilih Provinsi-</option>
                                            <?php foreach ($provinsi as $value) { ?>
                                                <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">KABUPATEN</label>
                                        <select class="form-control select2" name="kab_w" id="kabupaten">
                                            <option value="default">-Pilih kabupaten-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">KECAMATAN</label>
                                        <select class="form-control select2" name="kec_w" id="kecamatan">
                                            <option value="default">-Pilih Kecamatan-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">DESA</label>
                                        <select class="form-control select2" name="desa_w" id="desa">
                                            <option value="default">- Pilih Desa-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">PENDIDIKAN YANG AKAN DITEMPUH</label>
                                        <select class="form-control" name="pndkn">
                                            <option value="default">-Pilih Pendidikan-</option>
                                            <option value="RA">Raudatul Athfal</option>
                                            <option value="MI">MI</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMK">SMK</option>
                                            <option value="STRATA I">STRATA I</option>
                                            <option value="NON FORMAL">NON FORMAL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="o" value="<?= $santri->id_person ?>">
                        </div>
                        <div class="card-footer">
                            <!-- <button class="btn btn-danger"><i class="fas fa-times"></i> Batal</button> -->
                            <div class="float-right">
                                <button type="button" class="btn btn-info" onclick="kembali_pole('<?= $santri->id_person ?>')"><i class="fas fa-arrow-left"></i> Kembali</button>
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
    function kembali_pole(id) {
        $.post('<?= site_url('Cperson/st_2') ?>', {
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
        $('#provinsi').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Cperson/get_kabupaten'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    html += '<option value=' + 'default' + '>' + '-Pilih Kabupaten-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                    }
                    $('#kabupaten').html(html);

                }
            });
            return false;
        });

        $('#kabupaten').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Cperson/get_kecamatan'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    html += '<option value=' + 'default' + '>' + '-Pilih Kecamatan-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                    }
                    $('#kecamatan').html(html);

                }
            });
            return false;
        });

        $('#kecamatan').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Cperson/get_desa'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    html += '<option value=' + 'default' + '>' + '-Pilih Desa-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                    }
                    $('#desa').html(html);

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
    $('#form_tambah_santri_v3').validate({
        rules: {
            nik_w: {
                required: true,
                maxlength: 16,
                minlength: 16
            },
            nm_w: {
                required: true
            },
            pndkn_w: {
                valueNotEquals: "default"
            },
            pkrjn_w: {
                valueNotEquals: "default"
            },
            hp_w: {
                required: true
            },
            telp_w: {
                required: true
            },
            pndptn_w: {
                valueNotEquals: "default"
            },
            almt_w: {
                required: true
            },
            pos_w: {
                required: true
            },
            prov_w: {
                valueNotEquals: "default"
            },
            kab_w: {
                valueNotEquals: "default"
            },
            kec_w: {
                valueNotEquals: "default"
            },
            desa_w: {
                valueNotEquals: "default"
            },
            pndkn: {
                valueNotEquals: "default"
            }
        },
        messages: {
            nik_w: {
                required: "Tidak Boleh Kosong",
                maxlength: "NIK lebih dari 16 digit",
                minlength: "NIK kurang dari 16 digit"
            },
            nm_w: {
                required: "Tidak Boleh Kosong"
            },
            pndkn_w: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            pkrjn_w: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            hp_w: {
                required: "Tidak Boleh Kosong"
            },
            telp_w: {
                required: "Tidak Boleh Kosong"
            },
            pndptn_w: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            almt_w: {
                required: "Tidak Boleh Kosong"
            },
            pos_w: {
                required: "Tidak Boleh Kosong"
            },
            prov_w: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            kab_w: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            kec_w: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            desa_w: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            pndkn: {
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
                url: "<?= site_url('Cperson/simpan_santri_v3') ?>",
                data: $('#form_tambah_santri_v3').serialize(),
                type: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    var o = data.i;
                    $.post('<?= site_url('Cperson/tambah_santri_4') ?>', {
                        o: o
                    }, function(Res) {

                        $('#ini_isinya').html(Res);
                    });
                }
            });
        }
    });
</script>