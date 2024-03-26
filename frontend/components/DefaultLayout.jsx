import {Link, Navigate, Outlet} from "react-router-dom";
import {useStateContext} from "../contexts/ContextProvider.jsx";

export default function DefaultLayout() {
    const {user, token} = useStateContext()

    if (!token) {
        return <Navigate to="/login"/>
    } else {
        const Logout = (ev) => {
            ev.preventDefault();
        }
        return (
            <div id="defaultLayout">
                <aside>
                    <Link to="/home">
                        Dashboard
                    </Link>
                </aside>
                <div className="content">
                    <header>
                        <div>Header</div>
                        <div>
                            {user.name}
                            <a href="#" onClick={Logout} className="btn-logout">Logout</a>
                        </div>
                    </header>
                    <main>
                        <Outlet/>
                    </main>
                </div>

            </div>
        );
    }
}