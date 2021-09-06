
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Login | Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('template/dist/') ?>assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?= base_url('template/dist/') ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('template/dist/') ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('template/dist/') ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="home-btn d-none d-sm-block">
        <a href="<?php echo site_url() ?>" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20">Selamat Datang Kembali !</h5>
                                <p class="text-white-50 mb-0">Login Untuk Masuk Ke Mode Admin.</p>
                                <a href="<?php echo site_url() ?>" class="logo logo-admin mt-4">
                                    <img src="<?= base_url('template/dist/') ?>assets/images/logo-sm-dark.png" alt="" height="30">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <div class="p-2">
                                <?php $this->load->view('component/notification') ?>
                                <form class="form-horizontal" action="<?php echo site_url('auth/login') ?>" method="POST">

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="<?= site_url('auth/guest') ?>" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Berkunjung sebagai tamu?</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>© Apps BPNB Aceh. Develop <i class="mdi mdi-heart text-danger"></i> by Raju</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?= base_url('template/dist/') ?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url('template/dist/') ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('template/dist/') ?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url('template/dist/') ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url('template/dist/') ?>assets/libs/node-waves/waves.min.js"></script>

    <script src="<?= base_url('template/dist/') ?>assets/js/app.js"></script>

</body>

</html>
