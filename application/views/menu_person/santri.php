<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Santri</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="col-sm-3"></div>
	<div class="contianer-fluid">
		<div class="card">
			<div class="card-header p-1">
				<div class="row">
					<div class="col-sm-3">
						<select name="" id="tahun" class="form-control">
							<option hidden>-Pilih Tahun Angkatan-</option>
							<?php for ($i = 2010; $i < date("Y") + 5; $i++) { ?>
								<option value="<?= $i ?>"><?= $i ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-sm-2">
						<select name="jenis" id="kelamin" class="form-control">
							<option value="">-Pilih Kelamin-</option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="col-sm-3 mt-1">
						<div class="btn-group">
							<button type="button" class="btn btn-sm btn-primary" title="Export PDF" id="bt-pdf"><i class="fas fa-file-pdf"></i></button>
							<button class="btn btn-sm btn-primary" title="Export Excel"><i class="fas fa-file-excel"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body p-1">
				<h3 class="card-title"><a class="btn btn-block btn-sm bg-teal btn-circle" id="tambah_santri" href="#" onclick="tambah_santri()"><i class="fas fa-plus "></i> Tambah Data</a></h3>
				<table id="example1" class="table">
					<thead>
						<tr>
							<th>
								NO
							</th>
							<th>
								NIUP
							</th>
							<th>
								NAMA
							</th>
							<th>
								ALAMAT
							</th>
							<th>
								AKSI
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($santri as $value) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $value->niup ?></td>
								<td><?= $value->nama ?></td>
								<td><?= $value->alamat_lengkap ?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-sm btn-info" title="Detail" onclick="detail_santri('<?= $value->id_person ?>')">
											<i class="fas fa-info-circle"></i>
										</button>
										<button type="button" class="btn btn-sm btn-warning" title="Edit" onclick="form_edit_santri('<?= $value->id_person ?>')">
											<i class="fas fa-edit"></i>
										</button>
										<button type="button" class="btn btn-sm btn-primary" title="Upload" onclick="berkas('<?= $value->id_person ?>')">
											<i class="fas fa-image"></i>
										</button>
										<!-- <button type="button" class="btn btn-sm btn-success" title="Mahrom" onclick="form_tambah_mahrom('<?= $value->id_person ?>')">
											<i class="fas fa-users"></i>
										</button> -->
										<button type="button" class="btn btn-sm btn-secondary" title="Cetak" onclick="print_santri('<?= $value->id_person ?>')">
											<i class="fas fa-print"></i>
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
</section>
<script>
	$(document).ready(function() {
		$('#bt-pdf').click(function() {
			var jenkel = $('#kelamin').val()
			if (jenkel == "") {
				swal.fire({
					text: "Jenis Kelamin Belum Dipilih"
				})
			} else {
				var tahun = $('#tahun').val()
				$.ajax({
					url: "<?= site_url('Cexport/cek') ?>",
					data: {
						"tahun": tahun
					},
					type: 'POST',
					success: function(data) {
						if (data == 1) {
							swal.fire({
								text: "Gak Ada Bang"
							})
						} else {
							swal.fire({
								text: "Ada Bang"
							})
						}
					}
				})
			}
		})
	})

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

	function tambah_santri() {
		$.post('<?= site_url('Cperson/tambah_santri_1') ?>', function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function form_tambah_mahrom(id) {
		$.post('<?= site_url('Cperson/form_tambah_mahrom') ?>', {
			idperson: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function berkas(id) {
		$.post('<?= site_url('Cperson/berkas') ?>', {
			idperson: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function form_edit_santri(id) {
		$.post('<?= site_url('Cperson/form_edit_santri') ?>', {
			o: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function detail_santri(id) {
		$.post('<?= site_url('Cperson/detail_santri') ?>', {
			idperson: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function print_santri(id) {
		$.post('<?= site_url('Cperson/print_santri') ?>', {
			idperson: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		})

	}
</script>