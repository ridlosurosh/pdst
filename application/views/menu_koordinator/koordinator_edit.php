<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Pengurus</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card card-outline card-teal">
					<div class="card-header">
						<h3 class="card-title">Edit Koordinator Dan User</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
					</div>
					<div class="card-body">
						<form role="form" id="form_edit_pengurus">
							<div class="row">
								<div class="col-md-6">
									<input type="hidden" name="id_pengurus" value="<?= $pengurus->id_pengurus ?>">
									<div class="form-group">
										<label class="col-form-label" for="nama_pengajar">Pilih Nama Pengurus</label>
										<input type="text" class="form-control" name="nama_pengajar" id="nama_santri" value="<?= $pengurus->nama ?>" readonly>
										<input type="hidden" name="idperson" id="idperson" value="<?= $pengurus->id_person ?>">
									</div>
									<div class="form-group">
										<label class="col-form-label" for="alamat">NIUP</label>
										<input type="text" class="form-control" name="niup" id="alamat" value="<?= $pengurus->niup ?>" readonly>
									</div>
									<div class="form-group">
										<label for="jabatan" class="col-form-label">Jabatan</label>
										<select name="jabatan" id="jabatan" class="form-control select2">
											<option selected hidden value="<?= $pengurus->id_jabatan ?>"><?= $pengurus->nm_jabatan ?></option>
											<?php foreach ($jabatan as $value) { ?>
												<option value="<?= $value->id_jabatan ?>"><?= $value->nm_jabatan ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="tanggal" class="col-form-label">Tanggal Pengangkatan</label>
										<input type="date" name="tanggal_diangkat" class="form-control" id="pengangkatan" value="<?= $pengurus->tanggal_diangkat ?>">
									</div>
									<div class="form-group">
										<label for="tanggal" class="col-form-label">Masa Bakti</label>
										<select class="form-control" name="" id="angkat">
											<option selected hidden><?= $pengurus->masa_bakti ?></option>
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
										<input type="text" name="tanggal_berhenti" class="form-control" id="berhenti" value="<?= $pengurus->tanggal_berhenti ?>" readonly>
									</div>
									<div class="form-group">
										<label for="nama" class="col-form-label">Nama Pengguna</label>
										<input type="text" class="form-control" name="nama" id="nama" value="<?= $akun->nama ?>" autocomplete="off" readonly>
										<input type="hidden" name="id_login" value="<?= $akun->id_login ?>">
									</div>
									<div class="form-group">
										<label for="username" class="col-form-label">Username</label>
										<input type="text" class="form-control" name="username" id="username" value="<?= $akun->username ?>" autocomplete="off">
									</div>
									<div class="form-group">
										<label for="pass" class="col-form-label">Password</label>
										<input type="password" class="form-control" name="pass" id="pass" value="<?= $akun->password ?>">
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-sm btn-default" onclick="menu_koordinator()">Keluar</button>
						<button type="submit" class="btn btn-sm bg-teal  float-right" onclick="edit_koordinator();"><i class="fas fa-edit"></i> Edit</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	function edit_koordinator() {
		$.ajax({
			url: "<?= site_url('Ckoordinator/edit_koordinator') ?>",
			data: $('#form_edit_pengurus').serialize(),
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
							menu_koordinator();
						}
					});
				}
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

		$('#berhenti').val(someFormattedDate);

	})
</script>