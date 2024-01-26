import { useState, useEffect } from 'react'
import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import { getProducts } from './Api';
import { formatRupiah } from './utils';
import SalWrapper from './SalWrapper';
import 'sal.js/dist/sal.css';

const ImageSlider = () => {
  const sliderSettings = {
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    speed: 3000,
    autoplaySpeed: 3000,
    cssEase: "linear",
      responsive: [
        {
          breakpoint: 100,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            initialSlide: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
  };
  const [products, setProducts] = useState([])
  useEffect(() => {
    const fetchData = async () => {
      const fetchedProducts = await getProducts();
      setProducts(fetchedProducts);
    };

    fetchData();
  }, []);
  console.log

  return (
    <div>
    <Slider {...sliderSettings}>
    { products.map((product) => (
      
    <div key={product.slug} className='d-flex align-items-center justify-content-center '>
    <div className="axil-product product-style-one">
  <div className="thumbnail">
    <a href={product.slug}>
    <SalWrapper>
      <img
      style={{ width:'100%', height:'250px' }}
        className="main-img"
        src={product.Images[0].image_name}
        alt="Product Images"
      />
      </SalWrapper>
    </a>
  </div>
  <div className="product-content">
    <div className="inner">
      <h5 className="title">
        <a href={product.slug}>
          {product.product_name} 
        </a>
      </h5>
      <div className="product-price-variant">
        <span className="price current-price">
          {formatRupiah(product.product_price)}
        </span>
      </div>
    </div>
  </div>
</div>
    </div>
    ))}
    </Slider>
    </div>
  );
};

export default ImageSlider;