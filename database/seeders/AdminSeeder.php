<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use App\models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name'=>'programmer',
            'email'=>'badrprogrammer@gmail.com',
            'tel'=>'0660098776',
            'ville'=>'Casablanca',
            'password'=>Hash::make('admin'),
            'admin'=>1



        ]);
    }
}
