@extends('mastermember')
@section('title', 'Update Profile')
@section('content')
<div class="container mt-4">
    <div class="card" style="background-color: pink;">
      <div class="card-header text-center font-weight-bold" style="font-size: 35px">
        Update Profile
      </div>
      <div class="card-body">
        <form class="insert-page-container" method="POST" enctype="multipart/form-data" action="{{route('Update Profile')}}">
            @csrf
            {{-- @method('patch') --}}
            @if ($errors->any())
                <div class="alert alert-danger form-outline mb-4" role="alert">
                    {{$errors->first()}}
                </div>
            @endif
            <label for="username">Username</label><br/>
            <input id="username" type="text" placeholder="(5-20 letters)" class="form-control" name="username" value="{{Auth::user()->username}}">
            <label for="email">Email</label><br/>
            <input id="email" type="text" placeholder="" class="form-control" name="email" value="{{Auth::user()->email}}">
            <label for="phone">Phone Number</label><br/>
            <input id="phone" type="text" placeholder="(10-13 numbers)" class="form-control" name="phone" value="{{Auth::user()->phone}}">
            <label for="address">Address</label><br/>
            <input id="address" type="text" placeholder="(min 5 letters)" class="form-control" name="address" value="Jl.">
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
            <a href="{{ route('View Member Profile') }}" class="btn btn-danger" style="color:white;">Back</a>
        </form>
      </div>
    </div>
  </div>
</form>
@endsection
