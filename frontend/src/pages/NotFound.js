import React from "react";
import SalWrapper from "../components/SalWrapper";
const NotFound = () => {

  return (
    <>
    <SalWrapper>
    <div className="container mt-5 mb-5">
      <div className="row align-items-center">
        <div className="col-lg-6">
            <span className="title-highlighter highlighter-secondary">
              {" "}
              <i className="bi bi-exclamation"></i> Oops! Somthing's
              missing.
            </span>
            <h1 className="title">Page not found</h1>
            <p>
              It seems like we dont find what you searched. The page you were
              looking for doesn't exist, isn't available loading incorrectly.
            </p>
            <a
              href="/"
              className="axil-btn btn-bg-secondary right-icon"
            >
              Back To Home <i class="bi bi-arrow-left"></i>
            </a>
          </div>
        
        <div className="col-lg-6">
            <img src="assets/images/others/404.png" alt={404} />
        </div>
      </div>
    </div>
    </SalWrapper>
    </>
  );
  }
export default NotFound