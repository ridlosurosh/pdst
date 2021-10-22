<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Struktural</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="card">
		<!-- /.card-header -->
		<div class="card-body table-responsive p-1">
			<table id="example1" class="table table-hover text-nowrap">
				<h3 class="card-title"><a class="btn btn-sm btn-block bg-teal" href="#" onclick="tambah_jabatan()"><i class="fas fa-plus"></i> Tambah Data</a></h3>
				<thead>
					<tr>
						<th>NO</th>
						<th>NAMA JABATAN</th>
						<th>TAHUN DIADAKAN</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($jabatan as $value) { ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $value->nm_jabatan ?></td>
							<td><?= $value->thn_dibuat ?></td>
							<td>
								<button class="btn btn-sm btn-warning" title="Edit" onclick="form_edit_jabatan('<?= $value->id_jabatan ?>')"><i class="fas fa-edit"></i></button>
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

	function tambah_jabatan() {
		$.post('<?= site_url('Cjabatan/tambah_jabatan') ?>', function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function form_edit_jabatan(id) {
		$.post('<?= site_url('Cjabatan/form_edit_jabatan') ?>', {
			idjabatan: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}
</script>