@extends('layouts.master')

@section('content')
<div class="row my-4">
<div class="col-md-4">
<div class="card bg-light border border-primary">
<h3 class="card-header">Rechercher</h3>
<div class="card-body">
<form action="" method="post">
<div class="form-group mb-3">
  <label for="rechercher" class="form-label">Rechercher</label>
  <input type="search" class="form-control" name="rechercher" placeholder="Rechercher">
</div>
<div class="form-group mb-3">
<button type="submit" class="btn btn-primary">Valider</button>
</div> 
</form>
</div>
</div>
</div>
<div class="col-md-8">
<div class="card border border-primary">
<h3 class="card-header">{{$car->marque}}</h3>
<div class="card-body">

<div class="row">
<div class="col-3">
<img src="https://www.w3schools.com/images/w3schools_green.jpg" height="100" width="100" alt="" class="img-fluid rounded-circle">
</div>
<div class="col-9">
<h3 class="text-info">
<a href="{{route('cars.show',$car->id)}}" class="btn btn-link">{{$car->marque}}</a>
</h3>

<span class="badge alert-danger mr-2">Type : {{$car->type}}</span>
<span class="badge alert-primary ">Prix journée : {{$car->prixJ}}</span><br><br>
@if($car->dispo)
@auth
<a href="{{route('commands.create',$car->id)}}" class="btn btn-primary btn-sm">Reserver</a>
@else
<a href="{{route('users.login')}}" class="btn btn-link">Reserver</a>
@endauth
@else
<span class="badge alert-warning ">
Reserver
</span>
@endif
</div>
</div>

</div>
</div>
</div>




</div>


@endsection

