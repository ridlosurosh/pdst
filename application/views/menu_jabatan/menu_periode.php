<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Atur Peiode</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
            <div class="card">
                <div class="card-body table-responsive p-1">
                    <table id="example1" class="table table-hover text-nowrap">
                    <h3 class="card-title"><a class="btn btn-sm btn-block bg-teal" href="#" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> Tambah Data</a></h3>
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>PERIODE</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                                foreach ($periode as $value) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->periode ?></td>
                                    <td>
                                        <button class="btn btn-sm bg-teal rounded-circle" onclick="lihat_jabatan('<?= $value->id_periode ?>')" title="Atur Struktur"><i class="fas fa-cog"></i></button>
                                        <button class="btn btn-sm btn-danger rounded-circle" id="bt-hapus" data="<?= $value->id_periode ?>"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
<div class="modal fade" id="modal-default" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="tambah_periode">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Periode</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="tahun_pertama">Dari Tahun</label>
                            <select name="tahun_pertama" class="form-control" id="tahun_pertama">
                                <option value="">-Pilih Tahun-</option>
                                <?php 
                                for ($i=2020; $i < date('Y') + 1; $i++) { 
                                ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                                <?php 
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="tahun_kedua">Sampai Tahun</label>
                            <select name="tahun_kedua" class="form-control" id="tahun_kedua">
                                <option value="">-Pilih Tahun-</option>
                                <?php 
                                for ($u=date('Y'); $u < date('Y') + 4; $u++) { 
                                ?>
                                <option value="<?= $u ?>"><?= $u ?></option>
                                <?php 
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                    <button class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
		$("#example1").DataTable({
			"paging": true,
			"lengthChange": false,
			"ordering": false,
			"searching": true,
			"info": false,
			"autoWidth": true,
		});
		$('#example2').DataTable();
	});

    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
		return arg !== value;
	}, "Value must not equal arg.");
	$("select").on("select2:close", function(e) {
		$(this).valid();
	});
	$('#tambah_periode').validate({
		rules: {
			tahun_pertama: {
				valueNotEquals: ""
			},
			tahun_kedua: {
				valueNotEquals: ""
			}

		},
		messages: {
			tahun_pertama: {
				valueNotEquals: "Tidak Boleh Kosong"
			},
			tahun_kedua: {
				valueNotEquals: "Tidak Boleh Kosong"
			}
		},
		errorElement: 'span',
		errorPlacement: function(error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		},
		submitHandler: function() {
            $.ajax({
                url: "<?= site_url('Cjabatan/simpan_periode') ?>",
                data: $('#tambah_periode').serialize(),
                type: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    if (data.pesan === "ya") {
                        $('#modal-default').modal('hide');
                        swal.fire({
                            title: "PDST NAA",
                            text: data.sukses,
                            type: "success"
                        }).then(okay => {
                            if (okay) {
                                menu_periode()
                            }
                        })
                    } else {
                        swal.fire({
                            title: "PDST NAA",
                            text: data.sukses,
                            type: "error"
                        }).then(okay => {
                            if (okay) {
                                $('#tahun_pertama').focus();
                            }
                        })
                    }
                }
            }); 
        }
    });

    function lihat_jabatan(id) {
        $.post('<?= site_url('Cjabatan/lihat_jabatan') ?>', {
			idperiode: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
    }

    $('#example1').on("click", "#bt-hapus", function () {
            var id = $(this).attr("data");
			swal.fire({
			title: 'PDST NAA',
			text: "Anda Yakin Untuk Menghapus Periode Ini ?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'YA',
			cancelButtonText: 'TIDAK',
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							url: 'Cjabatan/hapus_periode',
							type: 'POST',
							data: {
								id: id
							},
							dataType: 'json'
						})
						.fail(function() {
							swal.fire({
								title: "PDST NAA",
								text: "Berhasil dihapus",
								type: "success"
							}).then(okay => {
								if (okay) {
									menu_periode();
								}
							});
						});
				});
			}
		});
    })
</script>