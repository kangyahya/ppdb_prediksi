<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>SMP NEGERI 17 KOTA CIREBON</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <b>Panitia PPDB</b>
        </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php if ($this->session->userdata('id_level') == 1) {
                                        echo base_url('assets/dist/img/profile/' . $session['foto_admin']);
                                    } else {
                                        echo base_url('assets/dist/img/profile/' . $session['foto_panitia']);
                                    }; ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs">
                            <?php if ($this->session->userdata('id_level') == 1) {
                                echo $session['nama_admin'];
                            } else {
                                echo $session['nama_panitia'];
                            }; ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php if ($this->session->userdata('id_level') == 1) {
                                            echo base_url('assets/dist/img/profile/' . $session['foto_admin']);
                                        } else {
                                            echo base_url('assets/dist/img/profile/' . $session['foto_panitia']);
                                        }; ?>" class="img-circle" alt="User Image">
                            <p>
                                <?php if ($this->session->userdata('id_level') == 1) {
                                    echo $session['nama_admin'];
                                } else {
                                    echo $session['nama_panitia'];
                                }; ?>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php if ($this->session->userdata('id_level') == 1) {
                                                echo site_url('profile');
                                            } else {
                                                echo site_url('profile/profil_panitia');
                                            }; ?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php if ($this->session->userdata('id_level') == 1) {
                                                echo site_url('login/logout_admin');
                                            } else {
                                                echo site_url('login/logout_panitia');
                                            } ?>" class="btn btn-default btn-flat tombol-logout">Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>