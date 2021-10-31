<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Struktural</h1>
			</div>
		</div>
	</div>
</section>
<section class="content mt-2">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form id="form_tambah_jabatan">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nama_jabatan" class="col-form-label">Nama Jabatan</label>
										<input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" autocomplete="off">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="tahun_jabatan" class="col-form-label">Tahun Diadakan</label>
										<input type="date" class="form-control" id="tahun_jabatan" name="tahun_jabatan" autocomplete="off">
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button type="button" class="btn btn-sm btn-danger" onclick="menu_jabatan()"><i class="fas fa-reply"></i> Kembali Ke Data Jabatan</button>
							<button class="btn btn-sm btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<script>
	$.validator.addMethod("valueNotEquals", function(value, element, arg) {
		return arg !== value;
	}, "Value must not equal arg.");
	$("select").on("select2:close", function(e) {
		$(this).valid();
	});
	$('#form_tambah_jabatan').validate({
		rules: {
			nama_jabatan: {
				required: true
			},
			tahun_jabatan: {
				required: true
			},
		},
		messages: {
			nama_jabatan: {
				required: "Tidak Boleh Kosong"
			},
			tahun_jabatan: {
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
				url: "<?= site_url('Cjabatan/simpan_jabatan') ?>",
				data: $('#form_tambah_jabatan').serialize(),
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
								menu_jabatan()
							}
						})
					} else {
						swal.fire({
							title: "PDST NAA",
							text: data.sukses,
							type: "warning"
						}).then(okay => {
							if (okay) {
								// menu_jabatan()
								$('#nama_jabatan').focus();
							}
						})
					}
				}
			});
		}
	})
</script>