<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            HASIL PREDIKSI DOMISILI
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
                        <form action="<?php echo site_url('hasil_prediksi/domisili'); ?>" method="post" class="form-horizontal">

                            <div class="form-group">
                                <label class="control-label col-sm-4">Tahun Akademik</label>
                                <div class="col-sm-4">
                                    <select class=" form-control" name="tahun_akademik">
                                        <option>Pilih Tahun Akademik</option>
                                        <?php for ($tahun = 2018; $tahun <= date('Y') + 1; $tahun++) { ?>
                                            <option value="<?php echo ($tahun - 1) . "/" . $tahun; ?>" <?=($filter == ($tahun - 1) . "/" . $tahun ) ? "selected" :"";?>> <?php echo ($tahun - 1) . "/" . $tahun; ?> </option>
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
                        <h3 class="box-title">PPDB</h3>
                        <ul class="nav pull-right">
                            <form method="post" target="_blank" action="<?php echo site_url('export/excel_ppdbadmin/') ?>" type="button" class="btn-btn-success">
                                <input type="hidden" name="filter" value="<?= $filter ?>">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-send"></i> Export
                                </button>
                            </form>
                        </ul>
                        <ul class="nav pull-right" style="padding-right:3px;">
                            <form method="post" target="_blank" action="<?php echo site_url('laporan/print_ppdb/') ?>">
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
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Akademik </th>
                                        <th>Kecamatan</th>
                                        <th>Prediksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($ppdb as $p) : ?>
                                        <tr>
                                            <td align="center"><?= $no++; ?></td>
                                            <td><?php echo $p['tahun_akademik']; ?></td>
                                            <td><?php echo $p['kecamatan'] ?></td>
                                            <td><?=$maxi->qty?></td>
                                        </tr>
                                        </tfoot>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Sekolah</h3>
                        <ul class="nav pull-right">
                            <form method="post" target="_blank" action="<?php // echo site_url('export/excel_pendaftaradmin/') ?>" type="button" class="btn-btn-success">
                                <input type="hidden" name="filter" value="<?= $filter ?>">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-send"></i> Export
                                </button>
                            </form>
                        </ul>
                        <ul class="nav pull-right" style="padding-right:3px;">
                            <form method="post" target="_blank" action="<?php //echo site_url('laporan/print_pendaftar/') ?>">
                                <input type="hidden" name="filter" value="<?= $filter ?>">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-print"></i> Print
                                </button>
                            </form>
                        </ul>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Sekolah</th>
                                        <th>Nama Sekolah</th>
                                        <th>Tahun Akademik</th>
                                        <th>Jumlah Pendaftar</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td></td>
                                        <td></td>
                                        <td align="center"></td>
                                    </tr>
                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        -->
        </div>
    </section>
</div>