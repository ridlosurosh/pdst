<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Mahrom</h1>
			</div>
		</div>
		<div class="card-footer">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Data Pokok</a></li>
				<li class="breadcrumb-item active">Edit Mahrom</li>
			</ol>
		</div>
	</div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 offset-3 mt-4">
				<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">Edit Mahrom</h3>
					</div>
					<div class="card-body">
						<form class="form-horizontal" id="form_edit_mahrom">
							<input type="hidden" name="idmahrom" value="<?= $id_mahrom ?>">
							<div class="form-group row">
								<label for="nama_mahrom" class="col-form-label">Nama Mahrom</label>
								<input type="text" class="form-control" id="nama_mahrom" name="nama_mahrom" value="<?= $nama_mahrom ?>">
							</div>
							<div class="form-group row">
								<label for="hubungan" class="col-form-label">Hubungan</label>
								<input type="text" class="form-control" id="hubungan" name="hubungan" value="<?= $hubungan ?>">
							</div>
						</form>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-info" onclick="edit_mahrom()">Edit</button>
						<button type="submit" class="btn btn-default float-right">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	function edit_mahrom() {
		$.ajax({
			url: "<?= site_url('Cmahrom/edit_mahrom') ?>",
			data: $('#form_edit_mahrom').serialize(),
			type: 'POST',
			dataType: 'JSON',
			success: function(data) {
				if (data.pesan === "sukses") {
					alert('Data berhasil diedit !');
					menu_mahrom();
				}
			}
		});
	}
</script>