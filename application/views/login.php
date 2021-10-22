<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?= site_url() ?>plugin/dist/img/pdst.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset/css/owl.carousel.min.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset/css/style.css">

    <title>PDST NAA</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <img src="<?= site_url() ?>plugin/asset/images/PDST.png" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3><strong>Selamat Datang</strong></h3>
                                <p class="mb-4">Di Pusat Data Santri Terpadu Pondok Pesantren Nurul Abror Al-Robbaniyin.</p>
                            </div>
                            <form id="form_login">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" autocomplete="off">
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" autocomplete="off">
                                </div>
                                <input type="button" value="Masuk" id="masuk" class="btn text-white btn-block btn-primary mt-5">
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script src="<?= site_url() ?>plugin/asset/js/jquery-3.3.1.min.js"></script>
    <script src="<?= site_url() ?>plugin/asset/js/popper.min.js"></script>
    <script src="<?= site_url() ?>plugin/asset/js/bootstrap.min.js"></script>
    <script src="<?= site_url() ?>plugin/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= site_url() ?>plugin/asset/js/main.js"></script>
    <script>
        var username, password, dataAkun, baseUrl_admin = "<?= site_url('admin') ?>",
            baseUrl_user = "<?= site_url('user') ?>";

        function tampil_pesan(teks) {
            Swal.fire({
                type: 'error',
                title: 'PDST NAA',
                text: teks,
                showConfirmButton: false,
                timer: 1500
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
                    $("#masuk").click();
                }
            });
            $("#masuk").click(function(e) {
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