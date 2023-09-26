<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Anggota 2',
            'email' => 'anggota2@pustaka.test',
            'phone' => '08123456789',
            'password' => Hash::make(123456)
        ]);
    }
}
