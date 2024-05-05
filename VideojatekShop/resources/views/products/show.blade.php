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
                    <h1>{{$product->name}}</h1>
                </div>
                <div class="row">
                    <div class="col-10">

                        <img src="{{$product->product_img}}" alt="Termék kép">

                        <hr class="text-white">

                        <p>{{$product->description}}</p>

                    </div>
                    <div class="col-2">

                        <p>{{$product->price}} Ft</p>

                        <form action="">
                            <button type="submit" class="btn buy-btn">Megvásárlás</button>
                        </form>

                        <p>{{ \App\Models\Publisher::all()->find($product->publisher_id)->name }}</p>
                        @if (Auth::product()->price > 0)
                            <p>Készleten van</p>
                        @else
                            <p>Nincs készleten</p>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
@endsection
