<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            PPDB
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
                        <h3 class="box-title">Data PPDB</h3>
                        <ul class="nav pull-right">
                            <a href="<?php echo site_url('ppdb/tambah_ppdb'); ?>" type="button" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah PPDB</a>
                            <a href="#import_data" class="btn btn-primary" data-toggle="modal"><i class="fa fa-send"></i> Import Data</a>
                        </ul>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Akademik</th>
                                        <th>Foto</th>
                                        <th>Nama Siswa</th>
                                        <th>Asal Sekolah</th>
                                        <th>Jalur Pendaftaran</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Status Verifikasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($ppdb as $p) : ?>
                                        <tr>
                                            <td align="center"><?php echo $no++; ?></td>
                                            <td align="center"><?php echo $p['tahun_akademik']; ?></td>
                                            <td><img src="<?php echo base_url('upload/pasfoto/' . $p['foto_siswa']); ?>" class="img-circle img-sm" alt="User Image"></td>
                                            <td><?php echo $p['nama_siswa']; ?></td>
                                            <td><?php echo $p['nama_sekolah']; ?></td>
                                            <td><?php echo $p['nama_jalur']; ?></td>
                                            <td><?php echo $p['kecamatan']; ?></td>
                                            <td><?php echo $p['kelurahan']; ?></td>
                                            <td align="center"><?php echo $p['tanggal_daftar']; ?></td>
                                            
                                            <td align="center">
                                                <?php if ($p['status_verifikasi'] == 1) { ?>
                                                    <span class="label label-success"> Terverifikasi</span>
                                                <?php } else { ?>
                                                    <span class="label label-danger"> Belum Terverifikasi</span>
                                                <?php } ?>
                                            </td>
                                            <td align="center">
                                                <a href="<?php echo site_url('ppdb/detail'); ?>/<?php echo $p['no_form']; ?>" class="btn btn-primary btn-xs" title="Detail"><i class="fa fa-eye"></i></a>
                                                <a href="<?php echo site_url('ppdb/edit'); ?>/<?php echo $p['no_form']; ?>" class="btn btn-success btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo site_url('ppdb/hapus'); ?>/<?php echo $p['no_form']; ?>" class="btn btn-danger btn-xs tombol-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
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
    <!-- /.content -->
</div>


<div class="modal fade" id="import_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="<?=site_url('ppdb/import_data_ppdb')?>" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <a href="<?=base_url('upload/format/import_data_format.xls')?>" class="btn btn-success">Download Format</a>
            <div class="form-group">
                <label>Pilih File Excel</label>
                <input type="file" name="fileExcel">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>