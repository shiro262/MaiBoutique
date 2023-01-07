@extends('masteradmin')
@section('title', 'Update Password')
@section('content')
<div class="container mt-4">
    <div class="card" style="background-color: pink;">
      <div class="card-header text-center font-weight-bold" style="font-size: 35px">
        Update Password
      </div>
      <div class="card-body">
        <form class="insert-page-container" method="POST" enctype="multipart/form-data" action="{{route('Update Password For Admin')}}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger form-outline mb-4" role="alert">
                    {{$errors->first()}}
                </div>
            @endif
            <label for="password">Old Password</label><br/>
            <input id="password" type="password" placeholder="(5-20 letters)" class="form-control" name="old_password">
            <label for="password">New Password</label><br/>
            <input id="new_password" type="password" placeholder="(5-20 letters)" class="form-control" name="new_password">
            <br/>
            <div class="col text-center">
                <button type="submit" class="btn btn-success" style="color:White;">Save Update</button>
            </div>
            <br/>
            @if (session()->has('success'))
                <div class="alert alert-success form-outline mb-4" role="alert">
                    {{session()->get('success')}}
                </div>
            @endif
            <br/>
            <a href="{{ url()->previous() }}" class="btn btn-danger" style="color:white;">Back</a>
        </form>
      </div>
    </div>
  </div>
</form>
@endsection
