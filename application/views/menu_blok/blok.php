<div class="container-fluid">
	<div class="page-header">
		<div class="row">
			<div class="col-lg-6">
				<h3>Block</h3>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<a href="#" class="btn btn-sm btn-primary active" onclick="tambah_blok()"><i class="fas fa-plus"></i> Tambah</a>
			<div class="card mt-2 p-2">
				<div class="table-responsive">
					<table id="example1" class="table">
						<thead>
							<tr>
								<th width="40">#</th>
								<th>NO</th>
								<th>NAMA BLOCK</th>
								<th>WILAYAH</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($blok as $value) {
								?>
								<tr>
									<td>
										<button class="btn btn-sm btn-primary active" title="Edit" onclick="form_edit_blok('<?= $value->id_blok ?>')"><i class="fas fa-edit"></i></button>
									</td>
									<td><?= $no++ ?></td>
									<td><?= $value->nama_blok ?></td>
									<td><?= $value->nama_wilayah ?></td>
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

		function tambah_blok() {
			$.post('<?= site_url('cblok/tambah_blok') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}

		function form_edit_blok(id) {
			$.post('<?= site_url('Cblok/form_edit_blok') ?>', {
				idblok: id
			}, function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
	</script>