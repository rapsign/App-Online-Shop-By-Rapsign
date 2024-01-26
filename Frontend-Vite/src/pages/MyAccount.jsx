import { useState, useEffect } from 'react';
import { useAuth0 } from '@auth0/auth0-react';
import SalWrapper from '../components/SalWrapper';
import Loading from '../components/Loading';
import { checkUser } from '../components/Api';
import { saveUserData } from '../components/Api';

const MyAccount = () => {
  const { user, isAuthenticated, loginWithRedirect, logout, isLoading } = useAuth0();
  const [userData, setUserData] = useState([]);
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    address: '',
    phone_number: '',
  });

  useEffect(() => {
    const fetchData = async () => {
      try {
        const fetchedUser = await checkUser(user);
        setUserData(fetchedUser);       
        setFormData({
          id:fetchedUser.id,
          email:fetchedUser.email,
          name: fetchedUser.name || '',
          address: fetchedUser.address || '',
          phone_number: fetchedUser.phone_number || '',
        });
      } catch (error) {
        console.error('Error fetching user data:', error);
        // Handle error state or show a message to the user
      } 
    };

    fetchData();
  }, [user]);
  

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prevData) => ({
      ...prevData,
      [name]: value,
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await saveUserData(formData);
      
    } catch (error) {
      console.log(error)
    }
  };


  if (isLoading) {
    return <Loading/>
  }
 if (!isAuthenticated) {
    return (
      <div>
      <SalWrapper>
      <div className="container" style={{ marginTop: 70, marginBottom: 70 }}>
        <div className="row align-items-center">
          <div className="col-lg-6">
            <span className="title-highlighter highlighter-secondary">
              <i className="bi bi-exclamation"></i> Oops! Something's missing.
            </span>
            <h1 className="title mb-3" style={{ fontWeight: 'bold', fontSize: '34px' }}>Page not found</h1>
            <p className='mb-4' style={{ fontSize: '16px' }}>It looks like you haven't logged in yet. Please log in first.</p>
            <a
              href=""
              className="axil-btn btn-bg-secondary right-icon"
              onClick={() => loginWithRedirect()}
            >
              Login <i className="bi bi-arrow-left"></i>
            </a>
          </div>

          <div className="col-lg-6">
            <img src="assets/images/others/404.png" alt={404} />
          </div>
        </div>
      </div>
    </SalWrapper>
    </div>
    );
  }
  return (
    <main className="main-wrapper">
    {/* Start Breadcrumb Area  */}
    <div className="axil-breadcrumb-area">
      <div className="container">
        <div className="row align-items-center">
          <div className="col-lg-6 col-md-8">
            <div className="inner">
              <ul className="axil-breadcrumb">
                <li className="axil-breadcrumb-item">
                  <a href="index-2.html">Home</a>
                </li>
                <li className="separator" />
                <li className="axil-breadcrumb-item active" aria-current="page">
                  My Account
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    {/* End Breadcrumb Area  */}
    {/* Start My Account Area  */}
    <div className="axil-dashboard-area axil-section-gap">
      <div className="container">
        <div className="axil-dashboard-warp">
          <div className="axil-dashboard-author">
            <div className="media">
              <div className="thumbnail">
                {userData?.picture && <img src={userData.picture} alt={userData?.name} /> }
              </div>
              <div className="media-body">
                <h5 className="title mb-0">{userData?.name}</h5>
                <span className="joining-date">eTrade Member</span>
              </div>
            </div>
          </div>
          <div className="row">
            <div className="col-xl-3 col-md-4">
              <aside className="axil-dashboard-aside">
                <nav className="axil-dashboard-nav">
                  <div className="nav nav-tabs" role="tablist">
                    <a
                      className="nav-item nav-link active "
                      data-bs-toggle="tab"
                      href="#nav-dashboard"
                      role="tab"
                      aria-selected="true"
                    >
                      <i className="fas fa-th-large"/>  {'  '}
                     Dashboard
                    </a>
                    <a
                      className="nav-item nav-link"
                      data-bs-toggle="tab"
                      href="#nav-orders"
                      role="tab"
                      aria-selected="false"
                    >
                      <i className="fas fa-shopping-basket" /> {' '}
                      Orders
                    </a>
                    <a
                      className="nav-item nav-link"
                      data-bs-toggle="tab"
                      href="#nav-downloads"
                      role="tab"
                      aria-selected="false"
                    >
                      <i className="fas fa-file-download" /> {' '}
                      Downloads
                    </a>
                    <a
                      className="nav-item nav-link"
                      data-bs-toggle="tab"
                      href="#nav-address"
                      role="tab"
                      aria-selected="false"
                    >
                      <i className="fas fa-home" /> {' '}
                      Addresses
                    </a>
                    <a
                      className="nav-item nav-link"
                      data-bs-toggle="tab"
                      href="#nav-account"
                      role="tab"
                      aria-selected="false"
                      
                    >
                      <i className="fas fa-user" /> {''}
                      Account Details
                    </a>
                    <a className="nav-item nav-link" href="" onClick={() => logout()}>
                      <i className="fas fa-sign-out" /> {' '}
                      Logout
                    </a>
                  </div>
                </nav>
              </aside>
            </div>
            <div className="col-xl-9 col-md-8">
              <div className="tab-content">
                <div
                  className="tab-pane fade show active"
                  id="nav-dashboard"
                  role="tabpanel"
                >
                  <div className="axil-dashboard-overview">
                    <div className="welcome-text">
                      Hello {userData?.name} (not <span>{userData?.name}?</span>{" "}
                      <a href="" onClick={() => logout()}>Log Out</a>)
                    </div>
                    <p>
                      From your account dashboard you can view your recent orders,
                      manage your shipping and billing addresses.
                    </p>
                  </div>
                </div>
                <div className="tab-pane fade" id="nav-orders" role="tabpanel">
                  <div className="axil-dashboard-order">
                    <div className="table-responsive">
                      <table className="table">
                        <thead>
                          <tr>
                            <th scope="col">Order</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">#6523</th>
                            <td>September 10, 2020</td>
                            <td>Processing</td>
                            <td>$326.63 for 3 items</td>
                            <td>
                              <a href="#" className="axil-btn view-btn">
                                View
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">#6523</th>
                            <td>September 10, 2020</td>
                            <td>On Hold</td>
                            <td>$326.63 for 3 items</td>
                            <td>
                              <a href="#" className="axil-btn view-btn">
                                View
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">#6523</th>
                            <td>September 10, 2020</td>
                            <td>Processing</td>
                            <td>$326.63 for 3 items</td>
                            <td>
                              <a href="#" className="axil-btn view-btn">
                                View
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">#6523</th>
                            <td>September 10, 2020</td>
                            <td>Processing</td>
                            <td>$326.63 for 3 items</td>
                            <td>
                              <a href="#" className="axil-btn view-btn">
                                View
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">#6523</th>
                            <td>September 10, 2020</td>
                            <td>Processing</td>
                            <td>$326.63 for 3 items</td>
                            <td>
                              <a href="#" className="axil-btn view-btn">
                                View
                              </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div className="tab-pane fade" id="nav-downloads" role="tabpanel">
                  <div className="axil-dashboard-order">
                    <p>You don't have any download</p>
                  </div>
                </div>
                <div className="tab-pane fade" id="nav-address" role="tabpanel">
                  <div className="axil-dashboard-address">
                    <p className="notice-text">
                      The following addresses will be used on the checkout page by
                      default.
                    </p>
                    <div className="row row--30">
                      <div className="col-lg-6">
                        <div className="address-info mb--40">
                          <div className="addrss-header d-flex align-items-center justify-content-between">
                            <h4 className="title mb-0">Shipping Address</h4>
                          </div>
                          <ul className="address-details">
                            <li>Name: {userData?.name} </li>
                            <li>Email: {userData?.email} </li>
                            <li>Phone: {userData?.phone_number}</li>
                            <li className="mt--30">
                              {userData?.address}
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div className="col-lg-6">
                        <div className="address-info">
                          <div className="addrss-header d-flex align-items-center justify-content-between">
                            <h4 className="title mb-0">Billing Address</h4>
                          </div>
                          <ul className="address-details">
                          <li>Name: {userData?.name} </li>
                          <li>Email: {userData?.email} </li>
                          <li>Phone: {userData?.phone_number}</li>
                            <li className="mt--30">
                            {userData?.address}
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="tab-pane fade" id="nav-account" role="tabpanel">
                  <div className="col-lg-9">
                    <div className="axil-dashboard-account">
                     <form className="account-details-form" onSubmit={handleSubmit}>
                        <div className="row">
                          <div className="col-lg-6">
                            <div className="form-group">
                              <label>Name</label>
                              <input
                                type="text"
                                className="form-control"
                                value={formData.name}
                                onChange={handleChange}
                                name="name"
                              />
                            </div>
                          </div>
                          <div className="col-lg-6">
                            <div className="form-group">
                              <label>Email</label>
                              <input
                                type="text"
                                className="form-control"
                                value={formData.email}
                                readOnly
                              />
                            </div>
                          </div>
                          <div className="col-lg-6">
                            <div className="form-group">
                              <label>Address</label>
                              <input
                                type="text"
                                className="form-control"
                                value={formData.address}
                                onChange={handleChange}
                                name="address"
                              />
                            </div>
                          </div>
                          <div className="col-lg-6">
                            <div className="form-group">
                              <label>Phone Number</label>
                              <input
                                type="tel"
                                className="form-control"
                                value={formData.phone_number}
                                onChange={handleChange}
                                name="phone_number"
                              />
                            </div>
                          </div>
                          <div className="col-lg-6">
                            <div className="form-group mb--0">
                              <input
                                type="submit"
                                className="axil-btn"
                                value="Save Changes"
                              />
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {/* End My Account Area  */}
    {/* Start Axil Newsletter Area  */}
    
    {/* End Axil Newsletter Area  */}
  </main>
  );
};
export default MyAccount;