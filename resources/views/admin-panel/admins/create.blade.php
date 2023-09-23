@extends('layouts.admins')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Admins</h5>
                    <form method="POST" action="{{ route('storeAdmins') }}" class="col-md-8">
                      @csrf                        
                       <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                          <label for="name">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                         
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

                        </div>

                        <div class="form-outline mb-4">
                          <label for="email">Email</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                          <label for="password">Password</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                          
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror 
                        </div>  

                        <div class="form-outline mb-4">
                          <div class="form-floating">
                            <label for="email">Confirm Password</label>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                              
                          
                          </div>
                      </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
@endsection
