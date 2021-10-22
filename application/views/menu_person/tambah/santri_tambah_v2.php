<?php $namaBulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Identitas Orang Tua dari <span class="text-danger"><?= $santri->nama ?></span></h1>
            </div>
        </div>
    </div>
</section>

<section class="content mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form id="form_tambah_santri_v2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">NIK AYAH</label>
                                        <input type="number" name="nik_a" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">NAMA AYAH</label>
                                        <input type="text" class="form-control" name="nm_a" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">TANGGAL LAHIR AYAH</label>
                                        <select name="tanggal_lahir_a" id="" class="form-control">
                                            <option value="default">Pilih Tanggal</option>
                                            <?php
                                            for ($tg = 1; $tg < 32; $tg++) {
                                                if ($tg < 10) {
                                                    $tgl = "0" . $tg;
                                                } else {
                                                    $tgl = $tg;
                                                }
                                            ?>
                                                <option value="<?= $tgl ?>"><?= $tgl ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BULAN LAHIR AYAH</label>
                                        <select name="bulan_lahir_a" id="" class="form-control">
                                            <option value="default">Pilih Bulan</option>
                                            <?php
                                            for ($bl = 1; $bl < 13; $bl++) {
                                                if ($bl < 10) {
                                                    $bulan = "0" . $bl;
                                                } else {
                                                    $bulan = $bl;
                                                }
                                            ?>
                                                <option value="<?= $bulan ?>"><?= $namaBulan[$bl] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">TAHUN LAHIR AYAH</label>
                                        <select name="tahun_lahir_a" id="" class="form-control">
                                            <option value="default">Pilih Tahun</option>
                                            <?php for ($th = 1950; $th < date("Y") + 5; $th++) { ?>
                                                <option value="<?= $th ?>"><?= $th ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PENDIDIKAN AYAH</label>
                                        <select class="form-control" name="pndkn_a" id="">
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
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">ALAMAT LENGKAP AYAH SESUAI KTP</label>
                                        <textarea name="alamat_a" id="" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PEKERJAAN AYAH</label>
                                        <select class="form-control" name="pkrjn_a" id="">
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
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">NIK IBU</label>
                                        <input type="number" name="nik_i" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">NAMA IBU</label>
                                        <input type="text" class="form-control" name="nm_i" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">TANGGAL LAHIR IBU</label>
                                        <select name="tanggal_lahir_i" id="" class="form-control">
                                            <option value="default">Pilih Tanggal</option>
                                            <?php
                                            for ($tg = 1; $tg < 32; $tg++) {
                                                if ($tg < 10) {
                                                    $tgl = "0" . $tg;
                                                } else {
                                                    $tgl = $tg;
                                                }
                                            ?>
                                                <option value="<?= $tgl ?>"><?= $tgl ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BULAN LAHIR IBU</label>
                                        <select name="bulan_lahir_i" id="" class="form-control">
                                            <option value="default">Pilih Bulan</option>
                                            <?php
                                            for ($bl = 1; $bl < 13; $bl++) {
                                                if ($bl < 10) {
                                                    $bulan = "0" . $bl;
                                                } else {
                                                    $bulan = $bl;
                                                }
                                            ?>
                                                <option value="<?= $bulan ?>"><?= $namaBulan[$bl] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">TAHUN LAHIR IBU</label>
                                        <select name="tahun_lahir_i" id="" class="form-control">
                                            <option value="default">Pilih Tahun</option>
                                            <?php for ($th = 1950; $th < date("Y") + 5; $th++) { ?>
                                                <option value="<?= $th ?>"><?= $th ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PENDIDIKAN IBU</label>
                                        <select class="form-control" name="pndkn_i" id="">
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
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">ALAMAT LENGKAP IBU SESUAI KTP</label>
                                        <textarea name="alamat_i" id="" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PEKERJAAN IBU</label>
                                        <select class="form-control" name="pkrjn_i" id="">
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
                            </div>
                            <input type="hidden" name="o" value="<?= $santri->id_person ?>">
                        </div>
                        <div class="card-footer">
                            <!-- <button class="btn btn-danger"><i class="fas fa-times"></i> Batal</button> -->
                            <div class="float-right">
                                <button type="button" class="btn btn-info" onclick="kembali_lagi('<?= $santri->id_person ?>')"><i class="fas fa-arrow-left"></i> Kembali</button>
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
    function kembali_lagi(id) {
        $.post('<?= site_url('Cperson/st_1') ?>', {
            o: id
        }, function(Res) {
            $('#ini_isinya').html(Res);
        })

    }

    $(function() {
        $('[data-mask]').inputmask({
            'placeholder': 'Bl/Hr/Thun'
        })

    })

    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        return arg !== value;
    }, "Value must not equal arg.");
    $("select").on("select2:close", function(e) {
        $(this).valid();
    });
    $('#form_tambah_santri_v2').validate({
        rules: {
            nik_a: {
                required: true,
                maxlength: 16,
                minlength: 16
            },
            nm_a: {
                required: true
            },
            tanggal_lahir_a: {
                valueNotEquals: "default"
            },
            bulan_lahir_a: {
                valueNotEquals: "default"
            },
            tahun_lahir_a: {
                valueNotEquals: "default"
            },
            pndkn_a: {
                valueNotEquals: "default"
            },
            pkrjn_a: {
                valueNotEquals: "default"
            },
            alamat_a: {
                required: true
            },
            nik_i: {
                required: true,
                maxlength: 16,
                minlength: 16
            },
            nm_i: {
                required: true
            },
            tanggal_lahir_i: {
                valueNotEquals: "default"
            },
            bulan_lahir_i: {
                valueNotEquals: "default"
            },
            tahun_lahir_i: {
                valueNotEquals: "default"
            },
            pndkn_i: {
                valueNotEquals: "default"
            },
            pkrjn_i: {
                valueNotEquals: "default"
            },
            alamat_i: {
                required: true
            }
        },
        messages: {
            nik_a: {
                required: "Tidak Boleh Kosong",
                maxlength: "NIK lebih dari 16 digit",
                minlength: "NIK kurang dari 16 digit"
            },
            nm_a: {
                required: "Tidak Boleh Kosong"
            },
            tanggal_lahir_a: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            bulan_lahir_a: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            tahun_lahir_a: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            pndkn_a: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            pkrjn_a: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            alamat_a: {
                required: "Tidak Boleh Kosong"
            },
            nik_i: {
                required: "Tidak Boleh Kosong",
                maxlength: "NIK lebih dari 16 digit",
                minlength: "NIK kurang dari 16 digit"
            },
            nm_i: {
                required: "Tidak Boleh Kosong"
            },
            tanggal_lahir_i: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            bulan_lahir_i: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            tahun_lahir_i: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            pndkn_i: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            pkrjn_i: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            alamat_i: {
                required: "Tidak Boleh Kosong"
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
                url: "<?= site_url('Cperson/simpan_santri_v2') ?>",
                data: $('#form_tambah_santri_v2').serialize(),
                type: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    var o = data.i;
                    $.post('<?= site_url('Cperson/tambah_santri_3') ?>', {
                        o: o
                    }, function(Res) {

                        $('#ini_isinya').html(Res);
                    });
                }
            });
        }
    })
</script>