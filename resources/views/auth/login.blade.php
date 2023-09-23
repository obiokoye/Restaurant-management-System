@extends('layouts.app')
@section('content')
    <div class="container-xxl py-5 bg-primary hero-header mb-5" style="margin-top: -25px">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('login') }}">Login</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12 bg-primary">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start fw-normal">Login</h5>
                <h1 class="text-white mb-4">Login</h1>
                <form method="POST" action="{{ route('login') }}" class="col-md-8">
                    @csrf
                    <div class="row g-3">
                    
                        <div class="">
                            <div class="form-floating"> 
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <label for="password">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                    
                        <div class="col-md-12">
                                <button class="btn btn-dark w-100 py-3" type="submit">Login</button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection
