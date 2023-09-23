@extends('layouts.app')
@section('content')

<div class="container-xxl py-5 bg-primary hero-header mb-5" style="margin-top: -25px"> 
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Payment Successful</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Payment Success</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success">
    {{ session()->get('success') }}
    </div>
    @endif
    </div>

@endsection