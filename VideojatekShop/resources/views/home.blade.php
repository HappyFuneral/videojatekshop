@extends('layouts.app')

@section('content')
    <!--
    <div class="row homeFront-div">
        <video autoplay muted loop id="homeFront-video">
            <source src="{{ asset('storage/Background_Videos/vecteezy_retro-sci-fi-background-futuristic-grid-landscape-of-the_9333971.mp4') }}" type="video/mp4">
        </video>
    </div>
    -->

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
