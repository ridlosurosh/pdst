<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengajar</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Pengajar Nubdzah</h3>
            </div>
            <div class="card-body">
                <form id="edit_pengajar">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="idpengajar" value="<?= $id_guru_nubdah ?>">
                            <div class="form-group">
                                <label class="col-form-label" for="nama_pengajar">Pilih Nama Pengajar</label>
                                <input type="text" class="form-control" name="nama_pengajar" id="nama_pengajar" value="<?= $nama ?>" readonly>
                                <input type="hidden" name="id_person" id="id_pengajar" value="<?= $id_person ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="alamat">Tanggal Pengangkatan</label>
                                <!-- <textarea name="" class="form-control" id="alamat" cols="30" rows="2" readonly></textarea> -->
                                <input type="date" class="form-control" name="tgl_diangkat" id="" placeholder="alamat" value="<?= $tgl_diangkat ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="alamat">Alamat</label>
                            <textarea name="" class="form-control" id="alamat" cols="150" rows="2" readonly><?= $alamat_lengkap ?></textarea>
                            <!-- <input type="text" name="alamat_lengkap" id="" placeholder="alamat" readonly> -->
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-default" onclick="menu_pengajar()">Keluar</button>
                <button class="btn btn-sm btn-primary float-right" onclick="edit_guru_nubdah()"><i class="fas fa-edit"></i> Simpan</button>
            </div>
        </div>
    </div>
</section>

<script>
    $(function() {
        UI_pengajar_dari_dalam();
        $('#nama_pengajar').focus();

    });

    function UI_pengajar_dari_dalam() {
        var options = {
            url: "<?= site_url('Cpengajar/otomatis_pengajar_dari_dalam'); ?>",
            getValue: "nama",
            list: {
                match: {
                    enabled: true
                },
                onKeyEnterEvent: function() {
                    var id = $("#nama_pengajar").getSelectedItemData().id_person;
                    $("#id_pengajar").val(id).trigger("change");
                    var alamat = $("#nama_pengajar").getSelectedItemData().niup;
                    $("#alamat").val(alamat).trigger("change");
                },
                onClickEvent: function() {
                    var id = $("#nama_pengajar").getSelectedItemData().id_person;
                    $("#id_pengajar").val(id).trigger("change");
                    var alamat = $("#nama_pengajar").getSelectedItemData().niup;
                    $("#alamat").val(alamat).trigger("change");
                }
            }
        };
        $("#nama_pengajar").easyAutocomplete(options);
    }

    function edit_guru_nubdah() {
        $.ajax({
            url: "<?= site_url('Cpengajar/edit_pengajar') ?>",
            data: $('#edit_pengajar').serialize(),
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
                            menu_pengajar()
                        }
                    })
                }
            }
        });
    }
</script>