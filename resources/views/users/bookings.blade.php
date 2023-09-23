@extends('layouts.app')
@section('content')  
<div class="container-xxl py-5 bg-primary hero-header mb-5" style="margin-top: -25px"> 
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">My Bookings</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                {{-- <li class="breadcrumb-item text-white active" aria-current="page">My Bookings</li> --}}
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
        @if(session()->has('booked'))
        <div class="alert alert-success">
        {{ session()->get('booked') }}
        </div>
        @endif
        </div>

    <div class="container">
      <div class="col-md-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">S/N</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Number of People</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Review</th>



              </tr>
            </thead>
            <tbody>
              @if ($allBookings->count() > 0)
                  @foreach ($allBookings as $book)
                  <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $book->name }}</td>
                      <td>{{ $book->email }}</td>
                      <td>{{ $book->num_people }}</td>
                      <td>{{ $book->date }}</td>
                      <td>{{ $book->status }}</td>
                      @if ($book->status == "Booked")
                          <td><a href="{{ route('users.createreviews') }}" class="btn btn-success">Review</a></td> 
                          @else
                          <td>Not Available</td>
                          @endif
                  </tr>
                  @endforeach
              @else
                  <tr>
                      <td colspan="7">
                          <h3 class="alert alert-success">You have no Bookings</h3>
                      </td>
                  </tr>
              @endif
          </tbody>
          
          </table>
      </div>
        </div>



@endsection