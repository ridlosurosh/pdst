<div class="content-header">
    <div class="container">
        <div class="row mt-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Santri</h1>
            </div>
            <div class="col-sm-6 ">
                <div class="float-right">
                    <div class="btn-group">
                        <a type="button" class="btn btn-sm bg-teal dropdown-icon" data-toggle="dropdown">Pdf
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="<?= site_url('Cexport/semua_santri_pdf') ?>">Semua Santri</a>
                                <a class="dropdown-item" href="<?= site_url('Cexport/pdf_putra') ?>">Santri Putra</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= site_url('Cexport/pdf_putri') ?>">Santri Putri</a>
                            </div>
                        </a>
                    </div>
                    <div class="btn-group">
                        <a type="button" class="btn btn-sm bg-teal dropdown-icon" data-toggle="dropdown">Excel
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="<?= site_url('Csantri/export_excel') ?>">Semua Santri</a>
                                <a class="dropdown-item" href="<?= site_url('Csantri/excel_putra') ?>">Santri Putra</a>
                                <a class="dropdown-item" href="<?= site_url('Csantri/excel_putri') ?>">Santri Putri</a>
                            </div>
                        </a>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-primary text-white" onclick="tambah_santri()"><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="container">
        <div class="row">
           <div class="col-12">
            <table class="table" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIUP</th>
                        <th>NAMA</th>
                        <th>ALAMAT</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    foreach ($santri as $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->niup ?></td>
                            <td><?= $value->nama ?></td>
                            <td><?= $value->alamat_lengkap ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">Opsi
                                        <span class="sr-only">Toggle Dropdown</span>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#" onclick="detail_santri('<?= $value->id_person ?>')">Detail</a>
                                            <a class="dropdown-item" href="#" onclick="form_edit_santri('<?= $value->id_person ?>')">Edit</a>
                                            <a class="dropdown-item" href="#" onclick="berkas('<?= $value->id_person ?>')">Upload Berkas</a>
                                            <a class="dropdown-item" href="#" onclick="form_tambah_mahrom('<?= $value->id_person ?>')">Tambah Mahrom</a>
                                            <a class="dropdown-item" href="#" onclick="print_santri('<?= $value->id_person ?>')">Cetak Formulir</a>
                                        </div>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
    $(function() {
        $("#example1").DataTable({
            "paging": true,
            "lengthChange": true,
            "ordering": false,
            "searching": true,
            "info": true,
            "autoWidth": true,
        });
        $('#example2').DataTable();
    });

    function tambah_santri() {
        $.post('<?= site_url('Csantri/menu_tambah_santri') ?>', function(Res) {
            $('#isi_content').html(Res);
        });
    }

    function form_tambah_mahrom(id) {
        $.post('<?= site_url('Csantri/form_tambah_mahrom') ?>', {
            idperson: id
        }, function(Res) {
            $('#isi_content').html(Res);
        });
    }

    function berkas(id) {
        $.post('<?= site_url('Csantri/berkas') ?>', {
            idperson: id
        }, function(Res) {
            $('#isi_content').html(Res);
        });
    }

    function form_edit_santri(id) {
        $.post('<?= site_url('Csantri/form_edit_santri') ?>', {
            idperson: id
        }, function(Res) {
            $('#isi_content').html(Res);
        });
    }

    function detail_santri(id) {
        $.post('<?= site_url('Csantri/detail_santri') ?>', {
            idperson: id
        }, function(Res) {
            $('#isi_content').html(Res);
        });
    }

    function print_santri(id) {
        $.post('<?= site_url('Csantri/print_santri') ?>', {
            idperson: id
        }, function(Res) {
            $('#isi_content').html(Res);
            window.print(menu_santri());
        })

    }
</script>