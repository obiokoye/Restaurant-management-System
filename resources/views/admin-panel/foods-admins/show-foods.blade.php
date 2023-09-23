@extends('layouts.admins')
@section('content')

          <div class="row">
        <div class="col">
          <div class="card">

            <div class="container">
              @if (session()->has('deletefood'))
                  <div class="alert alert-success">
                      {{ session()->get('deletefood') }}
                  </div>
              @endif
          </div>
            <div class="container">
              @if (session()->has('createfood'))
                  <div class="alert alert-success">
                      {{ session()->get('createfood') }}
                  </div>
              @endif
          </div>
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Foods</h5>
              <div class="float-end">
                <a  href="{{ route('createfood') }}" class="btn btn-success mb-4 text-center float-right">Create New Foods</a>
              </div>
              <table class="table">
                <thead>
                  
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allfoods  as $food)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $food->name }}</td>
                    <td><img width="60px" src="{{ asset('assets/img/' .$food->image.'') }}"></td>
                    <td>${{ $food->price }}</td>
                     <td><a href="{{ route('deletefood', $food->id) }}" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  @endforeach
                 
                 
                
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
@endsection