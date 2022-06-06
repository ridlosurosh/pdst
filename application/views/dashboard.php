<!DOCTYPE html>
<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
} else {
	header("location:log-in");
}
?>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="<?= site_url() ?>assets/images/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="<?= site_url() ?>assets/images/favicon.png" type="image/x-icon">
  <title>PDST NAA</title>
  <!-- Google font-->
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
  <!-- Font Awesome-->
  <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/fontawesome.css">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/icofont.css">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/themify.css">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/flag-icon.css">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/feather-icon.css">
  <link rel="stylesheet" href="<?= site_url() ?>assets/fontawesome-free/css/all.min.css">
  <!-- Plugins css start-->
  <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/prism.css">
  <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/whether-icon.css">
  <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/owlcarousel.css">
  <link rel="stylesheet" href="<?= site_url() ?>plugin/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?= site_url() ?>plugin/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= site_url() ?>plugin/EasyAutocomplete/easy-autocomplete.min.css">
  <link rel="stylesheet" href="<?= site_url() ?>plugin/EasyAutocomplete/easy-autocomplete.themes.min.css">
  <link rel="stylesheet" href="<?= site_url() ?>assets/js/parsleyjs/parsley.css">
  <link rel="stylesheet" href="<?= site_url() ?>plugin/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="<?= site_url() ?>plugin/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= site_url() ?>plugin/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/date-picker.css">
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/bootstrap.css">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/style.css">
  <link id="color" rel="stylesheet" href="<?= site_url() ?>assets/css/color-1.css" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/responsive.css">
