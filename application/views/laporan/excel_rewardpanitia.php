<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>


<h3>Laporan Reward Tahun Akademik <?php echo $tahun_akademik['tahun_akademik']; ?></h3>


<table border="1" width="100%">
    <?php $total_reward = 0; ?>
    <thead>
        <tr>
            <th>No</th>
            <th>No Form</th>
            <th>Nama Siswa</th>
            <th>Tanggal Daftar</th>
            <th>Tahun Akademik </th>
            <th>Reward</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1;
        foreach ($ppdb as $p) : ?>
            <tr>
                <td align="center"><?= $no++; ?></td>
                <td align="center"><?php echo $p['no_form']; ?></td>
                <td align="center"><?php echo $p['nama_siswa']; ?></td>
                <td align="center"><?php echo $p['tanggal_daftar']; ?></td>
                <td align="center"><?php echo $p['tahun_akademik']; ?></td>
                <td align="center">Rp <?php echo number_format($p['reward'], 0, ',', '.'); ?></td>
            </tr>
            <?php $total_reward = $total_reward + $p['reward']; ?>
        <?php endforeach; ?>
        <tr>
            <td style="font-weight:bold; text-align:center" colspan="6">Total Reward</td>
            <td style="font-weight:bold; text-align:center">
                <?php echo "Rp " . number_format($total_reward, 0, ',', '.'); ?>
            </td>
        </tr>
    </tbody>
</table>