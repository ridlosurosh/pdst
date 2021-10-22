<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Karyawan</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Karyawan</h3>
            </div>
            <div class="card-body">
                <form id="tambah_karyawan">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="nama_pengajar">Pilih Nama Santri</label>
                                <input type="text" class="form-control" name="nama_pengajar" id="nama_santri" placeholder="nama">
                                <input type="hidden" name="idperson" id="idperson">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="alamat">NIUP</label>
                                <input type="text" class="form-control" name="alamat_lengkap" id="alamat" placeholder="0000000000000000" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="col-form-label">Tanggal Pengangkatan</label>
                                <input type="date" name="tanggal_diangkat" class="form-control" id="pengangkatan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal" class="col-form-label">Masa Bakti</label>
                                <select class="form-control" name="" id="angkat">
                                    <option selected hidden>Pilih Masa Bakti</option>
                                    <option value="365">1 Tahun</option>
                                    <option value="730">2 Tahun</option>
                                    <option value="1095">3 Tahun</option>
                                    <option value="1460">4 Tahun</option>
                                    <option value="1825">5 Tahun</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="col-form-label">Tanggal Berhenti</label>
                                <input type="text" name="tanggal_berhenti" class="form-control" id="berhenti" readonly>
                            </div>
                            <div class="form-group">
                                <label for="instansi" class="col-form-label">Instansi</label>
                                <select class="form-control" name="instansi" id="instansi">
                                    <option selected hidden>Pilih Instansi</option>
                                    <option value="NAA Media">NAA MEDIA</option>
                                    <option value="Kopontren Al-Mubarokah">Kopontren Al-Mubarokah</option>
                                    <option value="Kantin Al-Mubarokah">Kantin Al-Mubarokah</option>
                                    <option value="Koperasi Sekolah">Koperasi Sekolah</option>
                                    <option value="Meubel">Meubel</option>
                                    <option value="LK SMKNAA">LK SMKNAA</option>
                                    <option value="AMDK Oemboel">AMDK Oemboel</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-default" onclick="karyawan()">Keluar</button>
                <button class="btn btn-sm btn-primary float-right" onclick="simpan_karyawan()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</section>

<script>
    $(function() {
        UI_santri();
        $('#nama_santri').focus();

    });

    function UI_santri() {
        var options = {
            url: "<?= site_url('Ckaryawan/otomatis_santri'); ?>",
            getValue: "nama",
            list: {
                match: {
                    enabled: true
                },
                onKeyEnterEvent: function() {
                    var id = $("#nama_santri").getSelectedItemData().id_person;
                    $("#idperson").val(id).trigger("change");
                    var alamat = $("#nama_santri").getSelectedItemData().niup;
                    $("#alamat").val(alamat).trigger("change");
                },
                onClickEvent: function() {
                    var id = $("#nama_santri").getSelectedItemData().id_person;
                    $("#idperson").val(id).trigger("change");
                    var alamat = $("#nama_santri").getSelectedItemData().niup;
                    $("#alamat").val(alamat).trigger("change");
                }
            }
        };
        $("#nama_santri").easyAutocomplete(options);
    }

    $('#angkat').on('change', function() {
        var ll = $(this).val();
        var bb = $('#pengangkatan').val();
        var date = new Date(bb);

        date.setDate(date.getDate() + (+ll));

        var dd = date.getDate();
        var mm = date.getMonth() + 1;
        var y = date.getFullYear();
        var someFormattedDate = y + '-' + mm + '-' + dd;

        $('#berhenti').val(someFormattedDate);

    })

    function simpan_karyawan() {
        $.ajax({
            url: "<?= site_url('Ckaryawan/simpan_karyawan') ?>",
            data: $('#tambah_karyawan').serialize(),
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
                            karyawan()
                        }
                    })
                }
            }
        });
    }
</script>