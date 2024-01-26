import { Link } from 'react-router-dom'
import ProductSlider from '../components/ProductSlider';
import './css/Home.css'
const ListProduct = () => {
    return (
        <>
        <div className="axil-main-slider-area main-slider-style-3">
            <div className='container'>
                <div className='row align-items-center'>
                    <div className='col-xl-6 col-lg-6'>
                        <div className="main-slider-content">
                            <span className="subtitle">GAMING STORE</span>
                            <h1 className="title mt-2 " style={{ fontWeight: 'bold', fontSize: '60px' }} >TEMUKAN BARANG YANG KAMU INGINKAN DI GAMING STORE</h1>
                                <div className="shop-btn">
                                    <Link to="/products" className="axil-btn btn-bg-white right-icon">
                                        Explore <i className="bi bi-arrow-right" />
                                    </Link>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div className='container mt-5'>
            <span className="title-highlighter highlighter-primary">
                <i className="bi bi-cart" /> Our Products
            </span>
            <h2 className="title" style={{ fontWeight: 'bold', fontSize: '36px' }}>Explore our Products</h2>
       <ProductSlider/>
       <div className="row">
       <div className="col-lg-12 text-center mt--20 mt_sm--0 mb--20">
           <Link to="/products" class="axil-btn btn-bg-lighter btn-load-more">View All Products</Link>
       </div>
   </div>
       </div>
       </>
    )
};
export default ListProduct