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
			<div class="card-body p-2">
				<h3 class="card-title"><a class="btn btn-block btn-sm bg-teal btn-circle" id="tambah_santri" data="0" href="#" onclick="tambah_santri()"><i class="fas fa-plus "></i> Tambah Data</a></h3>
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
<<<<<<< HEAD
						<?php
						$no = 1;
						foreach ($santri as $value) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $value->niup ?></td>
								<td><?= $value->nama ?></td>
								<td><?= $value->alamat_lengkap ?></td>
								<td>
									<?php
									if ($value->qr_code_niup != null) {
										$qr_code = "gambar/qr_code/".$value->qr_code_niup;
									} else {
										$qr_code = "plugin/dist/img/naa_logo.jpg";
									}
									?>
                                    <img src="<?= site_url() ?><?= $qr_code?>" id="gambar_foto" width="50" alt="Preview Gambar">
								</td>
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
										<button type="button" class="btn btn-sm btn-secondary" title="Cetak" onclick="print_santri('<?= $value->id_person ?>')">
											<i class="fas fa-print"></i>
										</button>
										<button type="button" class="btn btn-sm btn-danger" title="Hapus" onclick="nonaktifkan_santri('<?= $value->id_person ?>')">
											<i class="fas fa-user-slash"></i>
										</button>
										<!-- <button type="button" class="btn btn-sm btn-danger" title="Hapus" onclick="hapus_santri('<?= $value->id_person ?>')">
											<i class="fas fa-trash"></i>
										</button> -->
									</div>
								</td>
							</tr>
						<?php } ?>
=======

>>>>>>> fb463b83391e6f2da22a8af6fb078d4bfaee3ba1
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<script>
	var table;
	$(document).ready(function() {
		table = $('#example1').DataTable({ 

            "processing": true, 
            "serverSide": true, 
            "order": [], 
			"ordering":false,
			"info":false,
			"lengthChange": false,
            
            "ajax": {
                "url": "<?php echo site_url('Cperson/get_data_person')?>",
                "type": "POST"
            },

            
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],

        });

		table = $('#example1').on("click", "#bt-detail", function () {
            var id = $(this).attr("data");
			$.post('<?= site_url('Cperson/detail_santri') ?>', {
			idperson: id
			}, function(Res) {
				$('#ini_isinya').html(Res);
			});
		})

		table = $('#example1').on("click", "#bt-edit", function () {
            var id = $(this).attr("data");
			$.post('<?= site_url('Cperson/form_edit_santri') ?>', {
			o: id
			}, function(Res) {
				$('#ini_isinya').html(Res);
			});
		})

		table = $('#example1').on("click", "#bt-berkas", function () {
            var id = $(this).attr("data");
			$.post('<?= site_url('Cperson/berkas') ?>', {
			idperson: id
			}, function(Res) {
				$('#ini_isinya').html(Res);
			});
		})

		table = $('#example1').on("click", "#bt-print", function () {
            var id = $(this).attr("data");
			$.post('<?= site_url('Cperson/print_santri') ?>', {
			idperson: id
			}, function(Res) {
				$('#ini_isinya').html(Res);
			});
		})

		table = $('#example1').on("click", "#bt-hapus", function () {
            var id = $(this).attr("data");
			swal.fire({
			title: 'PDST NAA',
			text: "Anda Yakin Untuk Menghapus Santri Ini ?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'YA',
			cancelButtonText: 'TIDAK',
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							url: 'Cperson/nonaktif',
							type: 'POST',
							data: {
								id: id
							},
							dataType: 'json'
						})
						.fail(function() {
							swal.fire({
								title: "PDST NAA",
								text: "Berhasil dihapus",
								type: "success"
							}).then(okay => {
								if (okay) {
									menu_santri();
								}
							});
						});
				});
			}
		});
		})

	})

	function tambah_santri() {
		var id = $('#tambah_santri').attr('data')
		$.ajax({
			url: "<?= site_url('Cperson/simpan_santri') ?>",
			data: {
				id: id
			},
			type: 'POST',
			dataType: 'JSON',
			success: function(data) {
				var o = data.i;
				$.post('<?= site_url('Cperson/tambah_santri_1') ?>', {
					o: o
				}, function(Res) {

					$('#ini_isinya').html(Res);
				});
			}
		});
	}

	// function hapus_santri(id) {
	// 	swal.fire({
	// 		title: 'PDST NAA',
	// 		text: "Anda Yakin Untuk Menghapus Santri Ini ?",
	// 		type: 'warning',
	// 		showCancelButton: true,
	// 		confirmButtonColor: '#3085d6',
	// 		cancelButtonColor: '#d33',
	// 		confirmButtonText: 'YA',
	// 		cancelButtonText: 'TIDAK',
	// 		preConfirm: function() {
	// 			return new Promise(function(resolve) {
	// 				$.ajax({
	// 						url: 'Cperson/hapus_santri',
	// 						type: 'POST',
	// 						data: {
	// 							id: id
	// 						},
	// 						dataType: 'json'
	// 					})
	// 					.fail(function() {
	// 						swal.fire({
	// 							title: "PDST NAA",
	// 							text: "Berhasil dihapus",
	// 							type: "success"
	// 						}).then(okay => {
	// 							if (okay) {
	// 								menu_santri();
	// 							}
	// 						});
	// 					});
	// 			});
	// 		}
	// 	});
	// }
</script>