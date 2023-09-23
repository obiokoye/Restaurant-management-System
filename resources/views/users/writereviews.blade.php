@extends('layouts.app')
@section('content') 
<div class="container-xxl py-5 bg-primary hero-header mb-5" style="margin-top: -25px"> 
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Write Review</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Write Review</a></li>
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

<div class="col-md-12 bg-dark">
    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Review</h5>
        <h1 class="text-white mb-4">Reviews</h1>
        <form method="POST" action="{{ route('users.storereviews') }}"  class="col-md-12">
            @csrf
            <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name">
                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        <label for="name">Your Name</label>
                    </div>
                </div>
              
             
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control @error('review') is-invalid @enderror" name="review" placeholder="Review" id="review" style="height: 100px"></textarea>
                        @error('review')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="review">Review</label>
                    </div>
                </div>
              

                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit" name="submit">Submit Review</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection