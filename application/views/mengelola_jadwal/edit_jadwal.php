<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mengelola Jadwal
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Jadwal</h3>
                    </div>

                    <!-- Form -->
                    <br />
                    <form action="" method="post" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo $jadwal['id_jadwal']; ?>">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="mulai" class="col-sm-3 control-label">Tanggal Mulai</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="mulai" name="mulai" value="<?php echo $jadwal['tanggal_mulai']; ?>">
                                    <?php echo form_error('mulai', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="selesai" class="col-sm-3 control-label">Tanggal Berakhir</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="selesai" name="selesai" value="<?php echo $jadwal['tanggal_selesai']; ?>">
                                    <?php echo form_error('selesai', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tahapan" class="col-sm-3 control-label">Tahapan</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tahapan" name="tahapan" value="<?php echo $jadwal['tahapan']; ?>">
                                    <?php echo form_error('tahapan', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('mengelola_jadwal'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
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