import React from 'react'

const Register = () => {

  return (
    <>
    <div className="axil-signin-area">
    {/* Start Header */}
    <div className="signin-header">
      <div className="row align-items-center">
        <div className="col-md-6">
          <a href="/" className="site-logo">
            <img src="assets/images/logo/logo.png" alt="logo" />
          </a>
        </div>
        <div className="col-md-6">
          <div className="singin-header-btn">
            <p>Already a member?</p>
            <a
              href="/login"
              className="axil-btn btn-bg-secondary sign-up-btn"
            >
              Sign In
            </a>
          </div>
        </div>
      </div>
    </div>
    {/* End Header */}
    <div className="row">
      <div className="col-xl-4 col-lg-6">
        <div className="axil-signin-banner bg_image bg_image--10">
          <h3 className="title">Jadilah Member Kami</h3>
        </div>
      </div>
      <div className="col-lg-6 offset-xl-2">
        <div className="axil-signin-form-wrap">
          <div className="axil-signin-form">
            <h3 className="title">Become A Member</h3>
            <p className="b2 mb--55">Enter your detail below</p>
            <p className="b2 mb--55">
              {/*?= view('Myth\Auth\Views\_message_block') ?*/}
            </p>
            <form
              className="singin-form"
              action="<?= url_to('register') ?>"
              method="post"
            >
              {/*?= csrf_field() ?*/}
              <div className="form-group">
                <label htmlFor="username">Username</label>
                <input
                  type="text"
                  className="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
                  name="username"
                  placeholder="Username"
                  require=""
                />
              </div>
              <div className="form-group">
                <label>Email</label>
                <input
                  type="email"
                  className="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                  name="email"
                  placeholder="Email"
                  require=""
                />
                <small id="emailHelp" className="form-text text-muted">
                We'll never share your email with anyone else.
                </small>
              </div>
              <div className="form-group">
                <label>Password</label>
                <input
                  type="password"
                  className="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                  name="password"
                  placeholder="Password"
                  autoComplete="off"
                  require=""
                />
              </div>
              <div className="form-group">
                <label>Reapat Password</label>
                <input
                  type="password"
                  className="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                  placeholder="Reapat Password"
                  autoComplete="off"
                  name="pass_confirm"
                  require=""
                />
              </div>
              <div className="form-group align-items-center d-grid gap-2">
                <button
                  type="submit"
                  className="axil-btn btn-bg-primary btn-lg btn-block"
                >
                  Create Account
                </button>
                <a
                  className="axil-btn btn-bg-white btn-lg btn-block text-center btn btn-outline-secondary"
                  href="<?= base_url('auth/google') ?>"
                >
                  <img src="https://img.icons8.com/color/16/000000/google-logo.png" />{" "}
                  Sign Up Using Google
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    </>
  );
  }
export default Register