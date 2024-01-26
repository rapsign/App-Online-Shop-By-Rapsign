import reportWebVitals from './reportWebVitals';
import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter } from 'react-router-dom';
import { Auth0Provider } from '@auth0/auth0-react';
import App from './App';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
   <Auth0Provider
    domain="dev-gqmjt48lbt81u8f0.us.auth0.com"
    clientId="QbHXSCHXomWhOWqxPk3LvQD1mJAtIgzS"
    authorizationParams={{
      redirect_uri: window.location.origin
    }}
  >
 <React.StrictMode>
    <BrowserRouter>
       <App />
    </BrowserRouter>
 </React.StrictMode>
 </Auth0Provider>
);
reportWebVitals();


