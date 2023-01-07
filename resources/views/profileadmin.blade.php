@extends('masteradmin')
@section('title', 'Profile')
@section('content')
<div class="card text-center">
    <div class="card-header">
      My Profile
    </div>
    <div class="card-body">
      <h5 class="card-title">Username: {{$u->username}}</h5>
      <h6 class="card-text">Email: {{$u->email}}</h6>
      <h6 class="card-text">Address: {{$u->address}}</h6>
      <h6 class="card-text">Phone: {{$u->phone}}</h6>
      <br/>
      <a href={{route('View Update Password Page For Admin')}} class="btn btn-outline-primary" style="color:blue;">Edit Password</a>
    </div>
    <br/>
    @if (session()->has('success'))
        <div class="alert alert-success form-outline mb-4" role="alert">
            {{session()->get('success')}}
        </div>
    @endif
    <div class="card-footer text-muted">
      Admin
    </div>
  </div>
@endsection
