@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card cardform">
                <div class="card-header cardform-header">{{ __('Új termék hozzáadása') }}</div>

                <div class="card-body cardform-body p-md-5">
                    @if ($errors->any())
                        <div class="mb-3 mt-3">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong>Holy guacamole!</strong>

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         
                            <strong>Holy guacamole!</strong> 
                            <p>{{Session::get('success')}}</p>
                        </div>
                    @endif

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="mb-3">
                            <label for="code" class="form-label">Termék kód</label>
                            <input type="text" name="code" id="code" class="form-control @if($errors->has('code')) border border-danger @endif"
                                aria-describedby="helpId" value="{{old('code')}}">

                            @if ($errors->has('code'))
                                <small class="text-danger">{{ $errors->first('code') }}</small>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Cím</label>
                            <input type="text" name="name" id="name" class="form-control @if($errors->has('name')) border border-danger @endif"
                                aria-describedby="helpId" value="{{old('name')}}">

                            @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="product_img" class="form-label">Kép</label>
                            <input type="file" name="product_img" id="product_img" class="form-control @if($errors->has('product_img')) border border-danger @endif"
                                aria-describedby="helpId" value="{{old('product_img')}}">

                            @if ($errors->has('product_img'))
                                <small class="text-danger">{{ $errors->first('product_img') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Leírás</label>
                            <input type="text" name="description" id="description" class="form-control @if($errors->has('description')) border border-danger @endif"
                                aria-describedby="helpId" value="{{old('description')}}">

                            @if ($errors->has('description'))
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Ár</label>
                            <input type="number" name="price" id="price" class="form-control @if($errors->has('price')) border border-danger @endif"
                                aria-describedby="helpId" value="{{old('price')}}">

                            @if ($errors->has('price'))
                                <small class="text-danger">{{ $errors->first('price') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="releaseDate" class="form-label">Megjelenés</label>
                            <input type="date" name="releaseDate" id="releaseDate" class="form-control @if($errors->has('releaseDate')) border border-danger @endif"
                                aria-describedby="helpId" value="{{old('releaseDate')}}">

                            @if ($errors->has('releaseDate'))
                                <small class="text-danger">{{ $errors->first('releaseDate') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="product_type_id" class="form-label">Termék Típus</label>
                            <select name="product_type_id" class="form-control @if($errors->has('product_type_id')) border border-danger @endif" data-te-select-init>
                                @foreach(\App\Models\ProductType::all() as $producttype)
                                    <option value="{{$producttype->id}}">{{$producttype->name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('product_type_id'))
                                <small class="text-danger">{{ $errors->first('product_type_id') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="platform_id" class="form-label">Platform Típus</label>
                            <select name="platform_id" class="form-control @if($errors->has('platform_id')) border border-danger @endif" data-te-select-init>
                                @foreach(\App\Models\Platform::all() as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('platform_id'))
                                <small class="text-danger">{{ $errors->first('platform_id') }}</small>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label for="publisher_id" class="form-label">Kiadó</label>
                            <select name="publisher_id" class="form-control @if($errors->has('publisher_id')) border border-danger @endif" data-te-select-init>
                                @foreach(\App\Models\Publisher::all() as $publisher)
                                    <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('publisher_id'))
                                <small class="text-danger">{{ $errors->first('publisher_id') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="tariff_number" class="form-label">Tarifa szám</label>
                            <input type="number" name="tariff_number" id="tariff_number" class="form-control @if($errors->has('tariff_number')) border border-danger @endif"
                                aria-describedby="helpId" value="{{old('tariff_number')}}">

                            @if ($errors->has('tariff_number'))
                                <small class="text-danger">{{ $errors->first('tariff_number') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="tariff_description" class="form-label">Tarifa leírás</label>
                            <input type="text" name="tariff_description" id="tariff_description" class="form-control @if($errors->has('tariff_description')) border border-danger @endif"
                                aria-describedby="helpId" value="{{old('tariff_description')}}">

                            @if ($errors->has('tariff_description'))
                                <small class="text-danger">{{ $errors->first('tariff_description') }}</small>
                            @endif
                        </div>
                        
                        <button type="submit" class="btn submit-btn">Kreálás</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
