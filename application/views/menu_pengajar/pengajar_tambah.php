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
                <h3 class="card-title">Tambah Pengajar Nubdzah</h3>
            </div>
            <div class="card-body">
                <form id="tambah_pengajar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="nama_pengajar">Pilih Nama Pengajar</label>
                                <input type="text" class="form-control" name="nama_pengajar" id="nama_pengajar" placeholder="nama">
                                <input type="hidden" name="id_person" id="id_pengajar">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="alamat">NIUP</label>
                                <input type="text" class="form-control" name="alamat_lengkap" id="alamat" placeholder="0000000000000000" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-default" onclick="menu_pengajar()">Keluar</button>
                <button class="btn btn-sm btn-primary float-right" onclick="simpan_guru_nubdah()"><i class="fas fa-save"></i> Simpan</button>
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

    function simpan_guru_nubdah() {
        $.ajax({
            url: "<?= site_url('Cpengajar/simpan_pengajar_nubdah') ?>",
            data: $('#tambah_pengajar').serialize(),
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