function Home() {
  return (
    <>
    <main className="main-wrapper">
    {/* Start Slider Area */}
    <div className="axil-main-slider-area main-slider-style-3">
      <div className="container">
        <div className="row align-items-center">
          <div className="col-xl-6 col-lg-6">
            <div className="main-slider-content">
              <span className="subtitle">GAMING STORE</span>
              <h1 className="title">
                TEMUKAN BARANG YANG KAMU INGINKAN DI GAMING STORE
              </h1>
              <div className="shop-btn">
                <a href="/product" className="axil-btn btn-bg-white right-icon">
                  Explore <i className="fal fa-long-arrow-right" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div className="axil-product-area bg-color-white axil-section-gap">
      <div className="container">
        <div className="section-title-wrapper">
          <span className="title-highlighter highlighter-primary">
            {" "}
            <i className="far fa-shopping-basket" /> Our Products
          </span>
          <h2 className="title">Explore our Products</h2>
        </div>
        <div className="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
          <div className="slick-single-layout">
            <div className="row row--15">
              {/*?php foreach ($product1 as $products) : ?*/}
              <div className="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                <div className="axil-product product-style-one">
                  <div className="thumbnail">
                    <a href="<?= base_url('item/' . $products['slug']); ?>">
                      <img
                        data-sal="zoom-out"
                        data-sal-delay={200}
                        data-sal-duration={800}
                        loading="lazy"
                        className="main-img"
                        src="<?= base_url('assets/images/product/') . $products['product_image']; ?>"
                        alt="Product Images"
                      />
                    </a>
                  </div>
                  <div className="product-content">
                    <div className="inner">
                      <h5 className="title">
                        <a href="<?= base_url('item/' . $products['id']); ?>">
                          {/*?= $products['product_name']; ?*/}
                        </a>
                      </h5>
                      <div className="product-price-variant">
                        <span className="price current-price">
                          IDR{" "}
                          {/*?= number_format($products['product_price'], 0, ".", "."); ?*/}
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {/*?php endforeach ?*/}
              {/* End Single Product  */}
            </div>
          </div>
          {/* End .slick-single-layout */}
          <div className="slick-single-layout">
            <div className="row row--15">
              {/*?php foreach ($product2 as $products) : ?*/}
              <div className="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                <div className="axil-product product-style-one">
                  <div className="thumbnail">
                    <a href="<?= base_url('item/' . $products['id']); ?>">
                      <img
                        data-sal="zoom-out"
                        data-sal-delay={200}
                        data-sal-duration={800}
                        loading="lazy"
                        className="main-img"
                        src="<?= base_url('assets/images/product/') . $products['product_image']; ?>"
                        alt="Product Images"
                      />
                    </a>
                  </div>
                  <div className="product-content">
                    <div className="inner">
                      <h5 className="title">
                        <a href="<?= base_url('item/' . $products['id']); ?>">
                          {/*?= $products['product_name']; ?*/}
                        </a>
                      </h5>
                      <div className="product-price-variant">
                        <span className="price current-price">
                          IDR{" "}
                          {/*?= number_format($products['product_price'], 0, ".", "."); ?*/}
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {/*?php endforeach ?*/}
              {/* End Single Product  */}
              {/* End Single Product  */}
            </div>
          </div>
          {/* End .slick-single-layout */}
        </div>
        <div className="row">
          <div className="col-lg-12 text-center mt--20 mt_sm--0">
            <a href="/product" className="axil-btn btn-bg-lighter btn-load-more">
              View All Products
            </a>
          </div>
        </div>
      </div>
    </div>
    {/* End Slider Area */}
    {/* Start Categorie Area  */}
    {/* End Categorie Area  */}
    {/* Start Best Sellers Product Area  */}
    {/* End  Best Sellers Product Area  */}
    {/* Start Expolre Product Area  */}
    {/* End Expolre Product Area  */}
    {/* Start Most Sold Product Area  */}
    {/* End Most Sold Product Area  */}
    {/* Start Why Choose Area  */}
    {/* End Why Choose Area  */}
    {/* Video Banner Area  */}
    {/* Video Banner Area  */}
  </main>
    </>
  );
}

export default Home;
