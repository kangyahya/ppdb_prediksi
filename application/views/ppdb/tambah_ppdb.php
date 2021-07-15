<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tambah PPDB
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-xs-12">
                <form action="<?php echo site_url('ppdb/tambah_ppdb'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                    <!-- /.col -->
    <div class="col-md-15">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#data_ppdb" data-toggle="tab">PPDB</a></li>
                <li><a href="#data_domisili" data-toggle="tab">Domisili Kartu Keluarga</a></li>
                <li><a href="#data_pilihan" data-toggle="tab">Sekolah & Jalur PPDB</a></li>
            <!--
                <li><a href="#data_nilai" data-toggle="tab">Nilai Siswa</a></li>
            -->
                <li><a href="#data_berkas" data-toggle="tab">Dokumen Persyaratan</a></li>
            </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="data_ppdb">
                            <div class="box-body">
                                <table class="table">
                            <div class="form-group">
                                <label for="no_form" class="col-sm-3 control-label">Tahun Akademik</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="tahun_akademik">
                                        <option>Pilih Tahun Akademik</option>
                                        <?php for ($tahun = 2018; $tahun <= date('Y') + 1; $tahun++) { ?>
                                            <option value="<?php echo ($tahun - 1) . "/" . $tahun; ?>"> <?php echo ($tahun - 1) . "/" . $tahun; ?> </option>
                                        <?php }; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Nama Siswa</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama'); ?>">
                                    <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Jenis Kelamin</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="jenis">
                                        <option>-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tempat" class="col-sm-3 control-label">Tempat</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo set_value('tempat'); ?>">
                                    <?php echo form_error('tempat', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tgl" class="col-sm-3 control-label">Tanggal Lahir</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo set_value('tgl'); ?>">
                                    <?php echo form_error('tgl', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="agama" class="col-sm-3 control-label">Agama</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="agama">
                                        <option>-- Pilih Agama --</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Perempuan">Kristen Protestan</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                        <!--
                            <div class="form-group">
                                <label for="umur" class="col-sm-3 control-label">Umur Siswa</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="umur" max="13" name="umur" value="<?php // echo set_value('umur'); ?>">
                                    <?php //echo form_error('umur', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                        -->
                        </table>
                    </div>
                </div>

                    <div class="tab-pane" id="data_domisili">
                            <div class="box-body">
                                <table class="table">

                            <div class="form-group">
                                <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo set_value('alamat'); ?>">
                                    <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kelurahan/Desa </label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="kel">
                                        <option>-- Pilih Kelurahan --</option>
                                        <?php foreach ($kelurahan as $a) : ?>
                                            <option value="<?php echo $a['id_kelurahan']; ?>"><?php echo $a['kelurahan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="rt" class="col-sm-3 control-label">RT</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="rt" name="rt" value="<?php echo set_value('rt'); ?>">
                                    <?php echo form_error('rt', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="rw" class="col-sm-3 control-label">RW</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="rw" name="rw" value="<?php echo set_value('rw'); ?>">
                                    <?php echo form_error('rw', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="kec">
                                        <option>-- Pilih Kecamatan --</option>
                                        <?php foreach ($kecamatan as $b) : ?>
                                            <option value="<?php echo $b['id_kecamatan']; ?>"><?php echo $b['kecamatan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        </table>
                    </div>
                </div>

                <div class="tab-pane" id="data_pilihan">
                    <div class="box-body">
                        <table class="table">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Asal Sekolah</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="sekolah">
                                        <option>Pilih Asal Sekolah</option>
                                        <?php foreach ($sekolah as $s) : ?>
                                            <option value="<?php echo $s['id_sekolah']; ?>"><?php echo $s['nama_sekolah']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jalur Pendaftaran </label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="jalur">
                                        <option>Pilih Jalur Pendaftaran </option>
                                        <?php foreach ($jalur_pendaftaran as $j) : ?>
                                            <option value="<?php echo $j['id_jalur']; ?>"><?php echo $j['nama_jalur']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                        </table>
                    </div>
                </div>

            <div class="tab-pane" id="data_berkas">
                <div class="box-body">
                    <table class="table">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Berkas</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <input type="file" class="form-control" id="berkas" name="berkas">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pas Foto</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <input type="file" class="form-control" id="foto" name="foto">
                                </div>
                            </div>
                    </table>

                                <br>
                                <br>
                                <tr>
                                    <a href="<?php echo site_url('ppdb'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
                                    <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                </tr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>