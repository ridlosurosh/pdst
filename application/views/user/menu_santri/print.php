<section class="content">
    <div class="container-fluid">
        <div class="row">
            <input type="hidden" value="<?= $data->id_person ?>">
            <div style="font-size: 19px; height: 1430px; font-family: 'Times New Roman', Times, serif;">
                <div style="font-size: 19px; font-family: 'Times New Roman', Times, serif;">

                    <img src="<?= site_url() ?>plugin/dist/img/naa.png" style="width:80px; position: absolute; top: 1px;">
                    <div style="margin-left: 85px;">
                        <strong>Formulir Pendaftaran Santri Baru<br>
                            Pondok Pesantren Nurul Abror Al Robbaniyyin<br>
                        Alasbuluh Wongsorejo Banyuwangi</strong>
                    </div>
                </div>
                <hr style="width: 100%;">
                <div class="row">
                    <table cellpadding="3" cellspacing="0">
                        <tr>
                            <td><b>Data Diri</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>NIUP</td>
                            <td>:</td>
                            <td><?= $data->niup ?></td>
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
                            <td><?= date('d-M-Y', strtotime($data->tanggal_lahir))  ?></td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td><?= $data->nik ?></td>
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
                        <tr></tr>
                        <tr>
                            <td><strong>Data Keluarga</strong></td>
                        </tr>
                        <tr>
                            <td><b>Data Ayah</b></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td>Nama Ayah</td>
                            <td>:</td>
                            <td><?= $data->nm_a ?></td>

                        </tr>
                        <tr>
                            <td>Pendidikan Ayah</td>
                            <td>:</td>
                            <td><?= $data->pndkn_a ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ayah</td>
                            <td>:</td>
                            <td><?= $data->pkrjn_a ?></td>
                        </tr>
                        <tr>
                            <td><b>Data Ibu</b></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Nama Ibu</td>
                            <td>:</td>
                            <td><?= $data->nm_i ?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan Ibu</td>
                            <td>:</td>
                            <td><?= $data->pndkn_i ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ibu</td>
                            <td>:</td>
                            <td><?= $data->pkrjn_i ?></td>
                        </tr>
                        <tr>
                            <td><b>Data Wali</b></td>
                        </tr>
                        <tr>
                            <td>Nama Wali</td>
                            <td>:</td>
                            <td><?= $data->nm_w ?></td>
                            <td>Kecamatan Wali</td>
                            <td>:</td>
                            <td><?= $data_alamat->nama_kec_w ?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan Wali</td>
                            <td>:</td>
                            <td><?= $data->pndkn_w ?></td>
                            <td>Kabupaten Wali</td>
                            <td>:</td>
                            <td><?= $data_alamat->nama_kab_w ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Wali</td>
                            <td>:</td>
                            <td><?= $data->pkrjn_w ?></td>
                            <td>Provinsi Wali</td>
                            <td>:</td>
                            <td><?= $data_alamat->nama_prov_w ?></td>
                        </tr>
                        <tr>
                            <td>Pendapatan Wali</td>
                            <td>:</td>
                            <td><?= $data->pndptn_w ?></td>
                            <td>NO HP Wali</td>
                            <td>:</td>
                            <td><?= $data->hp_w ?></td>
                        </tr>
                        <tr>
                            <td>Alamat Wali</td>
                            <td>:</td>
                            <td><?= $data->almt_w ?></td>
                            <td>NO Telp Wali</td>
                            <td>:</td>
                            <td><?= $data->telp_w ?></td>
                        </tr>
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
                            <td><?= $data->nm_w ?></td>
                        </tr>
                        <tr>
                            <td><br><br></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
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
</section>