<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen User
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Administrator</h3>
                    </div>

                    <!-- Form -->
                    <br />
                    <form method="post" action="" class="form-horizontal">
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
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $admin['email_admin']; ?>">
                                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $admin['username_admin']; ?>">
                                    <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telepon" class="col-sm-3 control-label">Telepon</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo $admin['telepon_admin']; ?>">
                                    <?php echo form_error('telepon', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('manajemen_user/index'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Edit</button>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>