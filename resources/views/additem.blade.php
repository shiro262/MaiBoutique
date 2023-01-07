@extends('masteradmin')
@section('title', 'Add Item')
@section('content')
<div class="container mt-4">
    <div class="card" style="background-color: pink;">
      <div class="card-header text-center font-weight-bold" style="font-size: 35px">
        Add Item
      </div>
      <div class="card-body">
        <form class="insert-page-container" method="POST" enctype="multipart/form-data" action="{{Route('Add Item')}}">
            @csrf

            @if ($errors->any())
                <div class="error-message">
                    {{$errors->first()}}
                </div>
            @endif
            <label for="exampleInputEmail1">Clothes Image</label><br/>
            <input type="file" placeholder="image" class="insert-page-input" name="image"> <br/>
            <label for="exampleInputEmail1">Clothes Name</label><br/>
            <input type="text" placeholder="(5-20 letters)" class="form-control" name="name">
            <label for="exampleInputEmail1">Clothes Desc</label><br/>
            <input type="text" placeholder="(min 5 letters)" class="form-control" name="detail">
            <label for="exampleInputEmail1">Clothes Price</label><br/>
            <input type="integer" placeholder="≥1000" class="form-control" name="price">
            <label for="exampleInputEmail1">Clothes Stock</label><br/>
            <input type="number" placeholder="≥1" class="form-control"/><br/>
            <button type="submit" class="btn btn-danger" style="color:White;">Add</button>
        </form>
      </div>
    </div>
  </div>
</form>
@endsection
