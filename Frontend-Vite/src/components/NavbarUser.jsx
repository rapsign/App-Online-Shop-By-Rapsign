import { Link } from "react-router-dom";
const NavbarUser = () => {
    return (
        <header className="header axil-header header-style-2">
        <div className="axil-header-top">
          <div className="container">
            <div className="row align-items-center">
              <div className="col-lg-2 col-sm-3 col-5">
                <div className="header-brand">
                  <Link to="/" className="logo logo-dark">
                    <img src="assets/images/logo/logo.png" alt="Site Logo" />
                  </Link>
                  <Link to="/" className="logo logo-light">
                    <img src="assets/images/logo/logo.png" alt="Site Logo" />
                  </Link>
                </div>
              </div>
              <div className="col-lg-10 col-sm-9 col-7">
                <div className="header-top-dropdown dropdown-box-style">
                  <div className="axil-search">
                    <button type="submit" className="icon wooc-btn-search">
                    <i className="bi bi-search"></i>
                    </button>
                    <input
                      type="search"
                      className="placeholder product-search-input"
                      name="search2"
                      id="search2"
                      defaultValue=""
                      maxLength={128}
                      placeholder="What are you looking for...."
                      autoComplete="off"
                    />
                  </div>
                  <div className="header-action">
                  <ul className="action-list">
                    <li className="axil-search d-sm-none d-block">
                      <Link
                        to="javascript:void(0)"
                        className="header-search-icon"
                        title="Search"
                      >
                        <i className="flaticon-magnifying-glass" />
                      </Link>
                    </li>
                    <li className="wishlist">
                      <Link to="wishlist.html">
                        <i className="bi bi-heart" />
                      </Link>
                    </li>
                    <li className="shopping-cart">
                      <Link to="#" className="cart-dropdown-btn">
                        <span className="cart-count">3</span>
                        <i className="bi bi-cart" />
                      </Link>
                    </li>
                    <li className="shopping-cart">
                        <div className="dropdown">
                            <Link
                                className="my-account"
                                to="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                            <i style={{fontSize : 29}} className="bi bi-person" />
                            </Link>
                            <ul className="dropdown-menu">
                                <li>
                                <Link className="dropdown-item" to="#">
                                    My Account
                                </Link>
                                </li>
                                <li>
                                <Link className="dropdown-item" to="#">
                                    Logout
                                </Link>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li className="axil-mobile-toggle">
                      <button className="menu-btn mobile-nav-toggler">
                        <i className="bi bi-list" />
                      </button>
                    </li>
                  </ul>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div className="axil-mainmenu aside-category-menu">
          <div className="container">
            <div className="header-navbar ">   
              <div className="header-main-nav ">
                <nav className="mainmenu-nav ">
                  <button className="mobile-close-btn mobile-nav-toggler">
                  <b>X</b>
                  </button>
                  <div className="mobile-nav-brand">
                    <Link to="/" className="logo">
                      <img src="assets/images/logo/logo.png" alt="Site Logo" />
                    </Link>
                  </div>
                  <ul className="mainmenu justify-content-center">
                    <li>
                      <Link to="/">Home</Link>
                    </li>
                    
                    <li>
                      <Link to="/products">Products</Link>
                    </li>
                  </ul>
                </nav>
                {/* End Mainmanu Nav */}
              </div>
             
            </div>
          </div>
        </div>
        {/* End Mainmenu Area  */}
      </header>
      

    )
};

export default NavbarUser;