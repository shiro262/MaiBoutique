@section('title', 'Member Page')
@extends('mastermember')
@section('content')
@if(isset($query))
    <h1 class="text-center">Search Your Favorite Clothes!</b></h1>
@else
    <h1 class="text-center">Find Your Best Clothes Here!</h1>
@endif
@if (session()->has('fail'))
    <div class="alert alert-danger form-outline mb-4 center-block" style="text-align: center;" role="alert">
        {{session()->get('fail')}}
    </div>
@endif
@if (session()->has('success'))
    <div class="alert alert-success form-outline mb-4 center-block" style="text-align: center;" role="alert">
        {{session()->get('success')}}
    </div>
@endif
<div class="row row-cols-3 justify-content-md-center">
    @foreach($products as $p)
    <div class="card col m-1" style="width: 18rem;">
        <img src="{{asset('storage/images/'.$p->image)}}" width="15" height="250" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"> {{ $p->name }} </h5>
            <p class="card-text text-truncate">Rp. {{ $p->price }} </p>
            <div class="d-flex justify-content-between">
                <form action="{{ route('View Product', [$p->id]) }}">
                    <button class="btn btn-outline-primary" type="submit">More Detail</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex justify-content-center" style="margin: 2rem">
    {{$products->links()}}
</div>
@endsection
