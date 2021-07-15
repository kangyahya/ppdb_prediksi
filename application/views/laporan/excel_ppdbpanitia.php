<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>


<h3>Laporan PPDB Tahun Akademik <?php echo $tahun_akademik['tahun_akademik']; ?></h3>


<table border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>No Form</th>
            <th>Nama Siswa</th>
            <th>Tahun Akademik</th>
            <th>Tanggal Daftar</th>

        </tr>
    </thead>

    <tbody>
        <?php $no = 1;
        foreach ($ppdb as $p) : ?>
            <tr>
                <td align="center"><?= $no++; ?></td>
                <td align="center"><?php echo $p['no_form']; ?></td>
                <td><?php echo $p['nama_siswa']; ?></td>
                <td align="center"><?php echo $p['tahun_akademik']; ?></td>
                <td align="center"><?php echo $p['tanggal_daftar']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>