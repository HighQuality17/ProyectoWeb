<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        
        $roles = [1, 2]; // rol 1 para admin y 2 para user

        User::create([
            'role_id' => 2,
            'name' => 'Marta',
            'email' => 'Marta@example.com',
            'idcard' => '1234567890',
            'phone' => '123-456-7890',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'John',
            'email' => 'john@example.com',
            'idcard' => '0987654321',
            'phone' => '098-765-4321',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Juana',
            'email' => 'juana@example.com',
            'idcard' => '1122334455',
            'phone' => '112-233-4455',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Alicia',
            'email' => 'alicia@example.com',
            'idcard' => '2233445566',
            'phone' => '223-344-5566',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Juan',
            'email' => 'Juan@example.com',
            'idcard' => '3344556677',
            'phone' => '334-455-6677',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'role_id' => 1,
            'name' => 'Admin',
            'email' => 'Administrador@gmail.com',
            'idcard' => '1055698745',
            'phone' => '3044781418',
            'password' => Hash::make('123456abc'),
        ]);
        User::create([
            'role_id' => 3,
            'name' => 'Proveedor 1',
            'email' => 'proveedor@gmail.com',
            'idcard' => '1255698744',
            'phone' => '3044333318',
            'password' => Hash::make('masterprovider'),
        ]);
        User::create([
            'role_id' => 3,
            'name' => 'Proveedor 2',
            'email' => 'proveedor2@gmail.com',
            'idcard' => '1225338744',
            'phone' => '3145336318',
            'password' => Hash::make('masterprovider'),
        ]);
    }
}
