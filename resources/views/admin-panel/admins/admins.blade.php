
@extends('layouts.admins')
@section('content')

<div class="col-xl-12">
  <div class="card">
      <div class="card-body">
        <div class="container">
          @if (session()->has('success'))
              <div class="alert alert-success">
                  {{ session()->get('success') }}
              </div>
          @endif
      </div>
      <div class="float-end">
        <a  href="{{ route('createAdmins') }}" class="btn btn-success btn-rounded waves-effect waves-light">Create Admins</a>
      </div>
          <h4 class="card-title">List Of Admins</h4>
          <p class="card-subtitle mb-4">Admins with Full Access</p>
          
          <div class="table-responsive">
              <table class="table table-striped mb-0">
                  <thead>
                      <tr>
                          <th>S/N</th>
                          <th>Username</th>
                          <th>Email</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $admin->name }}</td>
                      <td>{{ $admin->email }}</td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div> <!-- end table-responsive-->
      </div>
      <!-- end card-body-->
  </div>
  <!-- end card -->
</div>

@endsection



  