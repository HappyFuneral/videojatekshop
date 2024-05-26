@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card cardform">
                <div class="card-header cardform-header">{{ __('Fiók adatok') }}</div>

                <div class="card-body cardform-body p-md-5">
                    <div class="row mb-3">
                        <label for="email" class="col-form-label">{{ __('Név') }}</label>
                        <p>{{$user->name}}</p>
                    </div>
                    <hr class="text-white">
                    <div class="row mb-3">
                        <label for="email" class="col-form-label">{{ __('Email Cím') }}</label>
                        <p>{{$user->email}}</p>
                    </div>
                    <hr class="text-white">
                    <div class="row mb-3">
                        <label for="password" class="col-form-label">{{ __('Telefonszám') }}</label>
                        <p>{{$user->phoneNumber}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
