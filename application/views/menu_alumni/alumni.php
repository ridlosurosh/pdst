<div class="container-fluid">
	<div class="page-header">
		<div class="row">
			<div class="col-lg-6">
				<h3>Alumni</h3>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card mt-2 p-2">
				<div class="table-responsive">
					<table id="example1" class="table">
						<thead>
							<tr>
								<th width="40">#</th>
								<th>NO</th>
								<th>NIUP</th>
								<th>NAMA</th>
								<th>ALAMAT</th>
								<th>TANGGAL KELUAR</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($alumni as $value) { ?>
								<tr>
									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-sm btn-primary" title="Detail" onclick="detail_alumni('<?= $value->id_person ?>')">
												<i class="fas fa-info-circle"></i>
											</button>
										</div>
									</td>
									<td><?= $no++ ?></td>
									<td><?= $value->niup ?></td>
									<td><?= $value->nama ?></td>
									<td><?= $value->alamat_lengkap ?></td>
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

	function detail_alumni(id) {
		$.post('<?= site_url('Calumni/detail_santri') ?>', {
			idperson: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function tambah_alumni() {
		$.post('<?= site_url('Calumni/tambah_alumni') ?>', function(Res) {
			$('#ini_isinya').html(Res);
		});
	}
</script>