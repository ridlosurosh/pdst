<style>
#toggle{
    position: absolute;
    top: 320px;
    right: 20px;
    transform: translateY(-50%);
    width: 30px;
    height: 30px;
    background: url(plugin/dist/img/show.png);
    background-size: cover;
    cursor: pointer;
}
#toggle.hide{
    background: url(plugin/dist/img/hide.png);
    background-size: cover;
}
</style>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Pengurus</h1>
			</div>
		</div>
	</div>
</section>
<section class="content mt-2">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card card-outline card-teal">
					<div class="card-header">
						<h3 class="card-title"></h3>
					</div>
					<div class="card-body">
						<form role="form" id="form_tambah_pengurus">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-form-label" for="nama_pengajar">Pilih Nama Pengurus</label>
										<input type="text" class="form-control" name="nama_pengajar" id="nama_santri" placeholder="nama" style="width: 100%;" autocomplete="off">
										<input type="hidden" name="idperson" id="idperson">
									</div>
									<div class="form-group">
										<label for="jabatan" class="col-form-label">Jabatan</label>
										<select name="jabatan" id="jabatan" class="form-control select2" style="width: 100%;">
											<?php foreach ($jabatan as $value) { ?>
												<option value="<?= $value->id_jabatan ?>"><?= $value->nm_jabatan ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="tanggal" class="col-form-label">Tanggal Pengangkatan</label>
										<input type="date" name="tanggal_diangkat" class="form-control" id="pengangkatan">
									</div>
									<div class="form-group">
										<label for="tanggal" class="col-form-label">Masa Bakti</label>
										<select class="form-control" name="" id="angkat">
											<option selected hidden>Pilih Masa Bakti</option>
											<option value="365">1 Tahun</option>
											<option value="730">2 Tahun</option>
											<option value="1095">3 Tahun</option>
											<option value="1460">4 Tahun</option>
											<option value="1825">5 Tahun</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="tanggal" class="col-form-label">Tanggal Berhenti</label>
										<input type="text" name="tanggal_berhenti" class="form-control" id="berhenti" readonly>
									</div>
									<div class="form-group">
										<label for="nama" class="col-form-label">Nama Pengguna</label>
										<input type="text" class="form-control" name="nama" id="namanya" placeholder="Masukkan Nama Akun Disini" readonly>
									</div>
									<div class="form-group">
										<label for="username" class="col-form-label">Username</label>
										<input type="text" class="form-control" name="username" id="username" placeholder="No Space" autocomplete="off">
									</div>
									<div class="form-group">
										<label for="pass" class="col-form-label">Password</label>
										<input type="password" class="form-control" name="pass" id="password">
										<div id="toggle" onclick="showHide();"></div>
									</div>
									<script>
										 var password = document.getElementById('password');
										var toggle = document.getElementById('toggle');
										
										function showHide(){
											if(password.type === 'password'){
												password.setAttribute('type', 'text');
												toggle.classList.add('hide')
											} else{
												password.setAttribute('type', 'password');
												toggle.classList.remove('hide')
											}
										}
									</script>
								</div>
							</div>

						</form>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-sm btn-default" onclick="menu_koordinator()">Keluar</button>
						<button type="submit" class="btn btn-sm bg-teal  float-right" onclick="simpan_koordinator();"><i class="fas fa-save"></i> Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(function() {
		$('#reservation').daterangepicker();

		$('#nama_santri').on('input', function() {
            UI_Nama_Santri();
            $("#namanya").val("");
        });
		var i = $('#reservation').val();
	});


	function UI_Nama_Santri() {
        $('#nama_santri').autocomplete({
            minLength: 1,
            autoFocus: true,
            source: function(req, res) {
                $.ajax({
                    url: "<?= site_url('Ckoordinator/ui_nama_santri') ?>",
                    data: {
                        cari: $('#nama_santri').val()
                    },
                    dataType: 'json',
                    type: "POST",
                    success: function(data) {
                        res(data);
                    }
                });
            },
            select: function(event, ui) {
                if (ui.item.sukses === true) {
                    $('#idperson').val(ui.item.id_person);
                    $('#nama_santri').val(ui.item.nama);
                    $('#namanya').val(ui.item.nama);
                    return false;
                } else {
                    return false;
                }
            },
            create: function() {
                $(this).data('ui-autocomplete')._renderItem = function(ul, item) {
                    return $("<li></li>")
                        .data("item.autocomplete", item)
                        .append("<a class='nav-link active'><strong>" + item.nama + "</strong> <br/><small>Niup : " + item.niup + "</small></a>")
                        .appendTo(ul);
                };
            }
        });
    }

	$('#angkat').on('change', function() {
		var ll = $(this).val();
		var bb = $('#pengangkatan').val();
		var date = new Date(bb);

		date.setDate(date.getDate() + (+ll));

		var dd = date.getDate();
		var mm = date.getMonth() + 1;
		var y = date.getFullYear();
		var someFormattedDate = y + '-' + mm + '-' + dd;

		$('#berhenti').val(someFormattedDate);

	})

	// untuk menyimpan data
	function simpan_koordinator() {
		$.ajax({
			url: "<?= site_url('Ckoordinator/simpan_koordinator') ?>",
			data: $('#form_tambah_pengurus').serialize(),
			type: 'POST',
			dataType: 'JSON',
			success: function(data, textStatus, jqXHR) {
				if (data.pesan === "ya") {
					swal.fire({
						title: "PDST NAA",
						text: data.sukses,
						type: "success"
					}).then(okay => {
						if (okay) {
							menu_koordinator();
						}
					});
				}
			}
		})
	}

	$(function() {
		$('.select2').select2({
			theme: 'bootstrap4'
		})
	})
</script>