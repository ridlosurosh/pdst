<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Divisi Madin</h3>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-sm btn-primary active" href="#" onclick="formSimpanMadin()">
                <i class="fas fa-plus"></i> Tambah
            </a>
            <div class="card mt-2">
                <div class="card-body table-responsive p-1">
                    <table id="example" class="table table-hover text-nowrap ">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NIUP</th>
                                <th>NAMA</th>
                                <th>ALAMAT</th>
                                <th>TANGGAL MASUK</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">PINDAH KE DIVISI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id" value="">
                <div class="row">
                    <div class="col-md-12">
                        <a href="#" id="bt-save-tahfidz">
                            <button type="button" class="mb-2 btn btn-info btn-block">
                                <i class="fa fa-check"></i>
                            PINDAH KE DIVISI TAHFIDZ</button>
                        </a>
                        <a href="#" id="bt-save-nubdzah">
                            <button type="button" class="mb-2 btn btn-success btn-block">
                                <i class="fa fa-check"></i>
                            PINDAH KE DIVISI NUBDZAH</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $("#example").DataTable({
            "processing": true, 
            "serverSide": true, 
            "order": [], 
            "ordering":false,
            "info":false,
            "lengthChange": false,
            
            "ajax": {
                "url": "<?php echo site_url('Cdivisi/madinAll')?>",
                "type": "POST"
            },

            
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
        });

        $("#example").on('click','#bt-pindah', function(){
            var id = $(this).attr("data");
            $("#id").val(id);
            $('#modal').modal('show');
        });

        $("#example").on('click','#bt-hapus', function(){
            var id = $(this).attr("data");
            swal.fire({
                title: 'PDST NAA',
                text: "Anda Yakin Untuk Menghapus Santri Ini ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'YA',
                cancelButtonText: 'TIDAK',
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                            url: 'Cdivisi/nonaktif',
                            type: 'POST',
                            data: {
                                id: id,
                                tb : "tb_divisimadin"
                            },
                            dataType: 'json'
                        })
                        .fail(function(data) {
                                // if (data.status) {
                                    swal.fire({
                                        title: "PDST NAA",
                                        text: data.pesan,
                                        type: "success"
                                    }).then(okay => {
                                        if (okay) {
                                            madin();
                                        }
                                    });
                                // }
                            });
                    });
                }
            });
        });


        $('#bt-save-tahfidz').on('click', function(){
            var idnya = $("#id").val();
            $.ajax({
                url: '<?= site_url('Cdivisi/pindahDivisi') ?>',
                type: 'POST',
                data : {
                    'id' : idnya,
                    'divisi' : "3",
                    'tb' : "tb_divisimadin"
                },
                dataType: 'json',
                success: function(data){
                    $('#modal').modal('hide');
                    if(data.status) {
                        swal.fire({
                           title: data.pesan,
                           type: "success"
                       }).then(okay => {
                        if (okay) {
                            madin();
                        }
                    });
                   }
               }
           });
        });

        $('#bt-save-nubdzah').on('click', function(){
            var idnya = $("#id").val();
            $.ajax({
                url: '<?= site_url('Cdivisi/pindahDivisi') ?>',
                type: 'POST',
                data : {
                    'id' : idnya,
                    'divisi' : "1",
                    'tb' : "tb_divisimadin"
                },
                dataType: 'json',
                success: function(data){
                    $('#modal').modal('hide');
                    if(data.status) {
                        swal.fire({
                           title: data.pesan,
                           type: "success"
                       }).then(okay => {
                        if (okay) {
                            madin();
                        }
                    });
                   }
               }
           });
        });

    });

function formSimpanMadin() {
    $.post('<?= site_url('Cdivisi/formSimpanMadin')?>', function(Res) {
        $('#ini_isinya').html(Res);
    })
};

</script>