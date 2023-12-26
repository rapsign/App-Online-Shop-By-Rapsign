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
                            <li class="axil-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">Product</li>
                        </ul>
                        <h1 class="title">Explore All Products</h1>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->
    <!-- Start Shop Area  -->
    <div class="axil-shop-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="axil-shop-top">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="category-select ">
                                    <!-- Start Single Select  -->
                                    <select class="single-select" id="linkCategories" onchange="redirectToLinkCategory()">
                                        <option selected disabled>Categories</option>
                                        <option value="<?= base_url('/product'); ?>">All Product</option>
                                        <?php foreach ($categories as $name) : ?>
                                            <option value=" <?= base_url('product/categories/' . $name['categories_name']); ?>"><?= $name['categories_name']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <select class="single-select" id="linkBrands" onchange="redirectToLinkBrand()">
                                        <option selected disabled>Brands</option>
                                        <option value="<?= base_url('/product'); ?>">All Product</option>
                                        <?php foreach ($brands as $name) : ?>
                                            <option value=" <?= base_url('product/brands/' . $name['brands_name']); ?>"><?= $name['brands_name']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <!-- End Single Select  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row--15 mt-5">
                <?php foreach ($product as $products) : ?>
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
        <!-- End .container -->
    </div>
    <!-- End Shop Area  -->
    <!-- Start Axil Newsletter Area  -->
    <!-- End Axil Newsletter Area  -->
</main>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    function redirectToLinkCategory() {
        var dropdown = document.getElementById("linkCategories");
        var selectedOption = dropdown.options[dropdown.selectedIndex].value;

        // Check if a valid option is selected
        if (selectedOption) {
            // Redirect to the selected link
            window.location.href = selectedOption;
        }
    }
</script>
<script>
    function redirectToLinkBrand() {
        var dropdown = document.getElementById("linkBrands");
        var selectedOption = dropdown.options[dropdown.selectedIndex].value;

        // Check if a valid option is selected
        if (selectedOption) {
            // Redirect to the selected link
            window.location.href = selectedOption;
        }
    }
</script>
<?= $this->endSection(); ?>