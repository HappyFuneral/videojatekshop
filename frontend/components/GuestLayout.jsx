import {Link, Navigate, Outlet} from "react-router-dom";
import {useStateContext} from "../contexts/ContextProvider.jsx";
import Navigation from "./parts/Navigation.jsx";
import Footer from "./parts/Footer.jsx";
export default function GuestLayout() {
    const { token} = useStateContext()

        return (
            <div id="guestLayout" >
                <div className="container mx-auto px-4">
                    <Navigation/>
                    <Outlet/>
                    <Footer/>
                </div>
            </div>

        );
    
}