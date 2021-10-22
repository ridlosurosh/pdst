<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $data_kamar->nama_kamar ?></h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Penduduk Kamar <span class="text-danger"><?= $data_kamar->nama_kamar ?></span></h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-hover text-nowrap">
                            <thead>
                                <th>NO</th>
                                <th>NIUP</th>
                                <th>NAMA</th>
                                <th>ALAMAT</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($p_kamar as $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->niup ?></td>
                                        <td><?= $value->nama ?></td>
                                        <td><?= $value->alamat_lengkap ?></td>
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