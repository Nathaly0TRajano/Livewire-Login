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
            'name' => 'Admin',
            'email' => 'admin@teste.com',
            'password' => Hash::make('123456'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@teste.com',
            'password' => Hash::make('123456'),
            'role' => 'user'
        ]);

        //hash -> sempre ao cadastrar a senha como hash, para que ela fique criptografada.
    }
}
