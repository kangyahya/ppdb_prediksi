<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title><?php echo $title; ?></title>

    <!-- Icon -->
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/dist/img/logo/cic_putih.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Main styles for this application-->
    <link href="<?php echo base_url(); ?>assets/login/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/login/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <h5 style="line-height:28px; text-align:center">SISTEM PREDIKSI PENETAPAN</h5>
                            <h5 style="line-height:28px; text-align:center">PENERIMAAN PERSERTA DIDIK BARU</h5>
                            <p class="text-center"><img src="<?php echo base_url(); ?>assets/dist/img/logo/smp.png" width="90px" class="pb-2"></p>
                            <h5 style="line-height:28px; text-align:center">SMP NEGERI 17 KOTA CIREBON </h5>
                            <!--<p class="text-muted">Silahkan login terlebih dahulu</p>-->

                            <br>
                            <?php echo $this->session->flashdata('message'); ?>

                            <form action="<?php echo site_url('login/panitia'); ?>" method="post">

                                <?php echo form_error('username', '<small class="text-danger">', '</small>') ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Username">
                                </div>

                                <?php echo form_error('password', '<small class="text-danger">', '</small>') ?>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </div>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>