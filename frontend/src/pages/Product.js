import React, { useState, useEffect } from 'react'
import { Link } from 'react-router-dom';
import { getProducts } from '../components/Api';
import { formatRupiah } from '../components/utils';
import SalWrapper from '../components/SalWrapper';

const Product= () => {
 
const [products, setProducts] = useState([])
useEffect(() => {
const fetchData = async () => {
      const fetchedProducts = await getProducts();
      setProducts(fetchedProducts);
    };

    fetchData();
  }, []);
    return (
        <>
        <main className="main-wrapper">
        <div className="axil-breadcrumb-area">
          <div className="container">
            <div className="row align-items-center">
              <div className="col-lg-6 col-md-8">
                <div className="inner">
                  <ul className="axil-breadcrumb">
                    <li className="axil-breadcrumb-item">
                      <Link to="/">Home</Link>
                    </li>
                    <li className="separator" />
                    <li className="axil-breadcrumb-item active" aria-current="page">
                      Product
                    </li>
                  </ul>
                  <h1 className="title">Explore All Products</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div className='container'>
            <div className='row row--15'>
                { products.map((product, index) => (
                    <div className='col-xl-3 col-lg-4 col-sm-6 col-12 mb--30'>
                        <div className='d-flex align-items-center justify-content-center mt--30'>
                            <div className="axil-product product-style-one">
                                <div className="thumbnail">
                                    <a href={product.slug}>
                                    <SalWrapper>
                                        <img
                                            className="main-img"
                                            src={`http://localhost:8080/assets/images/product/${product.product_image}`}
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
                    </div>
                ))}
            </div>
        </div>
    </main>
    </>
    )
};
export default Product