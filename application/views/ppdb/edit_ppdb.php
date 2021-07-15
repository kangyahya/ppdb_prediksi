<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit PPDB
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <form action="" method="post" class="form-horizontal">
                    <input type="hidden" name="no_form" value="<?php echo $pendaftar['no_form']; ?>">
<!-- /.col -->
    <div class="col-md-15">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#data_ppdb" data-toggle="tab">PPDB</a></li>
                <li><a href="#data_domisili" data-toggle="tab">Domisili KK</a></li>
                <li><a href="#data_pilihan" data-toggle="tab">Sekolah & Jalur PPDB</a></li>
            <!--
                <li><a href="#data_nilai" data-toggle="tab">Nilai Siswa</a></li>
                <li><a href="#data_berkas" data-toggle="tab">Dokumen Persyaratan</a></li>
            -->
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
                                        <?php for ($tahun = 2017; $tahun <= date('Y'); $tahun++) : ?>
                                            <?php if ($ppdb['tahun_akademik'] == ($tahun . "/" . ($tahun + 1))) : ?>
                                                <option value="<?= $tahun . "/" . ($tahun + 1) ?>" selected><?= $tahun . "/" . ($tahun + 1); ?></option>
                                            <?php else : ?>
                                                <option value="<?= $tahun . "/" . ($tahun + 1) ?>"><?php echo $tahun . "/" . ($tahun + 1) ?> </option>
                                            <?php endif ?>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nomor" class="col-sm-3 control-label">NISN</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nomor" name="nomor" value="<?php echo $pendaftar['nisn']; ?>">
                                <?php echo form_error('nomor', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>

                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Nama Siswa</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $pendaftar['nama_siswa']; ?>">
                                <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jenis" class="col-sm-3 control-label">Jenis Kelamin</label>
                            <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="jenis">
                                        <?php if ($ppdb['jenis_kelamin'] == 'Laki-Laki') {
                                            $laki = "selected";
                                            $perempuan = "";
                                        } else {
                                            $laki = "";
                                            $perempuan = "selected";
                                        }; ?>
                                        <option>-- Pilih Jenis Kelamin --</option>
                                        <option <?php echo $laki; ?> value="Laki-Laki">Laki-Laki</option>
                                        <option <?php echo $perempuan; ?> value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                        </div>

                            
                        <div class="form-group">
                            <label for="tempat" class="col-sm-3 control-label">Tempat Lahir</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo $pendaftar['tempat_lahir']; ?>">
                                <?php echo form_error('tempat', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label for="tgl" class="col-sm-3 control-label">Tanggal Lahir</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo $pendaftar['tgl_lahir']; ?>">
                                <?php echo form_error('tgl', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>

                            
                        <div class="form-group">
                            <label for="agama" class="col-sm-3 control-label">Agama</label>
                            <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="agama">
                                        <?php if ($ppdb['agama'] == 'Islam') {
                                            $islam      = "selected";
                                            $kristen    = "";
                                            $katolik    = "";
                                            $hindu      = "";
                                            $budha      = "";
                                            $konghucu   = "";
                                        } elseif ($pendaftar['agama'] == 'Kristen Protestan') {
                                            $islam      = "";
                                            $kristen    = "selected";
                                            $katolik    = "";
                                            $hindu      = "";
                                            $budha      = "";
                                            $konghucu   = "";
                                        } elseif ($pendaftar['agama'] == 'Katolik') {
                                            $islam      = "";
                                            $kristen    = "";
                                            $katolik    = "selected";
                                            $hindu      = "";
                                            $budha      = "";
                                            $konghucu   = "";
                                        } elseif ($pendaftar['agama'] == 'Hindu') {
                                            $islam      = "";
                                            $kristen    = "";
                                            $katolik    = "";
                                            $hindu      = "selected";
                                            $budha      = "";
                                            $konghucu   = "";
                                         } elseif ($pendaftar['agama'] == 'Budha') {
                                            $islam      = "";
                                            $kristen    = "";
                                            $katolik    = "";
                                            $hindu      = "";
                                            $budha      = "selected";
                                            $konghucu   = "";
                                        } else {
                                            $islam      = "";
                                            $kristen    = "";
                                            $katolik    = "";
                                            $hindu      = "";
                                            $budha      = "";
                                            $konghucu   = "selected";
                                        }; ?>
                                        <option>-- Pilih Agama --</option>
                                        <option <?php echo $islam; ?> value="Islam">Islam</option>
                                        <option <?php echo $kristen; ?> value="Kristen Protestan">Kristen Protestan</option>
                                        <option <?php echo $katolik; ?> value="Katolik">Katolik</option>
                                        <option <?php echo $hindu; ?> value="Hindu">Hindu</option>
                                        <option <?php echo $budha; ?> value="Budha">Budha</option>
                                        <option <?php echo $konghucu; ?> value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                        </div>

                        </table>
                    </div>
                </div>

                <div class="tab-pane" id="data_domisili">
                            <div class="box-body">
                                <table class="table">

                            <div class="form-group">
                                <label for="kk" class="col-sm-3 control-label">No. KK</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="kk" max="16"name="kk" value="<?php echo $pendaftar['no_kk']; ?>">
                                <?php echo form_error('kk', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            </div>

                            <div class="form-group">
                                <label for="induk" class="col-sm-3 control-label">No. Induk Keluarga</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="induk" name="induk" value="<?php echo $pendaftar['no_induk']; ?>">
                                    <?php echo form_error('induk', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tgl" class="col-sm-3 control-label">Tanggal Terbit KK</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo $pendaftar['tgl_terbit']; ?>">
                                    <?php echo form_error('tgl', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat" class="col-sm-3 control-label">Alamat Siswa</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $pendaftar['alamat_siswa']; ?>">
                                    <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kelurahan/Desa</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="id_kelurahan">
                                    <option>-- Pilih Kelurahan -- </option>
                                        <?php foreach ($kelurahan as $a) :
                                            if ($pendaftar['id_kelurahan'] == $a['id_kelurahan']) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            ?>
                                    <option <?= $selected; ?> value="<?php echo $a['id_kelurahan']; ?>"><?php echo $a['kelurahan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="rt" class="col-sm-3 control-label">RT</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tgl" name="rt" value="<?php echo $pendaftar['rt']; ?>">
                                    <?php echo form_error('rt', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="rw" class="col-sm-3 control-label">RW</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="rw" name="rw" value="<?php echo $pendaftar['rw']; ?>">
                                    <?php echo form_error('rw', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="id_kecamatan">
                                    <option>-- Pilih Kecamatan -- </option>
                                        <?php foreach ($kecamatan as $b) :
                                            if ($pendaftar['id_kecamatan'] == $b['id_kecamatan']) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            ?>
                                    <option <?= $selected; ?> value="<?php echo $b['id_kecamatan']; ?>"><?php echo $b['kecamatan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        </table>
                    </div>
                </div>

                        </table>

                <div class="tab-pane" id="data_pilihan">
                    <div class="box-body">
                        <table class="table">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Asal Sekolah</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="sekolah">
                                        <option>Pilih Asal Sekolah</option>
                                        <?php foreach ($sekolah as $s) :
                                            if ($pendaftar['id_sekolah'] == $s['id_sekolah']) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            ?>
                                                    <option <?= $selected; ?> value="<?php echo $s['id_sekolah']; ?>"><?php echo $s['nama_sekolah']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jalur Pendaftaran</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="id_jalur">
                                    <option>-- Pilih Jalur Pendaftaran -- </option>
                                        <?php foreach ($jalur_pendaftaran as $j) :
                                            if ($pendaftar['id_jalur'] == $j['id_jalur']) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            ?>
                                    <option <?= $selected; ?> value="<?php echo $j['id_jalur']; ?>"><?php echo $j['nama_jalur']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            </div>
                        </table>
                    </div>
                </div>

        <!--
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
                        </div>
                    </div>
        -->
                    </table>

                                <br>
                                <br>
                                <tr>
                                    <a href="<?php echo site_url('ppdb'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Edit</button>
                                </tr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>