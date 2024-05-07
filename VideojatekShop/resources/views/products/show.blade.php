@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Siker!</strong>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <div class="row showpage">
                    <div class="col">
                        <div class="row showpage-header">
                            <h4>{{$product->name}}</h4>
                        </div>
                            
                        <div class="row showpage-main">
                            <img class="showpage-img" src="{{ asset('storage/products/' . $product->product_img) }}" alt="Termék kép">
                            <hr class="text-dark">

                            <p class="showpage-description">{{$product->description}}</p>
                        </div>

                    </div>
                    <div class="col showpage-sidebar text-left">

                        <p class="showpage-price text-center">ÁR: {{$product->price}} Ft</p>

                        <form class="showpage-form" action="{{route('addProductToCart',$product->id)}}">
                            <button type="submit" class="btn buy-btn">Megvásárlás</button>
                        </form>

                        <hr class="showpage_hr">
                        <p class="showpage-info">Kiadó: {{ \App\Models\Publisher::all()->find($product->publisher_id)->name }}</p>
                        <hr class="showpage_hr">
                        <p class="showpage-info">Platform: {{ \App\Models\Platform::all()->find($product->platform_id)->name }}</p>
                        <hr class="showpage_hr">
                        <p class="showpage_hr">Készleten</p>
                        <hr class="showpage_hr">
                        <p class="showpage-info">KISZÁLLÍTÁS 1 NAPON BELÜL*</p>
                        <p class="showpage-info">INGYENES szállítás Foxposttal*</p>
                        <hr class="showpage_hr">
                        <p class="showpage-info">Üzletünk:</p>
                        @foreach(App\Models\Storage::all() as $storage)

                        <p class="showpage-info">{{$storage->city}} {{$storage->address}}</p>
                        @endforeach
                        

                    </div>
        </div>
        <div class="col-1"></div>
    </div>
@endsection
