<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BorrowedBookTest extends TestCase
{
    public function testCreateBorrowedTest()
    {
        $user = User::find(8);
        $this->actingAs($user)
            ->post('/dashboard/borrowed-book', [
                'user_id' => $user->id,
                'book_id' => 1,
                'return_of_date' => '2023-09-25',
            ])->assertSuccessful();
    }

    // public function testUpdateBorrowedTest()
    // {
    //     $this->put('/dashboard/borrowed-book/1/edit', [
    //         'user_id' => 8,
    //         'book_id' => 1,
    //         'return_of_date' => '2023-09-11',
    //         'is_accepted' => 1,
    //     ])->assertSuccessful();
    // }
}
