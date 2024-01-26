import React, { useEffect } from 'react';
import sal from 'sal.js';
import 'sal.js/dist/sal.css';

const SalWrapper = ({ children }) => {
  useEffect(() => {
    sal();
  }, []);

  return <div data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800">{children}</div>;
};

export default SalWrapper;