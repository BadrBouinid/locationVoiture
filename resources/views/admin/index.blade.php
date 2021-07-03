@extends('layouts.master')

@section('content')
<div class="row my-4">
<div class="col-md-12">
<div class="form-group mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcar">
        <i class="fas fa-plus"></i>
      </button>
    </div>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Marque</th>
                <th>Model</th>
                <th>Type</th>
                <th>Prix journée</th>
                <th>Disponibilité</th>
                <th>Image</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    
                <tr>
                 <td>{{$car->id}}</td>
                 <td>{{$car->marque}}</td>
                 <td>{{$car->model}}</td>
                 <td>{{$car->type}}</td>
                 <td>{{$car->prixJ}}</td>
                 <td>
                    @if($car->dispo)
                    <span class="badge alert-success">Disponible</span>
                    @else
                    <span class="badge alert-danger">Reservée</span>
                   @endif
                </td>
                 <td><img src="{{asset($car->image)}}"  width="60" height="60" class="img-fluid rounded" alt=""></td>
                 <td> 
               <a href="{{route('cars.edit',$car->id)}}"  class="btn btn-warning"><i class="fas fa-edit"></i></a>
               <form action="{{route('cars.destroy',$car->id)}}" method="post">
                  @csrf
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
               </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="justify-content-center">
            {{ $cars->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

</div>

<div class="modal fade" id="addcar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une voiture</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('cars.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                  <label for="marque" class="form-label">Marque</label>
                  <input type="text" class="form-control" name="marque">
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" name="model">
                  </div>
                  <div class="mb-3">
                  <select name="type" class="form-select">
                    <option selected disabled>Type</option>
                    <option value="Essence">Essence</option>
                    <option value="Diesel">Diesel</option>
                  </select>
                  </div>
                  <div class="mb-3">
                    <label for="prix" class="form-label">Prix de journée</label>
                    <input type="text" class="form-control" name="prix">
                  </div>
                  <div class="mb-3">
                    <select name="dispo" class="form-select">
                        <option selected disabled>Disponibilité</option>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                      </select>
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                   <input type="file" name="image" class="form-control">
                  </div>
                <button type="submit" class="btn btn-primary">Valider</button>
              </form>
        </div>
      </div>
    </div>
  </div>


@endsection