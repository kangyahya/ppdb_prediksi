<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detail Panitia
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <br>
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/dist/img/profile/<?php echo $panitia['foto_panitia']; ?>" alt="User profile picture">
                        <br>
                        <h3 class="profile-username text-center"><?php echo $panitia['nama_panitia']; ?></h3>
                        <p class="text-muted text-center"><?php echo $panitia['level']; ?></p>
                    </div>
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profile Panitia</h3>
                    </div>

                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <td>Nama</td>
                                <td>: <?php echo $panitia['nama_panitia']; ?></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>: <?php echo $panitia['jabatan']; ?></td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>: <?php echo $panitia['telepon_panitia']; ?></td>
                            </tr>
                            <tr>
                                <td>Dibuat Pada</td>
                                <td>: <?php echo date('d F Y', $panitia['tgl_buat']); ?></td>
                            </tr>
                        </table>

                        <br>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?php echo site_url('mengelola_user/panitia'); ?>" type="submit" class="btn btn-primary"><i class="fa fa-rotate-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>