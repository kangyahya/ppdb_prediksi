<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Lihat Prediksi Jalur Pendaftaran
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->userdata('message'); ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Lihat Prediksi Jalur Pendaftaran</h3>
                        <ul class="nav pull-right">
                            <a href="<?php echo site_url('hasil_prediksi/prediksi_jalur'); ?>" type="button" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
                        </ul>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No Form</th>
                                        <th>Nama</th>
                                        <th>Tahun Akademik</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Telepon</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($pendaftar as $p) : ?>
                                        <tr>
                                            <td align="center"><?php echo $p['no_form']; ?></td>
                                            <td><?php echo $p['nama_siswa']; ?></td>
                                            <td><?php echo $p['tahun_akademik']; ?></td>
                                            <td><?php echo $p['tanggal_daftar']; ?></td>
                                            <td><?php echo $p['jenis_kelamin']; ?></td>
                                            <td><?php echo $p['telepon_siswa']; ?></td>
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