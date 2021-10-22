<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Person Provinsi</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="" class="col-form-label">Pilih Provinsi</label>
					<select class="form-control provinsi select2" style="width: 100%;" name="prov" id="prov">
						<option value="">Pilih Provinsi</option>
						<?php
						foreach ($provinsi as $value) { ?>
							<option value="<?= $value->name ?>"><?= $value->name ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="card col-12">
				<div class="card-body">
					<table id="example1" class="table">
						<thead>
							<tr>
								<th>NO</th>
								<th>NAMA</th>
								<th>ALAMAT</th>
								<th>PROVINSI</th>
								<th>SEKOLAH</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no=1;
							foreach ($santri as $value) { ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->nama ?></td>
									<td><?= $value->alamat_lengkap ?></td>
									<td><?= $value->nama_provinsi ?></td>
									<td><?= $value->pndkn ?></td>
								</tr>
							<?php }	?>
						</tbody>
					</table>
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
	    function filterData () {
		    $('#example1').DataTable().search(
		        $('.provinsi').val()
		    	).draw();
		}
		$('.provinsi').on('change', function () {
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

