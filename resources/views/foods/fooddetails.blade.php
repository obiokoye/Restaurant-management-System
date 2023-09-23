@extends('layouts.app')
@section('content') 
<div class="container-xxl py-5 bg-primary hero-header mb-5" style="margin-top: -25px"> 
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Cart</a></li>
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


<div class="container">
    <div class="row g-5 align-items-center">
        <div class="col-md-6">
            <div class="row g-3">
                <div class="col-12 text-start">
                    <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('assets/img/'.$foodItem->image.'') }}">
                </div>

            </div>
        </div>
                {{-- <//?php $total = 0 ?>
        @if(session('cart'))
        @foreach (session('cart') as $id => $foodItem )

        <//?//php $total += $foodItem['price'] * $foodItem['quantity'] ?> --}}
            
        <div class="col-lg-6">
            <h1 class="mb-4">{{ $foodItem->name }}</h1>
            <p class="mb-4">{{ $foodItem->description }}</p>
            <div class="row g-4 mb-4">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                        <h3>Price: $ {{ $foodItem->price }} </h3>                                   
                    </div>
                </div>
               
            </div>
            @auth
            <form method="post" action="{{ route('foodcart', $foodItem->id) }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="food_id" value="{{ $foodItem->id }}">
                <input type="hidden" name="quantity" value="{{ $foodItem->quantity }}">
                <input type="hidden" name="name" value="{{ $foodItem->name }}">
                <input type="hidden" name="image" value="{{ $foodItem->image }}">
                <input type="hidden" name="price" value="{{ $foodItem->price }}">
                @if ($cartverify > 0)
                <button type="submit" name="submit" class="btn btn-primary py-3 px-5 mt-2" disabled>Added to Cart</button>
                @else
                <button type="submit" name="submit" class="btn btn-primary py-3 px-5 mt-2">Add to Cart</button>
                @endif
            </form>
            @else
            <a href="/login" class="alert alert-success">Register/Login to add this product to cart</a>
            @endauth
           
        </div>
        {{-- @endforeach --}}
        {{-- @endif --}}

    </div>
</div>
@endsection





<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>
<body>



