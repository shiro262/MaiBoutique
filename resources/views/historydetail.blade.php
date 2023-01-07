@section('title', 'Transaction History Detail')
@extends('mastermember')
@section('content')
<h1 class="text-center">Check What You've Bought!</b></h1>
<h2 class="text-center">
    <a href="{{ url()->previous() }}" class="btn btn-primary"><</a>
</h2>
<div class="row row-cols-3 justify-content-md-center">
@foreach ($transaction_details as $trd)
<div class="card col m-1" style="width: 18rem;">
    <img src="{{asset('storage/images/'.$trd->product_image)}}" width="15" height="250" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"> {{ $trd->product_name}} </h5>
        <p class="card-text text-truncate">Rp. {{ $trd->tot }} </p>
        <p class="card-text text-truncate">Qty: {{ $trd->quantity }} </p>
        <div class="d-flex justify-content-between">
        </div>
    </div>
</div>
@endforeach
</div>
@endsection
