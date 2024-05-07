@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card cardform">
                <div class="card-header cardform-header">{{ __('Rendelés leadása') }}</div>

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

                    <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')


                        <div class="mb-3">
                            <label for="postal" class="form-label">Irányítószám</label>
                            <input type="text" name="postal" id="postal" class="form-control @if($errors->has('postal')) border border-danger @endif"
                                aria-describedby="helpId" value="">

                            @if ($errors->has('postal'))
                                <small class="text-danger">{{ $errors->first('postal') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label">Ország</label>
                            <input type="text" name="country" id="country" class="form-control @if($errors->has('price')) border border-danger @endif"
                                aria-describedby="helpId" value="">

                            @if ($errors->has('country'))
                                <small class="text-danger">{{ $errors->first('country') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="province" class="form-label">Megye</label>
                            <input type="text" name="province" id="province" class="form-control @if($errors->has('releaseDate')) border border-danger @endif"
                                aria-describedby="helpId" value="">

                            @if ($errors->has('province'))
                                <small class="text-danger">{{ $errors->first('province') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label">Város</label>
                            <input type="text" name="city" class="form-control @if($errors->has('city')) border border-danger @endif" />
                            @if ($errors->has('city'))
                                <small class="text-danger">{{ $errors->first('city') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Cím</label>
                            <input type="text" name="address" class="form-control @if($errors->has('address')) border border-danger @endif" />
                            @if ($errors->has('address'))
                                <small class="text-danger">{{ $errors->first('address') }}</small>
                            @endif
                        </div>

                        <button type="submit" class="btn submit-btn">Megrendelem</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
