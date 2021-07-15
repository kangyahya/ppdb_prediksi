<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mengelola Panitia
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Panitia</h3>
                    </div>

                    <!-- Form -->
                    <br />
                    <form action="<?php echo site_url('mengelola_user/tambah_panitia'); ?>" method="post" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Nama Panitia</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama'); ?>" placeholder="Masukkan Nama Panitia *">
                                    <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" placeholder="Masukkan Username *">
                                    <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Masukkan Password *">
                                    <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Jabatan</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="jabatan">
                                        <option>Pilih Jabatan</option>
                                        <option value="Bimbingan Konseling"> Bimbingan Konseling</option>
                                        <option value="Tata Usaha"> Tata Usaha</option>
                                        <option value="Guru"> Guru</option>
                                        <option value="Lain-lain"> Lain-lain</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telepon" class="col-sm-3 control-label">No Handphone</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo set_value('telepon'); ?>" placeholder="Masukkan Nomor Telepon Panitia *">
                                    <?php echo form_error('telepon', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('mengelola_user/panitia'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
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