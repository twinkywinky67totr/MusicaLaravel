<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Administrador',
            'email'    => 'admin@admin.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        User::create([
            'name'     => 'Usuario Uno',
            'email'    => 'usuario1@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        User::create([
            'name'     => 'Usuario Dos',
            'email'    => 'usuario2@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        User::create([
            'name'     => 'Usuario Tres',
            'email'    => 'usuario3@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);
    }
}
