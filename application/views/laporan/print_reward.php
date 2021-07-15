<html>

<head>
    <title>Laporan Reward</title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/dist/img/logo/cic_putih.png">
</head>

<body>

    <div align='center' width='750px' style="float:center">
        <div style=" float:left;">
            <img src="<?php echo base_url(); ?>assets/dist/img/logo/ucic.png" width='75px' height='90px'>
        </div>
        <div style="float:center">
            <div style="float:center">
                <center style="line-height:8px">
                    <h3> UNIVERSITAS CATUR INSAN CENDEKIA </h3>
                    <p>Terakreditasi Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT)</p>
                    <p> Jl. Kesambi No. 202 Cirebon - 45133. Telp (0231) 200418, 220250. Fax (0231) 242112</p>
                    <p> Website : http://www.cic.ac.id Email : info@cic.ac.id</p>
                </center>
            </div>
        </div>
    </div>
    <hr size="2" style="background-color:black">
    <br>
    <h3>Laporan Reward Tahun Akademik <?php echo $tahun_akademik['tahun_akademik']; ?></h3>
    <table border=1 cellspadding=0 cellspacing=0 style="width: 100%">
        <tr>
            <th>No</th>
            <th>Nama Member</th>
            <th>Asal Sekolah</th>
            <th>Jumlah PPDB</th>
            <th>Tahun Akademik</th>
            <th>Telepon</th>
            <th>Jumlah Reward</th>
        </tr>
        <?php
        $no = 1;
        foreach ($member as $data) : ?>
            <tr>
                <td align="center"><?= $no++ ?></td>
                <td><?= $data['nama_panitia'] ?></td>
                <td align="center"><?= $data['nama_sekolah'] ?></td>
                <td align="center"><?= $data['ppdb'] ?></td>
                <td align="center"><?= $data['tahun_akademik'] ?></td>
                <td align="center"><?= $data['telepon_panitia']; ?></td>
                <td align="center">Rp <?= number_format($data['total_reward'], 0, ',', '.') ?></tdalign>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <br>
    <br>
    <div align='right' style='padding-right: 75px;'>Cirebon, <?php echo date("d F Y") ?></div>
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