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
	<div class="card">
		<div class="card-body table-responsive p-1">
			<table id="example1" class="table table-hover text-nowrap ">
				<h3 class="card-title"><a class="btn btn-sm btn-block bg-teal" href="#" onclick="tambah_pengurus()"><i class="fas fa-plus"></i> Tambah Data</a></h3>
				<thead>
					<tr>
						<th>NO</th>
						<th>NIUP</th>
						<th>NAMA</th>
						<th>JABATAN</th>
						<th>MASA BAKTI</th>
						<th>STATUS</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($pengurus as $value) { ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $value->niup ?></td>
							<td><?= $value->nama ?></td>
							<td><?= $value->nm_jabatan ?></td>
							<td><?= $value->masa_bakti ?></td>
							<?php
							if ($value->status == 'aktif') {
								$st = "<span class='badge bg-primary'>Aktif</span>";
							} else {
								$st = "<span class='badge bg-danger'>Tidak Aktif</span>";
							}
							?>
							<td><?= $st ?></td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-sm btn-info" title="Info" onclick="detail_koordinator('<?= $value->id_pengurus ?>')">
										<i class="fas fa-info-circle"></i>
									</button>
									<button type="button" class="btn btn-sm btn-warning" title="Edit" onclick="form_edit_koordinator('<?= $value->id_pengurus ?>')">
										<i class="fas fa-edit"></i>
									</button>
									<button type="button" class="btn btn-sm btn-danger" title="Nonaktifkan" onclick="nonaktifkan('<?= $value->id_pengurus ?>')">
										<i class="fas fa-user-slash"></i>
									</button>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
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

	function tambah_pengurus() {
		$.post('<?= site_url('Ckoordinator/tambah_koordinator') ?>', function(Res) {
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

	function nonaktifkan(id) {
		swal.fire({
			title: 'PDST NAA',
			text: "Anda Yakin menonaktifkan pengurus ini ?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Nonaktifkan',
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							url: 'Ckoordinator/nonaktifkan_koordinator',
							type: 'POST',
							data: {
								id: id
							},
							dataType: 'json'
						})
						.fail(function() {
							swal.fire({
								title: "PDST NAA",
								text: "Pengurus Sukses Dinonaktifkan",
								type: "success"
							}).then(okay => {
								if (okay) {
									menu_koordinator();
								}
							});
						});
				});
			}
		});
	}
</script>