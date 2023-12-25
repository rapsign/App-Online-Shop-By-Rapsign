<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<main class="main-wrapper">
    <!-- Start Shop Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item"><a href="/product">Product</a></li>
                            <li class="separator hide-sm"></li>
                            <li class="axil-breadcrumb-item active hide-sm" aria-current="page"><?= $product['product_name']; ?></li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
        <div class="single-product-thumb mb--40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mb--40">
                        <div class="row">
                            <div class="col-lg-10 order-lg-2">
                                <div class="single-product-thumbnail-wrap zoom-gallery">
                                    <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                        <div class="thumbnail">
                                            <a href="<?= $product['product_image']; ?>" class="popup-zoom">
                                                <img src="<?= base_url('assets/images/product/') . $product['product_image']; ?>" alt="Product Images">
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mb--40">
                        <div class="single-product-content">
                            <div class="inner">
                                <h2 class="product-title"><?= $product['product_name']; ?></h2>
                                <span class="price-amount">IDR <?= number_format($product['product_price'], 0, ".", "."); ?></span>
                                <div class="product-rating">
                                    <div class="review-link">
                                        <p>Stock <?= $product['product_stock']; ?> (<span><?= $product['product_sold'] == 0 ? '0' : $product['product_sold'] ?></span> Sold)</p>
                                    </div>
                                </div>


                                <div class="product-variations-wrapper">

                                    <!-- Start Product Variation  -->

                                    <!-- End Product Variation  -->

                                    <!-- Start Product Variation  -->

                                    <!-- End Product Variation  -->

                                </div>

                                <!-- Start Product Action Wrapper  -->
                                <div class="product-action-wrapper d-flex-center">
                                    <form class="singin-form" action="<?= base_url('checkout/' . $product['id']) ?>" method="post">
                                        <div class="row">
                                            <div class="col">
                                                Quantity
                                            </div>
                                            <div class="col">
                                                <div class="pro-qty"><input type="text" value="1" name="qty"></div>
                                            </div>
                                        </div>

                                </div>
                                <button class="axil-btn btn-bg-primary btn-lg btn-block mt-5">Buy Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class=" woocommerce-tabs wc-tabs-wrapper bg-vista-white">
        <div class="container">
            <ul class="nav tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="product-desc-wrapper">
                        <div class="row">
                            <div class="single-desc">
                                <p style="text-align: justify;"><?= $product['product_description']; ?></p>
                            </div>
                        </div>
                        <!-- End .product-desc-wrapper -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> Our Product</span>
                <h2 class="title">Explore our Products</h2>
            </div>
            <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                <?php foreach ($product1 as $products) : ?>
                    <div class="slick-single-layout">
                        <div class="axil-product">
                            <div class="thumbnail">
                                <a href="<?= base_url('item/' . $products['slug']); ?>">
                                    <img src="<?= base_url('assets/images/product/') . $products['product_image']; ?>" alt="Product Images">
                                </a>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="<?= base_url('item/' . $products['id']); ?>"><?= $products['product_name']; ?></a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">IDR <?= number_format($products['product_price'], 0, ".", "."); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>