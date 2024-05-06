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
            <div class="row showpage">
                    <div class="col-9">
                        <div class="row showpage-header">
                            <h3>{{$product->name}}</h3>
                        </div>
                            
                        <div class="row showpage-main">
                            <img class="showpage-img" src="{{ asset('storage/products/' . $product->product_img) }}" alt="Termék kép">
                            <hr class="text-dark">

                            <p class="showpage-description">{{$product->description}}</p>
                        </div>

                    </div>
                    <div class="col-3 showpage-sidebar">

                        <p class="showpage-price">{{$product->price}} Ft</p>

                        <form class="showpage-form" action="">
                            <button type="submit" class="btn buy-btn">Megvásárlás</button>
                        </form>

                        <hr class="text-white showpage-hr">

                        <p class="showpage-info">Kiadó: {{ \App\Models\Publisher::all()->find($product->publisher_id)->name }}</p>
                        
                        <hr class="text-white showpage-hr">

                        <p class="showpage-info">Platform: {{ \App\Models\Platform::all()->find($product->platform_id)->name }}</p>

                        <hr class="text-white showpage-hr">

                        <p class="showpage-info">Készleten</p>

                        <hr class="text-white showpage-hr">
                    </div>
        </div>
        <div class="col-2"></div>
    </div>
@endsection
