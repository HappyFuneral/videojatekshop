@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card cardform">
                <div class="card-header cardform-header">{{ __('Termék módosítása') }}</div>

                <div class="card-body cardform-body p-md-5">
                    @if ($errors->any())
                        <div class="mb-3 mt-3">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong>OOPS!</strong>

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
                         
                            <strong>Siker!</strong> 
                            <p>{{Session::get('success')}}</p>
                        </div>
                    @endif

                    <form action="{{ route('orders.update', $order) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                       
                        <div class="mb-3">
                            <label for="orderState_id" class="form-label">Rendelés állapota</label>
                            <select name="orderState_id" class="form-control @if($errors->has('orderState_id')) border border-danger @endif" data-te-select-init>
                                @foreach(\App\Models\OrderState::all() as $orderstate)
                                @if ($orderstate->id == $order->orderState_id)
                                    <option selected value="{{$orderstate->id}}">{{$orderstate->state}}</option>
                                @else
                                    <option value="{{$orderstate->id}}">{{$orderstate->state}}</option>
                                @endif
                                @endforeach
                            </select>

                            @if ($errors->has('orderState_id'))
                                <small class="text-danger">{{ $errors->first('orderState_id') }}</small>
                            @endif
                        </div>

                  
                        
                        <button type="submit" class="btn submit-btn">Módosítás</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
