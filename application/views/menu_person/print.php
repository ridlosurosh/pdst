<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3><b><?= $data->nama ?></b> <span class="text-danger">[ <?= $data->niup ?> ]</span></h3>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 offset-1">
            <button onclick= "menu_santri()" class="btn btn-danger"> <i class="fa fa-reply"> </i> Kembali </button>
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="row">
                                <a href="Cperson/cetak?id=<?= $data->id_person ?>" target="_blank" class="btn btn-sm btn-info col-12"><i class="fas fa-print"></i> PRINT FORMULIR PENDAFTARAN</a>
                            </div>
                            <div class="row mt-1">
                                <a href="Cperson/cetak_p?id=<?= $data->id_person ?>" target="_blank" class="btn btn-sm btn-primary col-12"><i class="fas fa-print"></i> PRINT PERNYATAAN SANTRI</a>
                            </div>
                            <div class="row mt-1">
                                <a href="Cperson/cetak_ws?id=<?= $data->id_person ?>" target="_blank" class="btn btn-sm btn-success col-12"><i class="fas fa-print"></i> PRINT PERNYATAAN ORANG TUA</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>