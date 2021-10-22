<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Santri</h1>
			</div>
			<div class="col-sm-6">
				<div class="btn-group">
						<a type="button" class="btn btn-sm bg-teal dropdown-icon" data-toggle="dropdown">Pdf
							<div class="dropdown-menu" role="menu">
								<a class="dropdown-item" href="<?= site_url('Cexport/semua_santri_pdf') ?>">Semua Santri</a>
								<a class="dropdown-item" href="<?= site_url('Cexport/pdf_putra') ?>">Santri Putra</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= site_url('Cexport/pdf_putri') ?>">Santri Putri</a>
							</div>
						</a>
					</div>
					<div class="btn-group">
						<a type="button" class="btn btn-sm bg-teal dropdown-icon" data-toggle="dropdown">Excel
							<div class="dropdown-menu" role="menu">
								<a class="dropdown-item" href="<?= site_url('Csantri/export_excel') ?>">Semua Santri</a>
								<a class="dropdown-item" href="<?= site_url('Csantri/excel_putra') ?>">Santri Putra</a>
								<a class="dropdown-item" href="<?= site_url('Csantri/excel_putri') ?>">Santri Putri</a>
							</div>
						</a>
					</div>
					<button class="btn btn-sm btn-circle btn-default"><i class="fas fa-file-download"></i></button>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="contianer-fluid">
		<div class="card">
			<div class="card-body p-1">
				<h3 class="card-title"><a class="btn btn-block btn-sm bg-teal" href="#" onclick="tambah_santri()"><i class="fas fa-plus "></i> Tambah Data</a></h3>
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
										<button type="button" class="btn btn-sm bg-teal dropdown-toggle dropdown-icon" data-toggle="dropdown">Aksi
											<span class="sr-only">Toggle Dropdown</span>
											<div class="dropdown-menu" role="menu">
												<a class="dropdown-item" href="#" onclick="detail_santri('<?= $value->id_person ?>')">Detail</a>
												<a class="dropdown-item" href="#" onclick="form_edit_santri('<?= $value->id_person ?>')">Edit</a>
												<a class="dropdown-item" href="#" onclick="berkas('<?= $value->id_person ?>')">Upload Berkas</a>
												<a class="dropdown-item" href="#" onclick="form_tambah_mahrom('<?= $value->id_person ?>')">Tambah Mahrom</a>
												<a class="dropdown-item" href="#" onclick="print_santri('<?= $value->id_person ?>')">Cetak Formulir</a>
												<a class="dropdown-item" href="#" onclick="print_surat_pernyataan('<?= $value->id_person ?>')">Cetak Surat Pernyataan</a>
											</div>
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
		$.post('<?= site_url('Cperson/menu_tambah_santri') ?>', function(Res) {
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
			idperson: id
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
			window.print(menu_santri());
		})

	}

	function print_surat_pernyataan(id) {
		$.post('<?= site_url('Cperson/print_surat_pernyataan') ?>', {
			idperson: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
			window.print(menu_santri());
		})

	}
</script>