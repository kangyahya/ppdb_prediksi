<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen Sekolah
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Sekolah</h3>
                    </div>

                    <!-- Form -->
                    <br />
                    <form action="<?php echo site_url('mengelola_sekolah/tambah'); ?>" method="post" class="form-horizontal">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Kode Sekolah</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="kode" name="kode" value="<?php echo set_value('kode'); ?>" placeholder="Masukkan Kode Sekolah *">
                                    <?php echo form_error('kode', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Nama Sekolah</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama'); ?>" placeholder="Masukkan Nama Sekolah *">
                                    <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('mengelola_sekolah'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
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