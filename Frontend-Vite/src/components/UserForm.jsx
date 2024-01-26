import  { useState } from 'react';

function UserForm() {
  const [formData, setFormData] = useState({
    name: 'aaa',
    email: '',
    address: '',
    phone_number: '',
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prevData) => ({
      ...prevData,
      [name]: value,
    }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    // Implement submit logic here
  };

  return (
    <form className="account-details-form" onSubmit={handleSubmit}>
      <div className="row">
        <div className="col-lg-6">
          <div className="form-group">
            <label>Name</label>
            <input
              type="text"
              className="form-control"
             defaultValue={formData.name}
              onChange={handleChange}
            />
          </div>
        </div>
        <div className="col-lg-6">
          <div className="form-group">
            <label>Email</label>
            <input
              type="text"
              className="form-control"
              defaultValue={formData.email}
              disabled
            />
          </div>
        </div>
        <div className="col-lg-6">
          <div className="form-group">
            <label>Address</label>
            <input
              type="text"
              className="form-control"
              defaultValue={formData.address}
              onChange={handleChange}
            />
          </div>
        </div>
        <div className="col-lg-6">
          <div className="form-group">
            <label>Phone Number</label>
            <input
              type="tel"
              className="form-control"
              defaultValue={formData.phone_number}
              onChange={handleChange}
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
  );
}

export default UserForm;