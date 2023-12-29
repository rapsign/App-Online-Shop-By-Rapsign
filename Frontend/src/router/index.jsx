import { createBrowserRouter } from "react-router-dom";
import LayoutUser from "../templates/LayoutUser";
import Home from "../viewsUser/Home";


const router = createBrowserRouter([
  {
    path: "/",
    element: <LayoutUser />,
    children:[
        {
            index: true,
            element: <Home />,
        }
    ]
  },
]);

export default router;