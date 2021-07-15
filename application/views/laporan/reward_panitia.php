<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Laporan Reward
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Filter Data</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo site_url('laporan/reward_member'); ?>" method="post" class="form-horizontal">

                            <div class="form-group">
                                <label class="control-label col-sm-4">Tahun Akademik</label>
                                <div class="col-sm-4">
                                    <select class=" form-control" name="tahun_akademik">
                                        <option>Pilih Tahun Akademik</option>
                                        <?php for ($tahun = 2018; $tahun <= date('Y') + 1; $tahun++) { ?>
                                            <option value="<?php echo ($tahun - 1) . "/" . $tahun; ?>"> <?php echo ($tahun - 1) . "/" . $tahun; ?> </option>
                                        <?php }; ?>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <button type="submit" class="btn btn-primary col-sm-4"><i class="fa fa-search"></i> Cari</button>
                                </div>
                            </div>
                            <br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Laporan Reward</h3>
                        <ul class="nav pull-right">
                            <form method="post" target="_blank" action="<?php echo site_url('laporan/excel_rewardmember/') ?>" type="button" class="btn-btn-success">
                                <input type="hidden" name="filter" value="<?= $filter ?>">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-send"></i> Export
                                </button>
                            </form>
                        </ul>
                        <ul class="nav pull-right" style="padding-right:3px">
                            <form method="post" target="_blank" action="<?php echo site_url('laporan/print_rewardmember/') ?>">
                                <input type="hidden" name="filter" value="<?= $filter ?>">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-print"></i> Print
                                </button>
                            </form>
                        </ul>

                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="table-responsive">

                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <?php $total_reward = 0; ?>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Form</th>
                                        <th>Nama Siswa</th>
                                        <th>Prodi</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Tahun Akademik</th>
                                        <th>Reward</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    $no = 1;
                                    foreach ($ppdb as $p) : ?>
                                        <tr>
                                            <td align="center"><?= $no++; ?></td>
                                            <td align="center"><?= $p['no_form']; ?></td>
                                            <td><?= $p['nama_siswa']; ?></td>
                                            <td align="center"><?php echo $p['tanggal_daftar']; ?></td>
                                            <td align="center"><?php echo $p['tahun_akademik']; ?></td>
                                            <td align="center">Rp <?= number_format($p['reward'], 0, ',', '.') ?></td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- /.content -->
</div>