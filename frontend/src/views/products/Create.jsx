export default function CreateProduct(){
    const nameRef = useRef();
    const imgRef = useRef();
    const titleRef = useRef();
    const descriptionRef = useRef();
    const priceRef = useRef();
    const releaseDateRef = useRef();
    const productTypeRef = useRef();
    const publisherRef = userRef();


    const onSubmit = (ev) => {
        ev.preventDefault();
        const payload = {
            name: nameRef.current.value,
            img: imgRef.current.value,
            title: titleRef.current.value,
            description: descriptionRef.current.value,
            price: priceRef.current.value, 
            releaseDate: releaseDateRef.current.value,
            product_type_id: productTypeRef.current.value,
            publisher_id: publisherRef.current.value
        }
        axiosClient.post('/products/add',payload,{validateStatus: false})
            .then(({data})=> {
                alert('Product added!');
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

        <div>
            <form>
            <input ref={nameRef} type="text"/>
            </form>
        </div>
    );
}