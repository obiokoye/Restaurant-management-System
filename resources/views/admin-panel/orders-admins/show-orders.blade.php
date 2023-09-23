@extends('layouts.admins')
@section('content')

          <div class="row">
        <div class="col">
          <div class="card">

            <div class="container">
              @if (session()->has('orderdelete'))
                  <div class="alert alert-success">
                      {{ session()->get('orderdelete') }}
                  </div>
              @endif
          </div>
            <div class="container">
              @if (session()->has('status'))
                  <div class="alert alert-success">
                      {{ session()->get('status') }}
                  </div>
              @endif
          </div>
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Country</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Change Status</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($allorders as $order)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->country }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }} </td>
                    <td>${{ $order->price }}</td>

                    <td>{{ $order->status }}</td> 
                     <td><a href="{{ route('orders-status', $order->id) }}" class="btn btn-warning btn-sm text-center ">Change Status</a></td>
                     <td><a href="{{ route('deleteorders',$order->id) }}" class="btn btn-danger btn-sm   text-center ">Delete</a></td>

                    </tr>
                  @endforeach
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
@endsection