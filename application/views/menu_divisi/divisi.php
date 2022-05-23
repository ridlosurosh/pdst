<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Divisi</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
		<div class="card-body table-responsive p-1">
			<table id="example1" class="table table-hover text-nowrap ">
                <h3 class="card-title"><a class="btn btn-sm btn-block bg-teal" href="#"><i class="fas fa-plus"></i> Tambah Data</a></h3>
				<thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA DIVISI</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>NUBDZATUL BAYAN</td>
                        <td><button class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>    
</section>
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
</script>