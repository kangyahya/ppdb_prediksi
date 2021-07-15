<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php if ($this->session->userdata('id_level') == 1) {
                                echo base_url('assets/dist/img/profile/' . $session['foto_admin']);
                            } else {
                                echo base_url('assets/dist/img/profile/' . $session['foto_panitia']);
                            }; ?>" class="img-rectangle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php if ($this->session->userdata('id_level') == 1) {
                        echo $session['nama_admin'];
                    } else {
                        echo $session['nama_panitia'];
                    }; ?>
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <br>
        <?php
        if ($this->session->userdata('id_level') == '1') {
        ?>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN MENU</li>

                <li class="<?php echo active_menu('dashboard'); ?>">
                    <a href="<?php echo site_url('dashboard'); ?>">
                        <i class="fa fa-dashboard"></i> <span> Dashboard</span>
                    </a>
                </li>

                <li class="<?php echo active_menu('mengelola_user'); ?>">
                    <a href="<?php echo site_url('mengelola_user/panitia'); ?>">
                        <i class="fa fa-user-plus"></i> <span> Mengelola Panitia</span>
                    </a>
                </li>

                <li class="<?php echo active_menu('mengelola_ppdb'); ?>">
                    <a href="<?php echo site_url('mengelola_ppdb'); ?>">
                        <i class="fa fa-pencil-square-o"></i> <span> Peserta Didik Baru</span>
                        <span class="pull-right-container">
                            <span class="label label-danger pull-right"><?php echo $notifmasuk; ?></span>
                        </span>
                    </a>
                </li>

                <li class="<?php echo active_menu('mengelola_sekolah'); ?>">
                    <a href="<?php echo site_url('mengelola_sekolah'); ?>">
                        <i class="fa fa-university"></i> <span> Sekolah</span>
                    </a>
                </li>


                <li class="treeview <?php echo active_menu('hasil_prediksi'); ?>">
                    <a href="#">
                        <i class="fa fa-calculator"></i> <span>Hasil Prediksi</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo $this->uri->segment(2) == 'index' ? 'active' : '' ?>"><a href="<?php echo site_url('hasil_prediksi/domisili'); ?>"><i class="fa fa-circle-o"></i>Domisili </a></li>
                        <li class="<?php echo $this->uri->segment(2) == 'index' ? 'active' : '' ?>"><a href="<?php echo site_url('hasil_prediksi/prediksi_sekolah'); ?>"><i class="fa fa-circle-o"></i>Asal Sekolah </a></li>
                        <li class="<?php echo $this->uri->segment(2) == 'index' ? 'active' : '' ?>"><a href="<?php echo site_url('hasil_prediksi/prediksi_jalur'); ?>"><i class="fa fa-circle-o"></i>Jalur Pendaftaran </a></li>
                       
                    </ul>
                </li>

                <li class="treeview <?php echo active_menu('laporan'); ?>">
                    <a href="#">
                        <i class="fa fa-copy"></i> <span> Laporan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo $this->uri->segment(2) == 'index' ? 'active' : '' ?>"><a href="<?php echo site_url('laporan/index'); ?>"><i class="fa fa-circle-o"></i> Laporan PPDB</a></li>
                       
                    </ul>
                </li>

                <li class="header">UTILITIES</li>

                <li class="<?php echo active_menu('profile'); ?>">
                    <a href="<?php echo site_url('profile'); ?>">
                        <i class="fa fa-user"></i> <span> Profile</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('login/logout_admin'); ?>" class="tombol-logout">
                        <i class="fa fa-sign-out"></i> <span> Logout</span>
                    </a>
                </li>
            </ul>
        <?php
        } elseif ($this->session->userdata('id_level') == '2') {
        ?>

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">GENERAL</li>

                <li class="<?php echo active_menu('dashboard'); ?>">
                    <a href="<?php echo site_url('dashboard/panitia'); ?>">
                        <i class="fa fa-dashboard"></i> <span> Dashboard</span>
                    </a>
                </li>

                <li class="<?php echo active_menu('ppdb'); ?>">
                    <a href="<?php echo site_url('ppdb'); ?>">
                        <i class="fa fa-user"></i> <span> PPDB </span>
                    </a>
                    </a>
                </li>

                <li class="<?php echo active_menu('mengelola_jadwal'); ?>">
                    <a href="<?php echo site_url('mengelola_jadwal'); ?>">
                        <i class="fa fa-user"></i> <span> Jadwal</span>
                    </a>
                    </a>
                </li>
                

                <li class="header">UTILITIES</li>

                <li class="<?php echo active_menu('profile'); ?>">
                    <a href="<?php echo site_url('profile/profil_panitia'); ?>">
                        <i class="fa fa-user"></i> <span> Profile</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('login/logout_panitia'); ?>" class="tombol-logout">
                        <i class="fa fa-sign-out"></i> <span> Logout</span>
                    </a>
                </li>
            </ul>

        <?php
        } else {
            echo '';
        }
        ?>

    </section>
    <!-- /.sidebar -->
</aside>