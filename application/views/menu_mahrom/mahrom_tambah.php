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
		<div class="card">
			<div class="card-body pb-4">
				<div class="row">
					<div class="col-md-3">
						Yang Termasuk Mahrom adalah :
						<ol>
							<li>Ayah</li>
							<li>Ibu</li>
							<li>Ayah Tiri</li>
							<li>Ibu Tiri</li>
							<li>Kakek (Dari Ayah)</li>
							<li>Nenek (Dari Ayah)</li>
							<li>Kakek (Dari Ibu)</li>
							<li>Nenek (Dari Ibu)</li>
							<li>Kakak Kandung</li>
							<li>Adik Kandung</li>
							<li>Keponakan</li>
							<li>Paman (Saudara Ayah)</li>
							<li>Bibi (Saudara Ayah)</li>
							<li>Paman (Saudara Ibu)</li>
							<li>Bibi (Saudara Ibu)</li>
						</ol>
					</div>
					<div class="col-md-9">
						<button type="button" id="btn-tambah" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalaAdd" data-backdrop="static">
							<i class="fas fa-plus"></i> Tambah Data
						</button>
						<table id="example1" class="table table-bordered">
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
			<div class="card-footer">
				<button type="button" class="btn btn-danger" onclick="batal('<?= $santri->id_person ?>')"><i class="fas fa-times"></i> Batal</button>
				<div class="float-right">
					<button type="button" onclick="kembali_lagi('<?= $santri->id_person ?>')" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</button>
					<button class="btn btn-info" id="simpan">Simpan <i class="fas fa-arrow-right"></i></button>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Tambah Mahrom</h3>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form class="form-horizontal" id="form_tambah_mahrom">
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

				<div class="modal-footer justify-content-between">
					<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
					<button type="button" class="btn btn-info" id="btn_simpan" onclick="simpan_mahrom()">Simpan</button>
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

	$(document).ready(function() {
		$('#btn_simpan').on('click', function() {
			$.ajax({
				url: "<?= site_url('Cperson/simpan_detail_mahrom') ?>",
				data: $('#form_tambah_mahrom').serialize(),
				type: 'POST',
				dataType: 'JSON',
				success: function(data) {
					if (data.pesan === "ya") {
						$('#ModalaAdd').modal('hide');
						swal.fire({
							title: "PDST NAA",
							text: data.sukses,
							type: "success"
						}).then(okay => {
							if (okay) {
								form_tambah_mahrom('<?= $santri->id_person ?>')
							}
						})
					}
				}
			});
		})
	})
</script>