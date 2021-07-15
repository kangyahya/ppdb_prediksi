<?php $root = $_SERVER['DOCUMENT_ROOT']; ?>
<html>

<head>
    <title>Laporan Pendaftar</title>
</head>
<style type="text/css">
    body {
        font-size: 12px !important;
        color: #212121;
    }

    .header {
        text-align: center;
        margin: -.5rem 0;
        margin-bottom: 30px;
        border-bottom: 2px solid #000;
        padding-bottom: 10px;
    }

    .logo1 {
        float: left;
        position: relative;
        width: 80px;
        height: 80px;
        margin: 0 0 0 1.2rem;
    }

    .logo2 {
        float: right;
        position: relative;
        width: 80px;
        height: 80px;
        margin: 0 0 0 1.2rem;
    }

    .text {
        font-size: 25px !important;
        font-weight: bold;
        text-transform: uppercase;
        margin-top: -10px;
    }

    .text2 {
        font-size: 15px !important;
        font-weight: bold;
        text-transform: uppercase;
        margin-top: -20px;
    }

    #table tr th {
        font-size: 11px;
    }

    #table tr td {
        font-size: 10px;
    }

    .sub-header {
        text-align: center;
        font-size: 18px !important;
        font-weight: bold;
        text-transform: uppercase;
        margin-top: -20px;
    }

    .text-center {
        text-align: center;
        vertical-align: middle;
    }

    .logo>img {
        width: 10%;
        position: fixed;
    }

    .kop-text {
        display: block;
        text-align: center;
    }
</style>

<body>
    <div class="header">
        <img src="<?php echo $root . "/mypmb4/assets/dist/logo/logo_stmik.png"; ?>" class="logo1">
        <img src="<?php echo $root . "/SIPS/assets/images1/logo_100.png"; ?>" class="logo2">
        <h2 class="text">SEKOLAH TINGGI MANAJEMEN INFORMATIKA CIC</h2>
        <p style="margin-top: -10px; font-size: 12px">Jl. Ki Yani Blok Karang Anyar RT.14/03 Desa Cikeduk Kecamatan Depok<br>
            Kabupaten Cirebon Tlp. (0231) 342501 Email : smkasyifa17@gmail.com<br>
        </p>
    </div>
    <div class='sub-header'>
        <h2>LAPORAN SURAT MASUK</h2>
    </div>
    <table width='100%' cellspacing='0' border='1' cellpadding='5'>
        <tr style="text-align: center;">
            <td>No.</td>
            <td>Jenis Surat</td>
            <td>Nomor Surat</td>
            <td>Perihal</td>
            <td>Asal Surat</td>
            <td>Tanggal Surat</td>
            <td>Tanggal Diterima</td>
        </tr>
        <?php $no = 1;
        foreach ($surat_masuk as $key => $data) : ?>
            <tr style="text-align: center;">
                <td><?= $no++ ?>.</td>
                <td><?= $data->jenis_surat ?></td>
                <td><?= $data->no_surat ?></td>
                <td><?= $data->perihal ?></td>
                <td><?= $data->asal_surat ?></td>
                <td><?= $data->tgl_surat ?></td>
                <td><?= $data->tgl_diterima ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>