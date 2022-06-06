<div class="container-fluid">
	<div class="page-header">
		<div class="row">
			<div class="col-lg-6">
				<h3>Pengurus</h3>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<a class="btn btn-sm btn-primary active" href="#" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-plus"></i> Tambah</a>
			<div class="card mt-2 p-2">
				<div class="card-body table-responsive">
					<table id="example1" class="table">
						<thead>
							<tr>
								<th>NO</th>
								<th>TAHUN PRIODE</th>
								<th>AKSI</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($priode as $value) { ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->periode ?></td>
									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-sm btn-primary active" title="Info" onclick="tambah_koordinator('<?= $value->id_periode ?>','<?= $value->periode ?>')">
												<i class="fas fa-cog"></i> Setting Pengurus
											</button>
										</div>
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
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah Priode</h5>
				<button type="button" class="close" onclick="close()" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form id="tambah_priode">
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-6">
							<label for=""> Dari Tahun </label>
							<select class="form-control select2" name="tahun_pertama" id="tahun_awal">
								<option value="0" selected hidden> Pilih Tahun </option>
								<?php for ($i = 2018; $i < date('Y') + 5; $i++) { ?>
									<option value="<?= $i ?>"><?= $i ?></option>
								<?php } ?>

							</select>
						</div>
						<div class="form-group col-6">
							<label for=""> Sampai Tahun </label>
							<select class="form-control select2" name="tahun_kedua" id="tahun_kedua">
								<option value="0" selected hidden> Pilih Tahun </option>
								<?php for ($u = 2019; $u < date('Y') + 6; $u++) { ?>
									<option value="<?= $u ?>"><?= $u ?></option>
								<?php } ?>

							</select>
						</div>
					</div>
					<div class="form-group">
						<!-- <button type="button" class="btn btn-sm btn-default bg-danger offset-4" onclick="menu_koordinator()"> <i class="fa fa-reply"></i> Keluar</button> -->
						<button class="btn btn-sm bg-teal offset-5"><i class="fas fa-save"></i> Simpan</button>
					</div>
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

	function tambah_koordinator(id, periode) {
		$.post('<?= site_url('Ckoordinator/tambah_koordinator') ?>', {
			id: id,
			periode: periode
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function detail_koordinator(id) {
		$.post('<?= site_url('Ckoordinator/detail_koordinator') ?>', {
			idpengurus: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function form_edit_koordinator(id) {
		$.post('<?= site_url('Ckoordinator/form_edit_koordinator') ?>', {
			idpengurus: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}



	$.validator.addMethod("valueNotEquals", function(value, element, arg) {
		return arg !== value;
	}, "Value must not equal arg.");
	$("select").on("select2:close", function(e) {
		$(this).valid();
	});
	$('#tambah_priode').validate({
		rules: {
			tahun_pertama: {
				valueNotEquals: "0"
			},
			tahun_kedua: {
				valueNotEquals: "0"
			}

		},
		messages: {
			tahun_pertama: {
				required: "Tidak Boleh Kosong"
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
				url: "<?= site_url('Ckoordinator/simpan_priode') ?>",
				data: $('#tambah_priode').serialize(),
				type: 'POST',
				dataType: 'JSON',
				success: function(data, textStatus, jqXHR) {
					if (data.pesan === "ya") {
						$('#staticBackdrop').modal('hide');
						swal.fire({
							title: "PDST NAA",
							text: data.sukses,
							type: "success"
						}).then(okay => {
							if (okay) {
								menu_koordinator();
							}
						});
					} else {
						swal.fire({
							title: "PDST NAA",
							text: data.sukses,
							type: "warning"
						}).then(okay => {
							if (okay) {
								// menu_koordinator();
							}
						});
					}
				}
			})
		}
	})

	function close() {
		$('#tahun_awal').val('0');
		$('#tahun_kedua').val('0');
	}
	$(function() {
		$('.select2').select2({
			theme: 'bootstrap4'
		});

	})
</script>