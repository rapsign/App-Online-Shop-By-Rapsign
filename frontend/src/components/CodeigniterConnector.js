import React, { useState, useEffect } from 'react'
import axios from 'axios'


const Connector = () => {
const [products, setProducts] = useState([])
  useEffect(() => {
      getProducts();
  }, [])
  const getProducts = async() => {
      const products = await axios.get('http://localhost:8080/products')
      setProducts(products.data)
  }
  const formatRupiah = (amount) => {
    return new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
    }).format(amount);
  };
}
export default Connector;