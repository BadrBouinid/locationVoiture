<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
         'marque',
         'model',
         'type',
         'prixJ',
         'dispo',
         'image',
    ];

 
    use HasFactory;
}
