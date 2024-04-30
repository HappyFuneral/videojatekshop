// Import the Component
import Hungary from "@react-map/hungary";
import {useNavigate} from "react-router-dom";
export default function Map() {

    const a = useNavigate();
    const redirect = (sc) => {
        // Assuming you have defined your routes
        a(`${sc}`);
    };
    const hover = (sc) => {
        // Assuming you have defined your routes
        alert(`${sc}`);
    };

    return (

       <Hungary onSelect={redirect} size={2200} hoverColor="gray" onHover={hover}/>
    );
}