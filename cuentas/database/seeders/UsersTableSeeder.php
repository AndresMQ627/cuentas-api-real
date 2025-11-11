<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Usuario de Prueba',
            'email' => 'test@correo.com',
            'password' => Hash::make('password'), 
            'email_verified_at' => now(),
        ]);
    }
}