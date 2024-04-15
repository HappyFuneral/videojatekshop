import {Link} from "react-router-dom";
import {useRef} from "react";
import axiosClient from "../axios-client.js";
import {useStateContext} from "../contexts/ContextProvider.jsx";

export default function Signup(){
    const nameRef = useRef();
    const emailRef = useRef();
    const passwordRef = useRef();
    const passwordConfirmRef = useRef();
    const phoneRef = useRef();

    const {setUser,setToken} = useStateContext()

    const onSubmit = (ev) => {
        ev.preventDefault();
        const payload = {
            name: nameRef.current.value,
            email: emailRef.current.value,
            password: passwordRef.current.value,
            password_confirmation: passwordConfirmRef.current.value,
            phone: phoneRef.current.value
        }
        axiosClient.post('/signup',payload,{validateStatus: false})
            .then(({data})=> {
                setUser(data.user)
                setToken(data.token)
            }).catch(err=>{
                console.log(err);
                const response = err.response;
                if(response && response.status === 422){
                    console.log(response.data.errors);
                }
        })

        console.log(payload);
    }
    return (
        <div className="login-signup-form animated fadeInDown">
            <div className="form">
                <form onSubmit={onSubmit}>
                    <h1 className="title">
                    Signup for free
                    </h1>
                    <input ref={nameRef} type="text" placeholder="Name"/>
                    <input ref={emailRef} type="email" placeholder="Email"/>
                    <input ref={phoneRef} type="text" placeholder="Phone"/>
                    <input ref={passwordRef} type="password" placeholder="Password"/>
                    <input ref={passwordConfirmRef} type="password" placeholder="Password Confirm"/>
                    <button className="btn btn-block" type="submit">Sign up</button>
                    <p className="message">
                        Already Registered? <Link to="/login">Sign in</Link>
                    </p>
                </form>
            </div>
        </div>
    );
}