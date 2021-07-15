<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title><?php echo $title; ?></title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Utilizer Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login2/css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="<?php echo base_url(); ?>assets/login2/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700" rel="stylesheet">
    <!-- //Fonts -->
</head>

<body>
    <!-- main -->
    <div class="main-top-intro">
        <div class="bg-layer">
            <!-- header -->
            <div class="wrapper">
                <header>
                    <div class="header-w3layouts">
                        <h1>
                            <a class="navbar-brand logo" href="index.html">
                                <img src="<?php echo base_url(); ?>assets/dist/img/logo/cic_logo1.png">
                                MY PPDB SMPN 17 KOTA CIREBON
                            </a>
                        </h1>
                    </div>

                    <div class="clear"></div>


                </header>
                <!-- //header -->
                <div class="content-inner-info">
                    <h2>Form Login</h2>
                    <div class="content-w3layouts-main">

                        <div class="form-w3ls-left-info">
                            <form action="<?php echo site_url('login'); ?>" method="post">

                                <input type="text" name="username" placeholder="Username">

                                <input type="password" name="password" placeholder="Password">

                                <div class="bottom">
                                    <button class="btn" type="submit">Log In</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- //main -->

</body>

</html>