import { Outlet } from "react-router-dom";
import NavbarUser from "../components/NavbarUser";

function LayoutUser() {
  return (
    <>
            <NavbarUser />  
            <Outlet />   
    </>
  );
}

export default LayoutUser;