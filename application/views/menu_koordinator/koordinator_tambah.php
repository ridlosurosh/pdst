<style>
	#toggle {
		position: absolute;
		top: 320px;
		right: 20px;
		transform: translateY(-50%);
		width: 30px;
		height: 30px;
		background: url(plugin/dist/img/show.png);
		background-size: cover;
		cursor: pointer;
	}

	#toggle.hide {
		background: url(plugin/dist/img/hide.png);
		background-size: cover;
	}
</style>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Pengurus</h1>
			</div>
		</div>
	</div>
</section>
<section class="content mt-2">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card card-outline card-teal">
					<div class="card-header">
						<h3 class="card-title"></h3>
					</div>
					<form role="form" id="form_tambah_pengurus">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-form-label" for="nama_pengajar">Pilih Nama Pengurus</label>
										<input type="text" class="form-control" name="nama_pengajar" id="nama_santri" placeholder="nama" style="width: 100%;" autocomplete="off">
										<input type="hidden" name="idperson" id="idperson">
									</div>
									<div class="form-group">
										<label for="jabatan" class="col-form-label">Jabatan</label>
										<select name="jabatan" id="jabatan" class="form-control select2" style="width: 100%;">
											<option value="default">Pilih Jabatan</option>
											<?php foreach ($jabatan as $value) { ?>
												<option value="<?= $value->id_jabatan ?>"><?= $value->nm_jabatan ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="tanggal" class="col-form-label">Tanggal Pengangkatan</label>
										<div class="form-line">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
												</div>
												<input type="text" name="tanggal_diangkat" class="form-control" id="pengangkatan">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="tanggal" class="col-form-label ">Masa Bakti</label>
										<select class="form-control select2" name="masa_bakti" id="angkat">
											<option selected hidden value="0">Pilih Masa Bakti</option>
											<option value="365">1 Tahun</option>
											<option value="730">2 Tahun</option>
											<option value="1095">3 Tahun</option>
											<option value="1460">4 Tahun</option>
											<option value="1825">5 Tahun</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="tanggal" class="col-form-label">Tanggal Berhenti</label>
										<div class="form-line">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
												</div>
												<input type="text" name="tanggal_berhenti" class="form-control" id="berhenti" readonly>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="nama" class="col-form-label">Nama Pengguna</label>
										<input type="text" class="form-control" name="nama" id="namanya" placeholder="Masukkan Nama Akun Disini" readonly>
									</div>
									<div class="form-group">
										<label for="username" class="col-form-label">Username</label>
										<input type="text" class="form-control" name="username" id="username" placeholder="No Space" autocomplete="off">
									</div>
									<div class="form-group">
										<label for="pass" class="col-form-label">Password</label>
										<input type="password" class="form-control" name="pass" id="password">
										<div id="toggle" onclick="showHide();"></div>
									</div>
									<script>
										var password = document.getElementById('password');
										var toggle = document.getElementById('toggle');

										function showHide() {
											if (password.type === 'password') {
												password.setAttribute('type', 'text');
												toggle.classList.add('hide')
											} else {
												password.setAttribute('type', 'password');
												toggle.classList.remove('hide');
											}
										}
									</script>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button type="button" class="btn btn-sm btn-default bg-danger" onclick="menu_koordinator()"> <i class="fa fa-reply"></i> Keluar</button>
							<button class="btn btn-sm bg-teal  float-right"><i class="fas fa-save"></i> Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(function() {
		$('#pengangkatan').datepicker({
			dateFormat: 'yy-mm-dd'
		});
		$('#reservation').daterangepicker();

		$('#nama_santri').on('input', function() {
			UI_Nama_Santri();
			$("#namanya").val("");
		});
		var i = $('#reservation').val();
	});


	function UI_Nama_Santri() {
		$('#nama_santri').autocomplete({
			minLength: 1,
			autoFocus: true,
			source: function(req, res) {
				$.ajax({
					url: "<?= site_url('Ckoordinator/ui_nama_santri') ?>",
					data: {
						cari: $('#nama_santri').val()
					},
					dataType: 'json',
					type: "POST",
					success: function(data) {
						res(data);
					}
				});
			},
			select: function(event, ui) {
				if (ui.item.sukses === true) {
					$('#idperson').val(ui.item.id_person);
					$('#nama_santri').val(ui.item.nama);
					$('#namanya').val(ui.item.nama);
					return false;
				} else {
					return false;
				}
			},
			create: function() {
				$(this).data('ui-autocomplete')._renderItem = function(ul, item) {
					return $("<li></li>")
						.data("item.autocomplete", item)
						.append("<a class='nav-link active'><strong>" + item.nama + "</strong> <br/><small>Niup : " + item.niup + "</small></a>")
						.appendTo(ul);
				};
			}
		});
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
		if (bb === "") {
			$('#berhenti').val('0000-00-00');
			$('#pengangkatan').focus();
			swal.fire({
				title: "Tanggal Penganggkatan Harus di Isi dulu",
				type: "warning"
			}).then(okay => {
				if (okay) {
					$('#berhenti').val("");
					$('#angkat').val('0');
				}
			});
		} else {
			$('#berhenti').val(someFormattedDate);
		}

	})


	$.validator.addMethod("valueNotEquals", function(value, element, arg) {
		return arg !== value;
	}, "Value must not equal arg.");
	$("select").on("select2:close", function(e) {
		$(this).valid();
	});
	$('#form_tambah_pengurus').validate({
		rules: {
			nama_pengajar: {
				required: true
			},
			jabatan: {
				valueNotEquals: "default"
			},
			tanggal_diangkat: {
				required: true
			},
			masa_bakti: {
				valueNotEquals: "0"
			},
			tanggal_berhenti: {
				required: true
			},
			nama: {
				required: true
			},
			username: {
				required: true
			},
			pass: {
				required: true
			}
		},
		messages: {
			nama_pengajar: {
				required: "Tidak Boleh Kosong"
			},
			jabatan: {
				valueNotEquals: "Tidak Boleh Kosong"
			},
			tanggal_diangkat: {
				required: "Tidak Boleh Kosong"
			},
			masa_bakti: {
				valueNotEquals: "Tidak Boleh Kosong"
			},
			tanggal_berhenti: {
				required: "Tidak Boleh Kosong"
			},
			nama: {
				required: "Tidak Boleh Kosong"
			},
			username: {
				required: "Tidak Boleh Kosong"
			},
			pass: {
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
				url: "<?= site_url('Ckoordinator/simpan_koordinator') ?>",
				data: $('#form_tambah_pengurus').serialize(),
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

	$(function() {
		$('.select2').select2({
			theme: 'bootstrap4'
		})
	})
</script>