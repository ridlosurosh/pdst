<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Penempatan Kamar</h1>
			</div>
		</div>
		<div class="card-footer">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Data Pokok</a></li>
				<li class="breadcrumb-item active">Penempatan Kamar</li>
			</ol>
		</div>
	</div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card card-outline card-teal">
					<div class="card-header">
						<h3 class="card-title">Tambah History</h3>
					</div>
					<div class="card-body">
						<div class="col-sm-8">
							<form role="form" id="form_tambah_history">
								<!-- <div class="form-group">
								<input type="search" class="form-control" name="nama" id="nama">
								<input type="hidden" name="id_person" id="id_person">
							</div> -->
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="nama">Nama</label>
											<select class="form-control select2" name="id_person" id="nama">
												<option value="">Pilih Person</option>
												<?php foreach ($history as $value) { ?>
													<option value="<?= $value->id_person ?>"><?= $value->nama ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label for="wilayah" class="col-form-label">Wilayah</label>
											<select name="" id="wilayah" class="form-control select2">
												<option selected>Pilih wilayah</option>
												<?php foreach ($wilayah as $value) { ?>
													<option value="<?= $value->id_wilayah ?>"><?= $value->nama_wilayah ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label for="blok" class="col-form-label">Block</label>
											<select class="form-control select2" name="" id="blok">
												<option>Pilih Blok</option>
												<option value=""></option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="kamar" class="col-form-label">Kamar</label>
											<select class="form-control select2" name="id_kamar" id="kamar">
												<option value=""></option>
											</select>
										</div>
										<div class="form-group">
											<label for="tgl_penetapan" class="col-form-label">Tanggal Penetapan</label>
											<input type="text" class="form-control" name="tgl_penetapan" id="tgl_penetapan" value="<?= date('d m Y') ?>">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-sm btn-default" onclick="menu_history()">Keluar</button>
						<button type="submit" class="btn btn-sm btn-info float-right" onclick="simpan_history();"><i class="fas fa-save"></i> Simpan</button>
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
</script>
<script>
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2({
			theme: 'bootstrap4'
		})
	});

	function simpan_history() {
		$.ajax({
			url: "<?= site_url('Chistory/simpan_history') ?>",
			data: $('#form_tambah_history').serialize(),
			type: 'POST',
			dataType: 'JSON',
			success: function(data) {
				if (data.pesan === "sukses") {
					alert('Data berhasil ditambahkan');
					menu_history();
				}
			}
		})
	}

	// $(function() {
	// UI_person();
	// $('#nama').focus();
	// });
	// // untuk mencari nama
	// function UI_person() {
	// var options = {
	// url: "<?= site_url('Chistory/otomatis_person') ?>",
	// getValue: "nama",
	// list: {
	// match: {
	// enable: true
	// },
	// onKeyEnterEvent: function() {
	// var id = $("#nama").getSelectedItemData().id;
	// $("#id_person").val(id).trigger("change");
	// var alamat = $("#nama").getSelectedItemData().alamat;
	// $("#alamat_lengkap").val(alamat).trigger("change");
	// var jenkel = $("#nama").getSelectedItemData().jenkel;
	// $("#jenkel").val(jenkel).trigger("change");
	// },
	// onClickEvent: function() {
	// var id = $("#nama").getSelectedItemData().id;
	// $("#id_person").val(id).trigger("change");
	// var alamat = $("#nama").getSelectedItemData().alamat;
	// $("#alamat_lengkap").val(alamat).trigger("change");
	// var jenkel = $("#nama").getSelectedItemData().jenkel;
	// $("#jenkel").val(jenkel).trigger("change");
	// }
	// }
	// };
	// $("#nama").easyAutocomplete(options);
	// }
</script>