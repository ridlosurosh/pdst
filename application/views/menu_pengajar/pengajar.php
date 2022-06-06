<div class="container-fluid">
	<div class="page-header">
		<div class="row">
			<div class="col-lg-6">
				<h3>Pengajar</h3>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<a href="#" class="btn btn-sm btn-primary active" onclick="tambah_pengajar_nubdah()"><i class="fas fa-plus"></i> Tambah</a>
			<div class="card mt-2 p-2">
				<div class="table-responsive">
					<table id="example1" class="table">
						<thead>
							<tr>
								<th width="100">#</th>
								<th>NO</th>
								<th>NIUP</th>
								<th>NAMA</th>
								<th>ALAMAT</th>
								<th>TGL DIANGKAT</th>
								<th>STATUS</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($pengajar as $value) { ?>
								<tr>
									<td>
										<div class="dropdown-basic">
											<div class="dropdown">
												<button type="button" class="dropbtn btn-xs btn-primary active" title="Konfigurasi"><i class="fas fa-cog"></i>
												</button>
												<div class="dropdown-content">
													<a href="#" onclick="detail_pengajar('<?= $value->id_person ?>')">Detail</a>
													<a href="#" onclick="form_edit_pengajar('<?= $value->id_guru_nubdah ?>')">Edit</a>
													<a href="#" onclick="nonaktifkan_pengajar('<?= $value->id_guru_nubdah ?>','<?= date('Y-m-d') ?>')">Nonaktifkan</a>
												</div>
											</div>
										</div>
									</td>
									<td><?= $no++ ?></td>
									<td><?= $value->niup ?></td>
									<td><?= $value->nama ?></td>
									<td><?= $value->alamat_lengkap ?></td>
									<td><?= $value->tgl_diangkat ?></td>
									<?php
									if ($value->status_guru_nubdah == 'Aktif') {
										$st = "<span class='badge bg-primary'>Aktif</span>";
									} else {
										$st = "<span class='badge bg-danger'>Tidak Aktif</span>";
									}
									?>
									<td><?= $st ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
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

		function detail_pengajar(id) {
			$.post('<?= site_url('Cpengajar/detail_santri') ?>', {
				idperson: id
			}, function(Res) {
				$('#ini_isinya').html(Res);
			});
		}

		function tambah_pengajar_nubdah() {
			$.post('<?= site_url('Cpengajar/tambah_pengajar_nubdah') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}

		function form_edit_pengajar(id) {
			$.post('<?= site_url('Cpengajar/form_edit_pengajar') ?>', {
				idpengajar: id
			}, function(Res) {
				$('#ini_isinya').html(Res);
			});
		}

		function nonaktifkan_pengajar(id, tgl) {
			swal.fire({
				title: 'PDST NAA',
				text: "Apakah Anda Yakin menonaktifkan pengajar ini ?",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Nonaktifkan',
				preConfirm: function() {
					return new Promise(function(resolve) {
						$.ajax({
							url: 'Cpengajar/nonaktifkan_pengajar',
							type: 'POST',
							data: {
								id: id,
								tgl_berhenti: tgl
							},
							dataType: 'json'
						})
						.fail(function() {
							swal.fire({
								title: "PDST NAA",
								text: "Pengajar Dinonaktifkan",
								type: "success"
							}).then(okay => {
								if (okay) {
									menu_pengajar();
								}
							});
						});
					});
				}
			});
		}
	</script>