<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detail Administrator
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
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/dist/img/profile/<?php echo $admin['foto_admin']; ?>" alt="User profile picture">
                        <br>
                        <h3 class="profile-username text-center"><?php echo $admin['nama_admin']; ?></h3>
                        <p class="text-muted text-center"><?php echo $admin['level']; ?></p>
                    </div>
                </div>



            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profile Administrator</h3>
                    </div>

                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <td>Nama</td>
                                <td>: <?php echo $admin['nama_admin']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: <?php echo $admin['email_admin']; ?></td>
                            </tr>
                            <tr>
                                <td>Dibuat Tanggal</td>
                                <td>: <?php echo date('d F Y', $admin['tgl_buat']); ?></td>
                            </tr>
                            <tr>
                                <td>Handphone</td>
                                <td>: <?php echo $admin['telepon_admin']; ?></td>
                            </tr>
                        </table>

                        <br>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?php echo site_url('manajemen_user/index'); ?>" type="submit" class="btn btn-primary"><i class="fa fa-rotate-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>