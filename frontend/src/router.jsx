import {createBrowserRouter } from "react-router-dom";
import Login from './views/Login.jsx';
import DefaultLayout from "./components/DefaultLayout.jsx";
import Home from "./views/Home.jsx";
import GuestLayout from "./components/GuestLayout.jsx";
import Signup from "./views/Signup.jsx";
import Landing from "./views/Landing.jsx";
import ProductDetails from "./views/ProductDetails.jsx";
import CheckoutForm from "./views/Checkout.jsx";

const router = createBrowserRouter([
    {
        path: '/',
        element: <DefaultLayout/>,
        children: [
            {
                path: '/home',
                element: <Home/>
            }         
        ]
    },
    {
        path: '/',
        element: <GuestLayout/>,
        children: [
            {
                path: '/checkout',
                element: <CheckoutForm/>
            },
            {
                path: '/landing',
                element: <Landing/>
            }
            ,
            {
                path: '/product/:id',
                element: <ProductDetails/>
            },
            {
                path: '/login',
                element: <Login/>
            },
            {
                path: '/signup',
                element: <Signup/>
            }
        ]
    },
]);

export default router;