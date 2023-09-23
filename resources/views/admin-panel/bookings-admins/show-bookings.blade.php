@extends('layouts.admins') 
@section('content')

        <div class="row">
        <div class="col">
          <div class="card">
            <div class="container">
              @if (session()->has('deletebookings'))
                  <div class="alert alert-success">
                      {{ session()->get('deletebookings') }}
                  </div>
              @endif
          </div>
            <div class="container">
              @if (session()->has('booking'))
                  <div class="alert alert-success">
                      {{ session()->get('booking') }}
                  </div>
              @endif
          </div>
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date of Booking</th>
                    <th scope="col">Nummber of People</th>
                    <th scope="col">Special Request</th>
                    <th scope="col">Status</th>
                    <th scope="col">Update Status</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allbookings as $booking)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->email }}</td>
                    <td>{{ $booking->date }}</td>
                    <td>{{ $booking->num_people }}</td>
                    <td>{{ $booking->spe_request }}</td>
                    <td>{{ $booking->status }}</td>
                    <td><a href="{{ route('bookingstatus', $booking->id) }}" class="btn btn-warning btn-sm  text-center ">Change Status</a></td>
                     <td><a href="{{ route('deletebookings', $booking->id) }}" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  @endforeach
                  
                  
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
@endsection