@extends('layouts.master')

@section('content')

<div class="row my-4">
<div class="col-md-4">
<div class="card bg-light border border-primary">
<h3 class="card-header">Rechercher</h3>
<div class="card-body">
<form>
@csrf
<div class="form-group mb-3">
  <label for="search" class="form-label">Rechercher</label>
  <input type="search" class="form-control" name="search" placeholder="Rechercher">
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
<h3 class="card-header">{{$title}} <span class="badge alert-primary">{{$count}}</span></h3>
<div class="card-body">
@foreach($cars as $car)
<div class="row">
<div class="col-3">
<img src="https://www.w3schools.com/images/w3schools_green.jpg" height="100" width="100" alt="" class="img-fluid rounded-circle">
</div>
<div class="col-9">
<h3 class="text-info">
<a href="{{route('cars.show',$car->id)}}" class="btn btn-link">{{$car->marque}}</a>
</h3>

<span class="badge alert-danger mr-2">Type : {{$car->type}}</span>
<span class="badge alert-primary ">Prix journée : {{$car->prixJ}}</span>
@if($car->dispo)
<span class="badge alert-success ">
Dispo
</span>
@else
<span class="badge alert-warning ">
Reserver
</span>
@endif
</div>
</div>
@endforeach
</div>

<div class="d-flex justify-content-center">
{{ $cars->links('pagination::bootstrap-4') }}
</div>

</div>
</div>




</div>


@endsection

