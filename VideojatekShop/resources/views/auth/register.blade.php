@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@21.2.7/build/css/intlTelInput.css">

<style>
    .row *{
        padding-left: 0px;
        padding-right: 0px;
    }

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card cardform">
                <div class="card-header cardform-header">{{ __('Regisztrálás') }}</div>

                <div class="card-body cardform-body p-md-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-form-label">{{ __('Név') }}</label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-form-label">{{ __('Email Cím') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3 text-black">
                            <label for="phoneNumber" class="col-form-label text-white">{{ __('Telefonszám') }}</label>

                            <input id="phone" name="phoneNumber" type="tel" class="form-control">
                            <small id="helpId" class="text-muted">Egybe írja be a telefonszámát, szimbólum nélkül!</small>
                            @error('phoneNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-form-label">{{ __('Jelszó') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-form-label">{{ __('Jelszó megerősítése') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="row mb-0 col-md-4 offset-md-4">
                            <button type="submit" class="btn submit-btn">
                                {{ __('Regisztrálás') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@21.2.7/build/js/intlTelInput.min.js"></script>
<script>

</script>
@endsection
