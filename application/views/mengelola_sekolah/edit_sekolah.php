<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mengelola Sekolah
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Sekolah</h3>
                    </div>

                    <!-- Form -->
                    <br />
                    <form action="" method="post" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo $sekolah['id_sekolah']; ?>">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Kode Sekolah</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $sekolah['kode_sekolah']; ?>">
                                    <?php echo form_error('kode', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Nama Sekolah</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $sekolah['nama_sekolah']; ?>">
                                    <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('mengelola_sekolah'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
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