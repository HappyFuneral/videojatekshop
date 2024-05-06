@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Siker!</strong>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <div class="showpage">
                <div class="row">
                    <div class="col-9">
                        <div class="row showpage-main">
                            <h1>{{$product->name}}</h1>
                        </div>
                        <div class="row showpage-main">
                            <div class="showpage-img">
                                <img class="center" src="{{ asset('storage/products/' . $product->product_img) }}" alt="Termék kép">
                            </div>

                            <hr class="text-white">

                            <p>{{$product->description}}</p>
                        </div>

                    </div>
                    <div class="col-3 showpage-sidebar">

                        <p class="showpage-price">{{$product->price}} Ft</p>

                        <form action="">
                            <button type="submit" class="btn buy-btn">Megvásárlás</button>
                        </form>

                        <p>Kiadó: {{ \App\Models\Publisher::all()->find($product->publisher_id)->name }}</p>
                        
                    </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
@endsection
