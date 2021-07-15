<html>

<head>
    <title>Laporan PPDB</title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/dist/img/logo/cic_putih.png">
</head>

<body>

    <div align='center' width='750px' style="float:center">
        <div style="float:left">
            <img src="<?php echo base_url(); ?>assets/dist/img/logo/ucic.png" width='75px' height='91px'>
        </div>
        <div style="float:center">
            <center style="line-height:8px">
                <h3> UNIVERSITAS CATUR INSAN CENDEKIA </h3>
                <p>Terakreditasi Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT)</p>
                <p> Jl. Kesambi No. 202 Cirebon - 45133. Telp (0231) 200418, 220250. Fax (0231) 242112</p>
                <p> Website : http://www.cic.ac.id Email : info@cic.ac.id</p>
            </center>
        </div>
    </div>
    <hr size="2" style="background-color:black">
    <br>
    <h3>Laporan PPDB Tahun Akademik <?php echo $tahun_akademik['tahun_akademik']; ?></h3>
    <table border=1 cellspadding=0 cellspacing=0 style="width: 100%">
        <tr>
            <th>No</th>
            <th>No Form</th>
            <th>Nama Pendaftar</th>
            <th>Asal Sekolah</th>
            <th>Prodi</th>
            <th>Member</th>
            <th>Tahun Akademik</th>
            <th>Tanggal Daftar</th>
        </tr>
        <?php
        $no = 1;
        foreach ($pendaftar as $data) : ?>
            <tr>
                <td align="center"><?= $no++; ?></td>
                <td align="center"><?= $data['no_form'] ?></td>
                <td><?= $data['nama_siswa'] ?></td>
                <td align="center"><?= $data['nama_sekolah'] ?></td>
                <td><?= $data['nama_prodi'] ?></td>
                <td><?= $data['nama_member'] ?></td>
                <td align="center"><?= $data['tahun_akademik'] ?></td>
                <td align="center"><?= $data['tanggal_daftar'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <br>
    <br>
    <div align='right' style='padding-right: 74px;'>Cirebon, <?php echo date("d F Y") ?></div>
    <br>
    <br>
    <br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;
    <div align='right' style='padding-right: 100px;'>Kepala Marketing</div>
    <script>
        window.print();
    </script>

</body>

</html>