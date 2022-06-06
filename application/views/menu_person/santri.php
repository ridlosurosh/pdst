<div class="container-fluid">
	<div class="page-header">
		<div class="row">
			<div class="col-lg-6">
				<h3>Santri</h3>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<a class="btn btn-sm btn-primary active" id="tambah_santri" data="0" href="#" onclick="tambah_santri()"><i class="fas fa-plus "></i> Tambah</a>
			<div class="card mt-2 p-2">
				<table id="example1" class="table">
					<thead>
						<tr>
							<th width="100">#</th>
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
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
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