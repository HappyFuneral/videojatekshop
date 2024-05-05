@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card cardform">
                <div class="card-header cardform-header">{{ __('Bevitel módosítása') }}</div>

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

                    <form action="{{ route('storageproducts.update', $storageproduct) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Mennyiség</label>
                            <input type="number" name="quantity" id="quantity" class="form-control @if($errors->has('quantity')) border border-danger @endif"
                                aria-describedby="helpId" value="{{old('quantity', $storageproduct->quantity)}}">

                            @if ($errors->has('quantity'))
                                <small class="text-danger">{{ $errors->first('quantity') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="product_id" class="form-label">Termék</label>
                            <select name="product_id" class="form-control @if($errors->has('product_id')) border border-danger @endif" data-te-select-init>
                                @foreach(\App\Models\Product::all() as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('product_id'))
                                <small class="text-danger">{{ $errors->first('product_id') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="storage" class="form-label">Raktár</label>
                            <select name="storage_id" class="form-control @if($errors->has('storage_id')) border border-danger @endif" data-te-select-init>
                                @foreach(\App\Models\Storage::all() as $storage)
                                    <option value="{{$storage->id}}">{{$storage->storageName}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('storage'))
                                <small class="text-danger">{{ $errors->first('storage') }}</small>
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
