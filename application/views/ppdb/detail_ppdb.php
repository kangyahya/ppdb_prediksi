<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detail PPDB
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <br>
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-avatar" src="<?php echo base_url(); ?>upload/pasfoto/<?php echo $pendaftar['foto_siswa']; ?>" alt="User profile picture">
                        <br>
                        <h3 class="profile-username text-center"><?php echo $ppdb['nama_siswa']; ?></h3>
                        <p class="text-muted text-center">No Form : <?php echo $ppdb['no_form']; ?></p>
                        <p class="text-muted text-center">Tanggal Daftar : <?php echo $ppdb['tanggal_daftar']; ?></p>
                        <br>
                        <b>
                            <?php if ($ppdb['status_verifikasi'] == 1) { ?>
                                <span class="btn btn-success btn-block"> Terverifikasi</span>
                            <?php } else { ?>
                                <span class="btn btn-danger btn-block"> Belum Terverifikasi</span>
                            <?php } ?>
                        </b>
                    </div>
                </div>

            </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#data_ppdb" data-toggle="tab">PPDB</a></li>
                <li><a href="#data_domisili" data-toggle="tab">Domisili KK</a></li>
                <li><a href="#data_pilihan" data-toggle="tab">Sekolah & Jalur PPDB</a></li>
                <li><a href="#data_nilai" data-toggle="tab">Nilai Siswa</a></li>
                <li><a href="#data_berkas" data-toggle="tab">Dokumen Persyaratan</a></li>
            </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="data_ppdb">
                            <div class="box-body">
                                <table class="table">
                                    <tr>
                                        <td>Tahun Akademik</td>
                                        <td>: <?php echo $ppdb['tahun_akademik']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>NISN</td>
                                        <td>: <?php echo $ppdb['nisn']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Nama</td>
                                        <td>: <?php echo $ppdb['nama_siswa']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>: <?php echo $ppdb'jenis_kelamin']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Tempat Lahir</td>
                                        <td>: <?php echo $ppdb['tempat_lahir']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>: <?php echo $ppdb['tgl_lahir']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Agama</td>
                                        <td>: <?php echo $ppdb['agama']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Umur</td>
                                        <td>: <?php echo $ppdb['umur_siswa']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="data_domisili">
                            <div class="box-body">
                                <table class="table">
                                    <tr>
                                        <td>Domisili KK</td>
                                        <td>: <?php echo $ppdb['domisili_kk']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Nomor KK</td>
                                        <td>: <?php echo $ppdb['no_kk']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Nomor Induk Keluarga</td>
                                        <td>: <?php echo $ppdb['no_induk']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal Terbit KK</td>
                                        <td>: <?php echo $ppdb['tgl_terbit']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Alamat Siswa</td>
                                        <td>: <?php echo $ppdb['alamat_siswa']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Kelurahan</td>
                                        <td>: <?php echo $ppdb['kelurahan']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>RT</td>
                                        <td>: <?php echo $ppdb['rt']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>RW</td>
                                        <td>: <?php echo $ppdb['rw']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>: <?php echo $ppdb['kecamatan']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="data_pilihan">
                            <div class="box-body">
                                <table class="table">
                                    <tr>
                                        <td>Asal Sekolah</td>
                                        <td>: <?php echo $ppdb['nama_sekolah']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Jalur Pendaftaran</td>
                                        <td>: <?php echo $ppdb['nama_jalur']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="data_berkas">
                            <div class="box-body">
                                <table class="table">
                                    <tr>
                                        <td>Dokumen Persyaratan</td>
                                        <td>: &nbsp;<?php echo $ppdb['berkas_pendaftar']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Foto Pendaftar</td>
                                        <td>: &nbsp;&nbsp;<img class="profile-user-img img-responsive img-thumbnail" src="<?php echo base_url('upload/pasfoto/' . $pendaftar['foto_siswa']); ?>" alt="User profile picture"></td>
                                    </tr>
                                </table>
                                <br>
                                <br>
                                <tr>
                                    <a href="<?= base_url('upload/berkas/' . $ppdb['berkas_pendaftar']); ?>" class="btn btn-primary"><i class="fa fa-download"></i> Download Berkas</a>
                                    <a href="<?= base_url('upload/pasfoto/' . $ppdb['foto_siswa']); ?>" class="btn btn-success"><i class="fa fa-download"></i> Download Foto</a>
                                </tr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>