<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= site_url() ?>plugin/dist/img/pdst.png" type="image/x-icon">
    <title>FORMULIR SANTRI</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/dist/css/adminlte.min.css">
    <style>
        * {
            font-family: Arial;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div>
        <table cellpadding="3">
            <tbody>
                <tr>
                    <td>
                        <img src="<?= site_url() ?>plugin/dist/img/naa.png" style="width:70px; top: 0;">
                    </td>
                    <td>
                        <strong>Formulir Pendaftaran Santri Baru<br>
                            Pondok Pesantren Nurul Abror Al Robbaniyin<br>
                            Alasbuluh Wongsorejo Banyuwangi</strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <table cellpadding="2">
            <tbody>
                <tr>
                    <td colspan="6"><b>Data Diri</b></td>
                </tr>
                <tr>
                    <td>NIUP</td>
                    <td>:</td>
                    <td><?= $data->niup ?></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><?= $data->nik ?></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?= $data->nama ?></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td><?= $data->tempat_lahir ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><?= tgl_indo(date('Y-m-d', strtotime($data->tanggal_lahir))); ?></td>
                </tr>

                <tr>
                    <td>Lembaga Tujuan</td>
                    <td>:</td>
                    <td><?= $data->pndkn ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $data->alamat_lengkap ?></td>
                </tr>
                <tr>
                    <td>Desa</td>
                    <td>:</td>
                    <td><?= $data->nama_desa ?></td>
                </tr>
                <tr>
                    <td>Kecamatan </td>
                    <td>:</td>
                    <td><?= $data->nama_kecamatan ?></td>
                </tr>
                <tr>
                    <td>Kabupaten </td>
                    <td>:</td>
                    <td><?= $data->nama_kabupaten ?></td>
                </tr>
                <tr>
                    <td>Provinsi </td>
                    <td>:</td>
                    <td><?= $data->nama_provinsi ?></td>
                </tr>
            </tbody>
        </table>
        <table cellpadding="3">
            <tbody>
                <tr>
                    <td colspan="3"><strong>Data Keluarga</strong></td>
                </tr>
                <tr>
                    <td><b>Data Ayah</b></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><?= $data->nik_a ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $data->nm_a ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><?= tgl_indo(date('Y-m-d', strtotime($data->tgl_lahir_a))); ?></td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td>:</td>
                    <td><?= $data->pndkn_a ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?= $data->pkrjn_a ?></td>
                </tr>
                <tr>
                    <td><b>Data Ibu</b></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><?= $data->nik_i ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $data->nm_i ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><?= tgl_indo(date('Y-m-d', strtotime($data->tgl_lahir_i))); ?></td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td>:</td>
                    <td><?= $data->pndkn_i ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?= $data->pkrjn_i ?></td>
                </tr>
            </tbody>
        </table>
        <table cellpadding="3">
            <tbody>
                <tr>
                    <td colspan="6"><b style="text-align: center;">Data Wali</b></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><?= $data->nik_w ?></td>
                    <td>Desa</td>
                    <td>:</td>
                    <td><?= $data_alamat->nama_desa_w ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $data->nm_w ?></td>
                    <td>Kecamatan</td>
                    <td>:</td>
                    <td><?= $data_alamat->nama_kec_w ?></td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td>:</td>
                    <td><?= $data->pndkn_w ?></td>
                    <td>Kabupaten</td>
                    <td>:</td>
                    <td><?= $data_alamat->nama_kab_w ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?= $data->pkrjn_w ?></td>
                    <td>Provinsi</td>
                    <td>:</td>
                    <td><?= $data_alamat->nama_prov_w ?></td>
                </tr>
                <tr>
                    <td>Pendapatan</td>
                    <td>:</td>
                    <td><?= $data->pndptn_w ?></td>
                    <td>NO HP</td>
                    <td>:</td>
                    <td><?= $data->hp_w ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $data->almt_w ?></td>
                    <td>NO Telp</td>
                    <td>:</td>
                    <td><?= $data->telp_w ?></td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; margin-top: 30px;">
            <tr>
                <td style="width: 50%;"></td>
                <td style="width: 23%;"></td>
                <td>Banyuwangi, <?= tgl_indo(date('Y-m-d')); ?></td>
            </tr>
            <tr>
                <td>PANITIA PSB</td>
                <td></td>
                <td>WALI SANTRI</td>
            </tr>
            <tr>
                <td><br><br><br><br></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>-----------------------------</td>
                <td></td>
                <td>(<?= $data->nm_w ?>)</td>
            </tr>
        </table>
    </div>

    <!-- jQuery -->
    <script src="<?= site_url() ?>plugin/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= site_url() ?>plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= site_url() ?>plugin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= site_url() ?>plugin/dist/js/demo.js"></script>
    <script>
        window.print();
        window.onfocus = setTimeout(function() {
            window.close();
        }, 1000);
    </script>
</body>

</html>