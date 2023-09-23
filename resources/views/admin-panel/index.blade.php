@extends('layouts.admins')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Restaurant</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <i class="mdi mdi-food float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Total Foods Available: </h6>
                    <h3 class="mb-3" data-plugin="counterup">{{ $foodcount }}</h3>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body bg-warning">
                    <i class="fas fa-cart-arrow-down float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Total orders: </h6>
                    <h3 class="mb-3"><span data-plugin="counterup">{{ $checkout }}</span></h3> 
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <i class="far fa-address-book float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Total bookings: </h6>
                    <h3 class="mb-3"><span data-plugin="counterup">{{ $booking }}</span></h3>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body bg-warning">
                    <i class="fas fa-users float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Total Amount Earned: </h6>
                    <h3 class="mb-3" data-plugin="counterup">${{ $pricetotal }}</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    2023 © Restaurant.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-right d-none d-sm-block">
                        Design & Develop by Obi
                    </div>
                </div>
            </div>
        </div>
    </footer>

    </div>
@endsection
