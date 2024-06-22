<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
   //* public function run()
   //* {
     //*   $adminRole = Role::create(['name' => 'admin', 'label' => 'Administrador']);
//*
      //*  $user = User::find(1); // Suponiendo que el ID del usuario es 1
      //*  $user->roles()->attach($adminRole);
    //*}
    
    
        public function run(): void
        {
            role::create(['name' => 'Estudiante', 'label' => 'student']);
            role::create(['name' => 'Docente', 'label' => 'teacher']);
        }
    }