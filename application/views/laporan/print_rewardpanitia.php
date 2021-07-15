<html>

<head>
    <title>Laporan Reward</title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/dist/img/logo/cic_putih.png">
</head>

<body>

    <div align='center' width='750px' style="align=" align='center'">
		<div style=" float:left;">
        <img src="<?php echo base_url(); ?>assets/dist/img/logo/logo_stmik.png" width='75px' height='90px'>
    </div>
    <div style="float:center">
        <div style="float:center">
            <center style="line-height:8px">
                <h3> SEKOLAH TINGGI MANAJEMEN INFORMATIKA DAN KOMPUTER CIC </h3>
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
        <?php $total_reward = 0; ?>
        <tr>
            <th>No</th>
            <th>No Form</th>
            <th>Nama Siswa</th>
            <th>Prodi</th>
            <th>Tanggal Daftar</th>
            <th>Tahun Akademik</th>
            <th>Reward</th>
        </tr>
        <?php
        $no = 1;
        foreach ($ppdb as $p) : ?>
            <tr align="center">
                <td><?= $no++ ?></td>
                <td><?= $p['no_form']; ?></td>
                <td><?= $p['nama_siswa'] ?></td>
                <td><?= $p['tanggal_daftar'] ?></td>
                <td><?= $p['tahun_akademik'] ?></td>
                <td>Rp <?= number_format($p['reward'], 0, ',', '.'); ?></td>
            </tr>
            <?php $total_reward = $total_reward + $p['reward']; ?>
        <?php endforeach; ?>
        <tr>
            <td style="font-weight:bold; text-align:center" colspan="6">Total Reward</td>
            <td style="font-weight:bold; text-align:center">
                <?php echo "Rp " . number_format($total_reward, 0, ',', '.'); ?>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <!--
    <div align='right' style='padding-right: 75px;'>Cirebon, <?php echo date("d F Y") ?></div>
-->
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
    <!--
    <div align='right' style='padding-right: 100px;'>Kepala Marketing</div>
-->
    <script>
        window.print();
    </script>

</body>

</html>