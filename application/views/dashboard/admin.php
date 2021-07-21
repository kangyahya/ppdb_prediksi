<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

         <!-- /.user-block -->
            <div class="row margin-bottom">
                <div class="col-sm-6">
                    <img style="display:block; margin-left:auto; margin-right:auto" src="<?php echo base_url(); ?>assets/dist/img/photo1.png" width="1790px" height ="200px">
                </div>
            </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li class="active"><a href="#edit_profil" data-toggle="tab">HASIL PREDIKSI</a></li>
                        <li><a href="#change_password" data-toggle="tab">PROFILE</a></li>
                        <li class="pull-left header"><i class="fa fa-github-alt"></i>Dashboard Kesiswaan</li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="profile">

                        </div>

                        <div class="tab-pane" id="change_password">
                            <div class="box-body">
                                <div class="box-body">
                                <h3 style="text-align:center; font-weight:bold; font-family:Segoe UI, sans-serif">SISTEM PREDIKSI PENDAFTARAN PERSERTA DIDIK BARU</h3>
                                <h3 style="text-align:center; font-weight:bold; font-family:Segoe UI, sans-serif">SMP NEGERI 17 CIREBON</h3>
                            <br>
                                <img style="display:block; margin-left:auto; margin-right:auto" src="<?php echo base_url(); ?>assets/dist/img/logo/smp.png" width="135px">
                            <br>

                                <h4 style="text-align:center; font-weight:bold; font-family:Segoe UI, sans-serif">Jl. Kalitanjung P. Grenjeng </h4>
                            </div>
                            </div>
                        </div>

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $jumlahppdb; ?></h3>

                        <p>PPDB</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-circle"></i>
                    </div>
                    <a href="<?php echo site_url('mengelola_ppdb'); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $jumlahsekolah ?></h3>

                        <p>Sekolah</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-home"></i>
                    </div>
                    <a href="<?php echo site_url('manajemen_sekolah'); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $jumlahpanitia; ?></h3>

                        <p>Member</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?php echo site_url('mengelola_user/panitia'); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $belumterverifikasi; ?></h3>

                        <p>Belum Terverifikasi</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="<?php echo site_url('mengelola_ppdb'); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-xl-12">
            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>
              <div class="card-body">
                <div class="chart">
                <canvas id="canvas" height="450" width="600"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
          </div>
        </div>
    </section>
</div>
