<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Pemnempatan Kamar</h1>
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
						<h3 class="card-title">Edit History</h3>
					</div>
					<div class="card-body">
						<form class="form-horizontal" id="form_edit_history">
							<input type="hidden" name="idhistory" value="<?= $data_history->id_history ?>">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="nama_santri" class="col-form-label">Nama Santri</label>
										<input type="hidden" class="form-control" name="nama_santri" id="nama_santri" value="<?= $data_history->id_person ?>">
										<input type="text" class="form-control" name="santri" id="santri" value="<?= $data_history->nama ?>" readonly>
									</div>
									<div class="form-group">
										<label for="alamat" class="col-form-label">Alamat</label>
										<input type="text" class="form-control" name="alamat" id="alamat" value="<?= $data_history->alamat_lengkap ?>" readonly>
									</div>
									<div class="form-group">
										<label for="tgl_penetapan" class="col-form-label">Tanggal Penetapan</label>
										<div class="form-line">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
												</div>
												<input type="text" class="form-control" name="tgl_penetapan" id="tgl_penetapan">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="" class="col-form-label">Wilayah</label>
										<select name="" id="wilayah" class="form-control select2">
											<option value="<?= $data_history->id_wilayah ?>"><?= $data_history->nama_wilayah ?></option>
											<?php foreach ($wilayah as $value) { ?>
												<option value="<?= $value->id_wilayah ?>"><?= $value->nama_wilayah ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="" class="col-form-label">Block</label>
										<select name="" id="blok" class="form-control select2">
											<option value="<?= $data_history->id_blok ?>"><?= $data_history->nama_blok ?></option>
											<option value=""></option>
										</select>
									</div>
									<div class="form-group">
										<label for="nama_kamar" class="col-form-label">Kamar</label>
										<select name="nama_kamar" id="kamar" class="form-control select2">
											<option value="<?= $data_history->id_kamar ?>"><?= $data_history->nama_kamar ?></option>
											<option value=""></option>
										</select>
									</div>

									<input type="hidden" name="aktif" value="Tidak">
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-sm btn-primary float-right" onclick="edit_history()"><i class="fas fa-edit"></i> Edit</button>
						<button type="submit" class="btn btn-sm btn-default" onclick="menu_history()">Keluar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function() {
		$('#wilayah').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url('Chistory/get_blok'); ?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function(data) {

					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].id_blok + '>' + data[i].nama_blok + '</option>';
					}
					$('#blok').html(html);

				}
			});
			return false;
		});

		$('#blok').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url('Chistory/get_kamar'); ?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function(data) {

					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].id_kamar + '>' + data[i].nama_kamar + '</option>';
					}
					$('#kamar').html(html);

				}
			});
			return false;
		});
	});

	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2({
			theme: 'bootstrap4'
		})
		$('#tgl_penetapan').datepicker({
			dateFormat: 'yy-mm-dd'
		});
	});

	function edit_history() {
		$.ajax({
			url: "<?= site_url('Chistory/edit_history') ?>",
			data: $('#form_edit_history').serialize(),
			type: 'POST',
			dataType: 'JSON',
			success: function(data) {
				if (data.pesan === "sukses") {
					swal.fire({
						title: "PDST NAA",
						text: "Data Berhasil Diedit",
						type: "success"
					}).then(okay => {
						if (okay) {
							menu_history()
						}
					})
				}
			}
		});
	}
</script>