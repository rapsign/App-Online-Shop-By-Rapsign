import React from "react";
import { Link } from "react-router-dom";
import LoginButton from "./LoginButton";

const FooterUser = () => {
    return (
        <footer className="axil-footer-area footer-style-2">
    {/* Start Footer Top Area  */}
    <div className="footer-top separator-top">
      <div className="container">
        <div className="row">
          {/* Start Single Widget  */}
          <div className="col-lg-3 col-sm-6">
            <div className="axil-footer-widget">
              <h5 className="widget-title">Support</h5>
         
              <div className="inner">
                <p>
                  685 Market Street, <br />
                  Las Vegas, LA 95820, <br />
                  United States.
                </p>
                <ul className="mt-1">
                  <li>
                    <Link to="#">
                      example@domain.com
                    </Link>
                  </li>
                  <li>
                    <Link to="#">
                       (+01) 850-315-5862
                    </Link>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div className="col-lg-3 col-sm-6">
            <div className="axil-footer-widget">
              <h5 className="widget-title">Account</h5>
              <div className="inner">
                <ul>
                  <li>
                    <Link to="/my-account">My Account</Link>
                  </li>
                  <li>
                    <LoginButton/>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          {/* End Single Widget  */}
          {/* Start Single Widget  */}
          <div className="col-lg-3 col-sm-6">
            <div className="axil-footer-widget">
              <h5 className="widget-title">Quick Link</h5>
              <div className="inner">
                <ul>
                  <li>
                    <Link to="privacy-policy.html">Privacy Policy</Link>
                  </li>
                  <li>
                    <Link to="terms-of-service.html">Terms Of Use</Link>
                  </li>
                  <li>
                    <Link to="#">FAQ</Link>
                  </li>
                  <li>
                    <Link to="contact.html">Contact</Link>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div className="copyright-area copyright-default separator-top">
      <div className="container">
        <div className="row align-items-center">
          <div className="col-xl-4">
            <div className="social-share">
              <Link to="#">
                <i className="bi bi-facebook" />
              </Link>
              <Link to="#">
                <i className="bi bi-instagram" />
              </Link>
              <Link to="#">
                <i className="bi bi-twitter" />
              </Link>
              <Link to="#">
                <i className="bi bi-linkedin" />
              </Link>
              <Link to="#">
                <i className="bi bi-discord" />
              </Link>
            </div>
          </div>
          <div className="col-xl-4 col-lg-12">
            <div className="copyright-left d-flex flex-wrap justify-content-center">
              <ul className="quick-link">
                <li>
                  © 2023. All rights reserved by Rapsign.
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    {/* End Copyright Area  */}
  </footer>
    )
};
export default FooterUser;
