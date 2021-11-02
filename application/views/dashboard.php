<!DOCTYPE html>
<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
} else {
	header("location:log-in");
}
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PDST NAA</title>
	<link rel="shortcut icon" href="<?= site_url() ?>plugin/dist/img/pdst.png" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= site_url() ?>plugin/fontawesome-free/css/all.min.css">
	<!-- Ekko Lightbox -->
	<!-- <link rel="stylesheet" href="<?= site_url() ?>plugin/ekko-lightbox/ekko-lightbox.css"> -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= site_url() ?>plugin/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="<?= site_url() ?>plugin/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="<?= site_url() ?>plugin/panah/style.css">

	<!-- DataTables -->
	<link rel="stylesheet" href="<?= site_url() ?>plugin/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= site_url() ?>plugin/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= site_url() ?>plugin/datatables-buttons/css/buttons.bootstrap4.min.css">

	<link rel="stylesheet" href="<?= site_url() ?>plugin/sweetalert2/sweetalert2.min.css">
	<link rel="stylesheet" href="<?= site_url() ?>plugin/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?= site_url() ?>plugin/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- daterange picker -->
	<link rel="stylesheet" href="<?= site_url() ?>plugin/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="<?= site_url() ?>plugin/EasyAutocomplete/easy-autocomplete.min.css">
	<link rel="stylesheet" href="<?= site_url() ?>plugin/EasyAutocomplete/easy-autocomplete.themes.min.css">
	<link rel="stylesheet" type="text/css" href="<?= site_url() ?>plugin/jquery-ui/jquery-ui.min.css">
	<link rel="stylesheet" href="<?= site_url() ?>plugin/Ionicons/css/ionicons.min.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- <style>
		.main-sidebar,
		.main-sidebar::before {
			transition: margin-left .3s ease-in-out, width .3s ease-in-out;
			width: 200px;
		}

		body:not(.sidebar-mini-md) .content-wrapper,
		body:not(.sidebar-mini-md) .main-footer,
		body:not(.sidebar-mini-md) .main-header {
			transition: margin-left .3s ease-in-out;
			margin-left: 200px;
		}
	</style> -->

</head>

