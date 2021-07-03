<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
  <div class="container border border-primary my-2">
 
  <nav class="navbar navbar-expand-lg bg-primary">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="{{route('cars.index')}}">Accueil</a>
        </li>
     @auth
     <li class="nav-item">
          <a class="nav-link text-white" href="{{route('users.profile',auth()->user()->id)}}">{{auth()->user()->name}}</a>
        </li>
        @if(auth()->user()->isadmin())
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('admin.index')}}">Admin</a>
        </li>
        @endif
        <li class="nav-item">
        <form action="{{route('users.logout')}}" method="post">
        @csrf
        <button type="submit" style="background:transparent; border:none;" class="nav-link text-white">Déconnection</button>
        </form>
          
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('users.register')}}">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('users.login')}}">Connection</a>
        </li>
     @endauth
      </ul>
   
  </div>
</nav>

<div class="row">
<div class="col-md-6 mx-auto my-4">
@include('includes.messages')
</div>
</div>

  @yield('content')
  </div>
  </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    
  </body>
</html>