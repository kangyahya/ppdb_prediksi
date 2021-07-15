<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Profile
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata('message'); ?>
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
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#edit_profil" data-toggle="tab">Edit Profil</a></li>
                        <li><a href="#change_password" data-toggle="tab">Change Password</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="edit_profil">
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data" action="<?= site_url('profile/edit_admin/' . $admin['id_admin']) ?>" class="form-horizontal">
                                    <input type="hidden" name="id" value="<?php echo $admin['id_admin']; ?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="nama" class="col-sm-3 control-label">Nama</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $admin['nama_admin']; ?>">
                                                <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama" class="col-sm-3 control-label">Username</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $admin['username_admin']; ?>">
                                                <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama" class="col-sm-3 control-label">Handphone</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="handphone" name="handphone" value="<?php echo $admin['telepon_admin']; ?>">
                                                <?php echo form_error('handphone', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama" class="col-sm-3 control-label">Photo</label>
                                            <div class="col-sm-6">
                                                <input type="file" class="form-control" id="foto" name="foto">
                                            </div>
                                        </div>

                                        <br>
                                        <div class="box-footer">
                                            <div class="pull-left">
                                                <a href="<?php echo site_url('profile'); ?>" type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane" id="change_password">
                            <div class="box-body">
                                <form method="post" action="<?= site_url('profile/change_passwordAdmin/' . $admin['id_admin']) ?>" class="form-horizontal">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="nama" class="col-sm-3 control-label">Password Lama</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="pw_lama" name="pw_lama" placeholder="Masukkan Password Lama *" value="<?php echo set_value('pw_lama'); ?>">
                                                <?php echo form_error('pw_lama', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama" class="col-sm-3 control-label">Password Baru</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="pw_baru" name="pw_baru" placeholder="Masukkan Password Baru *" value="<?php echo set_value('pw_baru'); ?>">
                                                <?php echo form_error('pw_baru', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama" class="col-sm-3 control-label">Ulangi Password</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="pw_baru2" name="pw_baru2" placeholder="Ulangi Password Baru *">
                                                <?php echo form_error('pw_baru2', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="box-footer">
                                            <div class="pull-left">
                                                <a href="<?php echo site_url('profile'); ?>" type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>