<body class="hold-transition sidebar-mini text-sm layout-fixed layout-navbar-fixed">
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand navbar-dark navbar-teal elevation-2 border-bottom-0">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" style="color: #fff;"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#" style="color: #fff;">
						<i class="far fa-user"></i> <b><?= $nama_user ?></b>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
						<h4 class="widget-user-username txet-center"><?= $nama_user ?></h4>
						<h5 class="widget-user-desc">Ketua Umum</h5>
						<a href="<?= site_url('Clogin/logout') ?>" class="btn btn-danger btn-sm mt-4" style="margin-left: 90px;">Log-out</a>

					</div>
				</li>
			</ul>
		</nav>

		<aside class="main-sidebar sidebar-light-teal elevation-4">
			<a href="#" class="brand-link navbar-teal elevation-3 border-bottom-0" onclick="menu_halaman_utama()">
				<img src="<?= site_url() ?>plugin/dist/img/naa_logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-4">
				<span class="brand-text" style="color: #fff;"><b>PDST NAA</b></span>
			</a>
			<div class="sidebar">
				<nav class="mt-4">
					<ul class="nav nav-pills nav-sidebar flex-column nav-compact" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item">
							<a href="#" class="nav-link menu active" onclick="menu_halaman_utama()" style="color: #333;">
								<i class="nav-icon fas fa-home"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-header">DATA POKOK</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link menu " style="color: #333;">
								<i class="nav-icon fas fa-user-graduate"></i>
								<p>
									Data Person
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="menu_santri()" style="color: #333;">
										<i class="nav-icon fas fa-graduation-cap"></i>
										<p>
											Santri
										</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="menu_koordinator()" style="color: #333;">
										<i class="fas fa-user-graduate nav-icon"></i>
										<p>
											Pengurus
										</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="menu_pengajar()" style="color: #333;">
										<i class="fas fa-book nav-icon"></i>
										<p>
											Pengajar
										</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="karyawan()" style="color: #333;">
										<i class="fas fa-user-tie nav-icon"></i>
										<p>
											Karyawan
										</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="alumni()" style="color: #333;">
										<i class="fas fa-walking nav-icon"></i>
										<p>
											Alumni
										</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link menu" onclick="menu_jabatan()" style="color: #333;">
								<i class="nav-icon fas fa-user-tag"></i>
								<p>
									Struktural
								</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link menu" style="color: #333;">
								<i class="fas fa-sitemap nav-icon"></i>
								<p>
									Data Domisili
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="menu_wilayah()" style="color: #333;">
										<i class="nav-icon fas fa-map-marked-alt"></i>
										<p>
											Wilayah
										</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="menu_blok()" style="color: #333;">
										<i class="nav-icon fas fa-cubes"></i>
										<p>
											Block
										</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="menu_kamar()" style="color: #333;">
										<i class="nav-icon fas fa-person-booth"></i>
										<p>
											Kamar
										</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link" onclick="menu_lembaga()" style="color: #333;">
										<i class="fas fa-university nav-icon"></i>
										<p>
											Lembaga
										</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-header">MASTER PROSES</li>
						<li class="nav-item">
							<a href="#" class="nav-link menu" onclick="menu_history()" style="color: #333;">
								<i class="fas fa-history nav-icon"></i>
								<p>
									Penempatan Kamar
								</p>
							</a>
						</li>
						<li class="nav-header">LAPORAN DATA</li>
						<li class="nav-item">
							<a href="#" class="nav-link menu" onclick="cetak_person()" style="color: #333;">
								<i class="fas  fa-clipboard nav-icon"></i>
								<p>
									Cetak Person
								</p>
							</a>
						</li>
						<!-- <li class="nav-item">
							<a href="#" class="nav-link menu" onclick="laporan()" style="color: #333;">
								<i class="fas  fa-folder-open nav-icon"></i>
								<p>
									Person Perkamar
								</p>
							</a>
						</li> -->
					</ul>
				</nav>
			</div>
		</aside>
		<div class="content-wrapper" id="ini_isinya">

		</div>
	</div>

	<!-- jQuery -->
	<script src="<?= site_url() ?>plugin/jquery/jquery.min.js"></script>
	<script src="<?= site_url() ?>plugin/jquery/jQuery.print.min.js"></script>
	<script src="<?= site_url() ?>plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Ekko Lightbox -->
	<!-- <script src="<?= site_url() ?>plugin/ekko-lightbox/ekko-lightbox.min.js"></script> -->
	<script src="<?= site_url() ?>plugin/dist/js/adminlte.min.js"></script>
	<script src="<?= site_url() ?>plugin/dist/js/demo.js"></script>
	<!-- date-range-picker -->
	<script src="<?= site_url() ?>plugin/moment/moment.min.js"></script>
	<script src="<?= site_url() ?>plugin/inputmask/jquery.inputmask.min.js"></script>
	<script src="<?= site_url() ?>plugin/daterangepicker/daterangepicker.js"></script>

	<script src="<?= site_url() ?>plugin/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
	<script src="<?= site_url() ?>plugin/select2/js/select2.full.min.js"></script>
	<script src="<?= site_url() ?>plugin/chart.js/Chart.min.js"></script>
	<!-- DataTables  & Plugins -->
	<script src="<?= site_url() ?>plugin/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= site_url() ?>plugin/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= site_url() ?>plugin/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= site_url() ?>plugin/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="<?= site_url() ?>plugin/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?= site_url() ?>plugin/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="<?= site_url() ?>plugin/jszip/jszip.min.js"></script>
	<script src="<?= site_url() ?>plugin/pdfmake/pdfmake.min.js"></script>
	<script src="<?= site_url() ?>plugin/pdfmake/vfs_fonts.js"></script>
	<script src="<?= site_url() ?>plugin/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="<?= site_url() ?>plugin/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="<?= site_url() ?>plugin/datatables-buttons/js/buttons.colVis.min.js"></script>
	<script src="<?= site_url() ?>plugin/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<!-- jquery-validation -->
	<script src="<?= site_url() ?>plugin/jquery-validation/jquery.validate.min.js"></script>
	<script src="<?= site_url() ?>plugin/jquery-validation/additional-methods.min.js"></script>
	<!-- sweetalert -->
	<script src="<?= site_url() ?>plugin/sweetalert2/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="<?= site_url() ?>plugin/jquery-ui/jquery-ui.min.js"></script>
	<script>
		$(function() {
			menu_halaman_utama();
		});

		function menu_halaman_utama() {
			$.post('<?= site_url('halaman_utama') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}

		// Santri
		function menu_santri() {
			$.post('<?= site_url('santri') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
		// End Santri
		// pengurus
		function pengurus() {
			$.post('<?= site_url('pengurus') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
		// end pengurus
		// pengajar
		function menu_pengajar() {
			$.post('<?= site_url('pengajar') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
		// end pengajar
		// karyawan
		function karyawan() {
			$.post('<?= site_url('karyawan') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
		// end karyawan
		// alumni
		function alumni() {
			$.post('<?= site_url('alumni') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
		// end alumni
		// Wilayah
		function menu_wilayah() {
			$.post('<?= site_url('wilayah') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
		//End Wilayah
		// Blok
		function menu_blok() {
			$.post('<?= site_url('block') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
		// End Blok 
		// Kamar
		function menu_kamar() {
			$.post('<?= site_url('kamar') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
		// End Kamar
		// History
		function menu_history() {
			$.post('<?= site_url('history') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
		// End History
		// Lembaga
		function menu_lembaga() {
			$.post('<?= site_url('lembaga') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
		// End Lembaga
		function menu_jabatan() {
			$.post('<?= site_url('jabatan') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
		// Koordinator
		function menu_koordinator() {
			$.post('<?= site_url('koordinator') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
		// koordinator
		function menu_terima() {
			$.post('<?= site_url('terima') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}

		function laporan() {
			$.post('<?= site_url('Claporan/santri_kamar') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}

		function cetak_person() {
			$.post('<?= site_url('Claporan/santri_provinsi') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}

		$(document).ready(function() {
			$('.menu').click(function() {
				// $('li').removeClass('menu-open');
				// $(this).addClass('menu-open');
				// if ($('ul li ').attr('class') === "menu-open") {
				// } else {
				// $('ul li ').addClass('');
				// }
				$('.menu').removeClass('active');
				$(this).addClass('active');
				$('ul').find('ul').css('display', 'none');
				$('ul').next('ul').css('display', 'block');
			});
		});
	</script>
</body>

</html>