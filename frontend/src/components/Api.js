import axios from 'axios';

export const getProducts = async () => {
  try {
    const response = await axios.get('http://localhost:8080/products');
    return response.data;
  } catch (error) {
    console.error('Error fetching products:', error);
    return [];
  }
};

export const getProductsBySlug = async (slug) => {
    try {
      const response = await axios.get(`http://localhost:8080/products/${slug}`);
      return response.data;
    } catch (error) {
      console.error('Error fetching product by slug:', error);
      return null; // Return null to indicate an error or no data
    }
  };

  export const checkUser = async (user) => {
    try {
      const response = await axios.post('http://localhost:8080/users', JSON.stringify(user), {
        headers: {
          'Content-Type': 'application/json',
        },
      });
  
      return response.data;
    } catch (error) {
      console.error('Error creating user:', error);
      return null; // Return null to indicate an error
    }
  };