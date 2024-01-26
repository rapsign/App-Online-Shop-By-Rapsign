import { Route, Routes } from 'react-router-dom';
import Home from './pages/Home';
import Products from './pages/Product';
import NavbarUser from './components/NavbarUser';
import FooterUser from './components/FooterUser';
import Items from './pages/Items';
import ProductDetail from './components/ProductDetail';
import NotFound from './pages/NotFound';
import MyAccont from './pages/MyAccount';
import './App.css';
function App() {
  return (
  <div>

        <Routes>
        <Route
        path="/*"
        element={
            <div>
                <NavbarUser />
                <Routes>
                    <Route exact path="/" element={<Home />} />
                    <Route path="/products/*" element={<Products />} />
                    <Route path="/:slug" element={<ProductDetail />} />
                    <Route path="/error" element={<NotFound />} />
                    <Route
                    path="/my-account/*"
                    element={
                        <Routes>
                        <Route path="/" element={<MyAccont />} />
                        {/* Tambahkan rute-rute MyAccount yang lain di sini */}
                      </Routes>
                    }
                  />
                </Routes>
                <FooterUser />
            </div>
        }
    />
        </Routes>    
  </div>
  );
}

export default App;
