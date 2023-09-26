<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\BorrowedBook;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BorrwoedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find('9');
        $user->userBorrowedbooks()->attach('3', [
            'return_of_date' => '2023-09-25',
            'is_accepted' => 1
        ]);
    }
}
