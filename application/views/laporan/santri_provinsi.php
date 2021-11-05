<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">

			</div>
		</div>
	</div>
</section>
<section class="content mt-4">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12" id="accordion">
				<div class="card card-primary card-outline">
					<a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
						<div class="card-header">
							<h4 class="card-title w-100">
								1. Cetak Person Setiap Provinsi
							</h4>
						</div>
					</a>
					<div id="collapseOne" class="collapse" data-parent="#accordion">
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-6">
									<label for="">PILIH SANTRI</label>
									<select name="" id="jenkel" class="form-control">
										<option hidden value="0">-Pilih Santri-</option>
										<option value="Laki-Laki">Santri Putra</option>
										<option value="Perempuan">Santri Putri</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="">PILIH PROVINSI</label>
									<select name="" id="prov" class="form-control select2">
										<option>-Pilih Provinsi-</option>
										<?php foreach ($provinsi as $key => $value) { ?>
											<option value="<?= $value->id ?>"><?= $value->name ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<!-- <a href="<?= site_url('Cexport/pdf_putri') ?>" target="_blank" class="btn btn-danger">coba</a> -->
							<button class="btn btn-sm btn-primary offset-5" id="bt_cetak"><i class="fas fa-print"></i> Cetak</button>
							<script>
								$(document).ready(function() {
									$('#bt_cetak').on('click', function() {
										var jenkel = $('#jenkel').val()
										if (jenkel == 0) {
											swal.fire({
												title: "PDST NAA",
												text: "Anda Belum Memilih Santri",
												type: "warning"
											})
										} else {
											var provinsi = $('#prov').val()
											$.ajax({
												type: "POST",
												url: "<?= site_url('Cexport/cek') ?>",
												data: {
													prov: provinsi
												},
												// dataType: "JSON",
												success: function(hasil) {
													// if (hasil.i == '2') {
													// 	swal.fire({
													// 		title: "PDSTNAA",
													// 		text: "Tidak Ada Santri",
													// 		type: "warning"
													// 	})
													// } else {
													window.open("Cexport/pdf_provinsi?id=" + provinsi + "&jenis=" + jenkel, '_blank');
													// window.location.href = ;

													// }
												}
											})
										}
									})
								})
							</script>
						</div>
					</div>
				</div>
				<div class="card card-primary card-outline">
					<a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
						<div class="card-header">
							<h4 class="card-title w-100">
								2. Aenean massa
							</h4>
						</div>
					</a>
					<div id="collapseTwo" class="collapse" data-parent="#accordion">
						<div class="card-body">
							Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	$(document).ready(function() {
		$('#example1').DataTable({
			"responsive": true,
			"lengthChange": true,
			"autoWidth": false,
			"buttons": ["excel", "pdf", "print"],
			"paging": true,
			"searching": true,
			"ordering": false,
			"info": true,
			"responsive": true,
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

		function filterData() {
			$('#example1').DataTable().search(
				$('.provinsi').val()
			).draw();
		}
		$('.provinsi').on('change', function() {
			filterData();
		});
	});

	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2({
			theme: 'bootstrap4'
		})
	})
</script>