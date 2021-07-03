<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\Car;
use Illuminate\Http\Request;
use Auth;
use DateTime;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $car=Car::findOrFail($id);
        return view('commands.create',compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           
            'car_id'=>'required',
            'dated'=>'required',
            'datef'=>'required',
            
        ]);

        $car=Car::findOrFail($request->car_id);
        $dateDebut=new DateTime($request->dated);
        $dateFin=new DateTime($request->datef);
        $jours=date_diff($dateDebut,$dateFin);
        $prixTTC=$car->prixJ*$jours->format('%d');
        

        Command::create([

            'user_id'=>auth()->user()->id,
            'car_id'=>$request->car_id,
            'dated'=>$request->dated,
            'datef'=>$request->datef,
            'prixTTC'=>$prixTTC,
            ]);
            $car->update([
                'dispo'=>0
            ]);
            return redirect()->route('users.profile',auth()->user()->id)->with([

                'success'=>'Commande ajoutée'
             ]);
    }


    public function destroy($commandId,$carId)
    {
        $command=Command::findOrFail($commandId);
        if($command->car_id==$carId){
        $command->delete();
        return redirect()->route('users.profile',auth()->user()->id)->withSuccess('Voiture suprimée');
    }
}
}