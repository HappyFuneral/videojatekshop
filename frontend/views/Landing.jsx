import { useEffect, useState } from "react";
import axiosClient from "../src/axios-client";
import ProductItem from "../components/ProductItem";

export default function Home(){
    const [products,setProducts] = useState([])
    const [loading,setLoading] = useState(false)

    useEffect(()=>{
        getProducts()
    },[])

    const getProducts = () => {
        setLoading(true)
        axiosClient.get("/products")
            .then(({data}) => {
                setLoading(false)
                setProducts(data)
            }).catch(({err}) =>{
            setLoading(false)
        })
    }
   
    return (
        <div>
            {products.forEach(element => {
            <div>
                {element.name}
            </div>    
            })
            }

        </div>
    );
}