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
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" href="/admin-page">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href={{ route('View Admin Profile') }}>Profile</a>
        </li>
    </ul>
    <a href={{route('View Add Item Page')}} class="btn btn-light" style="color:Blue;">Add Item</a>
    <a href={{route('user.method.logout')}} class="btn btn-light" style="color:Blue;">Sign Out</a>
  </div>
</nav>
<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
          <form class="d-flex my-2 my-lg-0" action="{{ route('Search Product Admin') }}">
              <input name="search" class="form-control me-2" type="search" placeholder="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
      </ul>
    </div>
</nav>
@yield('content')
</body>
</html>
