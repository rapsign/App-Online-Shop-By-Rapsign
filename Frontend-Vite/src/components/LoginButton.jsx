import { useAuth0 } from "@auth0/auth0-react";

const LoginButton = () => {
  const { loginWithRedirect, isLoading, logout, user } = useAuth0();

  return (
    <>
      {!isLoading && !user && (
        <a href="" onClick={() => loginWithRedirect()}>
          Log In
        </a>
      )}

      {!isLoading && user && (
        <a href="" onClick={() => logout()}>
          Log Out
        </a>
      )}
    </>
  );
};

export default LoginButton;