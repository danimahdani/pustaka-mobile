<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
use App\Models\User;
use Illuminate\Http\Request;

class BorrowedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BorrowedBook::with('users', 'books')->get();
        // dd($data);
        return view('borrowed-book.index', [
            'titleHeader' => 'List Borrowed Book',
            'borrowed_books' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'user_id' => ['required'],
            'book_id' => ['required'],
            'return_of_date' => ['required'],
            'is_accepted' => ['boolean']
        ]);

        BorrowedBook::create($validateData);

        return "ok";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
