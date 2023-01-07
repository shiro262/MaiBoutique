@extends('mastermember')
@section('title', "View Product")

@section('content')
<section class="vh-10" style="background-color: white;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="{{asset('storage/images/'.$p->image)}}"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <span class="h1 fw-bold mb-0">{{$p->name}}</span>
                    </div>
                    <h4 class="fw-bold mb-1 pb-1" style="letter-spacing: 1px;">Rp. {{$p->price}}</h4>
                    <hr>
                    <h4 class="fw-bold mb-1 pb-1" style="letter-spacing: 1px;">Product Detail</h4>
                    <h6 class="fw-normal mb-1 pb-1" style="letter-spacing: 1px;">{{$p->detail}}</h6>
                    <hr style="height:10px;border-width:10px;">
                    <h6 class="fw-bold mb-1 pb-1" style="letter-spacing: 1px;">Quantity :</h6>
                    <form method="post" action='{{route('Add To Cart', $p->id)}}'>
                        @csrf
                        <input type="number" name="qty_order" class="form-control quantity update-cart" style="width:20%; text-align:center;" required=""/>
                        <br/>
                        <button type="submit" class="btn btn-success" style="color:white;">Add to Cart</button><br/><br/>
                        @if (session()->has('fail'))
                            <div class="alert alert-danger form-outline mb-4" role="alert">
                                {{session()->get('fail')}}
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success form-outline mb-4" role="alert">
                                {{session()->get('success')}}
                            </div>
                        @endif
                    </form>
                    <a href="{{ route('user.viewPage') }}" class="btn btn-danger" style="color:white;">Back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
