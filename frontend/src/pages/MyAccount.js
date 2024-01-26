import React, { useState, useEffect } from 'react';
import { useAuth0 } from '@auth0/auth0-react';
import SalWrapper from '../components/SalWrapper';
import Loading from '../components/Loading';
import { checkUser } from '../components/Api';
import axios from 'axios';

const MyAccount = () => {
  const { user, isAuthenticated, loginWithRedirect, logout } = useAuth0();
  const [userData, setUserData] = useState({});
  const [isLoading, setIsLoading] = useState(true);



axios.post('http://localhost:8080/users', { sub: 'google-oauth2|102569074842069535235' })
  .then(response => console.log(response.data))
  .catch(error => console.error('Error:', error));
};

export default MyAccount;