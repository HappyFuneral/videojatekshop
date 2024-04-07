import { useEffect, useState } from "react";
import axiosClient from "../src/axios-client";

export default function Home(){
    const [products,setProducts] = useState([])
    const [loading,setLoading] = useState(false)

    useEffect(()=>{

    },[])

    const getProducts = () => {
        setLoading(true)
        axiosClient.get("/products")
            .then(({data}) => {
                setLoading(false)
                console.log(data)
            }).catch(({err}) =>{
            setLoading(false)
        })
    }
    return (
        <div>
            Home
        </div>
    );
}