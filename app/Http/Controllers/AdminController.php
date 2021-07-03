<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
class AdminController extends Controller
{
   public function index(){
       return view('admin.index')->withCars(Car::orderBy('created_at','DESC')->paginate(10));
   }
}
