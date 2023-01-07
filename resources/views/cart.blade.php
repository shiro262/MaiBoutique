@section('title', 'Cart')
@extends('mastermember')
@section('content')
<h1 class="text-center">My Cart</b></h1>
<br/>
@if (session()->has('success'))
    <div class="alert alert-danger form-outline mb-4 center-block" style="text-align: center;" role="alert">
        {{session()->get('success')}}
    </div>
@endif
<h2 class="text-end">
    Total Price: {{$tr->tot}}  <a href="{{ route('Confirm Check Out') }}" class="btn btn-primary">Check Out</a>
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
            <form action="{{ route('View Product', [$trd->product_id]) }}">
                <button class="btn btn-primary" type="submit">Edit Cart</button>
            </form>
            <form method="post" action="{{route('Remove From Cart', $trd->id)}}">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" type="submit">Remove</button>
            </form>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection

