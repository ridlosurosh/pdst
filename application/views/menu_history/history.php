<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Penempatan Kamar</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="card">
		<div class="card-body table-responsive p-1">
			<table id="example1" class="table table-hover text-nowrap">
				<!-- <h3 class="card-title"><a class="btn btn-sm btn-block bg-teal" href="#" onclick="tambah_history()"><i class="fas fa-plus"></i> Tambah Data</a></h3> -->
				<thead>
					<tr>
						<th>NO</th>
						<th>NAMA</th>
						<th>KAMAR</th>
						<th>BLOCK</th>
						<th>WILAYAH</th>
						<th>TANGGAL PENETAPAN</th>
						<th>STATUS</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($history as $value) { ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $value->nama ?></td>
							<td><?= $value->nama_kamar ?></td>
							<td><?= $value->nama_blok ?></td>
							<td><?= $value->nama_wilayah ?></td>
							<td><?= date('d-M-Y', strtotime($value->tgl_penetapan))  ?></td>
							<?php
							if ($value->aktif == 'Ya') {
								$st = "<span class='badge bg-primary'>Aktif</span>";
							} else {
								$st = "Tidak Aktif";
							}
							?>
							<td><?= $st ?></td>
							<td>
								<button class="btn btn-sm bg-teal" onclick="form_edit_history('<?= $value->id_history ?>')"><i class="fas fa-people-carry"></i> Pindahkan</button>
								<!-- <button class="btn btn-sm btn-danger" onclick=""><i class="fas fa-trash-alt"></i> Nonaktifkan</button> -->
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

	function form_edit_history(id) {
		$.post('<?= site_url('Chistory/form_edit_history') ?>', {
			idhistory: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}
</script>