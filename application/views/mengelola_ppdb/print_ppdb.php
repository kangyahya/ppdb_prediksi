<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PPDB SMP NEGERI 17 KOTA CIREBON | Print PPDB</title>

    <!-- Logo CIC -->
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/dist/img/logo/cic_putih.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <br>
                    <br>
                    <h2 class="page-header">
                        <i class="fa fa-user"></i> Data PPDB
                    </h2>
                </div>
                <!-- /.col -->
            </div>

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>: <?php echo $ppdb['nama_siswa']; ?></td>
                        </tr>
                        <tr>
                            <td>Tempat / Tanggal Lahir</td>
                            <td>: <?php echo $ppdb['tempat_lahir']; ?>,<?php echo $ppdb['tanggal_lahir']; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: <?php echo $ppdb['jenis_kelamin']; ?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>: <?php echo $ppdb['agama']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?php echo $ppdb['alamat_siswa']; ?></td>
                        </tr>
                        <tr>
                            <td>Status Tempat Tinggal</td>
                            <td>: <?php echo $ppdb['status_tinggal']; ?></td>
                        </tr>
                        <tr>
                            <td>Telepon/Handphone</td>
                            <td>: <?php echo $ppdb['telepon_siswa']; ?></td>
                        </tr>
                        <tr>
                            <td>Status Bekerja</td>
                            <td>: <?php echo $ppdb['status_bekerja']; ?></td>
                        </tr>
                    </table>
                </div>
                <!-- /.col -->
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-home"></i> Data Sekolah
                    </h2>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table">
                        <tr>
                            <td>Nama Sekolah</td>
                            <td>: <?php echo $ppdb['nama_sekolah']; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Sekolah</td>
                            <td>: <?php echo $ppdb['jenis_sekolah']; ?></td>
                        </tr>
                        <tr>
                            <td>Jurusan Sekolah</td>
                            <td>: <?php echo $ppdb['jurusan_sekolah']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-user"></i> Data Orang Tua/Wali
                    </h2>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table">
                        <tr>
                            <td>Nama Ibu Kandung</td>
                            <td>: <?php echo $ppdb['nama_ibu']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?php echo $ppdb['alamat_ortu']; ?></td>
                        </tr>
                        <tr>
                            <td>Kode POS</td>
                            <td>: <?php echo $ppdb['kode_pos']; ?></td>
                        </tr>
                        <tr>
                            <td>Telepon Rumah</td>
                            <td>: <?php echo $ppdb['telepon_ortu']; ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>: <?php echo $ppdb['pekerjaan_ortu']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-user"></i> Data Pemilihan Program Studi
                    </h2>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table">
                        <tr>
                            <td>Program Yang Dipilih</td>
                            <td>: <?php echo $ppdb['nama_kampus']; ?></td>
                        </tr>
                        <tr>
                            <td>Jenjang Pendidikan</td>
                            <td>: <?php echo $ppdb['nama_jenjang']; ?></td>
                        </tr>
                        <tr>
                            <td>Program Studi / Jurusan</td>
                            <td>: <?php echo $ppdb['nama_prodi']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>

        </section>
    </div>

    </div>
    <!-- ./wrapper -->
</body>

</html>