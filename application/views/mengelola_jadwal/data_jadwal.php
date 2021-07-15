<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen Jadwal
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <?php echo $this->session->userdata('message'); ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Jadwal PPDB</h3>
                        <ul class="nav pull-right">
                            <a href="<?php echo site_url('manajemen_jadwal/tambah'); ?>" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Jadwal</a>
                        </ul>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td align="center">No</td>
                                        <td align="center">Tanggal Mulai</td>
                                        <td align="center">Tanggal Berakhir</td>
                                        <td align="center">Tahapan</td>
                                        <td align="center">Action</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jadwal as $l) : ?>
                                        <tr>
                                            <td align="center"><?php echo $no++; ?></td>
                                            <td align="center"><?php echo $l['tanggal_mulai']; ?></td>
                                            <td><?php echo $l['tanggal_selesai']; ?></td>
                                            <td align="center"><?php echo $l['tahapan']; ?></td>
                                            <td align="center">
                                                <a href="<?php echo site_url('mengelola_jadwal/edit'); ?>/<?php echo $l['id_jadwal']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="<?php echo site_url('mengelola_jadwal/hapus'); ?>/<?php echo $l['id_jadwal']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah data ingin di hapus?')"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>