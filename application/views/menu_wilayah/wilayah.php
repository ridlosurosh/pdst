<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col-lg-6">
        <h3>Wilayah</h3>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <a href="#" class="btn btn-sm btn-primary active" onclick="tambah_wilayah()"><i class="fas fa-plus"></i> Tambah</a>
      <div class="card mt-2 p-2">
        <div class="table-responsive">
          <table class="table" id="example1">
            <thead>
              <tr>
                <th width="40">#</th>
                <th>NO</th>
                <th>NAMA WILAYAH</th>
                <th>KEPALA WILAYAH</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($wilayah as $value) { ?>
                <tr>
                  <td>
                    <button class="btn btn-primary active" title="Edit" onclick="form_edit_wilayah('<?= $value->id_wilayah ?>')"><i class="fas fa-edit"></i></button>
                  </td>
                  <td><?= $no++ ?></td>
                  <td><?= $value->nama_wilayah ?></td>
                  <td><?= $value->kepala_wilayah ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(function() {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": false,
      "ordering": false,
      "searching": true,
      "info": false,
      "autoWidth": true,
    });
    $('#example2').DataTable();
  });

  function tambah_wilayah() {
    $.post('<?= site_url('Cwilayah/tambah_wilayah') ?>', function(Res) {
      $('#ini_isinya').html(Res);
    });
  }

  function form_edit_wilayah(id) {
    $.post('<?= site_url('Cwilayah/form_edit_wilayah') ?>', {
      idwilayah: id
    }, function(Res) {
      $('#ini_isinya').html(Res);
    });
  }
</script>