<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RoleSedder::class);

        User::create([
            'name'=>'Admin',
            'email'=>'correo@dominio.com',
            'password'=>bcrypt('contraseña'),
        ])->assignRole("admin");

         User::create([
             'name'=>'Servicios Escolares',
             'email'=>'correo@dominio.com',
             'password'=>bcrypt('contraseña'),
         ])->assignRole("admin");

         User::create([
            'name'=>'Servicios Financieros',
            'email'=>'correo@dominio.com',
            'password'=>bcrypt('contraseña'),
        ])->assignRole("financiero");

         
    }
}
