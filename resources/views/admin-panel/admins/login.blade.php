
@extends('layouts.admin') 
@section('content')

<div class="container">
  <div class="row">
      <div class="col-12">
          <div class="d-flex align-items-center min-vh-100">
              <div class="w-100 d-block my-5">
                  <div class="row justify-content-center">
                      <div class="col-md-8 col-lg-5">
                          <div class="card">
                              <div class="card-body">
                                  <div class="text-center mb-4 mt-3">
                                      <a href="index.html">
                                          <span><h3>RESTAURANT ADMIN LOGIN</h3></span>
                                      </a>
                                  </div>
                                  <form method="POST" class="p-auto" action="{{ route('checklogin') }}">
                                    @csrf
                                      <div class="form-group">
                                          <label for="emailaddress">Email address</label>
                                          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                          @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
                                        </div>

                                      <div class="form-group">
                                          <label for="password">Password</label>
                                          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                          @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                          @enderror                 
                                        </div>
                                      <div class="mb-3 text-center">
                                          <button class="btn btn-primary btn-block" type="submit" name="submit"> Sign In </button>
                                      </div>
                                  </form>
                              </div>
                              <!-- end card-body -->
                          </div>
  
                      </div>
                      <!-- end col -->
                  </div>
                  <!-- end row -->
              </div> <!-- end .w-100 -->
          </div> <!-- end .d-flex -->
      </div> <!-- end col-->
  </div> <!-- end row -->
</div>
<!-- end container -->
@endsection