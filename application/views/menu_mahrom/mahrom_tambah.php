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
						<button type="button" id="btn-tambah" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-xl" data-backdrop="static" data-keyboard="false">
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
										<td><?= $value->hubungan ?></td>
										<td>
											<button class="btn btn-sm btn-primary" id="btn-edit" data-id="<?= $value->id_mahrom ?>" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-edit"></i></button>
											<input type="hidden" class="nik_m" value="<?= $value->nik_m ?>">
											<input type="hidden" class="nama_m" value="<?= $value->nama_mahrom ?>">
											<input type="hidden" class="tanggal_m" value="<?= $value->tanggal_lahir ?>">
											<input type="hidden" class="hubungan" value="<?= $value->hubungan ?>">
											<input type="hidden" class="alamat" value="<?= $value->alamat_mahrom ?>">
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
<div class="modal fade xl" id="modal-xl" role="dialog" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<form id="form_tambah_mahrom">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><span id="judul_modal"></span></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
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
									<option value="Ayah">Ayah</option>
									<option value="Ibu">Ibu</option>
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
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="btn_simpan" onclick="simpan_mahrom()"><i class="fas fa-save"></i> Simpan</button>
				</div>
			</div>
		</form>
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