<div class="container-fluid">
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
            
                <div class="container-fluid">
                <h1 class="pt-2" style="color:white;">BPNB ACEH</h1>
                    <div class="float-right">
                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect" id="vertical-menu-btn"><i class="fa fa-fw fa-bars"></i></button>
                        <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                        </div>

                        <?php if (userSession('id')) { ?>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?= base_url('uploads/user/'.userSession('foto')) ?>" alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ml-1"><?= userSession('nama') ?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?= site_url('auth/profile') ?>"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="<?= site_url('auth/logout') ?>"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div>
                        <div class="navbar-brand-box">
                            <a href="<?= site_url() ?>" class="logo logo-light">
                                <span class="logo-lg">
                                
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="vertical-menu">
            <div class="h-100">
                <?php if (userSession('id')) { ?>
                    <div class="user-wid text-center py-4">
                        <div class="user-img">
                            <img src="<?= base_url('uploads/user/'. userSession('foto')) ?>" alt="" class="avatar-md mx-auto rounded-circle">
                        </div>
                        <div class="mt-3">
                            <a href="<?= site_url('auth/profile') ?>" class="text-dark font-weight-medium font-size-16"><?php echo userSession('nama') ?></a>
                            <p class="text-body mt-1 mb-0 font-size-13">Administrator</p>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="user-wid text-center py-4">
                        <div class="user-img">
                            <img src="<?= base_url('uploads/user/guest.png') ?>" alt="" class="avatar-md mx-auto rounded-circle">
                        </div>
                        <div class="mt-3">
                            <a href="#" class="text-dark font-weight-medium font-size-16">User Tamu</a>
                            <p class="text-body mt-1 mb-0 font-size-13">Anda Di Mode Tamu</p>
                        </div>
                    </div>
                <?php } ?>
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>
                        <?php $this->load->view('component/crud'); ?>
                    </ul>
                </div>
            </div>
        </div>
