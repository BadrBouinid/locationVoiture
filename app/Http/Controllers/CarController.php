<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Command;
use Facade\Ignition\Exceptions\ViewException;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->search!==null){
            $cars=Car::orderBy('created_at','DESC')->whereMarque($request->search)->paginate(5);
            return view('cars.index')->with([
                'cars'=>$cars,
                'title'=>"Resultat trouvée pour : ".$request->search,
                'count'=>$cars->count(),
             
            ]);

            
        }
        else{
            $cars=Car::all();
            return view('cars.index')->with([
                'cars'=>Car::paginate(5),
                'carsDispo'=>Car::whereDispo(1)->get(),
                'title'=>"Toute les voitures",
                'count'=>$cars->count(),
                
           
        
        
        ]);
  
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
        'marque'=>'required',
        'model'=>'required',
        'type'=>'required',
        'prix'=>'required',
        'dispo'=>'required',
        'image'=>'required'

       ]);
       $file=$request->file('image');
       $name=$file->getClientOriginalName();
       $file->move(public_path().'/images/',$name);
       
       Car::create([
        'marque'=>$request->marque,
        'model'=>$request->model,
        'type'=>$request->type,
        'prixJ'=>$request->prix,
        'dispo'=>$request->dispo,
        'image'=>$name

       ]);
       return redirect()->route('admin.index')->withSuccess('Voiture ajoutée');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $car=Car::findOrFail($id);
     
       return view('cars.show',compact('car'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view ('cars.edit', compact ('car'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $car=  Car::find($id);
        $this->validate($request,[
         'marque'=>'required',
         'model'=>'required',
         'type'=>'required',
         'prix'=>'required',
         'dispo'=>'required',
       
 
        ]);
        $image=$car->image;
        
        if($request->hasFile('image')){
        $file=$request->file('image');
        $name=$file->getClientOriginalName();
        $file->move(public_path().'/images/',$name);
        $image='/images/'.$name;
        }  
        
    
        
        $car->update([
         'marque'=>$request->marque,
         'model'=>$request->model,
         'type'=>$request->type,
         'prixJ'=>$request->prix,
         'dispo'=>$request->dispo,
         'image'=>$image
        
 
        ]);
        return redirect()->route('admin.index')->withSuccess('Voiture modifiée');
     }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car=Car::findOrFail($id);
        $car->delete();
        return redirect()->route('admin.index')->withSuccess('Voiture suprimée');


    }
}
