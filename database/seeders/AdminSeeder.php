<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Vérifie si les administrateurs existent déjà, sinon les crée
        User::firstOrCreate([
            'email' => 'amin1@example.com',
        ], [
            'name' => 'Amin',
            'password' => Hash::make('amin_123'),
            'role' => 'admin',
        ]);

        User::firstOrCreate([
            'email' => 'othman2@example.com',
        ], [
            'name' => 'othman',
            'password' => Hash::make('othman_123'),
            'role' => 'admin',
        ]);

        User::firstOrCreate([
            'email' => 'abdelghafour3@example.com',
        ], [
            'name' => 'abdelghafour',
            'password' => Hash::make('abdelghafour_123'),
            'role' => 'admin',
        ]);
    }
}
