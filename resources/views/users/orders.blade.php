@extends('layouts.app')
@section('content')  
<div class="container-xxl py-5 bg-primary hero-header mb-5" style="margin-top: -25px"> 
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">My Orders</h1>
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
      <div class="col-md-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">S/N</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Town</th>
                <th scope="col">Phone number</th>
                <th scope="col">price</th>
                <th scope="col">status</th>
                <th scope="col">Review</th>



              </tr>
            </thead>
            <tbody>
              @if ($allorders->count() > 0)
                @foreach ($allorders as $order)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->town }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>${{ $order->price }}</td>
                    {{-- <td>{{ $order->date }}</td> --}}
                    <td>{{ $order->status }}</td>
                    @if ($order->status == "Delivered")
                    <td><a href="{{ route('users.createreviews') }}" class="btn btn-success">Review</a></td>
                    @else
                    <td>Not Available</td>
                    @endif
                  </tr>
                  @endforeach
                  @else
                  <tr>
                      <td colspan="7">
                          <h3 class="alert alert-success">You have no Orders yet</h3>
                      </td>
                  </tr>
              @endif
               
              
        
            </tbody>
          </table>
      </div>
        </div>



@endsection