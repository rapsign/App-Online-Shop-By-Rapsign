import { useState, useEffect } from 'react'
import ImageSlider from '../components/ProductSlider';
import { useParams } from 'react-router-dom';
import { getProductsBySlug } from '../components/Api';
import { formatRupiah } from '../components/utils';
import QuantityInput from '../components/utils';
import '../components/css/radio.css'
import Loading from '../components/Loading';

const ProductDetail = () => {
  const { slug } = useParams();
  const [product, setProduct] = useState([])
  useEffect(() => {
    const fetchData = async () => {
      try {
        const fetchedProducts = await getProductsBySlug(slug);
        setProduct(fetchedProducts);
      } catch (error) {
        console.error('Error fetching product:', error);
      }
    };
    fetchData();
}, [slug]);
const image = product?.Images?.map(image => image.image_name) || [];
const sizes = Array.from(new Set(product?.ProductVariations?.map(variation => variation.size)))
const colors = Array.from(new Set(product?.ProductVariations?.map(variation => variation.color)))
const isSizeEmpty = sizes.length === 0;
const isColorEmpty = colors.length === 0;
const [selectedSize, setSelectedSize] = useState('');
const [selectedColor, setSelectedColor] = useState('');
const handleSizeChange = (value) => {
    setSelectedSize(value);
  };

  // Function to handle radio button change for color
  const handleColorChange = (value) => {
    setSelectedColor(value);
  };


  if (product && product.length == 0) {
    // Tampilkan pesan loading atau handle kasus produk tidak ditemukan
    return <Loading/>
  }
  return (
    <div>
    <main className="main-wrapper">
    {/* Start Shop Area  */}
    <div className="axil-breadcrumb-area">
      <div className="container">
        <div className="row align-items-center">
          <div className="col-lg">
            <div className="inner">
              <ul className="axil-breadcrumb">
                <li className="axil-breadcrumb-item">
                  <a href="/">Home</a>
                </li>
                <li className="separator" />
                <li className="axil-breadcrumb-item">
                  <a href="/products">Products</a>
                </li>
                <li className="separator hide-sm" />
                <li
                  className="axil-breadcrumb-item active hide-sm"
                  aria-current="page"
                >
                {product.product_name}
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div className="axil-single-product-area axil-section-gap pb--0 bg-color-white">
      <div className="single-product-thumb mb--40">
        <div className="container">
          <div className="row">
            <div className="col-lg-7 mb--40">
              <div className="row">
                <div className="col-lg-10 order-lg-2">
                  <div className="single-product-thumbnail-wrap zoom-gallery">
                    <div className="single-product-thumbnail product-large-thumbnail-3 axil-product">
                      <div className="thumbnail">
                        <a
                          href={image}
                          className="popup-zoom"
                        >
                          <img
                            src={image}
                            alt="Product Images"
                          />
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="col-lg-5 mb--40">
              <div className="single-product-content">
                <div className="inner">
                  <h2 className="product-title">
                  {product.product_name}
                  </h2>
                  <span className="price-amount">
                    {formatRupiah(product.product_price)}
                  </span>
                  <div className="product-rating">
                    <div className="review-link">
                      <p>
                        Stock {product.product_stock} (
                        <span>
                        {" "}
                        {product.product_sold ? product.product_sold : 0 }
                        </span>{" "}
                        Sold)
                      </p>
                      <ul className="bnc">
                  <li>
                    Brand : <a href='#'> {product.Brand.brands_name}</a>
                  </li>
                  <li>
                    Category : <a href='#'>{product.Category.categories_name} </a>
                  </li>
                </ul>
                    </div>
                  </div>
                  
                  {!isSizeEmpty && (
                    <div className="product-variation product-size-variation">
                    <h6 className="title">Size:</h6>
                    <ul className="range-variant">
                    {sizes.map((size, index) => (
                      <li key={index}>
                        <input
                          type="radio"
                          id={`size-radio-${index}`}
                          name="size"
                          value={size}
                          checked={selectedSize === size}
                          onChange={() => handleSizeChange(size)}
                        />
                        <label htmlFor={`size-radio-${index}`}>{size}</label>
                      </li>
                    ))}
                    </ul>
                  </div>
                  )}
                 
                  {!isColorEmpty && (
                    <div className="product-variation product-color-variation">
                    <h6 className="title">Color:</h6>
                    <ul className="range-variant">
                    {colors.map((color, index) => (
                      <li key={index}>
                        <input
                          type="radio"
                          id={`color-radio-${index}`}
                          name="color"
                          value={color}
                          checked={selectedColor === color}
                          onChange={() => handleColorChange(color)}
                        />
                        <label htmlFor={`color-radio-${index}`}>{color}</label>
                      </li>
                    ))}
                    </ul>
                  </div>
                  )}
               
                
                  {/* Start Product Action Wrapper  */}
                  <div className="product-action-wrapper d-flex-center">
                    <form
                      className="singin-form"
                      action="<?= base_url('checkout/' . $product['slug']) ?>"
                      method="post"
                    >
                      <div className="row">
                        <div className="col">Quantity</div>
                        <div className="col">
                          <QuantityInput/>
                        </div>
                      </div>
                    </form>
                  </div>
                  <button className="axil-btn btn-bg-primary btn-lg btn-block mt-5">
                    Buy Now
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div className=" woocommerce-tabs wc-tabs-wrapper bg-vista-white">
      <div className="container">
        <ul className="nav tabs" id="myTab" role="tablist">
          <li className="nav-item" role="presentation">
            <a
              className="active"
              id="description-tab"
              data-bs-toggle="tab"
              href="#description"
              role="tab"
              aria-controls="description"
              aria-selected="true"
            >
              Description
            </a>
          </li>
        </ul>
        <div className="tab-content" id="myTabContent">
          <div
            className="tab-pane fade show active"
            id="description"
            role="tabpanel"
            aria-labelledby="description-tab"
          >
            <div className="product-desc-wrapper">
              <div className="row">
                <div className="single-desc">
                  <p style={{ textAlign: "justify" }}>
                  {product.product_description}
                  </p>
                </div>
              </div>
              {/* End .product-desc-wrapper */}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div className="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
      <div className="container">
        <div className="section-title-wrapper">
          <span className="title-highlighter highlighter-primary">
          <i className="bi bi-bag-check-fill"></i> Our Product
          </span>
          <h2 className="title" style={{ fontWeight: 'bold', fontSize: '36px' }}>Explore our Products</h2>
        </div>
        <ImageSlider/>
      </div>
    </div>
  </main>
    </div>
  );
  }
export default ProductDetail