
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="shortcut icon" href="<?= site_url() ?>plugin/dist/img/pdst.png" type="image/x-icon">
    <title>PDST NAA | Login</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/fontawesome-free/css/all.min.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/sweetalert2/sweetalert2.min.css">
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
    <div class="page-wrapper">
      <div class="container-fluid p-0">
        <!-- login page with video background start-->
        <div class="auth-bg-video">
          <video id="bgvid" poster="<?= site_url() ?>assets/images/other-images/coming-soon-bg.jpg" playsinline="" autoplay="" muted="" loop="">
            <source src="<?= site_url() ?>assets/video/auth-bg.MP4" type="video/mp4">
          </video>
          <div class="authentication-box">
            <div class="mt-4">
              <div class="card-body">
                <div class="cont text-center">
                  <div> 
                    <form class="theme-form form_login">
                      <h4>LOGIN</h4>
                      <h6>Silakan Masukkan Username dan password anda</h6>
                      <div class="form-group">
                        <label class="col-form-label pt-0">Username</label>
                        <input class="form-control username" name="username" type="text" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control password" name="password" type="password">
                      </div>
                      <div class="form-group row mt-5 mb-0">
                        <button type="button" class="btn btn-primary btn-block btn_login" type="submit">LOGIN</button>
                      </div>
                      
                      <div class="social mt-5">
                        <div class="row btn-showcase">
                          <div class="col-md-4 col-sm-6">
                            <a href="https://www.facebook.com/OfficialPonPesNurulAbrorAlRobbaniyin/" class="btn social-btn btn-fb" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
                          </div>
                          <div class="col-md-4 col-sm-6">
                            <a href="https://www.youtube.com/c/PPNurulAbrorAlRobbaniyin" class="btn social-btn btn-twitter" target="_blank"><i class="fab fa-youtube"></i> YouTube</a>
                          </div>
                          <div class="col-md-4 col-sm-6">
                            <a href="https://www.instagram.com/ponpesnurulabroralrobbaniyin/?hl=en" class="btn social-btn btn-google" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="sub-cont">
                    <div class="img">
                      <div class="img__text m--up">
                        <h2>Selamat Datang</h2>
                        <p>Di Aplikasi Pusat Data Santri Nurul Abror Al-Robbaniyin</p>
                      </div>
                      <div class="img__text m--in">
                        <h2>Selamat Datang</h2>
                        <p>Di Aplikasi Pusat Data Santri Nurul Abror Al-Robbaniyin</p>
                      </div>
                      <div class="img__btn"><span class="m--up">PDST NAA</span><span class="m--in">Login</span></div>
                    </div>
                    <div>
                      <!-- <form class="theme-form form_login">
                      <h4>LOGIN</h4>
                      <h6>Silakan Masukkan Username dan password anda</h6>
                      <div class="form-group">
                        <label class="col-form-label pt-0">Username</label>
                        <input class="form-control username" name="username" type="text">
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control password" name="password" type="password">
                      </div>
                      <div class="form-group row mt-5 mb-0">
                        <button type="button" class="btn btn-primary btn-block btn_login" type="submit">LOGIN</button>
                      </div>
                      
                      <div class="social mt-5">
                        <div class="row btn-showcase">
                          <div class="col-md-4 col-sm-6">
                            <a href="#" class="btn social-btn btn-fb"><i class="fab fa-facebook"></i> Facebook</a>
                          </div>
                          <div class="col-md-4 col-sm-6">
                            <a href="#" class="btn social-btn btn-twitter"><i class="fab fa-youtube"></i> YouTube</a>
                          </div>
                          <div class="col-md-4 col-sm-6">
                            <a href="#" class="btn social-btn btn-google"><i class="fab fa-instagram"></i> Instagram</a>
                          </div>
                        </div>
                      </div>
                    </form> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- login page with video background end-->
      </div>
    </div>
    
    <!-- latest jquery-->
    <script src="<?= site_url() ?>assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="<?= site_url() ?>assets/js/bootstrap/popper.min.js"></script>
    <script src="<?= site_url() ?>assets/js/bootstrap/bootstrap.js"></script>
    <!-- feather icon js-->
    <script src="<?= site_url() ?>assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?= site_url() ?>assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?= site_url() ?>assets/js/sidebar-menu.js"></script>
    <script src="<?= site_url() ?>assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="<?= site_url() ?>assets/js/login.js"></script>
    <script src="<?= site_url() ?>plugin/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?= site_url() ?>assets/js/script.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <script>
        var username, password, dataAkun, baseUrl_admin = "<?= site_url('admin') ?>",
            baseUrl_user = "<?= site_url('user') ?>", baseUrl_members = "<?= site_url('members') ?>";

        function tampil_pesan(teks) {
            Swal.fire({
                type: 'error',
                title: 'PDST NAA',
                text: teks,
                showConfirmButton: true,
                // timer: 1500
            })
        }
        $(document).ready(function() {
            $(".username").focus();
            $(".username").keypress(function(e) {
                keyCode = e.keyCode ? e.keyCode : e.which;
                if (keyCode === 13) {
                    $(".password").focus();
                }
            });
            $(".password").keypress(function(e) {
                keyCode = e.keyCode ? e.keyCode : e.which;
                if (keyCode === 13) {
                    $(".btn_login").click();
                }
            });
            $(".btn_login").click(function(e) {
                username = $(".username").val();
                password = $(".password").val();
                if (username === "") {
                    tampil_pesan("Username tidak boleh kosong");
                    $(".username").focus();
                } else if (password === "") {
                    tampil_pesan("Password tidak boleh kosong");
                    $(".password").focus();
                } else {
                    $.ajax({});
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('Clogin/verifikasi') ?>",
                        data: {
                            username: username,
                            password: password
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data.pesan === "sukses") {
                                if (data.jabatan === "Ketua Umum") {
                                    swal.fire({
                                        title: "PDST NAA",
                                        text: "SUKSES",
                                        type: "success"
                                    }).then(okay => {
                                        if (okay) {
                                            window.location.href = baseUrl_admin;
                                        }
                                    })
                                } else if (data.jabatan === "Sekretaris Pesantren") {
                                    swal.fire({
                                        title: "PDST NAA",
                                        text: "SUKSES",
                                        type: "success"
                                    }).then(okay => {
                                        if (okay) {
                                            window.location.href = baseUrl_user;
                                        }
                                    })
                                } else if (data.jabatan === "Members") {
                                    swal.fire({
                                        title: "PDST NAA",
                                        text: "SUKSES",
                                        type: "success"
                                    }).then(okay => {
                                        if (okay) {
                                            window.location.href = baseUrl_members;
                                        }
                                    })
                                }
                                
                            } else {
                                tampil_pesan(data.pesan);
                                $(".username").val("").focus();
                                $(".password").val("").focus();
                            }
                        }
                    });
                }
            });
        });
    </script>
  </body>
</html>