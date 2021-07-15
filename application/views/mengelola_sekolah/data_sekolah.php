<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mengelola Sekolah
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <?php echo $this->session->userdata('message'); ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Data Sekolah</h3>
                        <ul class="nav pull-right">
                            <a href="<?php echo site_url('mengelola_sekolah/tambah'); ?>" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Sekolah</a>
                        </ul>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Sekolah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($sekolah as $s) : ?>
                                        <tr>
                                            <td align="center"><?php echo $no++; ?></td>
                                            <td align="center"><?php echo $s['kode_sekolah']; ?></td>
                                            <td><?php echo $s['nama_sekolah']; ?></td>
                                            <td align="center">
                                                <a href="<?php echo site_url('mengelola_sekolah/edit'); ?>/<?php echo $s['id_sekolah']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="<?php echo site_url('mengelola_sekolah/hapus'); ?>/<?php echo $s['id_sekolah']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah data ingin di hapus?')"><i class="fa fa-trash"></i> Delete</a>
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