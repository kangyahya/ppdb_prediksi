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
                        <h3 class="box-title">Edit Panitia</h3>
                    </div>

                    <!-- Form -->
                    <br />
                    <form method="post" action="" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo $panitia['id_panitia']; ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $panitia['nama_panitia']; ?>">
                                    <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $panitia['username_panitia']; ?>">
                                    <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">Jabatan</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="jabatan">
                                        <?php if ($panitia['jabatan'] == 'Bimbingan Konseling') {
                                            $bimbingankonseling = "selected";
                                            $tatausaha = "";
                                            $guru = "";
                                            $lainlain = "";
                                        } elseif ($panitia['jabatan'] == 'Tata Usaha') {
                                            $bimbingankonseling = "";
                                            $tatausaha = "selected";
                                            $guru = "";
                                            $lainlain = "";
                                        } elseif ($panitia['jabatan'] == 'Guru') {
                                            $bimbingankonseling = "";
                                            $tatausaha = "";
                                            $guru = "selected";
                                            $lainlain = "";
                                        } else {
                                            $bimbingankonseling = "";
                                            $tatausaha = "";
                                            $guru = "";
                                            $lainlain = "selected";
                                        }; ?>
                                        <option>Pilih Jabatan</option>
                                        <option <?php echo $bimbingankonseling; ?> value="Bimbingan Konseling"> Bimbingan Konseling</option>
                                        <option <?php echo $tatausaha; ?> value="Tata Usaha"> Tata Usaha</option>
                                        <option <?php echo $guru; ?> value="Guru"> Guru</option>
                                        <option <?php echo $lainlain; ?> value="Lain-lain"> Lain-lain</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telepon" class="col-sm-3 control-label">Telepon</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo $panitia['telepon_panitia']; ?>">
                                    <?php echo form_error('telepon', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('mengelola_user/panitia'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
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