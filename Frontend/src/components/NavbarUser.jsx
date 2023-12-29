import { Link } from "react-router-dom"

function NavbarUser() {
    return (
<div className="sticky-header">
    
  {/* Hello world */}
  <header className="header axil-header header-style-5">
    {/* Start Mainmenu Area  */}
    <div id="axil-sticky-placeholder" />
    <div className="axil-mainmenu">
      <div className="container">
        <div className="header-navbar">
          <div className="header-brand">
            <Link to="/" className="logo logo-dark">
              <img
                src="public/assets/img/logo.png"
                alt="Site Logo"
              />
            </Link>
            <a href="/" className="logo logo-light">
              <img
                src="public/assets/img/logo.png"
                alt="Site Logo"
              />
            </a>
          </div>
          <div className="header-main-nav">
            {/* Start Mainmanu Nav */}
            <nav className="mainmenu-nav">
              <button className="mobile-close-btn mobile-nav-toggler">
                <i className="fas fa-times" />
              </button>
              <div className="mobile-nav-brand">
                <a href="/" className="logo">
                  <img
                    src="public/assets/img/logo.png"
                    alt="Site Logo"
                  />
                </a>
              </div>
              <ul className="mainmenu">
                <li>
                  <a href="<?= base_url(); ?>">Home</a>
                </li>
                <li>
                  <a href="<?= base_url('product'); ?>">Product</a>
                </li>
                <li>
                  <a href="<?= base_url('admin'); ?>">Orders</a>
                </li>
                <li>
                  <a href="<?= base_url('admin'); ?>">Admin</a>
                </li>
              </ul>
            </nav>
            {/* End Mainmanu Nav */}
          </div>
          <div className="header-action">
            <ul className="action-list">
              <li className="axil-search d-xl-block d-none">
                <input
                  type="search"
                  className="placeholder product-search-input"
                  name="search2"
                  id="search2"
                  defaultValue=""
                  maxLength={128}
                  placeholder="What are you looking for?"
                  autoComplete="off"
                />
                <button type="submit" className="icon wooc-btn-search">
                  <i className="flaticon-magnifying-glass" />
                </button>
              </li>
              <li className="axil-search d-xl-none d-block">
                <a
                  href="javascript:void(0)"
                  className="header-search-icon"
                  title="Search"
                >
                  <i className="flaticon-magnifying-glass" />
                </a>
              </li>
              <li className="my-account">
                <a href="javascript:void(0)">
                  <i className="flaticon-person" />
                </a>
                <div className="my-account-dropdown">
                  {/*?php if (logged_in(true)) : ?*/}
                  <ul>
                    <li>
                      <a href="<?= base_url('account'); ?>">My Account</a>
                      <a href="<?= base_url('logout') ?>">Log Out</a>
                    </li>
                  </ul>
                  {/*?php else : ?*/}
                  <div className="login-btn">
                    <a
                      href="<?= base_url('login') ?>"
                      className="axil-btn btn-bg-primary"
                    >
                      Login
                    </a>
                  </div>
                  <div className="reg-footer text-center">
                    No account yet?{" "}
                    <a href="<?= base_url('register') ?>" className="btn-link">
                      REGISTER HERE.
                    </a>
                  </div>
                </div>
                {/*?php endif; ?*/}
              </li>
              <li className="axil-mobile-toggle">
                <button className="menu-btn mobile-nav-toggler">
                  <i className="flaticon-menu-2" />
                </button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    {/* End Mainmenu Area */}
  </header>
  </div>
    )
  }
  export default NavbarUser
  