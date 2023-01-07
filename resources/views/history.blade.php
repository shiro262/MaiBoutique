@section('title', 'Transaction History')
@extends('mastermember')
@section('content')
<h1 class="text-center">Check What You've Bought!</b></h1>
<br/>
@foreach ($transactions as $tran)
    @if($tran->status == 1)
    <div class="card">
        <h5 class="card-header">Transaction Date: {{$tran->date}}</h5>
        <div class="card-body">
          <h5 class="card-title">Transaction ID: {{$tran->id}}</h5>
          <p class="card-text">Total Price: {{$tran->tot}}</p>
          <a href="{{ route('View History Detail Page', $tran->id) }}" class="btn btn-primary">View Transaction Detail</a>
        </div>
      </div>
    @else
    Transaction not found!
    @endif
@endforeach
@endsection
