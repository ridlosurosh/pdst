<div class="container-fluid">
	<div class="page-header">
		<div class="row">
			<div class="col-lg-6">
				<h3>Karyawan</h3>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<a class="btn btn-sm btn-primary active" href="#" onclick="tambah_data_karyawan()"><i class="fas fa-plus "></i> Tambah</a>
			<div class="card mt-2 p-2">
				<div class="table-responsive">
					<table id="example1" class="table">
					<thead>
						<tr>
							<th width="100">#</th>
							<th>NO</th>
							<th>NIUP</th>
							<th>NAMA</th>
							<th>INSTANSI</th>
							<th>TANGGAL DIANGKAT</th>
							<th>TANGGAL BERHENTI</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($karyawan as $value) { ?>
							<tr>
								<td>
									<div class="dropdown-basic">
											<div class="dropdown">
												<button type="button" class="dropbtn btn-xs btn-primary active" title="Konfigurasi"><i class="fas fa-cog"></i>
												</button>
												<div class="dropdown-content">
													<a href="#" onclick="form_edit_karyawan('<?= $value->id_karyawan ?>')">Edit</a>
													<a href="#" onclick="nonaktifkan_karyawan('<?= $value->id_karyawan ?>')">Nonaktifkan</a>
												</div>
											</div>
										</div>
								</td>
								<td><?= $no++ ?></td>
								<td><?= $value->niup ?></td>
								<td><?= $value->nama ?></td>
								<td><?= $value->instansi ?></td>
								<td><?= $value->tgl_diangkat ?></td>
								<td><?= $value->tgl_berhenti ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				</div>
			</div>
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

	function detail_karyawan(id) {
		$.post('<?= site_url('Ckaryawan/detail_karyawan') ?>', {
			idkaryawan: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function tambah_data_karyawan() {
		$.post('<?= site_url('Ckaryawan/tambah_karyawan') ?>', function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function form_edit_karyawan(id) {
		$.post('<?= site_url('Ckaryawan/form_edit_karyawan') ?>', {
			idkaryawan: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function nonaktifkan_karyawan(id) {
		swal.fire({
			title: 'PDST NAA',
			text: "Apakah Anda Yakin menonaktifkan karyawan ini ?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Nonaktifkan',
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							url: 'Ckaryawan/nonaktifkan_karyawan',
							type: 'POST',
							data: {
								id: id
							},
							dataType: 'json'
						})
						.fail(function() {
							swal.fire({
								title: "PDST NAA",
								text: "Karyawan Sukses Dinonaktifkan",
								type: "success"
							}).then(okay => {
								if (okay) {
									karyawan();
								}
							});
						});
				});
			}
		});
	}
</script>