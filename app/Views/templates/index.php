<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="../../assets/css/vendor/flaticon/flaticon.css">
    <link rel="stylesheet" href="../../assets/css/vendor/slick.css">
    <link rel="stylesheet" href="../../assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="../../assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="../../assets/css/vendor/sal.css">
    <link rel="stylesheet" href="../../assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="../../assets/css/vendor/base.css">
    <link rel="stylesheet" href="../../assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

<body class="sticky-header">
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    <header class="header axil-header header-style-5">

        <!-- Start Mainmenu Area  -->
        <div id="axil-sticky-placeholder"></div>
        <div class="axil-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <a href="/" class="logo logo-dark">
                            <img src="<?= base_url(); ?>/assets/images/logo/logo.png" alt="Site Logo">
                        </a>
                        <a href="/" class="logo logo-light">
                            <img src="<?= base_url(); ?>/assets/images/logo/logo.png" alt="Site Logo">
                        </a>
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="/" class="logo">
                                    <img src="<?= base_url(); ?>/assets/images/logo/logo.png" alt="Site Logo">
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li><a href="<?= base_url(); ?>">Home</a></li>
                                <li><a href="<?= base_url('product'); ?>">Product</a></li>
                                <li><a href="<?= base_url('admin'); ?>">Orders</a></li>
                                <li><a href="<?= base_url('admin'); ?>">Admin</a></li>
                            </ul>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <li class="axil-search d-xl-block d-none">
                                <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="What are you looking for?" autocomplete="off">
                                <button type="submit" class="icon wooc-btn-search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </button>
                            </li>
                            <li class="axil-search d-xl-none d-block">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </a>
                            </li>
                            <li class="my-account">
                                <a href="javascript:void(0)">
                                    <i class="flaticon-person"></i>
                                </a>
                                <div class="my-account-dropdown">
                                    <?php if (logged_in(true)) : ?>
                                        <ul>
                                            <li>
                                                <a href="<?= base_url('account'); ?>">My Account</a>
                                                <a href="<?= base_url('logout') ?>">Log Out</a>
                                            </li>
                                        </ul>

                                    <?php else : ?>
                                        <div class="login-btn">
                                            <a href="<?= base_url('login') ?>" class="axil-btn btn-bg-primary">Login</a>
                                        </div>
                                        <div class="reg-footer text-center">No account yet? <a href="<?= base_url('register') ?>" class="btn-link">REGISTER HERE.</a></div>
                                </div>
                            <?php endif; ?>
                            </li>
                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>

    <div id="main-content">

        <?= $this->renderSection('page-content'); ?>

    </div>
    <?= $this->renderSection('script'); ?>

    <!-- jQuery -->
    <script src="../../assets/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="../../assets/js/vendor/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../assets/js/vendor/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/slick.min.js"></script>
    <script src="../../assets/js/vendor/js.cookie.js"></script>
    <!-- <script src="../../assets/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="../../assets/js/vendor/jquery-ui.min.js"></script>
    <script src="../../assets/js/vendor/jquery.ui.touch-punch.min.js"></script>
    <script src="../../assets/js/vendor/jquery.countdown.min.js"></script>
    <script src="../../assets/js/vendor/sal.js"></script>
    <script src="../../assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="../../assets/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="../../assets/js/vendor/isotope.pkgd.min.js"></script>
    <script src="../../assets/js/vendor/counterup.js"></script>
    <script src="../../assets/js/vendor/waypoints.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>
    <?= $this->renderSection('script'); ?>
</body>

</html>