<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index', [
            'titleHeader' => 'List Books',
            'books' => Book::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create', [
            'titleHeader' => 'Add Books',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => ['required'],
            'author' => ['required'],
            'category_id' => ['required'],
            'image' => ['image', 'file', 'max:1024'],
        ]);

        $validateData['location'] = $request->location;
        $validateData['description'] = $request->description;

        if ($request->has('image')) {
            $validateData['image'] = $request->file('image')->store('cover-image');
        }

        Book::create($validateData);

        return redirect()->route('books.index')->with('success', 'Add new book successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.detail', [
            'titleHeader' => 'Detail Book',
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', [
            'titleHeader' => 'Edit Book',
            'categories' => Category::all(),
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validateData = $request->validate([
            'title' => ['required'],
            'author' => ['required'],
            'category_id' => ['required'],
            'image' => ['image', 'file', 'max:1024'],
        ]);

        $validateData['location'] = $request->location;
        $validateData['description'] = $request->description;

        if ($request->has('image')) {
            if ($book->image != null) Storage::delete($book->image);

            $validateData['image'] = $request->file('image')->store('cover-image');
        }

        $book->update($validateData);

        return redirect()->route('books.index')->with('success', 'Edit book successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): RedirectResponse
    {
        if ($book->delete()) {
            return redirect()->route('books.index')->with('error', 'Book Deleted');
        }

        return redirect()->route('books.index')->with('error', 'Book Deleted Failed !');
    }
}
