<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 07:18:54 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gaming Store | Sign Up</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/vendor/flaticon/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/vendor/slick.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/vendor/sal.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/vendor/base.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.min.css">

</head>


<body>
    <div class="axil-signin-area">

        <!-- Start Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="/" class="site-logo"><img src="<?= base_url() ?>/assets/images/logo/logo.png" alt="logo"></a>
                </div>
                <div class="col-md-6">
                    <div class="singin-header-btn">
                        <p>Already a member?</p>
                        <a href="<?= url_to('login') ?>" class="axil-btn btn-bg-secondary sign-up-btn">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image bg_image--10">
                    <h3 class="title">Jadilah Member Kami</h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">Become A Member</h3>
                        <p class="b2 mb--55">Enter your detail below</p>
                        <p class="b2 mb--55"><?= view('Myth\Auth\Views\_message_block') ?></p>
                        <form class="singin-form" action="<?= url_to('register') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="username"><?= lang('Auth.username') ?></label>
                                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" require>
                            </div>
                            <div class="form-group">
                                <label><?= lang('Auth.email') ?></label>
                                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" require>
                                <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                            </div>
                            <div class="form-group">
                                <label><?= lang('Auth.password') ?></label>
                                <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off" require>
                            </div>
                            <div class="form-group">
                                <label><?= lang('Auth.repeatPassword') ?></label>
                                <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off" name="pass_confirm" require>
                            </div>
                            <div class="form-group align-items-center d-grid gap-2">
                                <button type="submit" class="axil-btn btn-bg-primary btn-lg btn-block">Create Account</button>
                                <a class="axil-btn btn-bg-white btn-lg btn-block text-center btn btn-outline-secondary" href="<?= base_url('auth/google') ?>"><img src="https://img.icons8.com/color/16/000000/google-logo.png"> Sign Up Using Google</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="<?= base_url() ?>/assets/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="<?= base_url() ?>/assets/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?= base_url() ?>/assets/js/vendor/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/vendor/slick.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/vendor/js.cookie.js"></script>
    <!-- <script src="<?= base_url() ?>/assets/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="<?= base_url() ?>/assets/js/vendor/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/vendor/jquery.ui.touch-punch.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/vendor/jquery.countdown.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/vendor/sal.js"></script>
    <script src="<?= base_url() ?>/assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/vendor/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/vendor/counterup.js"></script>
    <script src="<?= base_url() ?>/assets/js/vendor/waypoints.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2023 07:18:54 GMT -->

</html>