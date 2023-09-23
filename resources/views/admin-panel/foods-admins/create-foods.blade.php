@extends('layouts.admins')
@section('content')
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Food Items</h5>
          <form method="POST" action="{{ route('storefood') }}" enctype="multipart/form-data">
            @csrf
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="name" />
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="price" />
                  @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-outline mb-4 mt-4">
                  <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="quantity" />
                  @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                </div>

                <div class="form-outline mb-4 mt-4"> 
                  <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror"  />
                  @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3"></textarea>
                </div>
               
                <div class="form-outline mb-4 mt-4">
                  <select name="category" class="form-select  form-control" aria-label="Default select example">
                    <option selected>Choose Meal</option>
                    <option value="Break Fast">Breakfast</option>
                    <option value="Lunch">Launch</option>
                    <option value="Dinner">Dinner</option>
                  </select>
                </div>
                <br>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-success  mb-4 text-center">create Food</button>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection