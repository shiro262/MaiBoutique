@section('title','Welcome!')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand"> MAIBOUTIQUE</a>
    <a href="/login" class="btn btn-light" style="color:Blue;">Sign In</a>
  </div>
</nav>
<br/>
<div class="card text-center">
  <img src="{{asset('storage/images/landing.jpg')}}" height="500">
  <div class="card-img-overlay">
  <br/><br/><br/><br/><br/><br/><br/>
    <h1 class="card-title" style="color:White; font-family:Brush Script Std; font-size: 45px;">Welome to MaiBoutique</h1>
    <p class="card-text" style="color:White;" >Online Boutique that Provides You with Various Clothes to Suit Your Various Activities.</p>
    <a href="/register" class="btn btn-info" style="color:White; font-size: 12px;">SIGN UP NOW</a>
  </div>
</div>
</body>
</html>
