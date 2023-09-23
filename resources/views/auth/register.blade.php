@extends('layouts.app')
@section('content')

    <div class="container-xxl py-5 bg-primary hero-header mb-5" style="margin-top: -25px">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Registeration</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('register') }}">Register</a></li>
                </ol>
            </nav>
        </div>
    </div>
<div class="container">
    <div class="col-md-12 bg-primary">
        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
            <h5 class="section-title ff-secondary text-start text-dark fw-normal">Register</h5>
            <h1 class="text-white mb-4">Register for a new user</h1>
            <form method="POST" action="{{ route('register') }}" class="col-md-8">
                @csrf 
                <div class="row g-3">
                    <div class="">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label for="name">Name</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="form-floating">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <label for="email">Your Email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="form-floating">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <label for="password">Password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                        </div>
                    </div>


                    <div class="">
                        <div class="form-floating">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <label for="email">Confirm Password</label>
                        
                        </div>
                    </div>
                
                
                
                    <div class="col-md-12">
                        <button class="btn btn-dark w-100 py-3" name="submit" type="submit">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
