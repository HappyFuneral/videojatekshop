@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card cardform">
                <div class="card-header cardform-header">{{ __('Szerződés módosítás') }}</div>

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

                    <form action="{{ route('contracts.update', $contract) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="contract_name" class="form-label">Cím</label>
                            <input type="text" name="contract_name" id="contract_name" class="form-control @if($errors->has('contract_name')) border border-danger @endif"
                                aria-describedby="helpId" value="{{old('contract_name', $contract->contract_name)}}">

                            @if ($errors->has('contract_name'))
                                <small class="text-danger">{{ $errors->first('contract_name') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="contract_owner" class="form-label">Ügyfél</label>
                            <input type="text" name="contract_owner" id="contract_owner" class="form-control @if($errors->has('contract_owner')) border border-danger @endif"
                                aria-describedby="helpId" value="{{old('contract_owner', $contract->contract_owner)}}">

                            @if ($errors->has('contract_owner'))
                                <small class="text-danger">{{ $errors->first('contract_owner') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="pdf" class="form-label">PDF fájl</label>
                            <input type="file" name="pdf" id="pdf" class="form-control @if($errors->has('pdf')) border border-danger @endif"
                                aria-describedby="helpId" value="{{old('pdf', $contract->pdf)}}">

                            @if ($errors->has('pdf'))
                                <small class="text-danger">{{ $errors->first('pdf') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="contract_type_id" class="form-label">Szerződés típus</label>
                            <select name="contract_type_id" class="form-control @if($errors->has('contract_type_id')) border border-danger @endif" data-te-select-init>
                                @foreach(\App\Models\ContractType::all() as $contracttype)
                                @if($contracttype->id == $contract->contract_type_id)
                                    <option selected value="{{$contracttype->id}}">{{$contracttype->name}}</option>
                                @else
                                 <option value="{{$contracttype->id}}">{{$contracttype->name}}</option>

                                @endif
                                @endforeach
                            </select>

                            @if ($errors->has('contract_type_id'))
                                <small class="text-danger">{{ $errors->first('contract_type_id') }}</small>
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
