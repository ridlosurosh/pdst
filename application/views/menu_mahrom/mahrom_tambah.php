<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Data Mahrom Untuk Ananda <span class="text-danger"><?= $santri->nama ?></span></h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container-fluid">
		<input type="text" id="idnya" value="<?= $santri->id_person ?>">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header p-1">
						<button type="button" id="btn-tambah" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalaAdd" data-backdrop="static">
							<i class="fas fa-plus"></i> Tambah Data
						</button>
					</div>
					<div class="card-body p-1">
						<table id="example1" class="table">
							<thead>
								<tr>
									<th>NO</th>
									<th>NIK</th>
									<th>NAMA MAHROM</th>
									<th>TANGGAL LAHIR</th>
									<th>HUBUNGAN</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($mahrom as $value) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $value->nik_m ?></td>
										<td><?= $value->nama_mahrom ?></td>
										<td><?= $value->tanggal_lahir ?></td>
										<td><?= $mahrom = $value->hubungan ?></td>
										<?php if ($mahrom == "Ayah") {
											$tombol = '';
										} elseif ($mahrom == "Ibu") {
											$tombol = '';
										} else {
											$tombol = '<button class="btn btn-sm btn-primary" id="btn-edit" data-id="<?= $value->id_mahrom ?>" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-edit"></i></button>';
										} ?>
										<td>
											<?= $tombol ?>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">Tambah Mahrom</h3>
			</div>
			<form class="form-horizontal">
				<div class="modal-body">
					<input type="text" name="id_person" id="idperson" value="<?= $santri->id_person ?>">
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label for="nik">NIK</label>
								<input type="number" class="form-control" id="nik" name="nik" autocomplete="off" placeholder="Isi Dengan Angka">
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label for="nama">NAMA MAHROM</label>
								<input type="text" autocomplete="off" class="form-control" id="nama" name="nama" placeholder="Nama Mahrom">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="hubungan">HUBUNGAN</label>
								<select name="hubungan" id="hubungan_m" class="form-control">
									<option value="">-Pilih Hubungan-</option>
									<option value="Ayah Tiri">Ayah Tiri</option>
									<option value="Ibu Tiri">Ibu Tiri</option>
									<option value="Kakek(Dari Ayah)">Kakek(Dari Ayah)</option>
									<option value="Kakek(Dari Ibu)">Kakek(Dari Ibu)</option>
									<option value="Nenek(Dari Ayah)">Nenek(Dari Ayah)</option>
									<option value="Nenek(Dari Ibu)">Nenek(Dari Ibu)</option>
									<option value="Kakak Kandung">Kakak Kandung</option>
									<option value="Adik Kandung">Adik Kandung</option>
									<option value="Keponakan">Keponakan</option>
									<option value="Paman(Saudara Ayah)">Paman(Saudara Ayah)</option>
									<option value="Paman(Saudara Ibu)">Paman(Saudara Ibu)</option>
									<option value="Bibi(Saudari Ayah)">Bibi(Saudari Ayah)</option>
									<option value="Bibi(Saudari Ibu)">Bibi(Saudari Ibu)</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-10">
							<div class="form-group">
								<label for="alamat">ALAMAT LENGKAP SESUAI KTP</label>
								<textarea name="alamat" id="alamat_m" class="form-control"></textarea>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="tanggal">TANGGAL LAHIR</label>
								<input type="date" name="tanggal" id="tanggal_m" class="form-control">
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
					<button class="btn btn-info" id="btn_simpan">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#example1").DataTable({
			"paging": true,
			"lengthChange": false,
			"ordering": false,
			"searching": false,
			"info": false,
			"autoWidth": true,
		});
		$('#Modal-xl').modal({
			backdrop: 'static',
			keyboard: false
		})
	});

	function simpan_mahrom() {
		$.ajax({
			url: "<?= site_url('Cperson/simpan_detail_mahrom') ?>",
			data: $('#form_tambah_mahrom').serialize(),
			type: 'POST',
			dataType: 'JSON',
			success: function(data) {
				$('#Modal-xl').modal('hide');
				form_tambah_mahrom('<?= $santri->id_person ?>')
			}
		});
	}
</script>