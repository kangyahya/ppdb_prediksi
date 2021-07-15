<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>


<h3>Laporan Reward Tahun Akademik <?php echo $tahun_akademik['tahun_akademik']; ?></h3>


<table border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Panitia</th>
            <th>Asal Sekolah</th>
            <th>Jumlah PPDB</th>
            <th>Tahun Akademik</th>
            <th>Telepon</th>
            <th>Jumlah Reward</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1;
        foreach ($panitia as $m) : ?>
            <tr>
                <td align="center"><?= $no++; ?></td>
                <td align="center"><?php echo $m['nama_panitia']; ?></td>
                <td align="center"><?php echo $m['nama_sekolah']; ?></td>
                <td align="center"><?php echo $m['ppdb']; ?></td>
                <td align="center"><?php echo $m['tahun_akademik']; ?></td>
                <td align="center"><?php echo $m['telepon_panitia']; ?></td>
                <td align="center">Rp <?php echo number_format($m['total_reward'], 0, ',', '.'); ?></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>