<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mengelola Panitia
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Sweet Alert -->
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
        <?php endif; ?>


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Data Panitia</h3>
                        <ul class="nav pull-right">
                            <a href="<?php echo site_url('mengelola_user/tambah_panitia'); ?>" type="button" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Panitia</a>
                        </ul>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama Panitia</th>
                                        <th>Username</th>
                                        <th>Telepon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($panitia as $m) : ?>
                                        <tr>
                                            <td align="center"><?php echo $no++; ?></td>
                                            <td><img src="<?php echo base_url('assets/dist/img/profile/' . $m['foto_panitia']); ?>" class="img-circle img-sm" alt="User Image"></td>
                                            <td><?php echo $m['nama_panitia']; ?></td>
                                            <td><?php echo $m['username_panitia']; ?></td>
                                            <td><?php echo $m['telepon_panitia']; ?></td>
                                            <td align="center">
                                                <a href="<?php echo site_url('mengelola_user/detail_panitia'); ?>/<?php echo $m['id_panitia']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Detail</a>
                                                <a href="<?php echo site_url('mengelola_user/edit_panitia'); ?>/<?php echo $m['id_panitia']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="<?php echo site_url('mengelola_user/hapus_panitia'); ?>/<?php echo $m['id_panitia']; ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i> Delete</a>
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
</div>