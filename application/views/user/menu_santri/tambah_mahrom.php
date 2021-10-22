<div class="content-header">
    <div class="container">
        <div class="row mt-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Santri</h1>
            </div>
        </div>
    </div>
</div>

<section class="content mt-4">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="card card-outline card-teal">
					<div class="card-header">
						<h3 class="card-title">
							Silakan tambahkan data mahrom
						</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<h5>Hubungan Mahrom</h5>
								<ol>
									<li>Ayah</li>
									<li>Ibu</li>
									<li>Kakek (dari Ayah)</li>
									<li>Nenek (dari Ayah)</li>
									<li>Kakek (dari Ibu)</li>
									<li>Nenek (dari Ibu)</li>
									<li>Ayah tiri</li>
									<li>Ibu tiri</li>
									<li>Ibu susuan</li>
									<li>Kakak Kandung</li>
									<li>Adik Kandung</li>
									<li>Kakak susuan</li>
									<li>Adik susuan</li>
									<li>Keponakan</li>
									<li>Paman (Saudara Ayah)</li>
									<li>Bibi (Saudara Ayah)</li>
									<li>Paman (Saudara Ibu)</li>
									<li>Bibi (Saudara Ibu)</li>
								</ol>
							</div>
							<div class="col-md-8">
								<div class="card">
									<div class="card-header">
										<div class="card-tools">
											<a href="#" class="btn btn-xs bg-teal" onclick="tambah_baris_mahrom();">Tambah Baris</a>
										</div>
									</div>
									<div class="card-body p-0">
										<form id="barisan_mahrom">
											<table class="table">
												<thead>
													<tr>
														<th>NO</th>
														<th class="text-center">NAMA MAHROM</th>
														<th class="text-center">HUBUNGAN</th>
													</tr>
												</thead>
												<tbody class="barisan_mahrom">
													<input type="hidden" name="person" id="id_person" value="<?= $idx ?>">
													<input type="hidden" class="nomor_urut" name="nomor_urut" value="1">
													<tr>
														<td>1<input type="hidden" name="person[]" id="id_person" value="<?= $idx ?>"></td>
														<td>
															<input type="text" class="form-control" name="mahrom[]" id="mahrom1">
														</td>
														<td>
															<select name="hubungan[]" id="hubungan" class="form-control select2" style="width: 100%;">
																<option disabled selected hidden>Pilih Status Mahrom</option>
																<option>Ayah</option>
																<option>Ibu</option>
																<option>Ayah Tiri</option>
																<option>Ibu Tiri</option>
																<option>kakek(dari ayah)</option>
																<option>kakek(dari ibu)</option>
																<option>nenek(dari ayah)</option>
																<option>nenek(dari ibu)</option>
																<option>ibu(susuan) </option>
																<option>kakak kandung</option>
																<option>adik kandung</option>
																<option>keponakan</option>
																<option>kakak(susuan)</option>
																<option>adik(susuan)</option>
																<option>paman(saudara ayah)</option>
																<option>paman(saudara ibu)</option>
																<option>bibi(sauadari ayah) </option>
																<option>bibi(saudari ibu)</option>
															</select>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<a href="#" class="btn btn-sm btn-default" onclick="menu_santri()">Keluar</a>
						<a href="#" class="btn btn-sm btn-primary float-right" onclick="simpan_mahromnya()"><i class="fas fa-save"></i> Simpan</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2({
			theme: 'bootstrap4'
		})
	})

	function tambah_baris_mahrom() {
		nu = parseFloat($('.nomor_urut').val());
		nomor_selanjutnya = Math.round(nu + 1);
		$('.nomor_urut').val(nomor_selanjutnya);
		$('.barisan_mahrom').append('<tr>\n\
										<td>' + nomor_selanjutnya + '<input type="hidden" name="person[]" id="id_person" value="<?= $idx ?>"></td>\n\
										<td><input type="text" class="form-control" name="mahrom[]" id="mahrom1"></td>\n\
										<td >\n\
                                            <select class="form-control select2" name="hubungan[]" id="hubungan" style="width: 100%;">\n\
                                                <option disabled selected hidden>Pilih Status Mahrom</option>\n\
                                                <option>Ayah Tiri</option>\n\
                                                <option>Ibu Tiri</option>\n\
                                                <option>kakek(dari ayah)</option>\n\
                                                <option>kakek(dari ibu)</option>\n\
                                                <option>nenek(dari ayah)</option>\n\
                                                <option>nenek(dari ibu)</option>\n\
                                                <option>ibu(susuan) </option>\n\
                                                <option>kakak kandung</option>\n\
                                                <option>adik kandung</option>\n\
                                                <option>keponakan</option>\n\
                                                <option>kakak(susuan)</option>\n\
                                                <option>adik(susuan)</option>\n\
                                                <option>paman(saudara ayah)</option>\n\
                                                <option>paman(saudara ibu)</option>\n\
                                                <option>bibi(sauadari ayah) </option>\n\
                                                <option>bibi(saudari ibu)</option>\n\
                                            </select></td>\n\
									</tr>');
	}

	function simpan_mahromnya() {
		$.ajax({
			url: "<?= site_url('Csantri/simpan_detail_mahrom') ?>",
			data: $("#barisan_mahrom").serialize(),
			type: 'POST',
			dataType: 'JSON',
			success: function(data) {
				if (data.pesan === "sukses") {
					swal.fire({
						title: "PDST NAA",
						text: "Data Mahrom Berhasil Ditambahkan",
						type: "success"
					}).then(okay => {
						if (okay) {
							menu_santri()
						}
					})
					
				}
			}
		});
	}
</script>