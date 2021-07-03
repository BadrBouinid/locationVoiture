@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card border border-primary">
                <div class="card-header">Louer cette voiture</div>

                <div class="card-body">
                

                <div class="col-md-8">


               
<h3 class="text-info p-4">{{$car->marque}}</h3>


<div class="row">
<div class="col-3">
<img src="https://www.w3schools.com/images/w3schools_green.jpg" height="100" width="100" alt="" class="img-fluid rounded-circle">
</div>
<div class="col-9 my-5">


<span class="badge alert-danger mr-2">Type : {{$car->type}}</span>
<span class="badge alert-primary ">Prix journée : {{$car->prixJ}}</span>

</div>


</div>







                    <form method="POST" action="{{route('commands.store')}}">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="dated" class="col-md-4 col-form-label text-md-right">Date Debut</label>

                            <div class="col-md-6">
                                <input name="dated" type="date" class="form-control" value="Date Location" required autocomplete="name" autofocus>
                            </div>
                        </div>

                     
                        <div class="form-group row mb-3">
                            <label for="datel" class="col-md-4 col-form-label text-md-right">Date Fin</label>

                            <div class="col-md-6">
                                <input name="datef" type="date" class="form-control"  value="Date Fin" required autocomplete="name" autofocus>
                            </div>
                        </div>
                       
                      <input type="hidden" name="car_id" value="{{$car->id}}">

                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  Valider
                                </button>
                            </div>
                        </div>     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
