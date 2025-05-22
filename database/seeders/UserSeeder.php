<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador del Sistema',
            'email' => 'admin@mesadepartes.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Usuario Empleado
        User::create([
            'name' => 'Empleado Mesa de Partes',
            'email' => 'empleado@mesadepartes.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'employee',
        ]);

        // Usuario Regular 1
        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

    }
}
