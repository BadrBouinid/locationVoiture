<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{




    
    
    public function store(Request $request){


        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'tel'=>'required',
            'ville'=>'required',
        ]);

        User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'tel'=>$request->tel,
            'ville'=>$request->ville,
            ]);
            return redirect()->route('users.login')->with([

                'success'=>'Compte crée'
             ]);



    }

    public function auth(Request $request){
        $this->validate($request,[

            'email'=>'required',
            'password'=>'required'
            ]);
if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){

    return redirect()->route('cars.index');
       
    }
    else{
        return redirect()->route('users.login')->with([

            'error'=>'Email ou mot de passe est incorrect'
         ]);
    }
}

    public function register(){
        return view('users.register');
    }

    public function login(){
        return view('users.login');
    }

    public function show($id){
        $user=User::findOrFail($id);
            return view('users.show',compact('user'));
        }

public function logout(Request $request){
Auth::logout();
return redirect()->route('cars.index');

}
}