</head>
<body>
  <!-- Loader starts-->
  <div class="loader-wrapper">
    <div class="loader-index"><span></span></div>
    <svg>
      <defs></defs>
      <filter id="goo">
        <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
        <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">    </fecolormatrix>
      </filter>
    </svg>
  </div>
  <!-- Loader ends-->
  <!-- page-wrapper Start-->
  <div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-main-header">
      <div class="main-header-right row m-2">
        <div class="main-header-left">
          <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="<?= site_url() ?>assets/images/logo/logo.png" alt=""></a></div>
        </div>
        <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"></i></div>
        <div class="left-menu-header col">
          <ul>
            <li>
              <form class="form-inline search-form">
                <!-- <div class="search-bg"><i class="fa fa-search"></i></div>
                <input class="form-control-plaintext" placeholder="Search here....."> -->
              </form>
            </li>
          </ul>
        </div>
        <div class="nav-right col pull-right right-menu">
          <ul class="nav-menus">
            <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
            <li class="onhover-dropdown p-0">
              <div class="media profile-media"><img class="b-r-10" src="<?= site_url() ?>../gambar/foto/<?= $foto ?>" alt="">
                <div class="media-body"><span><?= $nama_user ?></span>
                  <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                </div>
              </div>
              <ul class="profile-dropdown onhover-show-div">
                <li><i data-feather="user"></i><span>Account </span></li>
                <li><i data-feather="mail"></i><span>Inbox</span></li>
                <li><i data-feather="file-text"></i><span>Taskboard</span></li>
                <li><i data-feather="settings"></i><span>Settings</span></li>
                <li onclick="logout()"><i data-feather="log-out"> </i><span>Log Out</span></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
      </div>
    </div>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper horizontal-menu">
      <!-- Page Sidebar Start-->
      <header class="main-nav">
        <div class="logo-wrapper"><a href="#"><img class="img-fluid" src="<?= site_url() ?>assets/images/logo/logo.png" alt=""></a></div>
        <div class="logo-icon-wrapper"><a href="#"><img class="img-fluid" src="<?= site_url() ?>assets/images/logo/logo-icon.png" alt=""></a></div>
        <nav>
          <div class="main-navbar">
            <div id="mainnav">
              <ul class="nav-menu custom-scrollbar">
                <li class="back-btn">
                  <div class="mobile-back text-right">
                    <span>Back</span>
                    <i class="fa fa-angle-right pl-2" aria-hidden="true"></i>
                  </div>
                </li>
                <li>
                  <a class="nav-link" href="#" onclick="menu_halaman_utama()"><i data-feather="home"></i><span>Dashboard</span></a>
                </li>
                <li class="dropdown">
                  <a class="nav-link menu-title" href="#"><i data-feather="user-check"></i><span>Data Person</span></a>
                  <ul class="nav-submenu menu-content">
                    <li><a href="#" onclick="menu_santri()">Santri</a></li>
                    <li><a href="#" onclick="pengurus()">Pengurus</a></li>
                    <li><a href="#" onclick="menu_pengajar()">Pengajar</a></li>
                    <li><a href="#" onclick="karyawan()">Karyawan</a></li>
                    <li><a href="#" onclick="alumni()">Alumni</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="nav-link menu-title" href="#"><i data-feather="map"></i><span>Data Domisili</span></a>
                  <ul class="nav-submenu menu-content">
                    <li><a href="#" onclick="menu_wilayah()">Wilayah</a></li>
                    <li><a href="#" onclick="menu_blok()">Block</a></li>
                    <li><a href="#" onclick="menu_kamar()">Kamar</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="nav-link menu-title" href="#"><i data-feather="move"></i><span>Data Divisi</span></a>
                  <ul class="nav-submenu menu-content">
                    <li><a href="#" onclick="nubdzah()">Nubdzah</a></li>
                    <li><a href="#" onclick="tahfidz()">Tahfidz</a></li>
                    <li><a href="#" onclick="madin()">Madin</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="nav-link menu-title" href="#"><i data-feather="paperclip"></i><span>Proses Data</span></a>
                  <ul class="nav-submenu menu-content">
                    <li><a href="#" onclick="menu_periode()">Atur Periode</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="nav-link menu-title" href="#"><i data-feather="layers"></i><span>Laporan</span></a>
                  <ul class="nav-submenu menu-content">
                    <li><a href="#" onclick="menu_grafik()">Grafik</a></li>
                    <li><a href="#" onclick="cetak_person()">Cetak Santri</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-body" id="ini_isinya">


      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 footer-copyright">
              <p class="mb-0">Copyright <?= date('Y') ?> © PDST NAA All rights reserved.</p>
            </div>
            <div class="col-md-6">
              <p class="pull-right mb-0">I <i class="fa fa-heart font-secondary"></i> NAA</p>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- latest jquery-->
  <script src="<?= site_url() ?>assets/js/jquery-3.5.1.min.js"></script>
  <script src="<?= site_url() ?>plugin/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
  <!-- Bootstrap js-->
  <script src="<?= site_url() ?>assets/js/bootstrap/popper.min.js"></script>
  <script src="<?= site_url() ?>assets/js/bootstrap/bootstrap.js"></script>
  <!-- feather icon js-->
  

  <!-- Sidebar jquery-->
  <script src="<?= site_url() ?>assets/js/sidebar-menu.js"></script>
  <script src="<?= site_url() ?>assets/js/config.js"></script>
  <script src="<?= site_url() ?>plugin/chart.js/Chart.min.js"></script>
  <!-- Plugins JS start-->
  <script src="<?= site_url() ?>plugin/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?= site_url() ?>plugin/jquery-validation/additional-methods.min.js"></script>
  <script src="<?= site_url() ?>assets/js/prism/prism.min.js"></script>
  <script src="<?= site_url() ?>assets/js/clipboard/clipboard.min.js"></script>
  <script src="<?= site_url() ?>assets/js/custom-card/custom-card.js"></script>
  <script src="<?= site_url() ?>assets/js/form-validation-custom.js"></script>
  <script src="<?= site_url() ?>plugin/moment/moment.min.js"></script>
  <script src="<?= site_url() ?>plugin/inputmask/jquery.inputmask.min.js"></script>
  <script src="<?= site_url() ?>plugin/daterangepicker/daterangepicker.js"></script>
  <script src="<?= site_url() ?>assets/js/datepicker/date-picker/datepicker.js"></script>
  <script src="<?= site_url() ?>assets/js/datepicker/date-picker/datepicker.en.js"></script>
  <script src="<?= site_url() ?>assets/js/datepicker/date-picker/datepicker.custom.js"></script>
  <script src="<?= site_url() ?>assets/js/tooltip-init.js"></script>
  <script src="<?= site_url() ?>assets/js/owlcarousel/owl.carousel.js"></script>
  <script src="<?= site_url() ?>assets/js/general-widget.js"></script>
  <script src="<?= site_url() ?>plugin/datatables/jquery.dataTables.js"></script>
  <script src="<?= site_url() ?>plugin/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script src="<?= site_url() ?>plugin/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="<?= site_url() ?>plugin/select2/js/select2.full.min.js"></script>
  <!-- Plugins JS Ends-->
  <!-- Theme js-->
  <script src="<?= site_url() ?>assets/js/script.js"></script>
  <!-- <script src="<?= site_url() ?>assets/js/theme-customizer/customizer.js"></script> -->
  <!-- login js-->
  <!-- Plugin used-->
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
      $.post('<?= site_url('koordinator') ?>', function(Res) {
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

    // Menu Devisi
    function nubdzah() {
      $.post('<?= site_url('Cdivisi/nubdzah') ?>',function(Res) {
        $('#ini_isinya').html(Res);
      })
    }

    function madin() {
      $.post('<?= site_url('Cdivisi/madin') ?>',function(Res) {
        $('#ini_isinya').html(Res);
      })
    }

    function tahfidz() {
      $.post('<?= site_url('Cdivisi/tahfidz') ?>',function(Res) {
        $('#ini_isinya').html(Res);
      })
    }

    // Periode
    function menu_periode() {
      $.post('<?= site_url('periode') ?>', function(Res) {
        $('#ini_isinya').html(Res);
      });
    }
    // Periode

    function menu_grafik() {
      $.post('<?= site_url('Cgrafik/menu_grafik') ?>', function(Res) {
        $('#ini_isinya').html(Res);
      });
    }

    function cetak_person() {
      $.post('<?= site_url('Cexport_pdf/cetak_person') ?>', function(Res) {
        $('#ini_isinya').html(Res);
      });
    }

    function logout() {
     window.location.href="<?= site_url('Clogin/logout') ?>";
   }
 </script>
</body>
</html>