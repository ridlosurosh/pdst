
<div class="container-fluid">
	<div class="page-header">
		<div class="row">
			<div class="col-lg-12">
				<h3>Struktural Pada Periode <span class="text-danger"><u><?= $periodenya->periode ?></u></span></h3>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<a class="btn btn-sm btn-primary active" href="#" data="<?= $periodenya->id_periode ?>" id="bt_tambah"><i class="fas fa-plus"></i> Tambah</a>
			<div class="card mt-2">
				<div class="card-body">
					<div class="table-responsive">
						<table id="example1" class="table">
							<thead>
								<tr>
									<th>NO</th>
									<th>NAMA JABATAN</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($jabatan as $value) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $value->nm_jabatan ?></td>
										<td>
											<button class="btn btn-sm btn-warning item_edit rounded-circle" title="Edit" data="<?= $value->id_jabatan ?>"><i class="fas fa-pencil-alt"></i></button>
											<button type="button" class="btn btn-sm btn-info rounded-circle" data-toggle="modal" data-target="#staticBackdrop" title="Edit" onclick="detail('<?= $value->id_jabatan ?>')">
												<i class=" fas fa-info-circle"></i>
											</button>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Detail Jabatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<table id="detail" class="table table-hover text-nowrap">
					<thead>
						<tr style="color: dimgrey;">
							<th>No</th>
							<th>Niup</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Jabatan</th>
							<th id="kk">Status</th>
						</tr>
					</thead>
					<tbody id="list_detail">

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-default" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="tambah_jabatan">
				<div class="modal-header">
					<h6 class="modal-title">Tambah Struktur Pada Periode <?= $periodenya->periode ?></h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id_periode" id="id_periode" value="">
					<div class="row">
						<div class="col-12 form-group">
							<label for="">Nama Jabatan</label>
							<input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan" autocomplete="off">
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

<div class="modal fade" id="modal-edit" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="edit_jabatan">
				<div class="modal-header">
					<h6 class="modal-title">Edit Struktur Pada Periode <?= $periodenya->periode ?></h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id_jabatan" value="">
					<div class="row">
						<div class="col-12 form-group">
							<label for="">Nama Jabatan</label>
							<input type="text" class="form-control" name="nm_jabatan" id="nama_jabatan" value="" autocomplete="off">
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

	$('#bt_tambah').on('click', function() {
		var id = $(this).attr('data');
		$('#modal-default').modal('show');
		$('#id_periode').val(id);
	});

	$('.item_edit').on('click', function() {
		var id = $(this).attr('data');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('Cjabatan/form_edit_jabatan') ?>",
			dataType: "JSON",
			data: {
				id: id
			},
			success: function(data) {
				$('#modal-edit').modal('show');
				$.each(data, function(id_jabatan, nm_jabatan) {
					$('[name="id_jabatan"]').val(data.id_jabatan);
					$('[name="nm_jabatan"]').val(data.nm_jabatan);
				});
			}
		});
		return false;
	})

	$.validator.addMethod("valueNotEquals", function(value, element, arg) {
		return arg !== value;
	}, "Value must not equal arg.");
	$("select").on("select2:close", function(e) {
		$(this).valid();
	});
	$('#tambah_jabatan').validate({
		rules: {
			nama_jabatan: {
				required: true
			}

		},
		messages: {
			nama_jabatan: {
				required: "Tidak Boleh Kosong"
			}
		},
		errorElement: 'span',
		errorPlacement: function(error, element) {
		},
		highlight: function(element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		},
		submitHandler: function() {
			$.ajax({
				url: "<?= site_url('Cjabatan/simpan_jabatan') ?>",
				data: $('#tambah_jabatan').serialize(),
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
								lihat_jabatan(<?= $periodenya->id_periode ?>)
							}
						})
					} else {
						swal.fire({
							title: "PDST NAA",
							text: data.sukses,
							type: "error"
						}).then(okay => {
							if (okay) {
								$('#nama_jabatan').focus();
							}
						})
					}
				}
			}); 
		}
	});

	$.validator.addMethod("valueNotEquals", function(value, element, arg) {
		return arg !== value;
	}, "Value must not equal arg.");
	$("select").on("select2:close", function(e) {
		$(this).valid();
	});
	$('#edit_jabatan').validate({
		rules: {
			nm_jabatan: {
				required: true
			}

		},
		messages: {
			nm_jabatan: {
				required: "Tidak Boleh Kosong"
			}
		},
		errorElement: 'span',
		errorPlacement: function(error, element) {
		},
		highlight: function(element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		},
		submitHandler: function() {
			$.ajax({
				url: "<?= site_url('Cjabatan/edit_jabatan') ?>",
				data: $('#edit_jabatan').serialize(),
				type: 'POST',
				dataType: 'JSON',
				success: function(data) {
					if (data.pesan === "ya") {
						$('#modal-edit').modal('hide');
						swal.fire({
							title: "PDST NAA",
							text: data.sukses,
							type: "success"
						}).then(okay => {
							if (okay) {
								lihat_jabatan(<?= $periodenya->id_periode ?>)
							}
						})
					} else {
						swal.fire({
							title: "PDST NAA",
							text: data.sukses,
							type: "error"
						}).then(okay => {
							if (okay) {
								$('#nama_jabatan').focus();
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

	function detail(id) {
		$.ajax({
			url: "<?= site_url('Cjabatan/detail') ?>",
			data: {
				id: id
			},
			type: "POST",
			dataType: "JSON",
			success: function(data) {
				if (data.pesan === "ya") {
					$('#list_detail').html('`' + data.list_detail + '`');
				} else {
					$('#list_detail').html('`' + data.list_detail + '`');
				}
			}
		})
	}
</script>