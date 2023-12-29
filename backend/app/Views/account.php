<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<main class="main-wrapper">
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
                        </ul>
                        <h1 class="title">Explore All Products</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->

    <!-- Start My Account Area  -->
    <div class="axil-dashboard-area axil-section-gap">
        <div class="container">
            <div class="axil-dashboard-warp">

                <div class="row">
                    <div class="col-xl-3 col-md-4">
                        <div class="axil-dashboard-author">
                            <div class="media">
                                <div class="thumbnail" style="width: 50px;">
                                    <img src="<?= user()->profile_picture; ?>">
                                </div>
                                <div class="media-body">
                                    <h5 class="title mb-0">Hello <?= user()->fullname; ?></h5>
                                    <span class="joining-date">eTrade Member Since <?php echo date('M Y', strtotime(user()->created_at));   ?></span>
                                </div>
                            </div>
                        </div>
                        <aside class="axil-dashboard-aside">
                            <nav class="axil-dashboard-nav">
                                <div class="nav nav-tabs" role="tablist">
                                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard" role="tab" aria-selected="true"><i class="fas fa-th-large"></i>Dashboard</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="false"><i class="fas fa-shopping-basket"></i>Orders</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-downloads" role="tab" aria-selected="false"><i class="fas fa-file-download"></i>Downloads</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-address" role="tab" aria-selected="false"><i class="fas fa-home"></i>Addresses</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab" aria-selected="false"><i class="fas fa-user"></i>Account Details</a>
                                    <a class="nav-item nav-link" href="sign-in.html"><i class="fal fa-sign-out"></i>Logout</a>
                                </div>
                            </nav>
                        </aside>
                    </div>
                    <div class="col-xl-9 col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                                <div class="axil-dashboard-overview">
                                    <div class="welcome-text">Hello <?= user()->fullname; ?> (not <span><?= user()->fullname; ?>?</span> <a href="<?= base_url('logout') ?>">Log Out</a>)</div>
                                    <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                                <div class="axil-dashboard-order">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Order</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">#6523</th>
                                                    <td>September 10, 2020</td>
                                                    <td>Processing</td>
                                                    <td>$326.63 for 3 items</td>
                                                    <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-downloads" role="tabpanel">
                                <div class="axil-dashboard-order">
                                    <p>You don't have any download</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-address" role="tabpanel">
                                <div class="axil-dashboard-address">
                                    <p class="notice-text">The following addresses will be used on the checkout page by default.</p>
                                    <div class="row row--30">
                                        <div class="col-lg-6">
                                            <div class="address-info mb--40">
                                                <div class="addrss-header d-flex align-items-center justify-content-between">
                                                    <h4 class="title mb-0">Shipping Address</h4>
                                                    <a href="#" class="address-edit"><i class="far fa-edit"></i></a>
                                                </div>
                                                <ul class="address-details">
                                                    <li>Name: <?= user()->fullname ?></li>
                                                    <li>Email: <?= user()->email ?></li>
                                                    <li>Phone: <?= user()->phone_number ?></li>
                                                    <li class="mt--30"><?= user()->address ?> </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="address-info">
                                                <div class="addrss-header d-flex align-items-center justify-content-between">
                                                    <h4 class="title mb-0">Billing Address</h4>
                                                    <a href="#" class="address-edit"><i class="far fa-edit"></i></a>
                                                </div>
                                                <ul class="address-details">
                                                    <li>Name: <?= user()->fullname ?></li>
                                                    <li>Email: <?= user()->email ?></li>
                                                    <li>Phone: <?= user()->phone_number ?></li>
                                                    <li class="mt--30"><?= user()->address ?> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade " id="nav-account" role="tabpanel">
                                    <div class="col-lg-9">
                                        <div class="axil-dashboard-account">
                                            <form class="account-details-form" action="<?= base_url('account/update-profile/') . user()->id ?>" method="post" autocomplete="off">
                                                <?= csrf_field() ?>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Fullname</label>
                                                            <input type="text" class="form-control <?= (session('errors.fullname')) ? 'is-invalid' : ''; ?>" value="<?= user()->fullname; ?>" name="fullname">
                                                            <div class="invalid-feedback">
                                                                <?php if ($fieldErrors = session('errors.phone_fullname')) : ?>
                                                                    <?= esc($fieldErrors) ?>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input type="number" class="form-control <?= (session('errors.phone_number')) ? 'is-invalid' : ''; ?>" value="<?= user()->phone_number; ?>" name="phone_number">
                                                            <div class="invalid-feedback">
                                                                <?php if ($fieldErrors = session('errors.phone_number')) : ?>
                                                                    <?= esc($fieldErrors) ?>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group mb--10">
                                                            <label>Address</label>
                                                            <textarea class="form-control <?= (session('errors.address')) ? 'is-invalid' : ''; ?>" rows="3" name="address"><?= user()->address; ?></textarea>
                                                            <div class="invalid-feedback">
                                                                <?php if ($fieldErrors = session('errors.address')) : ?>
                                                                    <?= esc($fieldErrors) ?>
                                                                <?php endif ?>
                                                            </div>
                                                            <?php if (!$fieldErrors) : ?>
                                                                <p class="b3 mt--10">This will be how your name will be displayed in the account section</p>
                                                            <?php endif ?>
                                                        </div>
                                                        <input type="submit" class="axil-btn float-end" value="Save Changes">
                                                    </div>
                                            </form>
                                            <form class="account-details-form" action="<?= base_url('account/update-password/') . user()->id ?>" method="post" autocomplete="off">
                                                <div class="col-12">
                                                    <h5 class="title">Password Change</h5>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control <?= (session('errors.old_password')) ? 'is-invalid' : ''; ?>" name="old_password">
                                                        <div class="invalid-feedback">
                                                            <?php if ($fieldErrors = session('errors.old_password')) : ?>
                                                                <?= esc($fieldErrors) ?>
                                                            <?php endif ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input type="password" class="form-control <?= (session('errors.new_password')) ? 'is-invalid' : ''; ?>" name="new_password">
                                                        <div class="invalid-feedback">
                                                            <?php if ($fieldErrors = session('errors.new_password')) : ?>
                                                                <?= esc($fieldErrors) ?>
                                                            <?php endif ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm New Password</label>
                                                        <input type="password" class="form-control <?= (session('errors.confirm_password')) ? 'is-invalid' : ''; ?>" name="confirm_password">
                                                        <div class="invalid-feedback">
                                                            <?php if ($fieldErrors = session('errors.confirm_password')) : ?>
                                                                <?= esc($fieldErrors) ?>
                                                            <?php endif ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb--0">
                                                        <input type="submit" class="axil-btn float-end" value="Save Changes">
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End My Account Area  -->

    <!-- Start Axil Newsletter Area  -->

    <!-- End Axil Newsletter Area  -->
</main>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(function() {
        <?php if (session()->has("password_success")) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Great!',
                text: '<?= session("password_success") ?>'
            })
        <?php } ?>
    });
</script>
<script>
    $(function() {
        <?php if (session()->has("profile_success")) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Great!',
                text: '<?= session("profile_success") ?>'
            })
        <?php } ?>
    });
</script>
<?= $this->endSection(); ?>