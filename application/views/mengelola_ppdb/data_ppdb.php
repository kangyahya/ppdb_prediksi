pp<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mengelola PPDB
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
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama Siswa</th>
                                        <th>Member</th>
                                        <th>Sekolah</th>
                                        <th>Jalur Pendaftaran</th>
                                        <th>Kelurahan</th>
                                        <th>Kecamatan</th>
                                        <th>Tahun Akademik</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($ppdb as $p) : ?>
                                        <tr>
                                            <td align="center"><?php echo $no++ ?></td>
                                            <td><img src="<?php echo base_url('upload/pasfoto/' . $p['foto_siswa']); ?>" class="img-circle img-sm" alt="User Image"></td>
                                            <td><?php echo $p['nama_siswa']; ?></td>
                                            <td><?php echo $p['nama_panitia']; ?></td>
                                            <td align="center"><?php echo $p['nama_sekolah']; ?></td>
                                            <td align="center"><?php echo $p['nama_jalur']; ?></td>
                                            <td align="center"><?php echo $p['kelurahan']; ?></td>
                                            <td align="center"><?php echo $p['kecamatan']; ?></td>
                                            <td align="center"><?php echo $p['tahun_akademik']; ?></td>
                                            <td align="center">
                                                <?php if ($p['status_verifikasi'] == 1) { ?>
                                                    <a href="" class="label label-success btn-block"> Terverifikasi</a>
                                                <?php } else { ?>
                                                    <a href="<?php echo site_url('mengelola_ppdb/update_verifikasi/' . $p['no_form']); ?>" class="label label-danger btn-block tombol-verifikasi"> Belum Terverifikasi</a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url('mengelola_ppdb/detail'); ?>/<?php echo $p['no_form']; ?>" class="btn btn-primary btn-xs" title="Detail"><i class="fa fa-eye"></i></a>
                                                <a href="<?= base_url('upload/berkas/' . $p['berkas_pendaftar']); ?>" class="btn btn-danger btn-xs" target="blank" title="Download Berkas"><i class="fa fa-download"></i></a>
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