@extends('layouts.app')

@section('content')




<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
         

            
           
            @foreach(App\Models\Product::all() as $product)
          
            <div class="col mb-5 card-home-col">
                <div class="card card-home" onclick="submitForm(this)">
                    <form action="{{ route('products.show', $product) }}">
                        <div class="row card-image">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{asset('storage/products/'.$product->product_img)}}" alt="Termék kép" />
                        </div>
                        <hr class="showpage-hr">
                        <div class="row card-description">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$product->name}}</h5>
                                    <!-- Product price-->
                                    {{$product->price}} <span class="italic">FT</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><form method="GET" action={{route('addProductToCart',$product->id)}}>@csrf @method('GET') <button class="btn home-btn mt-auto" type="submit" href="">Kosárba rakás</a></form></div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            @endforeach

        
        </div>
    </div>
</section>

@endsection
