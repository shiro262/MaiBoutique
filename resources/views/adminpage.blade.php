@section('title', 'Admin Page')
@extends('masteradmin')
@section('content')
@if(isset($query))
    <h1 class="text-center">Search Your Favorite Clothes!</b></h1>
@else
    <h1 class="text-center">Find Your Best Clothes Here!</h1>
@endif
<div class="row row-cols-3 justify-content-md-center">
    @foreach($products as $p)
    <div class="card col m-1" style="width: 18rem;">
        <img src="{{asset('storage/images/'.$p->image)}}" width="15" height="250" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"> {{ $p->name }} </h5>
            <p class="card-text text-truncate">Rp. {{ $p->price }} </p>
            <div class="d-flex justify-content-between">
                <form action="{{route('View Product Admin', [$p->id])}}">
                    <button class="btn btn-outline-primary" type="submit">Detail</button>
                </form>
                <form method="post" action="{{route('Delete Product', [$p->id])}}">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-danger" type="submit">Delete</button>
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
