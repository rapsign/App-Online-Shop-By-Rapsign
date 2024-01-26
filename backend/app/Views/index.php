<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<main class="main-wrapper">
    <div class="axil-main-slider-area main-slider-style-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="main-slider-content">
                        <span class="subtitle">GAMING STORE</span>
                        <h1 class="title">TEMUKAN BARANG YANG KAMU INGINKAN DI GAMING STORE</h1>
                        <div class="shop-btn">
                            <a href="/product" class="axil-btn btn-bg-white right-icon">Explore <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="axil-product-area bg-color-white axil-section-gap">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Our Products</span>
                <h2 class="title">Explore our Products</h2>
            </div>

            <div class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                <div class="slick-single-layout">
                    <div class="row row--15">
                        <?php foreach ($product1 as $products) : ?>
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="<?= base_url('item/' . $products['slug']); ?>">
                                            <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" class="main-img" src="<?= base_url('assets/images/product/') . $products['product_image']; ?>" alt="Product Images">
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
                        <!-- End Single Product  -->
                    </div>
                </div>
                <!-- End .slick-single-layout -->
                <div class="slick-single-layout">
                    <div class="row row--15">
                        <?php foreach ($product2 as $products) : ?>
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="<?= base_url('item/' . $products['id']); ?>">
                                            <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" class="main-img" src="<?= base_url('assets/images/product/') . $products['product_image']; ?>" alt="Product Images">
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
                        <!-- End Single Product  -->

                        <!-- End Single Product  -->

                    </div>
                </div>
                <!-- End .slick-single-layout -->
            </div>

            <div class="row">
                <div class="col-lg-12 text-center mt--20 mt_sm--0">
                    <a href="/product" class="axil-btn btn-bg-lighter btn-load-more">View All Products</a>
                </div>
            </div>

        </div>
    </div>
    <!-- End Slider Area -->
    <!-- Start Categorie Area  -->

    <!-- End Categorie Area  -->
    <!-- Start Best Sellers Product Area  -->

    <!-- End  Best Sellers Product Area  -->
    <!-- Start Expolre Product Area  -->

    <!-- End Expolre Product Area  -->
    <!-- Start Most Sold Product Area  -->

    <!-- End Most Sold Product Area  -->
    <!-- Start Why Choose Area  -->

    <!-- End Why Choose Area  -->

    <!-- Video Banner Area  -->

    <!-- Video Banner Area  -->


</main>
<?= $this->endSection(); ?>