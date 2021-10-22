<div class="content-header">
    <div class="container">
        <div class="row mt-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Santri</h1>
            </div>
        </div>
    </div>
</div>
<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
  }

</style>
<section class="content mt-2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Data Diri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Data Keluarga</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Data Wali</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages2" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Domisili</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <form id="form_tambah_santri" class="col-12">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nama" class="col-form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="nik" class="col-form-label">NIK</label>
                                            <input type="number" class="form-control" id="nik" name="nik" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="tempat_lahir" class="col-form-label">Tempat lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="jenis_kelamin" class="col-form-label">jenis Kelamin</label>
                                            <div class="form-group" style="margin-top: 10px; margin-bottom: 22px;">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="jenkel1" name="jenis_kelamin" value="Laki-Laki">
                                                    <label for="jenkel1">Laki-Laki</label>
                                                </div>
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="jenkel2" name="jenis_kelamin" value="Perempuan">
                                                    <label for="jenkel2">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat_lengkap" class="col-form-label">Alamat</label>
                                            <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="prov" class="col-form-label">Provinsi</label>
                                            <select class="form-control select2" style="width: 100%;" name="prov" id="prov">
                                                <option value="">Pilih Provinsi</option>
                                                <?php
                                                foreach ($provinsi as $value) { ?>
                                                    <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kab" class="col-form-label">Kabupaten</label>
                                            <select class="form-control select2" name="kab" id="kab">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="kec" class="col-form-label">Kecamatan</label>
                                            <select class="form-control select2" name="kec" id="kec">
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="desa" class="col-form-label">Desa</label>
                                            <select class="form-control select2" name="desa" id="desa">
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pos" class="col-form-label">Kode Pos</label>
                                            <input type="text" class="form-control" id="pos" name="pos" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="pndkn" class="col-form-label">Pendidikan Yang Akan Ditempuh</label>
                                            <select name="pndkn" class="form-control select2" id="pndkn">
                                                <option>Pilih Pendidikan</option>
                                                <option value="RA">Raudhatul Athfal Darul Huda</option>
                                                <option value="MI">MI Darul Huda 01</option>
                                                <option value="SMPNAA">SMP Nurul Abror Al-Robbaniyin</option>
                                                <option value="SMKNAA">SMK Nurul Abror Al-Robbaniyin</option>
                                                <option value="STRATA 1">Strata 1</option>
                                                <option value="NF">Non Formal</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nm_a" class="col-form-label">Nama Ayah</label>
                                            <input type="text" class="form-control" id="nm_a" name="nm_a" autocomplete="off">
                                            <input type="hidden" class="form-control" id="hbg" value="Ayah" name="hbg">
                                        </div>
                                        <div class="form-group">
                                            <label for="pndkn_a" class="col-form-label">Pendidikan Ayah</label>
                                            <select name="pndkn_a" class="form-control">
                                                <option>Pilih Pendidikan</option>
                                                <option value="SD">SD</option>
                                                <option value="SLTP">SLTP</option>
                                                <option value="SLTA">SLTA</option>
                                                <option value="SARJANA">SARJANA</option>
                                                <option value="DLL">DLL</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pkrjn_a" class="col-form-label">Pekerjaan Ayah</label>
                                            <select name="pkrjn_a" class="form-control">
                                                <option>Pilih Pekerjaan</option>
                                                <option value="Petani">Petani</option>
                                                <option value="Wiraswasta">Wiraswasta</option>
                                                <option value="Nelayan">Nelayan</option>
                                                <option value="Guru">Guru</option>
                                                <option value="PNS">Pegawai Negeri</option>
                                                <option value="TNI">TNI</option>
                                                <option value="Polisi">Polisi</option>
                                                <option value="Dokter">Dokter</option>
                                                <option value="Buruh">Buruh</option>
                                                <option value="Karyawan">Karyawan</option>
                                                <option value="Pedagang">Pedagang</option>
                                                <option value="DLL">Lain-Lain</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nm_i" class="col-form-label">Nama Ibu</label>
                                            <input type="Text" class="form-control" id="nm_i" name="nm_i" autocomplete="off">
                                            <input type="hidden" class="form-control" id="hbgi" value="Ibu" name="hbgi" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="pndkn_i" class="col-form-label">Pendidikan Ibu</label>
                                            <select name="pndkn_i" class="form-control">
                                                <option>Pilih Pendidikan</option>
                                                <option value="SD">SD</option>
                                                <option value="SLTP">SLTP</option>
                                                <option value="SLTA">SLTA</option>
                                                <option value="SARJANA">SARJANA</option>
                                                <option value="DLL">DLL</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pkrjn_i" class="col-form-label">Pekerjaan Ibu</label>
                                            <select name="pkrjn_i" class="form-control">
                                                <option>Pilih Pekerjaan</option>
                                                <option value="Petani">Petani</option>
                                                <option value="Wiraswasta">Wiraswasta</option>
                                                <option value="Nelayan">Nelayan</option>
                                                <option value="Guru">Guru</option>
                                                <option value="PNS">Pegawai Negeri</option>
                                                <option value="TNI">TNI</option>
                                                <option value="Polisi">Polisi</option>
                                                <option value="Dokter">Dokter</option>
                                                <option value="Buruh">Buruh</option>
                                                <option value="Karyawan">Karyawan</option>
                                                <option value="Pedagang">Pedagang</option>
                                                <option value="DLL">Lain-Lain</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="dlm_klrg" class="col-form-label">Dalam Keluarga</label>
                                            <select name="dlm_klrg" class="form-control">
                                                <option>Pilih Keluarga</option>
                                                <option value="Kandung">Kandung</option>
                                                <option value="Tiri">Tiri</option>
                                                <option value="Angkat">Angkat</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="ank_ke" class="col-form-label">Anak Ke</label>
                                            <input type="number" class="form-control" name="ank_ke" placeholder="Isi dengan angka" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="sdr" class="col-form-label">Jumlah Saudara</label>
                                            <input type="number" class="form-control" name="sdr" placeholder="Isi dengan angka" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nm_w" class="col-form-label">Nama Wali</label>
                                            <input type="text" class="form-control" id="nm_w" name="nm_w" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="pndkn_w" class="col-form-label">Pendidikan Wali</label>
                                            <select name="pndkn_w" class="form-control">
                                                <option value="">Pilih Pendidikan</option>
                                                <option value="SD">SD</option>
                                                <option value="SLTP">SLTP</option>
                                                <option value="SLTA">SLTA</option>
                                                <option value="SARJANA">SARJANA</option>
                                                <option value="DLL">DLL</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pkrjn_w" class="col-form-label">Pekerjaan Wali</label>
                                            <select name="pkrjn_w" class="form-control">
                                                <option value="">Pilih Pekerjaan</option>
                                                <option value="Petani">Petani</option>
                                                <option value="Wiraswasta">Wiraswasta</option>
                                                <option value="Nelayan">Nelayan</option>
                                                <option value="Guru">Guru</option>
                                                <option value="PNS">Pegawai Negeri</option>
                                                <option value="TNI">TNI</option>
                                                <option value="Polisi">Polisi</option>
                                                <option value="Dokter">Dokter</option>
                                                <option value="Buruh">Buruh</option>
                                                <option value="Karyawan">Karyawan</option>
                                                <option value="Pedagang">Pedagang</option>
                                                <option value="DLL">Lain-Lain</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pndptn_w" class="col-form-label">Pendapatan Wali</label>
                                            <select name="pndptn_w" class="form-control">
                                                <option value="">Pilih Pendapatan</option>
                                                <option value="tinggi">Tinggi</option>
                                                <option value="sedang">Sedang</option>
                                                <option value="rendah">Rendah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="almt_w" class="col-form-label">Alamat Wali</label>
                                            <input type="text" class="form-control" id="almt_w" name="almt_w" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="prov_w" class="col-form-label">Provinsi Wali</label>
                                            <select class="form-control select2" style="width: 100%;" name="prov_w" id="prov_w">
                                                <option value="">Pilih Provinsi</option>
                                                <?php
                                                foreach ($provinsi as $value) { ?>
                                                    <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                                <?php } ?>
                                            </select>
                                            <!-- <input type="text" class="form-control" id="prov_w" name="prov_w"> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="kab" class="col-form-label">Kabupaten Wali</label>
                                            <select class="form-control select2" name="kab_w" id="kab_w">
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kec" class="col-form-label">Kecamatan Wali</label>
                                            <select class="form-control select2" name="kec_w" id="kec_w">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="kec" class="col-form-label">Desa Wali</label>
                                            <select class="form-control select2" name="desa_w" id="desa_w">
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pos_w" class="col-form-label">Kode Pos Wali</label>
                                            <input type="number" class="form-control" id="pos_w" name="pos_w">
                                        </div>
                                        <div class="form-group">
                                            <label for="hp_w" class="col-form-label">No Handphone</label>
                                            <input type="number" class="form-control" id="hp_w" name="hp_w">
                                        </div>
                                        <div class="form-group">
                                            <label for="telp_w" class="col-form-label">No Telephone</label>
                                            <input type="number" class="form-control" id="telp_w" name="telp_w">
                                        </div>
                                        <input type="hidden" name="status" value="Santri">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-messages2" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="wilayah" class="col-form-label">Wilayah</label>
                                            <select name="" id="wilayah" class="form-control select2">
                                                <option selected>Pilih wilayah</option>
                                                <?php foreach ($wilayah as $value) { ?>
                                                    <option value="<?= $value->id_wilayah ?>"><?= $value->nama_wilayah ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="blok" class="col-form-label">Block</label>
                                            <select class="form-control select2" name="" id="blok">
                                                <option>Pilih Blok</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kamar" class="col-form-label">Kamar</label>
                                            <select class="form-control select2" name="id_kamar" id="kamar">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_penetapan" class="col-form-label">Tanggal Penetapan</label>
                                            <input type="date" class="form-control" name="tgl_penetapan" id="tgl_penetapan" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" style="margin-top: 15px;">
                                        <a class="btn btn-sm btn-default" onclick="menu_santri()" data-toggle="pill"><i class=""></i> Keluar</a>
                                        <button type="button" class="btn btn-sm btn-info float-right" onclick="simpan_santri1()"><i class="fas fa-save"></i> Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <div class="card card-teal card-outline card-outline-tabs">
                    
                </div> -->
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {

        $('#prov').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Csantri/get_kabupaten'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                    }
                    $('#kab').html(html);

                }
            });
            return false;
        });

        $('#kab').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Csantri/get_kecamatan'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                    }
                    $('#kec').html(html);

                }
            });
            return false;
        });

        $('#kec').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Csantri/get_desa'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                    }
                    $('#desa').html(html);

                }
            });
            return false;
        });

        $('#prov_w').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Csantri/get_kabupaten'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                    }
                    $('#kab_w').html(html);

                }
            });
            return false;
        });

        $('#kab_w').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Csantri/get_kecamatan'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                    }
                    $('#kec_w').html(html);

                }
            });
            return false;
        });

        $('#kec_w').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Csantri/get_desa'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                    }
                    $('#desa_w').html(html);

                }
            });
            return false;
        });

    });
</script>
<script>
    $(document).ready(function() {

        $('#wilayah').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Csantri/get_blok'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
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
                url: "<?php echo site_url('Csantri/get_kamar'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_kamar + '>' + data[i].nama_kamar + '</option>';
                    }
                    $('#kamar').html(html);

                }
            });
            return false;
        });
    });
</script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    })

    function simpan_santri1() {
        $.ajax({
            url: "<?= site_url('Csantri/simpan_santri') ?>",
            data: $('#form_tambah_santri').serialize(),
            type: 'POST',
            dataType: 'JSON',
            success: function(data, textStatus, jqXHR) {
                if (data.pesan === "ya") {
                    swal.fire({
                        title: "PDST NAA",
                        text: data.sukses,
                        type: "success"
                    }).then(okay => {
                        if (okay) {
                            menu_santri()
                        }
                    })
                }
            }
        });
    }
</script>