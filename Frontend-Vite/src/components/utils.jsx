import { useState } from 'react';

export const formatRupiah = (amount) => {
    return new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
    }).format(amount);
  };

const QuantityInput = () => {
  const [quantity, setQuantity] = useState(1);

  const handleDecrement = () => {
    if (quantity > 1) {
      setQuantity(quantity - 1);
    }
  };

  const handleIncrement = () => {
    setQuantity(quantity + 1);
  };

  const handleChange = (e) => {
    const value = parseInt(e.target.value, 10);
    if (!isNaN(value) && value > 0) {
      setQuantity(value);
    }
  };

  return (
    <div className="pro-qty">
      <span className="dec qtybtn" onClick={handleDecrement}>-</span>
      <input type="text" value={quantity} name="qty" onChange={handleChange} />
      <span className="inc qtybtn" onClick={handleIncrement}>+</span>
    </div>
  );
};

export default QuantityInput;

