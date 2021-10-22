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
                <h3 class="card-title">Edit Karyawan</h3>
            </div>
            <div class="card-body">
                <form id="edit_karyawan">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="idkaryawan" value="<?= $id_karyawan ?>">
                            <div class="form-group">
                                <label class="col-form-label" for="nama_pengajar">Pilih Nama Santri</label>
                                <input type="text" class="form-control" name="nama_pengajar" id="nama_santri" value="<?= $nama ?>" readonly>
                                <input type="hidden" name="idperson" id="idperson" value="<?= $id_person ?>">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="alamat">NIUP</label>
                                <input type="text" class="form-control" name="alamat_lengkap" id="alamat" value="<?= $niup ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="col-form-label">Tanggal Pengangkatan</label>
                                <input type="date" name="tanggal_diangkat" class="form-control" id="pengangkatan" value="<?= $tgl_diangkat ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal" class="col-form-label">Masa Bakti</label>
                                <select class="form-control" name="" id="angkat">
                                    <option selected hidden><?= $tgl_diangkat ?> s/d <?= $tgl_berhenti ?></option>
                                    <option value="365">1 Tahun</option>
                                    <option value="730">2 Tahun</option>
                                    <option value="1095">3 Tahun</option>
                                    <option value="1460">4 Tahun</option>
                                    <option value="1825">5 Tahun</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="col-form-label">Tanggal Berhenti</label>
                                <input type="text" name="tanggal_berhenti" class="form-control" id="berhenti" readonly value="<?= $tgl_berhenti ?>">
                            </div>
                            <div class="form-group">
                                <label for="instansi" class="col-form-label">Instansi</label>
                                <select class="form-control" name="instansi" id="instansi">
                                    <option selected hidden value="<?= $instansi ?>"><?= $instansi ?></option>
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
                <button class="btn btn-sm btn-primary float-right" onclick="edit_karyawan()"><i class="fas fa-edit"></i> Simpan</button>
            </div>
        </div>
    </div>
</section>

<script>
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

    function edit_karyawan() {
        $.ajax({
            url: "<?= site_url('Ckaryawan/edit_karyawan') ?>",
            data: $('#edit_karyawan').serialize(),
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