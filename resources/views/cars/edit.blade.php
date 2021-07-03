@extends('layouts.master')

@section('content')
    
<div class="row">
    <div class="col-md-8 mx-auto">
        <form action="{{route('cars.update',$car->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
           
              <div class="mb-3">
                <label for="marque" class="form-label">Marque</label>
                <input type="text" class="form-control" name="marque" value="{{$car->marque}}">
              </div>
              <div class="mb-3">
                  <label for="model" class="form-label">Model</label>
                  <input type="text" class="form-control" name="model" value="{{$car->model}}">
                </div>
                <div class="mb-3">
                <select name="type" class="form-select">
                  <option selected disabled>Type</option>
                  <option value="Essence"{{$car->type=='Diesel'?'selected':''}}>Essence</option>
                  <option value="Diesel"{{$car->type=='Essence'?'selected':''}}>Diesel</option>
                </select>
                </div>
                <div class="mb-3">
                  <label for="prix" class="form-label">Prix de journée</label>
                  <input type="text" class="form-control" name="prix" value="{{$car->prixJ}}">
                </div>
                <div class="mb-3">
                  <select name="dispo" class="form-select">
                      <option selected disabled>Disponibilité</option>
                      <option value="1"{{$car->dispo?'selected':''}}>Oui</option>
                      <option value="0"{{!$car->dispo?'selected':''}}>Non</option>
                    </select>
                </div>
                <div class="mb-3">
                    <img src="{{asset($car->image)}}" width="100" height="100" class="img-fluid rounded" alt="">

                </div>
                <div class="mb-3">
                <input type="file" name="image" class="form-control" >
                </div>
                <div class="mb-3">
              <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </form>
    </div>
</div>
@endsection