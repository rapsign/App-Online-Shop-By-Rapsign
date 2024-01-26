import React from 'react';
import { Routes, Route } from 'react-router-dom';
import NavbarUser from './NavbarUser'
import FooterUser from './FooterUser';
import Home from '../pages/Home';
import Products from '../pages/Product';
import ProductDetail from './ProductDetail';
import MyAccount from '../pages/MyAccount';
import NotFound from '../pages/NotFound';

const UserLayout = ({ children }) => (
  <div>
    <NavbarUser />
    {children}
    <FooterUser />
  </div>
);

const AppRoutes = () => (
  <Routes>
    <Route
      path="/*"
      element={
        <UserLayout>
          <Routes>
            <Route path="/" element={<Home />} />
            <Route path="/products/*" element={<Products />} />
            <Route path="/:slug" element={<ProductDetail />} />
            <Route path="/error" element={<NotFound />} />
          </Routes>
        </UserLayout>
      }
    />
    <Route
      path="/my-account/*"
      element={
        <UserLayout>
          <Routes>
            <Route path="/" element={<MyAccount />} />
            {/* Tambahkan rute-rute MyAccount yang lain di sini */}
          </Routes>
        </UserLayout>
      }
    />
  </Routes>
);

export default AppRoutes;