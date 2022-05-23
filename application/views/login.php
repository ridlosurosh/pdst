
<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Login</title>
    <link rel="shortcut icon" href="<?= site_url() ?>plugin/dist/img/pdst.png" type="image/x-icon">
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600,800,900|Shadows+Into+Light"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset_login/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset_login/vendor/animate/animate.css">

    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset_login/vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset_login/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset_login/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" href="<?= site_url() ?>plugin/sweetalert2/sweetalert2.min.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset_login/css/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset_login/css/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset_login/css/custom.css">

    <!-- Head Libs -->
    <script src="<?= site_url() ?>plugin/asset_login/vendor/modernizr/modernizr.js"></script>
    <style>
        body {
            background: #FFFFFF !important;
        }

        .card-custom {
            background: #ffffff !important;
            border: 0px !important;
            box-shadow: none !important;
        }

        .custom-form {
            background: #FFFFFF;
            border: 1px solid #D0D0D0;
            box-sizing: border-box;
            border-radius: 4px;
            font-weight: 400;
            font-size: 14px;
            line-height: 140%;
        }

        .custom-button {
            background: #279588;
            border-radius: 8px;
            color: #ffffff;
        }

        .custom-button:hover {
            background: #FBA040;
        }
    </style>
</head>

<body>
    <section class="body-sign">
        <div class="center-sign">
            <a href="/" class="logo">
                <center> <img src="<?= site_url() ?>plugin/dist/img/pdst.png" height="54" alt="Porto Admin" /></center>
            </a>
            <div class="panel card-sign">
                <div class="card-body  card-custom">
                    <form id="form_login">
                        <div class="form-group mb-3 ">
                            <div class="input-group">
                                <input name="username" id="username" autocomplete="off" type="text" class="custom-form form-control form-control-lg" placeholder="Username" />
                            </div>
                        </div>
                        <div class="form-group mb-3 ">
                            <div class="input-group">
                                <input name="password" id="password" autocomplete="off" type="password" class="custom-form form-control form-control-lg" placeholder="Password" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <input type="button" class="w-100 btn custom-button mt-2" id="btn_login" value="Masuk" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2022. All Rights Reserved.</p>
        </div>
    </section>
    <!-- end: page -->



    <!-- Vendor -->
    <script src="<?= site_url() ?>plugin/asset_login/vendor/jquery/jquery.js"></script>
    <script src="<?= site_url() ?>plugin/asset_login/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="<?= site_url() ?>plugin/asset_login/vendor/popper/umd/popper.min.js"></script>
    <script src="<?= site_url() ?>plugin/asset_login/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="<?= site_url() ?>plugin/asset_login/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?= site_url() ?>plugin/asset_login/vendor/common/common.js"></script>
    <script src="<?= site_url() ?>plugin/asset_login/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="<?= site_url() ?>plugin/asset_login/vendor/magnific-popup/jquery.magnific-popup.js"></script>
    <script src="<?= site_url() ?>plugin/asset_login/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    <script src="<?= site_url() ?>plugin/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="<?= site_url() ?>plugin/asset_login/js/theme.js"></script>

    <!-- Theme Custom -->
    <script src="<?= site_url() ?>plugin/asset_login/js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="<?= site_url() ?>plugin/asset_login/js/theme.init.js"></script>
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
            $("#username").focus();
            $("#username").keypress(function(e) {
                keyCode = e.keyCode ? e.keyCode : e.which;
                if (keyCode === 13) {
                    $("#password").focus();
                }
            });
            $("#password").keypress(function(e) {
                keyCode = e.keyCode ? e.keyCode : e.which;
                if (keyCode === 13) {
                    $("#btn_login").click();
                }
            });
            $("#btn_login").click(function(e) {
                username = $("#username").val();
                password = $("#password").val();
                if (username === "") {
                    tampil_pesan("Username tidak boleh kosong");
                    $("#username").focus();
                } else if (password === "") {
                    tampil_pesan("Password tidak boleh kosong");
                    $("#password").focus();
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
                                $("#username").val("").focus();
                                $("#password").val("").focus();
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>

