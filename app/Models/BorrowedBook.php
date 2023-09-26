<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{

    use HasFactory;

    protected $table = 'borrowed_books';

    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function books()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
