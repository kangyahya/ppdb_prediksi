<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">

                    <div class="box-body">
                        <h3 style="text-align:center; font-weight:bold; font-family:Segoe UI, sans-serif">SELAMAT DATANG DI</h3>
                        <h4 style=" text-align:center; font-weight:bold; font-family:'Segoe UI', sans-serif">SISTEM PREDIKSI PENDAFTARAN PERSERTA DIDIK BARU</h4>
                        <br>
                        <img style="display:block; margin-left:auto; margin-right:auto" src="<?php echo base_url(); ?>assets/dist/img/logo/smp.png" width="135px">
                        <br>
                        <h3 style="text-align:center; font-weight:bold; font-family:Segoe UI, sans-serif">SMP NEGERI 17 CIREBON</h3>
                    </div>
                </div>
            </div>
        </div>

            <!-- ./col -->
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
                    <a href="<?php echo site_url('ppdb'); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $jumlahpanitia; ?></h3>

                        <p>Panitia</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $belumterverifikasi; ?></h3>

                        <p>Belum Terverikasi</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
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
          </div>
        </div>
            <!-- ./col -->
        </div>

    </section>
</div>
