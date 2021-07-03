@extends('layouts.master')

@section('content')
<div class="row my-4">
<div class="col-md-8 mx-auto">
<div class="card border border-primary">
<h3 class="card-header">Connection</h3>
<div class="card-body">
<form action="{{route('users.auth')}}" method="post">
@csrf
<div class="form-group mb-3">
  <label for="email" class="form-label">Email</label>
  <input type="email" class="form-control" name="email" placeholder="Email">
</div>

<div class="form-group mb-3">
  <label for="password" class="form-label">Mot de passe</label>
  <input type="password" class="form-control" name="password" placeholder="Mot de passe">
</div>

<div class="form-group mb-3">
<button type="submit" class="btn btn-primary">Valider</button>
</div> 
</form>
</div>
</div>
</div>
</div>


@endsection
