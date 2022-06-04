<div class="container-fluid">
	<div class="page-header">
		<div class="row">
			<div class="col-lg-6">
				<h3>Kamar</h3>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<a href="#" class="btn btn-sm btn-primary active" onclick="tambah_kamar()"><i class="fas fa-plus"></i> Tambah</a>
			<div class="card mt-2 p-2">
				<div class="table-responsive">
					<table id="example1" class="table">
						<thead>
							<tr>
								<th width="100">#</th>
								<th>NO</th>
								<th>NAMA KAMAR</th>
								<th>BLOCK</th>
								<th>WILAYAH</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($kamar as $value) { ?>
								<tr title="<?= $value->nama_kamar ?>">
									<td>
										<div class="dropdown-basic">
											<div class="dropdown">
												<button type="button" class="dropbtn btn-xs btn-primary active" title="Konfigurasi"><i class="fas fa-cog"></i>
												</button>
												<div class="dropdown-content">
													<a href="#" onclick="info('<?= $value->id_kamar ?>')">Atur Kamar</a>
													<a href="#" onclick="form_edit_kamar('<?= $value->id_kamar ?>')">Edit</a>
													<a href="Ckamar/cetak?id=<?= $value->id_kamar ?>" target="_blank">Cetak Data</a>
												</div>
											</div>
										</div>
									</td>
									<td><?= $no++ ?></td>
									<td><?= $value->nama_kamar ?></td>
									<td><?= $value->nama_blok ?></td>
									<td><?= $value->nama_wilayah ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



<section class="content">
	<div class="card">
		<div class="card-body table-responsive p-1">
			
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

	function tambah_kamar() {
		$.post('<?= site_url('Ckamar/tambah_kamar') ?>', function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function form_edit_kamar(id) {
		$.post('<?= site_url('Ckamar/form_edit_kamar') ?>', {
			idkamar: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function info(id) {
		$.post('<?= site_url('Ckamar/info') ?>', {
			idkamar: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}
</script>