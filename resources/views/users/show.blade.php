@extends('layouts.master')

@section('content')

<div class="row my-4">

<div class="col-md-4">
<div class="card text-left">
  <img class="img-fluid" src="{{$user->image}}" width="200" height="200"  alt="">
  <div class="card-body">
    <h4 class="card-title">{{$user->name}}</h4>
    <p class="card-text">
    <span class="badge alert-primary">Téléphone : {{$user->tel}}</span>
    <span class="badge alert-primary">Ville : {{$user->ville}}</span>

    </p>
  </div>
</div>
</div>

<div class="col-md-8">
<h3>Mes commandes</h3>
<table class="table">
  <thead>
    <tr>
      <th>Marque</th>
      <th>Type</th>
      <th>prixJ</th>
      <th>Date debut</th>
      <th>Date fin</th>
      <th>Prix TTC</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach(auth()->user()->commands as $command)
    <tr>
      <td>{{App\models\Car::findOrFail($command->car_id)->marque}}</td>
      <td>{{App\models\Car::findOrFail($command->car_id)->type}}</td>
      <td>{{App\models\Car::findOrFail($command->car_id)->prixJ}}</td>
      <td>{{$command->dateD}}</td>
      <td>{{$command->dateF}}</td>
      <td>{{$command->prixTTC}}</td>
      <td>
        <form action="{{route('commands.destroy',[$command->id,$command->car_id])}}" method="post">
          @csrf
         {{ method_field('delete')}}
          <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>


</div>


@endsection