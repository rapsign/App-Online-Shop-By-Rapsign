import axios from 'axios';

export const getProducts = async () => {
  try {
    const {data} = await axios.get('http://localhost:3000/products');
    return data;
  } catch (error) {
    console.error('Error fetching products:', error);
    return [];
  }
};

export const getProductsBySlug = async (slug) => {
  try {
    const {data} = await axios.get(`http://localhost:3000/products/${slug}`);
    return data;
  } catch (error) {
    console.error('Error fetching products:', error);
    return [];
  }
};

export const checkUser = async (user) => {
  try {
    const {data} = await axios.post('http://localhost:3000/auth', user, {
      headers: {
        'Content-Type': 'application/json',
      },
    });
    return data;
  } catch (error) {
    console.error('Error creating user:', error);
    return null; // Return null to indicate an error
  }
};

export const saveUserData = async (user) => {
  console.log(user)
  try {
    const { data } = await axios.put('http://localhost:3000/save', user, {
      headers: {
        'Content-Type': 'application/json',
      },
    });
    console.log('Server response:', data);
  } catch (error) {
    console.log(error.response.data);
    const err =  error.response.data.error
    throw err
  }
};



